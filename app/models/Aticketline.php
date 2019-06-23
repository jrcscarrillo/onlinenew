<?php

class Aticketline extends \Phalcon\Mvc\Model {

    protected $TxnLineID;
    protected $TimeCreated;
    protected $TimeModified;
    protected $ItemRefListID;
    protected $ItemRefFullName;
    protected $Qty;
    protected $Price;
    protected $SubTotal;
    protected $Iva;
    protected $IDKEY;
    protected $Estado;

// **********************
// GETTER METHODS
// **********************


    function getTxnLineID() {
        return $this->TxnLineID;
    }

    function getTimeCreated() {
        return $this->TimeCreated;
    }

    function getTimeModified() {
        return $this->TimeModified;
    }

    function getItemRefListID() {
        return $this->ItemRefListID;
    }

    function getItemRefFullName() {
        return $this->ItemRefFullName;
    }

    function getQty() {
        return $this->Qty;
    }

    function getPrice() {
        return $this->Price;
    }

    function getSubTotal() {
        return $this->SubTotal;
    }

    function getIva() {
        return $this->Iva;
    }

    function getIDKEY() {
        return $this->IDKEY;
    }

    function getEstado() {
        return $this->Estado;
    }

// **********************
// SETTER METHODS
// **********************


    function setTxnLineID($val) {
        $this->TxnLineID = $val;
    }

    function setTimeCreated($val) {
        $this->TimeCreated = $val;
    }

    function setTimeModified($val) {
        $this->TimeModified = $val;
    }

    function setItemRefListID($val) {
        $this->ItemRefListID = $val;
    }

    function setItemRefFullName($val) {
        $this->ItemRefFullName = $val;
    }

    function setQty($val) {
        $this->Qty = $val;
    }

    function setPrice($val) {
        $this->Price = $val;
    }

    function setSubTotal($val) {
        $this->SubTotal = $val;
    }

    function setIva($val) {
        $this->Iva = $val;
    }

    function setIDKEY($val) {
        $this->IDKEY = $val;
    }

    function setEstado($val) {
        $this->Estado = $val;
    }

    public function initialize() {
        $this->setSchema("coopdb");
        $this->setSource("aticketline");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'aticketline';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Aticketline[]|Aticketline|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Aticketline|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

}
