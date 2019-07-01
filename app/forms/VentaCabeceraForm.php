<?php

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Numeric;
use Phalcon\Forms\Element\Date;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;
use ValidaGuiaValidator;

class VentaCabeceraForm extends Form {

    public function initialize($entity = null, $options = null) {

        $fechaemision = new Date("fechaemision ");
        $fechaemision ->setLabel("Fecha Factura");
        $fechaemision ->addValidators(array(
           new PresenceOf(array(
              'message' => 'Indicar la fecha de emision de la factura'
              ))
        ));
        $this->add($fechaemision );

        $tipofactura = new Select("tipofactura", array("28" => "Servicios", "29" => "Inventarios", "30" => "No inventario",  "31" => "Terminado",  "32" => "Activo Fijo",  "33" => "Otros"));
        $tipofactura->setLabel("Tipo Factura");
        $tipofactura->addValidators(array(
           new PresenceOf(array(
              'message' => 'No ha seleccionado el tipo de factura'
              ))
        ));
        $this->add($tipofactura);

        $tipoguia = new Select("tipoguia", array("28" => "Sin Guia", "29" => "Guia Unica", "30" => "Emisor Intinerante"));
        $tipoguia->setLabel("tipoguia");
        $tipoguia->addValidators(array(
           new PresenceOf(array(
              'message' => 'No ha seleccionado el tipo de guia'
              ))
        ));
        $this->add($tipoguia);

        $frecuencia = new Select("frecuencia", array("0" => "Unica", "1" => "Semanal", "2" => "Quincenal",  "3" => "Mensual",  "4" => "Bi-mensual",  "5" => "Trimestral"));
        $frecuencia->setLabel("Frecuencia");
        $frecuencia->addValidators(array(
           new PresenceOf(array(
              'message' => 'No ha seleccionado la frecuencia de emision'
              ))
        ));
        $this->add($frecuencia);
        

        $formapago = new Select("formapago", array("0" => "Contado", "1" => "7 Dias", "2" => "15 Dias",  "3" => "30 Dias",  "4" => "45 Dias",  "6" => "60 Dias", "7" => "90 Dias"));
        $formapago->setLabel("Forma Pago");
        $formapago->addValidators(array(
           new PresenceOf(array(
              'message' => 'No ha seleccionado la forma de pago'
              ))
        ));
        $this->add($formapago);
        
        $numerofactura = new Numeric("numerofactura");
        $numerofactura->setLabel("Numero Factura");
        $numerofactura->addValidators(array(
           new PresenceOf(array(
              'message' => 'Debe indicar el numero de factura'
              ))
        ));
        $this->add($numerofactura);
        
        $numeroguia = new Numeric("numeroguia");
        $numeroguia->setLabel("Numero Guia");
        $numeroguia->addValidators(array(
            new ValidaGuiaValidator(array(
                'message' => 'El numero de la guia es erroneo',
                'with' => 'tipoguia',
                'Valida_28' => 'Error 28',
                'Valida_29' => 'Error 29',
                'Valida_30' => 'Error 30',
            ))
        ));
        $this->add($numeroguia);
        
        $referencia = new TextArea("referencia");
        $referencia->setLabel("Referencia");
        $referencia->setFilters(array('striptags', 'string'));
        $referencia->addValidators(array(
           new PresenceOf(array(
              'message' => 'Debe ingresar al menos n/a en referencia'
              ))
        ));
        $this->add($referencia);
        
        $notacomprador = new TextArea("notacomprador");
        $notacomprador->setLabel("Nota Comprador");
        $notacomprador->setFilters(array('striptags', 'string'));
        $notacomprador->addValidators(array(
           new PresenceOf(array(
              'message' => 'Debe ingresar al menos n/a en notas al comprador'
              ))
        ));
        $this->add($notacomprador);
        
        $condiciones = new TextArea("condiciones");
        $condiciones->setLabel("Condiciones");
        $condiciones->setFilters(array('striptags', 'string'));
        $condiciones->addValidators(array(
           new PresenceOf(array(
              'message' => 'Debe ingresar al menos n/a en los terminos y condiciones'
              ))
        ));
        $this->add($condiciones);
    }
    /**
     * Prints messages for a specific element
     */
    public function messages($nombre)
    {
        if ($this->hasMessagesFor($nombre)) {
            foreach ($this->getMessagesFor($nombre) as $mensaje) {
                $this->flash->error($mensaje);
            }
        }
    }
}
