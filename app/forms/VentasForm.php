<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;

class VentasForm extends Form {

    public function initialize() {

        $qty = new Numeric("qty");
        $qty->setLabel("Cantidad");
        $this->add($qty);

        $item = new Text("item");
        $item->setLabel("Producto");
        $this->add($item);

    }

}
