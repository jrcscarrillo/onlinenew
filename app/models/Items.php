<?php

class Items extends \Phalcon\Mvc\Model {

// **********************
// ATTRIBUTE DECLARATION
// **********************

    protected $id;
    protected $name;
    protected $fullname;
    protected $description;
    protected $quickbooks_listid;
    protected $quickbooks_editsequence;
    protected $quickbooks_errnum;
    protected $quickbooks_errmsg;
    protected $is_active;
    protected $parent_reference_listid;
    protected $parent_reference_full_name;
    protected $sublevel;
    protected $unit_of_measure_set_ref_listid;
    protected $unit_of_measure_set_ref_fullname;
    protected $type;
    protected $sales_tax_code_ref_listid;
    protected $sales_tax_code_ref_fullname;
    protected $sales_desc;
    protected $sales_price;
    protected $income_account_ref_listid;
    protected $income_account_ref_fullname;
    protected $purchase_cost;
    protected $COGS_account_ref_listid;
    protected $COGS_account_ref_fullname;
    protected $assests_account_ref_listid;
    protected $assests_acc;
    protected $purchase_desc;
    protected $QuantityOnHand;
    protected $QuantityOnOrder;
    protected $QuantityOnSalesOrder;
    protected $AverageCost;
    protected $CustomerField1;
    protected $tipoid;
    protected $numeroid;
    protected $email;

    /**
     * Initialize method for model.
     */
    public function initialize() {
        $this->setSchema("coopdb");
        $this->setSource("items");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'items';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Items[]|Items|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Items|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

// **********************
// GETTER METHODS
// **********************


    function getid() {
        return $this->id;
    }

    function getname() {
        return $this->name;
    }

    function getfullname() {
        return $this->fullname;
    }

    function getdescription() {
        return $this->description;
    }

    function getquickbooks_listid() {
        return $this->quickbooks_listid;
    }

    function getquickbooks_editsequence() {
        return $this->quickbooks_editsequence;
    }

    function getquickbooks_errnum() {
        return $this->quickbooks_errnum;
    }

    function getquickbooks_errmsg() {
        return $this->quickbooks_errmsg;
    }

    function getis_active() {
        return $this->is_active;
    }

    function getparent_reference_listid() {
        return $this->parent_reference_listid;
    }

    function getparent_reference_full_name() {
        return $this->parent_reference_full_name;
    }

    function getsublevel() {
        return $this->sublevel;
    }

    function getunit_of_measure_set_ref_listid() {
        return $this->unit_of_measure_set_ref_listid;
    }

    function getunit_of_measure_set_ref_fullname() {
        return $this->unit_of_measure_set_ref_fullname;
    }

    function gettype() {
        return $this->type;
    }

    function getsales_tax_code_ref_listid() {
        return $this->sales_tax_code_ref_listid;
    }

    function getsales_tax_code_ref_fullname() {
        return $this->sales_tax_code_ref_fullname;
    }

    function getsales_desc() {
        return $this->sales_desc;
    }

    function getsales_price() {
        return $this->sales_price;
    }

    function getincome_account_ref_listid() {
        return $this->income_account_ref_listid;
    }

    function getincome_account_ref_fullname() {
        return $this->income_account_ref_fullname;
    }

    function getpurchase_cost() {
        return $this->purchase_cost;
    }

    function getCOGS_account_ref_listid() {
        return $this->COGS_account_ref_listid;
    }

    function getCOGS_account_ref_fullname() {
        return $this->COGS_account_ref_fullname;
    }

    function getassests_account_ref_listid() {
        return $this->assests_account_ref_listid;
    }

    function getassests_acc() {
        return $this->assests_acc;
    }

    function getpurchase_desc() {
        return $this->purchase_desc;
    }

    function getQuantityOnHand() {
        return $this->QuantityOnHand;
    }

    function getQuantityOnOrder() {
        return $this->QuantityOnOrder;
    }

    function getQuantityOnSalesOrder() {
        return $this->QuantityOnSalesOrder;
    }

    function getAverageCost() {
        return $this->AverageCost;
    }

    function getCustomerField1() {
        return $this->CustomerField1;
    }

    function gettipoid() {
        return $this->tipoid;
    }

    function getnumeroid() {
        return $this->numeroid;
    }

    function getemail() {
        return $this->email;
    }

// **********************
// SETTER METHODS
// **********************


    function setid($val) {
        $this->id = $val;
    }

    function setname($val) {
        $this->name = $val;
    }

    function setfullname($val) {
        $this->fullname = $val;
    }

    function setdescription($val) {
        $this->description = $val;
    }

    function setquickbooks_listid($val) {
        $this->quickbooks_listid = $val;
    }

    function setquickbooks_editsequence($val) {
        $this->quickbooks_editsequence = $val;
    }

    function setquickbooks_errnum($val) {
        $this->quickbooks_errnum = $val;
    }

    function setquickbooks_errmsg($val) {
        $this->quickbooks_errmsg = $val;
    }

    function setis_active($val) {
        $this->is_active = $val;
    }

    function setparent_reference_listid($val) {
        $this->parent_reference_listid = $val;
    }

    function setparent_reference_full_name($val) {
        $this->parent_reference_full_name = $val;
    }

    function setsublevel($val) {
        $this->sublevel = $val;
    }

    function setunit_of_measure_set_ref_listid($val) {
        $this->unit_of_measure_set_ref_listid = $val;
    }

    function setunit_of_measure_set_ref_fullname($val) {
        $this->unit_of_measure_set_ref_fullname = $val;
    }

    function settype($val) {
        $this->type = $val;
    }

    function setsales_tax_code_ref_listid($val) {
        $this->sales_tax_code_ref_listid = $val;
    }

    function setsales_tax_code_ref_fullname($val) {
        $this->sales_tax_code_ref_fullname = $val;
    }

    function setsales_desc($val) {
        $this->sales_desc = $val;
    }

    function setsales_price($val) {
        $this->sales_price = $val;
    }

    function setincome_account_ref_listid($val) {
        $this->income_account_ref_listid = $val;
    }

    function setincome_account_ref_fullname($val) {
        $this->income_account_ref_fullname = $val;
    }

    function setpurchase_cost($val) {
        $this->purchase_cost = $val;
    }

    function setCOGS_account_ref_listid($val) {
        $this->COGS_account_ref_listid = $val;
    }

    function setCOGS_account_ref_fullname($val) {
        $this->COGS_account_ref_fullname = $val;
    }

    function setassests_account_ref_listid($val) {
        $this->assests_account_ref_listid = $val;
    }

    function setassests_acc($val) {
        $this->assests_acc = $val;
    }

    function setpurchase_desc($val) {
        $this->purchase_desc = $val;
    }

    function setQuantityOnHand($val) {
        $this->QuantityOnHand = $val;
    }

    function setQuantityOnOrder($val) {
        $this->QuantityOnOrder = $val;
    }

    function setQuantityOnSalesOrder($val) {
        $this->QuantityOnSalesOrder = $val;
    }

    function setAverageCost($val) {
        $this->AverageCost = $val;
    }

    function setCustomerField1($val) {
        $this->CustomerField1 = $val;
    }

    function settipoid($val) {
        $this->tipoid = $val;
    }

    function setnumeroid($val) {
        $this->numeroid = $val;
    }

    function setemail($val) {
        $this->email = $val;
    }

}
