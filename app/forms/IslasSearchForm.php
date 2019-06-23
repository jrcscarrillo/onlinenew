<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Numeric;

class IslasSearchForm extends Form {

    public function initialize($entity = null, $options = array()) {

        $estab = new Text("Establecimiento");
        $estab->setLabel("Establecimiento");
        $this->add($estab);
        
        $punto = new Text("Punto Emision");
        $punto->setLabel("Punto Emision");
        $this->add($punto);
        
        $razon = new Text("Nombre Comercial");
        $razon->setLabel("Nombre Comercial");
        $this->add($razon);
        
        $Name = new Text("Descripcion");
        $Name->setLabel("Descripcion Producto");
        $this->add($Name);

    }

}
