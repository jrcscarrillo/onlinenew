<?php

class Modelos extends \Phalcon\Mvc\Model {

    protected $id;
    protected $modelName;
    protected $actionName;
    protected $modelType;
    protected $modelDes;
    protected $menuName;
    protected $menuOrder;
    protected $menuGroup;

    public function initialize() {
        $this->setSchema("coopdb");
    }

    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

    public function getSource() {
        return 'modelos';
    }

// **********************
// GETTER METHODS
// **********************


    function getid() {
        return $this->id;
    }

    function getmodelName() {
        return $this->modelName;
    }

    function getactionName() {
        return $this->actionName;
    }

    function getmodelType() {
        return $this->modelType;
    }

    function getmodelDes() {
        return $this->modelDes;
    }

    function getmenuName() {
        return $this->menuName;
    }

    function getmenuOrder() {
        return $this->menuOrder;
    }

    function getmenuGroup() {
        return $this->menuGroup;
    }

// **********************
// SETTER METHODS
// **********************


    function setid($val) {
        $this->id = $val;
    }

    function setmodelName($val) {
        $this->modelName = $val;
    }

    function setactionName($val) {
        $this->actionName = $val;
    }

    function setmodelType($val) {
        $this->modelType = $val;
    }

    function setmodelDes($val) {
        $this->modelDes = $val;
    }

    function setmenuName($val) {
        $this->menuName = $val;
    }

    function setmenuOrder($val) {
        $this->menuOrder = $val;
    }

    function setmenuGroup($val) {
        $this->menuGroup = $val;
    }

}
