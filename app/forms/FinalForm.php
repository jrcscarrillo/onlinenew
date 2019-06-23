<?php

use \Phalcon\Forms\Form;
use \Phalcon\Forms\Element\Text;
use \Phalcon\Forms\Element\Numeric;
use \Phalcon\Forms\Element\Date;
use \Phalcon\Validation\Validator\PresenceOf;

class FinalForm extends Form {

    public function initialize() {

        $efectivo = new Numeric("efectivo");
        $efectivo->setLabel("Cantidad");
        $efectivo->setFilters(array('striptags', 'string'));
        $efectivo->addValidators(array(
           new PresenceOf(array(
              'message' => 'Debe ingresar un valor'
           ))
        ));
        $this->add($efectivo);

        $cambio = new Numeric("cambio");
        $cambio->setLabel("Cantidad");
        $cambio->setFilters(array('striptags', 'string'));
        $cambio->addValidators(array(
           new PresenceOf(array(
              'message' => 'Debe ingresar un valor'
           ))
        ));
        $this->add($cambio);
        
        $chBanco = new Text("chBanco");
        $chBanco->setLabel("Cantidad");
        $chBanco->setFilters(array('striptags', 'string'));
        $chBanco->addValidators(array(
           new PresenceOf(array(
              'message' => 'Debe ingresar un valor'
           ))
        ));
        $this->add($chBanco);
        
        $chCuenta = new Text("chCuenta");
        $chCuenta->setLabel("Cantidad");
        $chCuenta->setFilters(array('striptags', 'string'));
        $chCuenta->addValidators(array(
           new PresenceOf(array(
              'message' => 'Debe ingresar un valor'
           ))
        ));
        $this->add($chCuenta); 
        
        $chNombre = new Text("chNombre");
        $chNombre->setLabel("Cantidad");
        $chNombre->setFilters(array('striptags', 'string'));
        $chNombre->addValidators(array(
           new PresenceOf(array(
              'message' => 'Debe ingresar un valor'
           ))
        ));
        $this->add($chNombre);     
        
        $chNumero = new Numeric("chNumero");
        $chNumero->setLabel("Cantidad");
        $chNumero->setFilters(array('striptags', 'string'));
        $chNumero->addValidators(array(
           new PresenceOf(array(
              'message' => 'Debe ingresar un valor'
           ))
        ));
        $this->add($chNumero);     
        
        $tjNombre = new Text("tjNombre");
        $tjNombre->setLabel("Cantidad");
        $tjNombre->setFilters(array('striptags', 'string'));
        $tjNombre->addValidators(array(
           new PresenceOf(array(
              'message' => 'Debe ingresar un valor'
           ))
        ));
        $this->add($tjNombre);   
        
        $tjBanco = new Text("tjBanco");
        $tjBanco->setLabel("Cantidad");
        $tjBanco->setFilters(array('striptags', 'string'));
        $tjBanco->addValidators(array(
           new PresenceOf(array(
              'message' => 'Debe ingresar un valor'
           ))
        ));
        $this->add($tjBanco);    
        
                $tjFechaVence = new Date("tjFechaVence");
        $tjFechaVence->setLabel("Cantidad");
        $tjFechaVence->setFilters(array('striptags', 'string'));
        $tjFechaVence->addValidators(array(
           new PresenceOf(array(
              'message' => 'Debe ingresar un valor'
           ))
        ));
        $this->add($tjFechaVence);
        
    }

}
