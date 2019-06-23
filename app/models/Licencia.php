<?php

class Licencia extends \Phalcon\Mvc\Model {

    protected $Id;
    protected $Ruc;
    protected $NumeroLicencia;
    protected $FechaInicio;
    protected $FechaFin;
    protected $Establecimiento;
    protected $PuntoEmision;
    protected $UserIn;
    protected $FechaLogin;
    protected $Field1;
    protected $Field2;
    protected $Estado;

    public function setId($id) {
        $this->Id = $id;
        return $this;
    }

    public function setRuc($ruc) {
        $this->Ruc = $ruc;
        return $this;
    }

    public function setNumeroLicencia($numeroLicencia) {
        $this->NumeroLicencia = $numeroLicencia;

        return $this;
    }

    public function setFechaInicio($fechaInicio) {
        $this->FechaInicio = $fechaInicio;

        return $this;
    }

    public function setFechaFin($fechaFin) {
        $this->FechaFin = $fechaFin;

        return $this;
    }

    public function setEstablecimiento($establecimiento) {
        $this->Establecimiento = $establecimiento;

        return $this;
    }

    public function setPuntoEmision($puntoEmision) {
        $this->PuntoEmision = $puntoEmision;

        return $this;
    }

    public function setUserIn($userIn) {
        $this->UserIn = $userIn;

        return $this;
    }

    public function setFechaLogin($fechaLogin) {
        $this->FechaLogin = $fechaLogin;

        return $this;
    }

    public function setField1($field1) {
        $this->Field1 = $field1;

        return $this;
    }

    public function setField2($field2) {
        $this->Field2 = $field2;

        return $this;
    }

    public function setEstado($estado) {
        $this->Estado = $estado;

        return $this;
    }

    public function getId() {
        return $this->Id;
    }

    public function getRuc() {
        return $this->Ruc;
    }

    public function getNumeroLicencia() {
        return $this->NumeroLicencia;
    }

    public function getFechaInicio() {
        return $this->FechaInicio;
    }

    public function getFechaFin() {
        return $this->FechaFin;
    }

    public function getEstablecimiento() {
        return $this->Establecimiento;
    }

    public function getPuntoEmision() {
        return $this->PuntoEmision;
    }

    public function getUserIn() {
        return $this->UserIn;
    }

    public function getFechaLogin() {
        return $this->FechaLogin;
    }

    public function getField1() {
        return $this->Field1;
    }

    public function getField2() {
        return $this->Field2;
    }

    public function getEstado() {
        return $this->Estado;
    }

    public function initialize() {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("licencia");
    }

    public function getSource() {
        return 'licencia';
    }

    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

}
