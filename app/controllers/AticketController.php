<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class AticketController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for aticket
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Aticket', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "TxnID";

        $aticket = Aticket::find($parameters);
        if (count($aticket) == 0) {
            $this->flash->notice("The search did not find any aticket");

            $this->dispatcher->forward([
                "controller" => "aticket",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $aticket,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {

    }

    /**
     * Edits a aticket
     *
     * @param string $TxnID
     */
    public function editAction($TxnID)
    {
        if (!$this->request->isPost()) {

            $aticket = Aticket::findFirstByTxnID($TxnID);
            if (!$aticket) {
                $this->flash->error("aticket was not found");

                $this->dispatcher->forward([
                    'controller' => "aticket",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->TxnID = $aticket->getTxnid();

            $this->tag->setDefault("TxnID", $aticket->getTxnid());
            $this->tag->setDefault("TimeCreated", $aticket->getTimecreated());
            $this->tag->setDefault("TimeModified", $aticket->getTimemodified());
            $this->tag->setDefault("TxnDate", $aticket->getTxndate());
            $this->tag->setDefault("Estab", $aticket->getEstab());
            $this->tag->setDefault("Punto", $aticket->getPunto());
            $this->tag->setDefault("RefNumber", $aticket->getRefnumber());
            $this->tag->setDefault("NroFactura", $aticket->getNrofactura());
            $this->tag->setDefault("SubTotal", $aticket->getSubtotal());
            $this->tag->setDefault("ConIva", $aticket->getConiva());
            $this->tag->setDefault("SinIva", $aticket->getSiniva());
            $this->tag->setDefault("Iva", $aticket->getIva());
            $this->tag->setDefault("Single", $aticket->getSingle());
            $this->tag->setDefault("NroCaja", $aticket->getNrocaja());
            $this->tag->setDefault("CustomerRefListID", $aticket->getCustomerreflistid());
            $this->tag->setDefault("CustomerRefFullName", $aticket->getCustomerreffullname());
            $this->tag->setDefault("Ftipo", $aticket->getFtipo());
            $this->tag->setDefault("Festab", $aticket->getFestab());
            $this->tag->setDefault("Fpunto", $aticket->getFpunto());
            $this->tag->setDefault("Fnumero", $aticket->getFnumero());
            $this->tag->setDefault("Ffrecuencia", $aticket->getFfrecuencia());
            $this->tag->setDefault("Fplazo", $aticket->getFplazo());
            $this->tag->setDefault("Gtipo", $aticket->getGtipo());
            $this->tag->setDefault("Gestab", $aticket->getGestab());
            $this->tag->setDefault("Gpunto", $aticket->getGpunto());
            $this->tag->setDefault("Gnumero", $aticket->getGnumero());
            $this->tag->setDefault("Referencia", $aticket->getReferencia());
            $this->tag->setDefault("NotasComprador", $aticket->getNotascomprador());
            $this->tag->setDefault("TerminosCondiciones", $aticket->getTerminoscondiciones());
            $this->tag->setDefault("Estado", $aticket->getEstado());
            
        }
    }

    /**
     * Creates a new aticket
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "aticket",
                'action' => 'index'
            ]);

            return;
        }

        $aticket = new Aticket();
        $aticket->settxnID($this->request->getPost("TxnID"));
        $aticket->settimeCreated($this->request->getPost("TimeCreated"));
        $aticket->settimeModified($this->request->getPost("TimeModified"));
        $aticket->settxnDate($this->request->getPost("TxnDate"));
        $aticket->setestab($this->request->getPost("Estab"));
        $aticket->setpunto($this->request->getPost("Punto"));
        $aticket->setrefNumber($this->request->getPost("RefNumber"));
        $aticket->setnroFactura($this->request->getPost("NroFactura"));
        $aticket->setsubTotal($this->request->getPost("SubTotal"));
        $aticket->setconIva($this->request->getPost("ConIva"));
        $aticket->setsinIva($this->request->getPost("SinIva"));
        $aticket->setiva($this->request->getPost("Iva"));
        $aticket->setsingle($this->request->getPost("Single"));
        $aticket->setnroCaja($this->request->getPost("NroCaja"));
        $aticket->setcustomerRefListID($this->request->getPost("CustomerRefListID"));
        $aticket->setcustomerRefFullName($this->request->getPost("CustomerRefFullName"));
        $aticket->setftipo($this->request->getPost("Ftipo"));
        $aticket->setfestab($this->request->getPost("Festab"));
        $aticket->setfpunto($this->request->getPost("Fpunto"));
        $aticket->setfnumero($this->request->getPost("Fnumero"));
        $aticket->setffrecuencia($this->request->getPost("Ffrecuencia"));
        $aticket->setfplazo($this->request->getPost("Fplazo"));
        $aticket->setgtipo($this->request->getPost("Gtipo"));
        $aticket->setgestab($this->request->getPost("Gestab"));
        $aticket->setgpunto($this->request->getPost("Gpunto"));
        $aticket->setgnumero($this->request->getPost("Gnumero"));
        $aticket->setreferencia($this->request->getPost("Referencia"));
        $aticket->setnotasComprador($this->request->getPost("NotasComprador"));
        $aticket->setterminosCondiciones($this->request->getPost("TerminosCondiciones"));
        $aticket->setestado($this->request->getPost("Estado"));
        

        if (!$aticket->save()) {
            foreach ($aticket->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "aticket",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("aticket was created successfully");

        $this->dispatcher->forward([
            'controller' => "aticket",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a aticket edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "aticket",
                'action' => 'index'
            ]);

            return;
        }

        $TxnID = $this->request->getPost("TxnID");
        $aticket = Aticket::findFirstByTxnID($TxnID);

        if (!$aticket) {
            $this->flash->error("aticket does not exist " . $TxnID);

            $this->dispatcher->forward([
                'controller' => "aticket",
                'action' => 'index'
            ]);

            return;
        }

        $aticket->settxnID($this->request->getPost("TxnID"));
        $aticket->settimeCreated($this->request->getPost("TimeCreated"));
        $aticket->settimeModified($this->request->getPost("TimeModified"));
        $aticket->settxnDate($this->request->getPost("TxnDate"));
        $aticket->setestab($this->request->getPost("Estab"));
        $aticket->setpunto($this->request->getPost("Punto"));
        $aticket->setrefNumber($this->request->getPost("RefNumber"));
        $aticket->setnroFactura($this->request->getPost("NroFactura"));
        $aticket->setsubTotal($this->request->getPost("SubTotal"));
        $aticket->setconIva($this->request->getPost("ConIva"));
        $aticket->setsinIva($this->request->getPost("SinIva"));
        $aticket->setiva($this->request->getPost("Iva"));
        $aticket->setsingle($this->request->getPost("Single"));
        $aticket->setnroCaja($this->request->getPost("NroCaja"));
        $aticket->setcustomerRefListID($this->request->getPost("CustomerRefListID"));
        $aticket->setcustomerRefFullName($this->request->getPost("CustomerRefFullName"));
        $aticket->setftipo($this->request->getPost("Ftipo"));
        $aticket->setfestab($this->request->getPost("Festab"));
        $aticket->setfpunto($this->request->getPost("Fpunto"));
        $aticket->setfnumero($this->request->getPost("Fnumero"));
        $aticket->setffrecuencia($this->request->getPost("Ffrecuencia"));
        $aticket->setfplazo($this->request->getPost("Fplazo"));
        $aticket->setgtipo($this->request->getPost("Gtipo"));
        $aticket->setgestab($this->request->getPost("Gestab"));
        $aticket->setgpunto($this->request->getPost("Gpunto"));
        $aticket->setgnumero($this->request->getPost("Gnumero"));
        $aticket->setreferencia($this->request->getPost("Referencia"));
        $aticket->setnotasComprador($this->request->getPost("NotasComprador"));
        $aticket->setterminosCondiciones($this->request->getPost("TerminosCondiciones"));
        $aticket->setestado($this->request->getPost("Estado"));
        

        if (!$aticket->save()) {

            foreach ($aticket->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "aticket",
                'action' => 'edit',
                'params' => [$aticket->getTxnid()]
            ]);

            return;
        }

        $this->flash->success("aticket was updated successfully");

        $this->dispatcher->forward([
            'controller' => "aticket",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a aticket
     *
     * @param string $TxnID
     */
    public function deleteAction($TxnID)
    {
        $aticket = Aticket::findFirstByTxnID($TxnID);
        if (!$aticket) {
            $this->flash->error("aticket was not found");

            $this->dispatcher->forward([
                'controller' => "aticket",
                'action' => 'index'
            ]);

            return;
        }

        if (!$aticket->delete()) {

            foreach ($aticket->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "aticket",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("aticket was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "aticket",
            'action' => "index"
        ]);
    }

}
