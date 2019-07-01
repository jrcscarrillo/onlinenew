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

                // array("28" => "Servicios", "29" => "Inventarios", "30" => "No inventario",  "31" => "Terminado",  "32" => "Activo Fijo",  "33" => "Otros"));
        $tipofactura = $this->session->get('tipofactura');
        $destipo = $tipofactura['destipo'];
        $item = Items::find([
            "columns" => "sales_desc, quickbooks_listid",
            "conditions" => "type = ?1",
            "bind"       => [1 => $destipo]
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
