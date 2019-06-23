<?php

class VentasController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Ventas');
        parent::initialize();
    }

    public function indexAction($CustomerRefListID) {
        /**
         *      controlacceso revisa que este un usuario logeado, que el contribuyente este seleccionado
         *      que tenga una licencia valida
         *      se le debe aumentar el seguimiento del proceso de ventas en la caja primaria y en la caja secundaria
         */
        $estado = $this->claves->controlacceso();
        if ($estado === 'OK') {
            
        } else {

            $this->dispatcher->forward([
                "controller" => "index",
                "action" => "index"
            ]);

            return;
        }
        $pendiente = $this->session->get('pendiente');
        if ($pendiente['estado'] === 'GRABADO') {
            $this->flash->notice('Tiene un pedido de venta sin cerrar' . ' ESTADO: ' . $pendiente['estado'] . ' NRO. PEDIDO: ' . $pendiente['RefNumber']);
            return $this->dispatcher->forward([
                 'controller' => "ventas",
                        "action" => "cabecera",
                        "params" => [$pendiente['RefNumber']]
            ]);
        }

        $ruc = $this->session->get('contribuyente');

        $tipocod = 'NUM' . $ruc['estab'] . $ruc['punto'];
        $calificado = 'TICKET';
        $numero = $this->claves->numeroenserie($tipocod, $calificado);
        $tipocod = 'NUM' . $ruc['estab'] . $ruc['punto'];
        $calificado = 'FACTURA';
        $numfact = $this->claves->numeroenserie($tipocod, $calificado);
        $clave = $this->claves->guid();
        $fecha = date('Y-m-d H:m:s');
        $cero = 0;
        
        $cliente = Customer::findFirstByListID($CustomerRefListID);
        if (!$cliente) {
            
        }
        $ticket = new Aticket();
        $ticket->setTxnID($clave);
        $ticket->setTimeCreated($fecha);
        $ticket->setTimeModified($fecha);
        $ticket->setEstab($ruc['estab']);
        $ticket->setPunto($ruc['punto']);
        $ticket->setFestab($ruc['estab']);
        $ticket->setFpunto($ruc['punto']);
        $ticket->setGestab($ruc['estab']);
        $ticket->setGpunto($ruc['punto']);
        $ticket->setCustomerRefListID($cliente->ListID);
        $ticket->setCustomerRefFullName($cliente->Name);
        $ticket->setConIva(0);
        $ticket->setEstado('GRABADO');
        $ticket->setIva(0);
        $ticket->setNroFactura('No Procesado');
        $ticket->setRefNumber($numero);
        $ticket->setFnumero($numfact);
        $ticket->setFtipo('unica');
        $ticket->setGtipo('Sin Guia');
        $ticket->setSinIva(0);
        $ticket->setSubTotal(0);
        $ticket->setTxnDate(date('Y-m-d', strtotime($fecha)));
        if (!$ticket->save()) {
            foreach ($ticket->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);

            return;
        }
        $valores = array();
        $valores['refnumber'] = $ticket->getRefNumber();
        $valores['iva'] = $ticket->getIva();
        $valores['siniva'] = $ticket->getSinIva();
        $valores['coniva'] = $ticket->getConIva();
        $valores['subtotal'] = $ticket->getSubTotal();
        $this->session->set('valores', $valores);
        $this->session->set('pendiente', array(
            "estado" => 'GRABADO',
            "RefNumber" => $numero
        ));
        $this->dispatcher->forward([
            'controller' => "ventas",
            'action' => 'cabecera',
            'params' => [$numero]
        ]);

    }

    public function cabeceraAction($refNumber) {
        $ticket = Aticket::findFirstByRefNumber($refNumber);
        if (!$ticket) {
            $this->flash->warning("no se ha encontrado el nuevo pedido ERROR" . $refNumber);

            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);
        }

        $TxnID = $ticket->TxnID;
        $ruc = $this->session->get('contribuyente');
        $form = new VentaCabeceraForm;
        if ($this->request->isPost()) {

            if ($form->isValid($this->request->getPost()) != false) {
                $fecha = date('Y-m-d', strtotime($this->request->getPost('fecha emision')));
                $ticket->Ftipo = $this->request->getPost('tipofactura');
                $ticket->Gtipo = $this->request->getPost('tipoguia');
                $ticket->Ffrecuencia = $this->request->getPost('frecuencia');
                $ticket->Fnumero = $this->request->getPost('numerofactura');
                $ticket->Gnumero = $this->request->getPost('numeroguia');
                $ticket->Fplazo = $this->request->getPost('formapago');
                $ticket->Referencia = $this->request->getPost('referencia');
                $ticket->NotasComprador = $this->request->getPost('notacomprador');
                $ticket->TerminosCondiciones = $this->request->getPost('condiciones');
                $ticket->TxnDate = $fecha;

                if ($ticket->save()) {

                    return $this->dispatcher->forward([
                                'controller' => "ventas",
                                'action' => 'productos',
                                'params' => [$refNumber]
                    ]);
                }
                if ($form->getMessages()) {
                    foreach ($form->getMessages() as $message) {
                        $this->flash->error((string) $message);
                    }
                }
            }
        }

        $this->view->form = $form;
        $this->view->ticket = $ticket;
        $this->view->ruc = $ruc;
    }

    public function facturaAction($refNumber) {
        $ticket = Aticket::findFirstByRefNumber($refNumber);
        if (!$ticket) {
            $this->flash->warning("no se ha encontrado el nuevo pedido ERROR" . $refNumber);

            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);
        }
    }

    public function productosAction($refNumber) {
        $this->flash->clear();
        $ticket = Aticket::findFirstByRefNumber($refNumber);
        if (!$ticket) {
            $this->flash->warning("no se ha encontrado el nuevo pedido ERROR" . $refNumber);

            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);
        }
        $valores = $this->session->get('valores');
        $ruc = $this->session->get('contribuyente');

        if (!$valores) {
            $valores = array();
        }

        $valores['refnumber'] = $ticket->getRefNumber();
        $valores['iva'] = 0;
        $valores['siniva'] = 0;
        $valores['coniva'] = 0;
        $valores['subtotal'] = 0;

        $TxnID = $ticket->TxnID;
        $form = new TicketProductoForm;
        $parameters = array('conditions' => '[IDKEY] = :clave:', 'bind' => array('clave' => $TxnID));
        $ticketline = Aticketline::find($parameters);
        foreach ($ticketline as $producto) {
            $valores['iva'] = $valores['iva'] + $producto->Iva;
            $valores['subtotal'] = $valores['subtotal'] + $producto->SubTotal;
        }
        $this->session->set('valores', $valores);
        $this->view->ticket = $ticket;
        $this->view->form = $form;
        $this->view->ruc = $ruc;
        $this->view->ticketline = $ticketline;
        $this->tag->setDefault('qty', '');
    }

    public function masproductosAction($refNumber) {

        $valores = $this->session->get('valores');
        if (!$valores) {
            $valores = array();
            $valores['siniva'] = 0;
            $valores['coniva'] = 0;
        }
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward([
                        'controller' => "ventas",
                        'action' => 'productos',
                        'params' => [$refNumber]
            ]);
        }

        $form = new TicketProductoForm;
        $ticketline = new Aticketline();
        $ticket = Aticket::findFirstByRefNumber($refNumber);
        $parameters = array('conditions' => '[quickbooks_listid] = :codigoprod:', 'bind' => array('codigoprod' => $this->request->getPost('ItemRefListID')));
        $item = Items::findFirst($parameters);
        $data = $this->request->getPost();
        if (!$form->isValid($data)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward([
                        "action" => "productos",
                        "params" => [$refNumber]
            ]);
        }

