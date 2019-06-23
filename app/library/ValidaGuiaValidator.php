<?php

use Phalcon\Validation;
use Phalcon\Validation\Message;
use Phalcon\Validation\Validator;
use Phalcon\Validation\ValidatorInterface;

class ValidaGuiaValidator extends Validator implements ValidatorInterface {

    /**
     *
     * @param  Validation $validator
     * @param  string $attribute
     *
     * @return boolean
     */
    public function validate(\Phalcon\Validation $validator, $attribute) {
        //obtain the name of the field 
        $with = $this->getOption("tipoguia");

        //obtain field value
        $with_value = $validator->getValue($with);

        // obtain the input field value
        $value = $validator->getValue($attribute);

        //try to obtain message defined in a validator
        $message = $this->getOption('message');

        //check if the value is valid
        if ($tipoguia === 28 and $value != 0) {
            $message = 'No debe tener numero de guia';
            $validator->appendMessage(new Message($message, $attribute, 'ValidaGuia_28'));
            print_r($message . ' campo ' . $attribute);
        }

        if ($tipoguia === 29 and $value === 0) {
            $message = 'Debe ingresar un numero de guia';
            $validator->appendMessage(new Message($message, $attribute, 'ValidaGuia_29'));
            print_r($message . ' campo ' . $attribute);
        }

        if ($tipoguia === 30 and $value === 0) {
            $message = 'Debe ingresar un numero de guia';
            $validator->appendMessage(new Message($message, $attribute, 'ValidaGuia_30'));
            print_r($message . ' campo ' . $attribute);
        }

        if (count($validator->getMessages())) {
            return false;
        }

        return true;
    }

}
