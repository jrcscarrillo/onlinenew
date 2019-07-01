<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;

class NuevoTicketForm extends Form {

    public function initialize() {

        $cliente = Customer::find([
            "columns" => "Name, ListID"
//            "conditions" => "type = ?1",
//            "bind"       => [1 => $destipo]
           ]); 
        $CustomerRefListID = new Select(
           'CustomerRefListID',
           $cliente,
           [
              'using'      => [
                 'ListID',
                 'Name',
                 ]
              ]
           );

        $this->add($CustomerRefListID);

        $TxnDate = new Date("TxnDate");
        $TxnDate->setLabel("Fecha Factura");
        $TxnDate->addValidators(array(
           new PresenceOf(array(
              'message' => 'No ha seleccionado una fecha'
              ))
        ));
        $this->add($TxnDate);

    }

}
