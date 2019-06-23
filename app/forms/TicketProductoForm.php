<?php

use \Phalcon\Forms\Form;
use \Phalcon\Forms\Element\Text;
use \Phalcon\Forms\Element\Numeric;
use \Phalcon\Forms\Element\Select;
use \Phalcon\Validation\Validator\PresenceOf;

class TicketProductoForm extends Form {

    public function initialize() {

        $qty = new Numeric("qty");
        $qty->setLabel("Cantidad");
        $qty->setFilters(array('striptags', 'string'));
        $qty->addValidators(array(
           new PresenceOf(array(
              'message' => 'Debe ingresar un valor'
           ))
        ));
        $this->add($qty);

        $item = Items::find([
            "columns" => "sales_desc, quickbooks_listid",
            "conditions" => "parent_reference_full_name LIKE ?1",
            "bind"       => [1 => "%Helados%"]
           ]); 
        $ItemRefListID = new Select(
           'ItemRefListID',
           $item,
           [
              'using'      => [
                 'quickbooks_listid',
                 'sales_desc',
                 ]
              ]
           );

        $this->add($ItemRefListID);

    }

}
