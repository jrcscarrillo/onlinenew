<?php

use Phalcon\Validation as validador;
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
    public function validate($validator, $attribute) {
        //obtain the name of the field 
        $with = $this->getOption("with");

        //obtain field value
        $with_value = $validator->getValue($with);

        // obtain the input field value
        $value = $validator->getValue($attribute);

        //try to obtain message defined in a validator
        $message = $this->getOption('message');

        //check if the value is valid
        if ($with_value === '28' and ($value != ' ' && $value > 0) ) {
            $message = 'No debe tener numero de guia';
            $validator->appendMessage(new Message($message, $attribute, 'Valida_28'));
        }

        if ($with_value === '29' and ($value === ' ' && $value === 0) ) {
            $message = 'Debe ingresar un numero de guia';
            $validator->appendMessage(new Message($message, $attribute, 'Valida_29'));
        }

        if ($with_value === '30' and ($value === ' ' && $value === 0) ) {
            $message = 'Debe ingresar un numero de guia';
            $validator->appendMessage(new Message($message, $attribute, 'Valida_30'));
        }

        if (count($validator->getMessages())) {
            return false;
        }
        return true;
    }

}
