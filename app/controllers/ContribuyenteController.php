<?php

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class ContribuyenteController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle('Contribuyente');
        parent::initialize();
    }

    public function indexAction() {
        $this->session->conditions = null;
        $this->view->form = new ContribuyenteSearchForm;
    }

    public function newAction() {
        $this->view->form = new ContribuyenteForm();
    }

    public function searchAction() {
        $numberPage = 1;

        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Contribuyente", $this->request->getPost());
            $this->persistent->searchParams = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }
        $parameters = array();
        if ($this->persistent->searchParams) {
            $parameters = $this->persistent->searchParams;
        }
        $misCodigos = Contribuyente::find($parameters);
        if (count($misCodigos) == 0) {
            $this->flash->notice("La busqueda no arrojo ningun contribuyente como resultado");
            return $this->dispatcher->forward(
                  [
                     "controller" => "contribuyente",
                     "action" => "index",
                  ]
            );
        }

        $paginator = new Paginator(array(
           "data" => $misCodigos,
           "limit" => 10,
           "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
        $this->view->elementos = $misCodigos;
    }

    public function saveAction() {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                  [
                     "action" => "index",
                  ]
            );
        }
//        var_dump($_POST);
        $ayuda = $this->session->get('mismocontrolador');
        $ruc = $ayuda['ruc'];
        $estab = $ayuda['estab'];
        $punto = $ayuda['punto'];
        $nrolic = $this->request->getPost('NumeroLicencia');
        $empresa = Contribuyente::findFirst(array(
              "Ruc = :ruc: AND CodEmisor = :estab: AND Punto = :punto:",
              'bind' => array('ruc' => $ruc, 'estab' => $estab, 'punto' => $punto)
        ));
        if ($empresa == false) {
            $this->flash->error("Contribuyente no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "contribuyente",
                     "action" => "index",
                  ]
            );
        }


        $licencia = Licencia::findFirst(array(
              "Ruc = :ruc: AND Establecimiento = :estab: AND PuntoEmision = :punto:",
              'bind' => array('ruc' => $ruc, 'estab' => $estab, 'punto' => $punto)
        ));
        if (!$licencia) {
            $this->flash->error('Este contribuyente no tiene registrada un Numero de Licencia en nuestra base de datos');
            return $this->dispatcher->forward(
                  [
                     "action" => "index",
                  ]
            );
        }
        $fecha = date('Y-m-d');
        if ($licencia->NumeroLicencia != $nrolic) {
            $this->flash->error('Este Numero de Licencia no se encuentra registrada en nuestra base de datos');
            return $this->dispatcher->forward(
                  [
                     "action" => "index",
                  ]
            );
        }
        if ($licencia->FechaFin < $fecha) {
            $this->flash->error('Este Numero de Licencia ha expirado en nuestra base de datos');
            return $this->dispatcher->forward(
                  [
                     "action" => "index",
                  ]
            );
        }

        $empresa->setLicencia($this->request->getPost('NumeroLicencia'));
        $empresa->setLlevaContabilidad($this->request->getPost('LlevaContabilidad'));
        $empresa->setEmision($this->request->getPost('Emision'));
        $empresa->setAmbiente($this->request->getPost('Ambiente'));
        $empresa->setContingencia($this->request->getPost('Contingencia'));

        if (!$empresa->save()) {
            foreach ($empresa->getMessages() as $message) {
                $this->flash->error($message);
            }
            $this->flash->error('Este Numero de Licencia no se ha podido registrar en este contribuyente');
            return $this->dispatcher->forward(
                  [
                     "action" => "index",
                  ]
            );
        }
        $this->flash->success("El numero de licencia es valido y esta habilitado en este contribuyente");

        return $this->dispatcher->forward(
              [
                 "action" => "index",
              ]
        );
    }

    public function createAction() {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(
                  [
                     "controller" => "contribuyente",
                     "action" => "index",
                  ]
            );
        }

        $form = new ContribuyenteForm();
        $contribuyente = new Contribuyente();
        $data = $this->request->getPost();
        if (!$form->isValid($data, $contribuyente)) {
            foreach ($form->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                  [
                     "controller" => "contribuyente",
                     "action" => "new",
                  ]
            );
        }

        if (!$contribuyente->save()) {
            foreach ($contribuyente->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                  [
                     "controller" => "contribuyente",
                     "action" => "new",
                  ]
            );
        }

        $form->clear();

        $this->flash->success("Un nuevo contribuyente se ha adicionado correctamente");

        return $this->dispatcher->forward(
              [
                 "controller" => "contribuyente",
                 "action" => "index",
              ]
        );
    }

    private function _registerRuc($ruc) {
//        var_dump($ruc);
        $this->session->set('contribuyente', array(
           'id' => $ruc->Id,
           'estab' => $ruc->CodEmisor,
           'punto' => $ruc->Punto,
           'ruc' => $ruc->Ruc,
           'razon' => $ruc->Razon,
           'emision' => $ruc->Emision,
           'ambiente' => $ruc->Ambiente,
           'NombreComercial' => $ruc->NombreComercial,
           'DirMatriz' => $ruc->DirMatriz,
           'DirEmisor' => $ruc->DirEmisor,
           'Resolucion' => $ruc->Resolucion,
           'LlevaContabilidad' => $ruc->LlevaContabilidad
        ));
//        $this->flash->success('Seleccionado el Contribuyente ' . $ruc['Razon']);
    }

    public function seleccionAction($id) {
        $parameters = array('conditions' => '[Id] = :id:', 'bind' => array('id' => $id));
        $contribuyente = Contribuyente::findFirst($parameters);
        if ($contribuyente == false) {
            $this->flash->error("Este contribuyente no existe");
            return $this->dispatcher->forward(
                  [
                     "controller" => "contribuyente",
                     "action" => "index",
                  ]
            );
        }
        $ruc = $contribuyente->Ruc;
        $estab = $contribuyente->CodEmisor;
        $punto = $contribuyente->Punto;
        $nrolic = $contribuyente->Licencia;
        $licencia = Licencia::findFirst(array(
              "Ruc = :ruc: AND Establecimiento = :estab: AND PuntoEmision = :punto:",
              'bind' => array('ruc' => $ruc, 'estab' => $estab, 'punto' => $punto)
        ));
        if (!$licencia) {
            $this->flash->error('Este contribuyente no tiene registrada un Numero de Licencia en nuestra base de datos');
            return $this->dispatcher->forward(
                  [
                     "action" => "index",
                  ]
            );
        }
        $fecha = date('Y-m-d');
        if ($licencia->NumeroLicencia != $nrolic) {
            $this->flash->error('Este Numero de Licencia no se encuentra registrada en nuestra base de datos');
            return $this->dispatcher->forward(
                  [
                     "action" => "index",
                  ]
            );
        }
        if ($licencia->FechaFin < $fecha) {
            $this->flash->error('Este Numero de Licencia ha expirado en nuestra base de datos');
            return $this->dispatcher->forward(
                  [
                     "action" => "index",
                  ]
            );
        }
        
        $this->_registerRuc($contribuyente);
        $saca = $this->session->get('contribuyente');
        $this->flash->success('Contriuyente Seleccionado || ' . $_SESSION['contribuyente']['razon']);
        return $this->dispatcher->forward(
              [
                 "controller" => "index",
                 "action" => "index",
              ]
        );
    }

    public function setupAction($id) {
        if (!$this->request->isPost()) {
            $codigo = Contribuyente::findFirstById($id);
            if (!$codigo) {
                $this->flash->error("Este contribuyente no existe");
                return $this->dispatcher->forward(
                      [
                         "action" => "index",
                      ]
                );
            }

            $this->view->contribuyente = $codigo;
            $this->session->set('mismocontrolador', array('ruc' => $codigo->Ruc, 'estab' => $codigo->CodEmisor, 'punto' => $codigo->Punto));
            $this->view->NumeroLicencia = '';
        }
    }

    public function deleteAction($id) {

        $codigo = Contribuyente::findFirstById($id);
        if (!$codigo) {
            $this->flash->error("ESte contribuyente no existe");

            return $this->dispatcher->forward(
                  [
                     "controller" => "contribuyente",
                     "action" => "index",
                  ]
            );
        }

        if (!$codigo->delete()) {
            foreach ($codigo->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(
                  [
                     "controller" => "contribuyente",
                     "action" => "search",
                  ]
            );
        }

        $this->flash->success("ESte contribuyente se ha eliminado de nuestra base de datos");

        return $this->dispatcher->forward(
              [
                 "controller" => "contribuyente",
                 "action" => "search",
              ]
        );
    }

}
