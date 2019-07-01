<?php

class VentasdbController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Ventas');
        parent::initialize();
    }

    public function indexAction() {
        /**
         *      controlacceso revisa que este un usuario logeado, que el contribuyente este seleccionado
         *      que tenga una licencia valida
         *      @var session $pendiente
         */
        $estado = $this->claves->controlacceso();
        if ($estado === 'OK') {
            
        } else {

            return $this->dispatcher->forward([
                        "controller" => "index",
                        "action" => "index"
            ]);
        }
        $pendiente = $this->session->get('pendiente');
        if ($pendiente['estado'] === 'GRABADO') {
            $this->flash->notice('Tiene un pedido de venta sin cerrar' . ' ESTADO: ' . $pendiente['estado'] . ' NRO. PEDIDO: ' . $pendiente['RefNumber']);
            return $this->dispatcher->forward([
                        "action" => "cabecera",
                        "params" => [$pendiente['RefNumber']]
            ]);
        }

        $parameters = array('order' => 'TimeModified DESC', 'limit' => 1);
        $invoice = new Invoice();
        $invoice = Invoice::findFirst($parameters);
        $form = new NuevoTicketForm;
        
        if ($this->request->isPost()) {

            if ($form->isValid($this->request->getPost()) != false) {

           if ($form->getMessages()) {
                foreach ($form->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
            }
            }
        }

        $this->view->form = $form;
        $this->view->invoice = $invoice;
    }

    /**
     *  Buscar la ultima factura
     */
    public function opciondbAction() {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                            [
                                "action" => "index",
                            ]
            );
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

        $cliente = Customer::findFirstByListID($this->request->getPost('CustomerRefListID'));
        if (!$cliente) {
            $this->flash->success('Que paso con el input? ' . $this->request->getPost('CustomerRefListID'));
            return $this->dispatcher->forward([
                        'controller' => "home",
                        'action' => 'index'
            ]);
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
        $this->view->cliente = $cliente->ListID;
        $this->view->nombre = $cliente->Name;
        $this->view->refnumber = $numero;
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

        $this->tag->setDefault("tipofactura", $ticket->getFtipo());
        $this->tag->setDefault("numerofactura", $ticket->getFnumero());
        $this->tag->setDefault("frecuencia", $ticket->getFfrecuencia());
        $this->tag->setDefault("formapago", $ticket->getFplazo());
        $this->tag->setDefault("tipoguia", $ticket->getGtipo());
        $this->tag->setDefault("numeroguia", $ticket->getGnumero());
        $this->tag->setDefault("referencia", $ticket->getReferencia());
        $this->tag->setDefault("notacomprador", $ticket->getNotasComprador());
        $this->tag->setDefault("condiciones", $ticket->getTerminosCondiciones());
        $this->tag->setDefault("fechaemision", $ticket->getTxnDate());

        if ($this->request->isPost()) {

            if ($form->isValid($this->request->getPost()) != false) {
                $fecha = $this->request->getPost('fechaemision');
                $ticket->Ftipo = $this->request->getPost('tipofactura');
                $ticket->Gtipo = $this->request->getPost('tipoguia');
                $ticket->Ffrecuencia = $this->request->getPost('frecuencia');
                $ticket->Fnumero = intval($this->request->getPost('numerofactura'));
                $ticket->Gnumero = intval($this->request->getPost('numeroguia'));
                $ticket->Fplazo = $this->request->getPost('formapago');
                $ticket->Referencia = $this->request->getPost('referencia');
                $ticket->NotasComprador = $this->request->getPost('notacomprador');
                $ticket->TerminosCondiciones = $this->request->getPost('condiciones');
                $ticket->TxnDate = date('Y-m-d', strtotime($fecha));

                if ($ticket->save()) {

                    return $this->dispatcher->forward([
                                'action' => 'productos',
                                'params' => [$refNumber]
                    ]);
                } else {
                    $messages = $ticket->getMessages();
                    foreach ($messages as $$message) {
                        $this->flash->error((string) $message);
                    }
                }
            }
            if ($form->getMessages()) {
                foreach ($form->getMessages() as $message) {
                    $this->flash->error((string) $message);
                }
            }
        }

        $this->view->form = $form;
        $this->view->ticket = $ticket;
        $this->view->ruc = $ruc;
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
        // array("28" => "Servicios", "29" => "Inventarios", "30" => "No inventario",  "31" => "Terminado",  "32" => "Activo Fijo",  "33" => "Otros"));
        $ftipo = array();
        $tipofactura = $ticket->Ftipo;
        if ($tipofactura === '28') {
            $destipo = 'Service';
        } elseif ($tipofactura === '29') {
            $destipo = 'Inventory';
        } elseif ($tipofactura === '30') {
            $destipo = 'NonInventory';
        } elseif ($tipofactura === '31') {
            $destipo = 'Assembly';
        } elseif ($tipofactura === '32') {
            $destipo = 'Asset';
        } elseif ($tipofactura === '33') {
            $destipo = 'OtherCharge';
        }
        $ftipo['tipofactura'] = $tipofactura;
        $ftipo['destipo'] = $destipo;
        $this->session->set('tipofactura', $ftipo);
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
        $this->view->ftipo = $destipo;
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
        $parameters = $this->request->getPost('ItemRefListID');
        $item = Items::findFirstByquickbooks_listid($parameters);
        if (!$item) {
            $this->flash->error('TREMENDO ERROR llame urgentemente al Administrador');
        }
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

        /**
         * @tutorial procesar linea de producto
         * @param string $item->type    El tipo de factura proviene del Quickbooks (inventarios, producto terminado, servicios ..)
         * @param string $ticketline->Qty Cuando es por servicios o otros cargos se puede facturar solo por valor por lo que la cantidad es 1
         */
        $clave = $this->claves->guid();
        $fecha = date('Y-m-d H:m:s');
        $ticketline->setTxnLineID($clave);
        $ticketline->setTimeCreated($fecha);
        $ticketline->setTimeModified($fecha);
        $ticketline->setItemRefListID($this->request->getPost("ItemRefListID"));
        $ticketline->setItemRefFullName($item->getsales_desc());
        if ($item->gettype() === 'Assembly') {
            $ticketline->setQty($this->request->getPost("qty"));
            $ticketline->setPrice($item->getsales_price());
            $ticketline->setSubTotal($item->getsales_price() * $this->request->get('qty'));
            $ticketline->setIva(($item->getsales_price() * $this->request->get('qty')) * 12 / 100);
        } else {
            $ticketline->setQty(1);
            $ticketline->setPrice($this->request->getPost("qty"));
            $ticketline->setSubTotal($this->request->get('qty'));
            $ticketline->setIva(($this->request->get('qty')) * 12 / 100);
        }
        $ticketline->setIDKEY($ticket->TxnID);
        $ticketline->setEstado('ACTIVO');

        $valores['refnumber'] = $refNumber;
        $valores['subtotal'] = $valores['subtotal'] + $item->getsales_price() * $this->request->get('qty');
        $valores['iva'] = $valores['iva'] + ($item->getsales_price() * $this->request->get('qty')) * 12 / 100;
        $this->session->set('valores', $valores);

        if (!$ticketline->save()) {
            foreach ($ticketline->getMessages() as $message) {
                $this->flash->error($message . " codigo " . $this->request->getPost('ItemRefListID') . " Producto " . $item->getsales_desc());
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

    public function facturarAction($RefNumber) {

        $valores = $this->session->get('valores');
        $contribuyente = $this->session->get('contribuyente');
        $ticket = new Aticket();
        $ticket = Aticket::findFirstByRefNumber($valores['refnumber']);
        if (!$ticket) {
            $this->flash->error('Que esta pasando con ' . $valores['refnumber'] . ' o sera ' . $RefNumber);
            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);

            return;
        }

        $cliente = new Customer();
        $cliente = Customer::findFirstByListID($ticket->getCustomerRefListID());

        if (!$cliente) {
            $this->flash->success('No hay cliente? ' . $ticket->getCustomerRefListID());
            return $this->dispatcher->forward([
                        'controller' => "home",
                        'action' => 'index'
            ]);
        }
        $invoice = new Invoice();
        $fecha = date('Y-m-d H:m:s');
        $invoice->setAppliedAmount($valores['subtotal'] + $valores['iva']);
        $invoice->setBalanceRemaining($valores['subtotal'] + $valores['iva']);
        $invoice->setBillAddressAddr1($cliente->getBillAddressAddr1());
        $invoice->setBillAddressCity($cliente->getBillAddressCity());
        $invoice->setBillAddressCountry($cliente->getBillAddressCountry());
        $invoice->setBillAddressPostalCode($cliente->getBillAddressPostalCode());
        $invoice->setBillAddressState($cliente->getBillAddressState());
        $invoice->setCustomerRefFullName($cliente->getFullName());
        $invoice->setCustomerRefListID($cliente->getListID());
        $invoice->setClassRefFullName($cliente->getClassRefFullName());
        $invoice->setClassRefListID($cliente->getClassRefListID());
        $invoice->setCustomField1($cliente->getCustomField1());
        $invoice->setCustomField2(substr($ticket->getNotasComprador(), 0, 49));
        $invoice->setCustomField3(substr($ticket->getTerminosCondiciones(), 0, 49));
        $invoice->setCustomField9($cliente->getCustomField9());
        $invoice->setCustomField10('SIN IMPRIMIR');
        $invoice->setCustomField11($cliente->getPhone());
        $invoice->setCustomField12($cliente->getEmail());
        $invoice->setCustomField13('sin firmar');
        $invoice->setCustomField14('sin firmar');
        $invoice->setCustomField15('SIN FIRMAR');
        $invoice->setCustomerSalesTaxCodeRefFullName($cliente->getSalesTaxCodeRefFullName());
        $invoice->setCustomerSalesTaxCodeRefListID($cliente->getSalesTaxCodeRefListID());
        $formapago = array("0" => "0", "1" => "7", "2" => "15", "3" => "30", "4" => "45", "6" => "60", "7" => "90");
        $DueDate = date('Y-m-d H:m:s', strtotime($fecha . '+ ' . $formapago[$ticket->getFplazo()] . ' days'));
        $invoice->setDueDate($DueDate);
        $EditSequence = rand(1000, 10000000);
        $invoice->setEditSequence($EditSequence);
//        $invoice->setItemSalesTaxRefFullName($ItemSalesTaxRef_FullName);
//        $invoice->setItemSalesTaxRefListID($ItemSalesTaxRef_ListID);
        $invoice->setMemo($ticket->getReferencia());
//        $invoice->setOther($Other);
        $invoice->setRefNumber($ticket->getRefNumber());
        $invoice->setSalesRepRefFullName($cliente->getSalesRepRefFullName());
        $invoice->setSalesRepRefListID($cliente->getSalesRepRefListID());
//        $invoice->setSalesTaxPercentage();
        $invoice->setSalesTaxTotal($valores['iva']);
        $invoice->setStatus('GRABADO');
        $invoice->setSubtotal($valores['subtotal']);
        $invoice->setTermsRefFullName($cliente->getTermsRefFullName());
        $invoice->setTermsRefListID($cliente->getTermsRefListID());
        $invoice->setTimeCreated($fecha);
        $invoice->setTimeModified($fecha);
        $invoice->setTxnDate($ticket->getTxnDate());
        $invoice->setTxnNumber($ticket->getFnumero());
        $invoice->setTxnID($ticket->getFestab() . '-' . $ticket->getFpunto() . '-' . $ticket->getFnumero());

        if (!$invoice->save()) {
            foreach ($invoice->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "index",
                'action' => 'index'
            ]);

            return;
        }
        $parameters = array('conditions' => 'IDKEY = :clave:', 'bind' => array('clave' => $ticket->getTxnID()));
        $productos = Aticketline::find($parameters);
        $i = 0;
        foreach ($productos as $producto) {
            $item = new Items();
            $item = Items::findFirstByquickbooks_listid($producto->getItemRefListID());
            $i++;
            $invoicedetail = new Invoicelinedetail();
            $invoicedetail->setTxnLineID($ticket->getFestab() . '-' . $ticket->getFpunto() . '-' . $ticket->getFnumero() . '-' . $i);
            $invoicedetail->setAmount($producto->getSubTotal());
            $invoicedetail->setClassRefFullName($cliente->getClassRefFullName());
            $invoicedetail->setClassRefListID($cliente->getClassRefListID());
            $invoicedetail->setDescription($item->getname());
            $invoicedetail->setIDKEY($ticket->getFestab() . '-' . $ticket->getFpunto() . '-' . $ticket->getFnumero());
            $invoicedetail->setItemRefFullName($item->getfullname());
            $invoicedetail->setItemRefListID($item->getquickbooks_listid());
            $invoicedetail->setQuantity($producto->getQty());
            $invoicedetail->setRate($producto->getPrice());
            $invoicedetail->setSalesTaxCodeRefFullName($item->getsales_tax_code_ref_fullname());
            $invoicedetail->setSalesTaxCodeRefListID($item->getsales_tax_code_ref_listid());
            $invoicedetail->setUnitOfMeasure($item->getunit_of_measure_set_ref_fullname());

            if (!$invoicedetail->save()) {
                foreach ($invoicedetail->getMessages() as $message) {
                    $this->flash->error($message);
                }

                $this->dispatcher->forward([
                    'controller' => "index",
                    'action' => 'index'
                ]);

                return;
            }
        }

        /**
         *  Una vez facturado se procede a actualizar el pedido directo en los archivos de pedidos aticket
         */
        $ticket->Iva = $valores['iva'];
        $ticket->SubTotal = $valores['subtotal'];
        $ticket->setEstado("FACTURADO");
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

        $this->session->set('vinode', 'Proceso Ventas');
        $this->session->remove('pendiente');
        $this->view->invoice = $invoice;
        $this->view->contribuyente = $contribuyente;
        $this->view->cliente = $cliente;
        $this->view->ticket = $ticket;
        $this->view->productos = $productos;
    }

}
