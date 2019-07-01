<?php

class Pedidos extends \Phalcon\Mvc\Model {

    protected $TxnID;   
    protected $TimeCreated;   
    protected $TimeModified;   
    protected $EditSequence;   
    protected $TxnNumber;   
    protected $CustomerRef_ListID;   
    protected $CustomerRef_FullName;   
    protected $TxnDate;   
    protected $RefNumber;   
    protected $PONumber;   
    protected $TermsRef_ListID;   
    protected $TermsRef_FullName;   
    protected $DueDate;   
    protected $SalesRepRef_ListID;   
    protected $SalesRepRef_FullName;   
    protected $Subtotal;   
    protected $SalesTaxTotal;   
    protected $TotalAmount;   
    protected $IsManuallyClosed;   
    protected $IsFullyInvoiced;   
    protected $Memo;   
    protected $CustomerMsgRef_ListID;   
    protected $CustomerMsgRef_FullName;   
    protected $Other;   
    protected $Status;   

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

    function getEditSequence() {
        return $this->EditSequence;
    }

    function getTxnNumber() {
        return $this->TxnNumber;
    }

    function getCustomerRefListID() {
        return $this->CustomerRef_ListID;
    }

    function getCustomerRefFullName() {
        return $this->CustomerRef_FullName;
    }

    function getTxnDate() {
        $val = date('F j, Y', strtotime($this->TxnDate));
        return $val;
//        return $this->TxnDate;
    }

    function getRefNumber() {
        return $this->RefNumber;
    }

    function getPONumber() {
        return $this->PONumber;
    }

    function getTermsRefListID() {
        return $this->TermsRef_ListID;
    }

    function getTermsRefFullName() {
        return $this->TermsRef_FullName;
    }

    function getDueDate() {
        return $this->DueDate;
    }

    function getSalesRepRefListID() {
        return $this->SalesRepRef_ListID;
    }

    function getSalesRepRefFullName() {
        return $this->SalesRepRef_FullName;
    }

    function getSubtotal() {
        return $this->Subtotal;
    }

    function getSalesTaxTotal() {
        return $this->SalesTaxTotal;
    }

    function getTotalAmount() {
        return $this->TotalAmount;
    }

    function getIsManuallyClosed() {
        return $this->IsManuallyClosed;
    }

    function getIsFullyInvoiced() {
        return $this->IsFullyInvoiced;
    }

    function getMemo() {
        return $this->Memo;
    }

    function getCustomerMsgRefListID() {
        return $this->CustomerMsgRef_ListID;
    }

    function getCustomerMsgRefFullName() {
        return $this->CustomerMsgRef_FullName;
    }

    function getOther() {
        return $this->Other;
    }

    function getStatus() {
        return $this->Status;
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

    function setEditSequence($val) {
        $this->EditSequence = $val;
    }

    function setTxnNumber($val) {
        $this->TxnNumber = $val;
    }

    function setCustomerRefListID($val) {
        $this->CustomerRef_ListID = $val;
    }

    function setCustomerRefFullName($val) {
        $this->CustomerRef_FullName = $val;
    }

    function setTxnDate($val) {
        $this->TxnDate = $val;
    }

    function setRefNumber($val) {
        $this->RefNumber = $val;
    }

    function setPONumber($val) {
        $this->PONumber = $val;
    }

    function setTermsRefListID($val) {
        $this->TermsRef_ListID = $val;
    }

    function setTermsRefFullName($val) {
        $this->TermsRef_FullName = $val;
    }

    function setDueDate($val) {
        $this->DueDate = $val;
    }

    function setSalesRepRefListID($val) {
        $this->SalesRepRef_ListID = $val;
    }

    function setSalesRepRefFullName($val) {
        $this->SalesRepRef_FullName = $val;
    }

    function setSubtotal($val) {
        $this->Subtotal = $val;
    }

    function setSalesTaxTotal($val) {
        $this->SalesTaxTotal = $val;
    }

    function setTotalAmount($val) {
        $this->TotalAmount = $val;
    }

    function setIsManuallyClosed($val) {
        $this->IsManuallyClosed = $val;
    }

    function setIsFullyInvoiced($val) {
        $this->IsFullyInvoiced = $val;
    }

    function setMemo($val) {
        $this->Memo = $val;
    }

    function setCustomerMsgRefListID($val) {
        $this->CustomerMsgRef_ListID = $val;
    }

    function setCustomerMsgRefFullName($val) {
        $this->CustomerMsgRef_FullName = $val;
    }

    function setOther($val) {
        $this->Other = $val;
    }

    function setStatus($val) {
        $this->Status = $val;
    }

    public function initialize() {
        $this->setSchema("carrillo_dbaurora");
        $this->setSource("pedidos");
        $this->hasMany('TxnID', 'Pedidosdetalle', 'IDKEY');
        $this->hasMany('TxnID', 'Bonificadetalle', 'IDKEY');
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pedidos[]|Pedidos|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Pedidos|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'pedidos';
    }

}
