<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Email;

class CashierForm extends Form {

    public function initialize($entity = null, $options = array()) {

        $Efectivo = new Numeric("Efectivo");
        $Efectivo->setLabel(" Valor Efectivo");
        $Efectivo->setFilters(array('float'));
        $Efectivo->addValidators(array(
            new PresenceOf(array(
                'message' => 'Mensaje de validacion'
                    ))
        ));
        $this->add($Efectivo);

        $Cheques = new Numeric("Cheques");
        $Cheques->setLabel(" Valor Cheques");
        $Cheques->setFilters(array('float'));
        $Cheques->addValidators(array(
            new PresenceOf(array(
                'message' => 'Mensaje de validacion'
                    ))
        ));
        $this->add($Cheques);

        $Depositos = new Numeric("Depositos");
        $Depositos->setLabel(" Valor Depositos");
        $Depositos->setFilters(array('float'));
        $Depositos->addValidators(array(
            new PresenceOf(array(
                'message' => 'Mensaje de validacion'
                    ))
        ));
        $this->add($Depositos);

        $CierreAuditor = new Text("CierreAuditor");
        $CierreAuditor->setLabel(" Nombre Auditor");
        $CierreAuditor->setFilters(array('striptags', 'strig'));
        $CierreAuditor->addValidators(array(
            new PresenceOf(array(
                'message' => 'Mensaje de validacion'
                    ))
        ));
        $this->add($CierreAuditor);

        $CierreNotas = new Text("CierreNotas");
        $CierreNotas->setLabel(" Observaciones");
        $CierreNotas->setFilters(array('striptags', 'strig'));
        $CierreNotas->addValidators(array(
            new PresenceOf(array(
                'message' => 'Mensaje de validacion'
                    ))
        ));
        $this->add($CierreNotas);

    }

}
