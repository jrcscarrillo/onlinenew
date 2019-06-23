<?php

class Aticket extends \Phalcon\Mvc\Model {

// **********************
// ATTRIBUTE DECLARATION
// **********************

    protected $TxnID;
    protected $TimeCreated;
    protected $TimeModified;
    protected $TxnDate;
    protected $Estab;
    protected $Punto;
    protected $RefNumber;
    protected $NroFactura;
    protected $SubTotal;
    protected $ConIva;
    protected $SinIva;
    protected $Iva;
    protected $Single;
    protected $NroCaja;
    protected $CustomerRefListID;
    protected $CustomerRefFullName;
    protected $Ftipo;
    protected $Festab;
    protected $Fpunto;
    protected $Fnumero;
    protected $Ffrecuencia;
    protected $Fplazo;
    protected $Gtipo;
    protected $Gestab;
    protected $Gpunto;
    protected $Gnumero;
    protected $Referencia;
    protected $NotasComprador;
    protected $TerminosCondiciones;
    protected $Estado;

// **********************
// GETTER METHODS
// **********************


    function getTxnID() {
        return $this->TxnID;
    }

    function getTimeCreated() {
        return $this->TimeCreated;
    }

    function getTimeModified() {
        return $this->TimeModified;
    }

    function getTxnDate() {
        return $this->TxnDate;
    }

    function getEstab() {
        return $this->Estab;
    }

    function getPunto() {
        return $this->Punto;
    }

    function getRefNumber() {
        return $this->RefNumber;
    }

    function getNroFactura() {
        return $this->NroFactura;
    }

    function getSubTotal() {
        return $this->SubTotal;
    }

    function getConIva() {
        return $this->ConIva;
    }

    function getSinIva() {
        return $this->SinIva;
    }

    function getIva() {
        return $this->Iva;
    }

    function getSingle() {
        return $this->Single;
    }

    function getNroCaja() {
        return $this->NroCaja;
    }

    function getCustomerRefListID() {
        return $this->CustomerRefListID;
    }

    function getCustomerRefFullName() {
        return $this->CustomerRefFullName;
    }

    function getFtipo() {
        return $this->Ftipo;
    }

    function getFestab() {
        return $this->Festab;
    }

    function getFpunto() {
        return $this->Fpunto;
    }

    function getFnumero() {
        return $this->Fnumero;
    }

    function getFfrecuencia() {
        return $this->Ffrecuencia;
    }

    function getFplazo() {
        return $this->Fplazo;
    }

    function getGtipo() {
        return $this->Gtipo;
    }

    function getGestab() {
        return $this->Gestab;
    }

    function getGpunto() {
        return $this->Gpunto;
    }

    function getGnumero() {
        return $this->Gnumero;
    }

    function getReferencia() {
        return $this->Referencia;
    }

    function getNotasComprador() {
        return $this->NotasComprador;
    }

    function getTerminosCondiciones() {
        return $this->TerminosCondiciones;
    }

    function getEstado() {
        return $this->Estado;
    }

// **********************
// SETTER METHODS
// **********************


    function setTxnID($val) {
        $this->TxnID = $val;
    }

    function setTimeCreated($val) {
        $this->TimeCreated = $val;
    }

    function setTimeModified($val) {
        $this->TimeModified = $val;
    }

    function setTxnDate($val) {
        $this->TxnDate = $val;
    }

    function setEstab($val) {
        $this->Estab = $val;
    }

    function setPunto($val) {
        $this->Punto = $val;
    }

    function setRefNumber($val) {
        $this->RefNumber = $val;
    }

    function setNroFactura($val) {
        $this->NroFactura = $val;
    }

    function setSubTotal($val) {
        $this->SubTotal = $val;
    }

    function setConIva($val) {
        $this->ConIva = $val;
    }

    function setSinIva($val) {
        $this->SinIva = $val;
    }

    function setIva($val) {
        $this->Iva = $val;
    }

    function setSingle($val) {
        $this->Single = $val;
    }

    function setNroCaja($val) {
        $this->NroCaja = $val;
    }

    function setCustomerRefListID($val) {
        $this->CustomerRefListID = $val;
    }

    function setCustomerRefFullName($val) {
        $this->CustomerRefFullName = $val;
    }

    function setFtipo($val) {
        $this->Ftipo = $val;
    }

    function setFestab($val) {
        $this->Festab = $val;
    }

    function setFpunto($val) {
        $this->Fpunto = $val;
    }

    function setFnumero($val) {
        $this->Fnumero = $val;
    }

    function setFfrecuencia($val) {
        $this->Ffrecuencia = $val;
    }

    function setFplazo($val) {
        $this->Fplazo = $val;
    }

    function setGtipo($val) {
        $this->Gtipo = $val;
    }

    function setGestab($val) {
        $this->Gestab = $val;
    }

    function setGpunto($val) {
        $this->Gpunto = $val;
    }

    function setGnumero($val) {
        $this->Gnumero = $val;
    }

    function setReferencia($val) {
        $this->Referencia = $val;
    }

    function setNotasComprador($val) {
        $this->NotasComprador = $val;
    }

    function setTerminosCondiciones($val) {
        $this->TerminosCondiciones = $val;
    }

    function setEstado($val) {
        $this->Estado = $val;
    }

    public function initialize() {
        $this->setSchema("coopdb");
        $this->setSource("aticket");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'aticket';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Aticket[]|Aticket|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Aticket|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

}