//        var_dump($this->request->getPost());
        $clave = $this->claves->guid();
        $fecha = date('Y-m-d H:m:s');
        $ticketline->setTxnLineID($clave);
        $ticketline->setTimeCreated($fecha);
        $ticketline->setTimeModified($fecha);
        $ticketline->setItemRefListID($this->request->getPost("ItemRefListID"));
        $ticketline->setItemRefFullName($item->sales_desc);
        $ticketline->setQty($this->request->getPost("qty"));
        $ticketline->setPrice($item->sales_price);
        $ticketline->setSubTotal($item->sales_price * $this->request->get('qty'));
        $ticketline->setIva(($item->sales_price * $this->request->get('qty')) * 12 / 100);
        $ticketline->setIDKEY($ticket->TxnID);
        $ticketline->setEstado('ACTIVO');

        $valores['refnumber'] = $refNumber;
        $valores['subtotal'] = $valores['subtotal'] + $item->sales_price * $this->request->get('qty');
        $valores['iva'] = $valores['iva'] + ($item->sales_price * $this->request->get('qty')) * 12 / 100;
//        $this->flash->success("Se ha adicionado un nuevo producto " . " Iva calculado " . $valores['iva'] . " Sub Total de la venta " . $valores['subtotal'] );
        $this->session->set('valores', $valores);

        if (!$ticketline->save()) {
            foreach ($ticketline->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward([
                        'action' => 'productos',
                        'params' => [$refNumber]
            ]);
        }

        return $this->dispatcher->forward([
                    'action' => 'productos',
                    'params' => [$refNumber]
        ]);
    }

    public function pagarAction($param) {

        $this->view->tipopago = $param;
        $valores = $this->session->get('valores');
        $auth = $this->session->get('auth');
        $contribuyente = $this->session->get('contribuyente');
        $ticket = Aticket::findFirstByRefNumber($valores['refnumber']);
        $representante = Employee::findFirstByAccountNumber($auth['numeroId']);
        $this->session->set('ticket', $ticket);
        $pago = new Receivepayment();

        $fecha = date('Y-m-d H:m:s');
        $clave = $this->claves->guid();
        $pago->setTxnID($clave);
        $pago->setTimeCreated($fecha);
        $pago->setTimeModified($fecha);
        $pago->setEditSequence(rand(3000, 3000000));
        $pago->setRefNumber($valores['refnumber']);
        $tipocod = 'NUM' . $contribuyente['estab'] . $contribuyente['punto'];
        $calificado = 'PAGO';
        $codetype = new Codetype();
        $numero = $codetype->numeroenserie($tipocod, $calificado);
        $codetype->setCodeValue($numero);
        if ($numero === 0) {
            $codetype->setTipoCod($tipoCod);
            $codetype->setType($calificado);
        }
        $codetype->save();
        $pago->setCustomField10($contribuyente['estab']);
        $pago->setCustomField11($contribuyente['punto']);
        $pago->setSalesRepRef_ListID($representante->ListID);
        $pago->setSalesRepRef_FullName($representante->Name);
        $pago->setTxnNumber($numero);
        $pago->setTxnDate(date('Y-m-d', strtotime($fecha)));

        switch ($param) {
            case 1:
                $efectivo = $this->request->getPost('efectivo');
                if (!$efectivo or $efectivo < ( $valores['subtotal'] + $valores['iva'] )) {
                    $this->flash->error('Debe ingresar un valor igual o mayor que el total a pagar');
                    return $this->dispatcher->forward([
                                "action" => "final",
                                "params" => [$refNumber]
                    ]);
                }
                $pago->setCustomerRef_ListID('80000A56-1361397951');
                $pago->setCustomerRef_FullName('CONSUMIDOR FINAL (ISLAS)');
                $pago->setTotalAmount($valores['iva'] + $valores['subtotal']);
                $pago->setCustomField14('1');
                $ticket->Single = 1;
                $this->view->tipopago = 1;
                $this->view->cambio = $efectivo - ( $valores['subtotal'] + $valores['iva'] );
                break;
            case 11:
                $efectivo = $this->request->getPost('efectivo');
                if (!$efectivo or $efectivo < ( $valores['subtotal'] + $valores['iva'] )) {
                    $this->flash->error('Debe ingresar un valor igual o mayor que el total a pagar');
                    return $this->dispatcher->forward([
                                "action" => "cliente",
                                "params" => [$refNumber]
                    ]);
                }
                $cliente = $this->session->get('cliente');
                $pago->setCustomerRef_ListID($cliente->ListID);
                $pago->setCustomerRef_FullName($cliente->FullName);
                $pago->setTotalAmount($valores['iva'] + $valores['subtotal']);
                $pago->setCustomField14('0');
                $ticket->Single = 2;
                $this->view->tipopago = 1;
                $this->view->cambio = $efectivo - ( $valores['subtotal'] + $valores['iva'] );
                break;
            case 2:
                $pago->setCustomerRef_ListID('80000A56-1361397951');
                $pago->setCustomerRef_FullName('CONSUMIDOR FINAL (ISLAS)');
                $pago->setTotalAmount($valores['iva'] + $valores['subtotal']);
                $pago->setCheckBank($this->request->getPost('chBanco'));
                $pago->setCheckDate(date('Y-m-d', strtotime($fecha)));
                $pago->setCheckNumber($this->request->getPost('chNumero'));
                $pago->setCheckAmount($valores['iva'] + $valores['subtotal']);
                $pago->setCustomField12($this->request->getPost('chNombre'));
                $pago->setCustomField13($this->request->getPost('chCuenta'));
                $pago->setCustomField14('1');
                $ticket->Single = 1;
                $this->view->tipopago = 2;
                break;
            case 12:
                $cliente = $this->session->get('cliente');
                $pago->setCustomerRef_ListID($cliente->ListID);
                $pago->setCustomerRef_FullName($cliente->FullName);
                $pago->setTotalAmount($valores['iva'] + $valores['subtotal']);
                $pago->setCheckBank($this->request->getPost('chBanco'));
                $pago->setCheckDate(date('Y-m-d', strtotime($fecha)));
                $pago->setCheckNumber($this->request->getPost('chNumero'));
                $pago->setCheckAmount($valores['iva'] + $valores['subtotal']);
                $pago->setCustomField12($this->request->getPost('chNombre'));
                $pago->setCustomField13($this->request->getPost('chCuenta'));
                $pago->setCustomField14('0');
                $ticket->Single = 2;
                $this->view->tipopago = 2;
                break;
            case 3:
                $pago->setCustomField14('1');
                $ticket->Single = 1;
                $this->view->tipopago = 3;
                break;

            default:
                break;
        }

        if (!$pago->save()) {
            foreach ($pago->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward([
                        'controller' => 'index',
                        'action' => 'index',
            ]);
        }
        $this->session->set('pago', array(
            'TxnID' => $clave,
            'TimeCreated' => $fecha,
            'TimeModified' => $fecha,
            'RefNumber' => $valores['refnumber'],
            'CustomField10' => $contribuyente['estab'],
            'CustomField11' => $contribuyente['punto'],
            'SalesRepRef_ListID' => $representante->ListID,
            'SalesRepRef_FullName' => $representante->Name,
            'TxnNumber' => $numero,
            'TxnDate' => date('Y-m-d', strtotime($fecha)),
            'CustomerRef_ListID' => '80000A56-1361397951',
            'CustomerRef_FullName' => 'CONSUMIDOR FINAL (ISLAS)',
            'TotalAmount' => $valores['iva'] + $valores['subtotal']
        ));
        $ticket->Estado = "PAGADO";
        $ticket->TxnDate = date('Y-m-d', strtotime($fecha));
        $ticket->save();
        $this->session->set('pendiente', array(
            "Estado" => "PAGADO",
            "RefNumber" => $valores['refnumber']
        ));

        $this->view->apagar = $valores['subtotal'] + $valores['iva'];
        $this->session->remove('valores');
        $form = new FinalForm;
        $this->view->form = $form;
        $this->view->opcion = $param;
    }

    public function SeguirAction() {
        $this->ticketPrinted();
    }

    public function ticketPrinted() {
        $this->toprtticket->imprimeTicket(1);
        $pago = $this->session->get('pago');
//        $this->flash->success('Codigo Cliente ' . $pago->CustomerRef_ListID);
//        $this->flash->success("Ticket impreso");

        $this->dispatcher->forward([
            'controller' => "ventas",
            'action' => "index"
        ]);
    }

    public function consumoAction($param) {
        
    }

    public function alfaAction($param) {
        
    }

    public function grupoAction($param) {
        
    }

    public function aumentaAction($param) {
        
    }

    public function delproductoAction($TxnLineID) {
        $ticketline = Aticketline::findFirstByTxnLineID($TxnLineID);
        $ticketline->delete();
        $valores = $this->session->get('valores');
        $refNumber = $valores['refnumber'];
        return $this->dispatcher->forward([
                    'action' => 'productos',
                    'params' => [$refNumber]
        ]);
    }

    public function finalAction($RefNumber) {

        $valores = $this->session->get('valores');
        $ticket = Aticket::findFirstByRefNumber($valores['refnumber']);
        if (!$ticket) {
            $this->flash->error('Que esta pasando con ' . $valores['refnumber'] . ' o sera ' . $RefNumber);
            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);

            return;
        }
        $ticket->Iva = $valores['iva'];
        $ticket->SubTotal = $valores['subtotal'];
        if (!$ticket->save()) {
            foreach ($ticket->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);

            return;
        }

        $this->RefNumber = $RefNumber;
        $this->view->subtotal = $valores['subtotal'];
        $this->view->iva = $valores['iva'];
        $this->view->apagar = $valores['subtotal'] + $valores['iva'];
        $form = new FinalForm;
        $this->view->form = $form;
    }

    public function clienteAction($ListID) {

        $cliente = Customer::findFirstByListID($ListID);
        $this->session->set('cliente', $cliente);
        $valores = $this->session->get('valores');
        $ticket = Aticket::findFirstByRefNumber($valores['refnumber']);
        $ticket->Iva = $valores['iva'];
        $ticket->SubTotal = $valores['subtotal'];
        if (!$ticket->save()) {
            foreach ($ticket->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);

            return;
        }

        $this->flash->warning($RefNumber . ' Iva calculado ' . $valores['iva'] . ' Precio Total calculado ' . $valores['subtotal']);

        $this->RefNumber = $RefNumber;
        $this->view->codigocliente = $cliente->ListID;
        $this->view->nombrecliente = $cliente->Name;
        $this->view->direccioncliente = $cliente->BillAddress_Addr1 . ', ' . $cliente->BillAddress_City;
        $this->view->ruccliente = $cliente->AccountNumber;
        $this->view->apagar = $valores['subtotal'] + $valores['iva'];
        $form = new FinalForm;
        $this->view->form = $form;
    }

    public function inoutAction() {
        /**
         *      controlacceso revisa que este un usuario logeado, que el contribuyente este seleccionado
         *      que tenga una licencia valida
         *      se le debe aumentar el seguimiento del proceso de ventas en la caja primaria y en la caja secundaria
         */
        $estado = $this->claves->controlacceso();
        if ($estado === 'OK') {
            
        } else {

            $this->dispatcher->forward([
                "controller" => "index",
                "action" => "index"
            ]);

            return;
        }
        $pendiente = $this->session->get('cajaabierta');
        if ($pendiente['estado'] === 'ABIERTO') {
            $this->flash->notice('Tiene una caja sin cerrar' . ' ESTADO: ' . $pendiente['estado'] . ' NRO. CAJA: ' . $pendiente['RefNumber']);
            return $this->dispatcher->forward([
                        "action" => "index"
            ]);
        }
        $ruc = $this->session->get('contribuyente');
        $auth = $this->session->get('auth');

        $tipocod = 'NUM' . $ruc['estab'] . $ruc['punto'];
        $calificado = 'CAJA';
        $numero = $this->claves->cajaabierta($tipocod, $calificado);
        $refnumber = $ruc['estab'] . $ruc['punto'] . trim($numero);

        $cedula = $auth['numeroId'];
        $empleado = Employee::findFirstByAccountNumber($cedula);
        $clave = $this->claves->guid();
        $fecha = date('Y-m-d H:m:s');
        $cero = 0;

        $caja = new Cashier();
        $caja->setTxnID($clave);
        $caja->setTimeCreated($fecha);
        $caja->setTimeModified($fecha);
        $caja->setEstab($ruc['estab']);
        $caja->setPunto($ruc['punto']);
        $caja->setEditSequence(rand(1000, 2000000));
        $caja->setRefNumber($refnumber);
        $caja->setTxnDate(date('Y-m-d', strtotime($fecha)));
        $caja->setEmployeeRefListID($empleado->ListID);
        $caja->setEmployeeRefFullName($empleado->Name);
        if (!$caja->save()) {
            foreach ($caja->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);

            return;
        }

        $form = new CashierForm;
        $this->view->form = $form;
        $this->view->caja = $caja;
    }

    public function aprobarcajaAction($refnumber, $opcion) {

        if (!$this->request->isPost()) {
            $this->flash->error('Error grave llamar al webmaster NO HAY POST');
            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);

            return;
        }

        $estado = 'GRABADO';
        $parameters = array('conditions' => '[RefNumber] = :clave: AND [Estado] = :estado:', 'bind' => array('clave' => $refnumber, 'estado' => $estado));
        $caja = Cashier::findFirst($parameters);
        if (!$caja) {
            $this->flash->error('Error grave llamar al webmaster NO HAY REFERENCIA');
            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);

            return;
        }


        $caja->setEfectivo($this->request->getPost('Efectivo'));
        $caja->setCheques($this->request->getPost('Cheques'));
        $caja->setDepositos($this->request->getPost('Depositos'));
        $caja->setCierreAuditor($this->request->getPost('CierreAuditor'));
        $caja->setCierreNotas($this->request->getPost('CierreNotas'));
        $caja->setEstado('ABIERTO');
        $this->session->set('cajaabierta', array(
            'estado' => 'ABIERTO',
            'RefNumber' => $refnumber
        ));

        $this->flash->notice('Caja Abierta');
        if (!$caja->save()) {
            foreach ($caja->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);

            return;
        }

        $this->dispatcher->forward([
            'controller' => "index",
            'action' => 'index'
        ]);

        return;
    }

    public function cerrarcajaAction($refnumber, $opcion) {

        if (!$this->request->isPost()) {
            $this->flash->error('Error grave llamar al webmaster NO HAY POST');
            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);

            return;
        }

        $estado = 'ABIERTO';
        $parameters = array('conditions' => '[RefNumber] = :clave: AND [Estado] = :estado:', 'bind' => array('clave' => $refnumber, 'estado' => $estado));
        $caja = Cashier::findFirst($parameters);
        if (!$caja) {
            $this->flash->error('Error grave llamar al webmaster NO HAY REFERENCIA');
            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);

            return;
        }

        $caja->setEstado('CERRADO');
        $this->session->remove('cajaabierta');
        $this->flash->notice('Caja Cerrada');
        if (!$caja->save()) {
            foreach ($caja->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);

            return;
        }
        $ruc = $this->session->get('contribuyente');
        $auth = $this->session->get('auth');
        $calculado = $this->session->get('calculado');
        $cedula = $auth['numeroId'];
        $empleado = Employee::findFirstByAccountNumber($cedula);
        $clave = $this->claves->guid();
        $fecha = date('Y-m-d H:m:s');

        $caja = new Cashier();
        $caja->setTxnID($clave);
        $caja->setTimeCreated($fecha);
        $caja->setTimeModified($fecha);
        $caja->setEstab($ruc['estab']);
        $caja->setPunto($ruc['punto']);
        $caja->setEditSequence(rand(1000, 2000000));
        $caja->setRefNumber($refnumber);
        $caja->setTxnDate(date('Y-m-d', strtotime($fecha)));
        $caja->setEmployeeRefListID($empleado->ListID);
        $caja->setEmployeeRefFullName($empleado->Name);
        $caja->setEfectivo($this->request->getPost('Efectivo'));
        $caja->setCheques($this->request->getPost('Cheques'));
        $caja->setDepositos($this->request->getPost('Depositos'));
        $caja->setCierreAuditor($this->request->getPost('CierreAuditor'));
        $caja->setCierreNotas($this->request->getPost('CierreNotas'));
        $caja->setEstado('CERRADO');
        $caja->setOperacion('AUDITADO');
        if (!$caja->save()) {
            foreach ($caja->getMessages() as $message) {
                $this->flash->error($message);
            }
        }

        $diferencias = $calculado['efectivoi'] + $calculado['chequesi'] + $calculado['depositosi'] + $calculado['efectivo'] + $calculado['cheques'] + $calculado['depositos'] - ($this->request->getPost('Efectivo') + $this->request->getPost('Cheques') + $this->request->getPost('Depositos'));
        $this->view->diferencias = $diferencias;
        $this->view->refnumber = $refnumber;
    }

    public function cerrarAction() {
        /**
         * 
         */
        $estado = $this->claves->controlacceso();
        if ($estado === 'OK') {
            
        } else {

            $this->dispatcher->forward([
                "controller" => "index",
                "action" => "index"
            ]);

            return;
        }
        $pendiente = $this->session->get('cajaabierta');
        if ($pendiente['estado'] != 'ABIERTO') {
            $this->flash->notice('No tiene una caja abierta' . ' ESTADO: ' . $pendiente['estado'] . ' NRO. CAJA: ' . $pendiente['RefNumber']);
            return $this->dispatcher->forward([
                        "action" => "index"
            ]);
        }
        $calculado = array();
        $refnumber = $pendiente['RefNumber'];
        $estado = 'ABIERTO';
        $parameters = array('conditions' => '[RefNumber] = :clave: AND [Estado] = :estado:', 'bind' => array('clave' => $refnumber, 'estado' => $estado));
        $caja = Cashier::findFirst($parameters);
        if (!$caja) {
            $this->flash->error('Error grave llamar al webmaster NO HAY REFERENCIA');
            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);

            return;
        }
        /**
         * Procesa ventas, caja inicial, eventualmente depositos
         * Calcula total en caja = caja inicial +- ventas + depositos
         */
        $calculado['efectivoi'] = $caja->getEfectivo();
        $calculado['chequesi'] = $caja->getCheques();
        $calculado['depositosi'] = $caja->getDepositos();
        $fecha = $caja->getTxnDate();
        $blanco = 'n/a';
        $vtasparams = array(
            'conditions' => '[TxnDate] >= :fecha: AND [NroCaja] = :blanco:',
            'bind' => array(
                'fecha' => $fecha,
                'blanco' => $blanco
            )
        );
        $pagosparams = array(
            'conditions' => '[TxnDate] >= :fecha: AND [CustomField8] = :blanco:',
            'bind' => array(
                'fecha' => $fecha,
                'blanco' => $blanco
            )
        );


        $pagos = Receivepayment::find($pagosparams);
        foreach ($pagos as $recibo) {
            if ($recibo->DepositNumber != 'n/a') {
                $calculado['depositos'] = $calculado['depositos'] + $recibo->TotalAmount;
            } elseif ($recibo->CheckAmount > 0) {
                $calculado['cheques'] = $calculado['cheques'] + $recibo->CheckAmount;
            } else {
                $calculado['efectivo'] = $calculado['efectivo'] + $recibo->TotalAmount;
            }
        }

        $ventas = Aticket::find($vtasparams);
        foreach ($ventas as $tipocliente) {
            if ($tipocliente->getSingle() === 1) {
                $calculado['consumidor'] = $calculado['consumidor'] + $tipocliente->getSubTotal() + $tipocliente->getIva();
            } else {
                $calculado['cliente'] = $calculado['cliente'] + $tipocliente->getSubTotal() + $tipocliente->getIva();
            }
        }

        $ruc = $this->session->get('contribuyente');
        $auth = $this->session->get('auth');
        $cedula = $auth['numeroId'];
        $empleado = Employee::findFirstByAccountNumber($cedula);
        $clave = $this->claves->guid();
        $fecha = date('Y-m-d H:m:s');

        $caja = new Cashier();
        $caja->setTxnID($clave);
        $caja->setTimeCreated($fecha);
        $caja->setTimeModified($fecha);
        $caja->setEstab($ruc['estab']);
        $caja->setPunto($ruc['punto']);
        $caja->setEditSequence(rand(1000, 2000000));
        $caja->setRefNumber($refnumber);
        $caja->setTxnDate(date('Y-m-d', strtotime($fecha)));
        $caja->setEmployeeRefListID($empleado->ListID);
        $caja->setEmployeeRefFullName($empleado->Name);
        $caja->setEfectivo($calculado['efectivo']);
        $caja->setCheques($calculado['cheques']);
        $caja->setDepositos($calculado['depositos']);
        $caja->setCierreAuditor('Pagos calculados');
        $caja->setCierreNotas($empleado->Name);
        $caja->setEstado('CERRADO');
        $caja->setOperacion('CALCULADO');
        if (!$caja->save()) {
            foreach ($caja->getMessages() as $message) {
                $this->flash->error($message);
            }
        }
        $form = new CashierForm;
        $this->view->form = $form;
        $this->view->caja = $caja;
        $this->view->calculado = $calculado;
    }

    public function imprimecajaAction($refnumber) {

        $parameters = array(
            'conditions' => 'RefNumber = :refnumber:',
            'bind' => array(
                'refnumber' => $refnumber
            )
        );

        $cajas = Cashier::find($parameters);

        if (!$cajas) {
            $this->flash->error('No existe una caja con esta referencia ' . $refnumber);
            $this->dispatcher->forward([
                "controller" => "index",
                "action" => "index"
            ]);

            return;
        }

        $movimientos = array();
        $na = 0;
        $nl = 8;
        $movimientos[1]['cia'] = 'HELADERIAS COFRUNAT CIA. LTDA.';
        $movimientos[2]['Reporte'] = 'RESUMEN DE VENTAS POR CAJA';

        $registros = count($cajas);
//        $this->flash->notice('Numero de registros generados ' . $registros);
        foreach ($cajas as $caja) {
            switch ($caja->getOperacion()) {
                case 'INICIO':
                    $movimientos[3]['caja']['refnumber'] = $caja->getRefNumber();
                    $movimientos[3]['caja']['txndate'] = date('d-m-Y', strtotime($caja->getTxnDate()));
                    $movimientos[3]['caja']['efectivo'] = number_format($caja->getEfectivo(), '2', ',', '.');
                    $movimientos[3]['caja']['cheques'] = number_format($caja->getCheques(), '2', ',', '.');
                    $movimientos[3]['caja']['depositos'] = number_format($caja->getDepositos(), '2', ',', '.');
                    break;

                case 'CALCULADO':
                    $movimientos[4]['caja']['refnumber'] = $caja->getRefNumber();
                    $movimientos[4]['caja']['txndate'] = date('d-m-Y', strtotime($caja->getTxnDate()));
                    $movimientos[4]['caja']['efectivo'] = number_format($caja->getEfectivo(), '2', ',', '.');
                    $movimientos[4]['caja']['cheques'] = number_format($caja->getCheques(), '2', ',', '.');
                    $movimientos[4]['caja']['depositos'] = number_format($caja->getDepositos(), '2', ',', '.');
                    break;

                case 'AUDITADO':
                    $movimientos[5]['caja']['refnumber'] = $caja->getRefNumber();
                    $movimientos[5]['caja']['txndate'] = date('d-m-Y', strtotime($caja->getTxnDate()));
                    $movimientos[5]['caja']['efectivo'] = number_format($caja->getEfectivo(), '2', ',', '.');
                    $movimientos[5]['caja']['cheques'] = number_format($caja->getCheques(), '2', ',', '.');
                    $movimientos[5]['caja']['depositos'] = number_format($caja->getDepositos(), '2', ',', '.');
                    break;

                default:
                    break;
            }
        }
        $estado = 'PAGADO';
        $faltadefinir = 'n/a';
        $parameters = array(
            'conditions' => 'CustomField8 = :refnumber:',
            'bind' => array(
                'refnumber' => $faltadefinir
            )
        );
        $pagos = Receivepayment::find($parameters);

        $registros = count($pagos);
//        $this->flash->notice('Numero de registros generados ' . $registros);
        foreach ($pagos as $pago) {
            $movimientos[$nl]['detalle']['fecha'] = date('d-m-Y', strtotime($pago->TxnDate));
            $movimientos[$nl]['detalle']['refnumber'] = $pago->getRefNumber();
            $movimientos[$nl]['detalle']['cliente'] = $pago->getCustomerRef_FullName();
            $movimientos[$nl]['detalle']['subtotal'] = number_format($pago->getTotalAmount() * 100 / 112, 2, ',', '.');
            $movimientos[$nl]['detalle']['iva'] = number_format($pago->getTotalAmount() - ($pago->getTotalAmount() * 100 / 112), 2, '.', '.');
            $movimientos[$nl]['detalle']['total'] = number_format($pago->getTotalAmount(), 2, ',', '.');
            $nl++;
        }

        $this->view->movimientos = $movimientos;
    }

}
