<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class ItemserviceController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for itemservice
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Itemservice', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "ListID";

        $itemservice = Itemservice::find($parameters);
        if (count($itemservice) == 0) {
            $this->flash->notice("The search did not find any itemservice");

            $this->dispatcher->forward([
                "controller" => "itemservice",
                "action" => "index"
            ]);

            return;
        }

        $paginator = new Paginator([
            'data' => $itemservice,
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
     * Edits a itemservice
     *
     * @param string $ListID
     */
    public function editAction($ListID)
    {
        if (!$this->request->isPost()) {

            $itemservice = Itemservice::findFirstByListID($ListID);
            if (!$itemservice) {
                $this->flash->error("itemservice was not found");

                $this->dispatcher->forward([
                    'controller' => "itemservice",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->ListID = $itemservice->getListid();

            $this->tag->setDefault("ListID", $itemservice->getListid());
            $this->tag->setDefault("TimeCreated", $itemservice->getTimecreated());
            $this->tag->setDefault("TimeModified", $itemservice->getTimemodified());
            $this->tag->setDefault("EditSequence", $itemservice->getEditsequence());
            $this->tag->setDefault("Name", $itemservice->getName());
            $this->tag->setDefault("FullName", $itemservice->getFullname());
            $this->tag->setDefault("BarCodeValue", $itemservice->getBarcodevalue());
            $this->tag->setDefault("IsActive", $itemservice->getIsactive());
            $this->tag->setDefault("ClassRef_ListID", $itemservice->getClassrefListid());
            $this->tag->setDefault("ClassRef_FullName", $itemservice->getClassrefFullname());
            $this->tag->setDefault("ParentRef_ListID", $itemservice->getParentrefListid());
            $this->tag->setDefault("ParentRef_FullName", $itemservice->getParentrefFullname());
            $this->tag->setDefault("Sublevel", $itemservice->getSublevel());
            $this->tag->setDefault("UnitOfMeasureSetRef_ListID", $itemservice->getUnitofmeasuresetrefListid());
            $this->tag->setDefault("UnitOfMeasureSetRef_FullName", $itemservice->getUnitofmeasuresetrefFullname());
            $this->tag->setDefault("IsTaxIncluded", $itemservice->getIstaxincluded());
            $this->tag->setDefault("SalesTaxCodeRef_ListID", $itemservice->getSalestaxcoderefListid());
            $this->tag->setDefault("SalesTaxCodeRef_FullName", $itemservice->getSalestaxcoderefFullname());
            $this->tag->setDefault("CustomField1", $itemservice->getCustomfield1());
            $this->tag->setDefault("CustomField2", $itemservice->getCustomfield2());
            $this->tag->setDefault("CustomField3", $itemservice->getCustomfield3());
            $this->tag->setDefault("CustomField4", $itemservice->getCustomfield4());
            $this->tag->setDefault("CustomField5", $itemservice->getCustomfield5());
            $this->tag->setDefault("CustomField6", $itemservice->getCustomfield6());
            $this->tag->setDefault("CustomField7", $itemservice->getCustomfield7());
            $this->tag->setDefault("CustomField8", $itemservice->getCustomfield8());
            $this->tag->setDefault("CustomField9", $itemservice->getCustomfield9());
            $this->tag->setDefault("CustomField10", $itemservice->getCustomfield10());
            $this->tag->setDefault("CustomField11", $itemservice->getCustomfield11());
            $this->tag->setDefault("CustomField12", $itemservice->getCustomfield12());
            $this->tag->setDefault("CustomField13", $itemservice->getCustomfield13());
            $this->tag->setDefault("CustomField14", $itemservice->getCustomfield14());
            $this->tag->setDefault("CustomField15", $itemservice->getCustomfield15());
            $this->tag->setDefault("Status", $itemservice->getStatus());
            
        }
    }

    /**
     * Creates a new itemservice
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "itemservice",
                'action' => 'index'
            ]);

            return;
        }

        $itemservice = new Itemservice();
        $itemservice->setlistID($this->request->getPost("ListID"));
        $itemservice->settimeCreated($this->request->getPost("TimeCreated"));
        $itemservice->settimeModified($this->request->getPost("TimeModified"));
        $itemservice->seteditSequence($this->request->getPost("EditSequence"));
        $itemservice->setname($this->request->getPost("Name"));
        $itemservice->setfullName($this->request->getPost("FullName"));
        $itemservice->setbarCodeValue($this->request->getPost("BarCodeValue"));
        $itemservice->setisActive($this->request->getPost("IsActive"));
        $itemservice->setclassRefListID($this->request->getPost("ClassRef_ListID"));
        $itemservice->setclassRefFullName($this->request->getPost("ClassRef_FullName"));
        $itemservice->setparentRefListID($this->request->getPost("ParentRef_ListID"));
        $itemservice->setparentRefFullName($this->request->getPost("ParentRef_FullName"));
        $itemservice->setsublevel($this->request->getPost("Sublevel"));
        $itemservice->setunitOfMeasureSetRefListID($this->request->getPost("UnitOfMeasureSetRef_ListID"));
        $itemservice->setunitOfMeasureSetRefFullName($this->request->getPost("UnitOfMeasureSetRef_FullName"));
        $itemservice->setisTaxIncluded($this->request->getPost("IsTaxIncluded"));
        $itemservice->setsalesTaxCodeRefListID($this->request->getPost("SalesTaxCodeRef_ListID"));
        $itemservice->setsalesTaxCodeRefFullName($this->request->getPost("SalesTaxCodeRef_FullName"));
        $itemservice->setcustomField1($this->request->getPost("CustomField1"));
        $itemservice->setcustomField2($this->request->getPost("CustomField2"));
        $itemservice->setcustomField3($this->request->getPost("CustomField3"));
        $itemservice->setcustomField4($this->request->getPost("CustomField4"));
        $itemservice->setcustomField5($this->request->getPost("CustomField5"));
        $itemservice->setcustomField6($this->request->getPost("CustomField6"));
        $itemservice->setcustomField7($this->request->getPost("CustomField7"));
        $itemservice->setcustomField8($this->request->getPost("CustomField8"));
        $itemservice->setcustomField9($this->request->getPost("CustomField9"));
        $itemservice->setcustomField10($this->request->getPost("CustomField10"));
        $itemservice->setcustomField11($this->request->getPost("CustomField11"));
        $itemservice->setcustomField12($this->request->getPost("CustomField12"));
        $itemservice->setcustomField13($this->request->getPost("CustomField13"));
        $itemservice->setcustomField14($this->request->getPost("CustomField14"));
        $itemservice->setcustomField15($this->request->getPost("CustomField15"));
        $itemservice->setstatus($this->request->getPost("Status"));
        

        if (!$itemservice->save()) {
            foreach ($itemservice->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "itemservice",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("itemservice was created successfully");

        $this->dispatcher->forward([
            'controller' => "itemservice",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a itemservice edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "itemservice",
                'action' => 'index'
            ]);

            return;
        }

        $ListID = $this->request->getPost("ListID");
        $itemservice = Itemservice::findFirstByListID($ListID);

        if (!$itemservice) {
            $this->flash->error("itemservice does not exist " . $ListID);

            $this->dispatcher->forward([
                'controller' => "itemservice",
                'action' => 'index'
            ]);

            return;
        }

        $itemservice->setlistID($this->request->getPost("ListID"));
        $itemservice->settimeCreated($this->request->getPost("TimeCreated"));
        $itemservice->settimeModified($this->request->getPost("TimeModified"));
        $itemservice->seteditSequence($this->request->getPost("EditSequence"));
        $itemservice->setname($this->request->getPost("Name"));
        $itemservice->setfullName($this->request->getPost("FullName"));
        $itemservice->setbarCodeValue($this->request->getPost("BarCodeValue"));
        $itemservice->setisActive($this->request->getPost("IsActive"));
        $itemservice->setclassRefListID($this->request->getPost("ClassRef_ListID"));
        $itemservice->setclassRefFullName($this->request->getPost("ClassRef_FullName"));
        $itemservice->setparentRefListID($this->request->getPost("ParentRef_ListID"));
        $itemservice->setparentRefFullName($this->request->getPost("ParentRef_FullName"));
        $itemservice->setsublevel($this->request->getPost("Sublevel"));
        $itemservice->setunitOfMeasureSetRefListID($this->request->getPost("UnitOfMeasureSetRef_ListID"));
        $itemservice->setunitOfMeasureSetRefFullName($this->request->getPost("UnitOfMeasureSetRef_FullName"));
        $itemservice->setisTaxIncluded($this->request->getPost("IsTaxIncluded"));
        $itemservice->setsalesTaxCodeRefListID($this->request->getPost("SalesTaxCodeRef_ListID"));
        $itemservice->setsalesTaxCodeRefFullName($this->request->getPost("SalesTaxCodeRef_FullName"));
        $itemservice->setcustomField1($this->request->getPost("CustomField1"));
        $itemservice->setcustomField2($this->request->getPost("CustomField2"));
        $itemservice->setcustomField3($this->request->getPost("CustomField3"));
        $itemservice->setcustomField4($this->request->getPost("CustomField4"));
        $itemservice->setcustomField5($this->request->getPost("CustomField5"));
        $itemservice->setcustomField6($this->request->getPost("CustomField6"));
        $itemservice->setcustomField7($this->request->getPost("CustomField7"));
        $itemservice->setcustomField8($this->request->getPost("CustomField8"));
        $itemservice->setcustomField9($this->request->getPost("CustomField9"));
        $itemservice->setcustomField10($this->request->getPost("CustomField10"));
        $itemservice->setcustomField11($this->request->getPost("CustomField11"));
        $itemservice->setcustomField12($this->request->getPost("CustomField12"));
        $itemservice->setcustomField13($this->request->getPost("CustomField13"));
        $itemservice->setcustomField14($this->request->getPost("CustomField14"));
        $itemservice->setcustomField15($this->request->getPost("CustomField15"));
        $itemservice->setstatus($this->request->getPost("Status"));
        

        if (!$itemservice->save()) {

            foreach ($itemservice->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "itemservice",
                'action' => 'edit',
                'params' => [$itemservice->getListid()]
            ]);

            return;
        }

        $this->flash->success("itemservice was updated successfully");

        $this->dispatcher->forward([
            'controller' => "itemservice",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a itemservice
     *
     * @param string $ListID
     */
    public function deleteAction($ListID)
    {
        $itemservice = Itemservice::findFirstByListID($ListID);
        if (!$itemservice) {
            $this->flash->error("itemservice was not found");

            $this->dispatcher->forward([
                'controller' => "itemservice",
                'action' => 'index'
            ]);

            return;
        }

        if (!$itemservice->delete()) {

            foreach ($itemservice->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "itemservice",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("itemservice was deleted successfully");

        $this->dispatcher->forward([
            'controller' => "itemservice",
            'action' => "index"
        ]);
    }

}
