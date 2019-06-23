<?php

class Customer extends \Phalcon\Mvc\Model {

    protected $ListID;
    protected $TimeCreated;
    protected $TimeModified;
    protected $EditSequence;
    protected $Name;
    protected $FullName;
    protected $IsActive;
    protected $ClassRef_ListID;
    protected $ClassRef_FullName;
    protected $ParentRef_ListID;
    protected $ParentRef_FullName;
    protected $Sublevel;
    protected $CompanyName;
    protected $Salutation;
    protected $FirstName;
    protected $MiddleName;
    protected $LastName;
    protected $Suffix;
    protected $BillAddress_Addr1;
    protected $BillAddress_Addr2;
    protected $BillAddress_Addr3;
    protected $BillAddress_Addr4;
    protected $BillAddress_Addr5;
    protected $BillAddress_City;
    protected $BillAddress_State;
    protected $BillAddress_PostalCode;
    protected $BillAddress_Country;
    protected $BillAddress_Note;
    protected $ShipAddress_Addr1;
    protected $ShipAddress_Addr2;
    protected $ShipAddress_Addr3;
    protected $ShipAddress_Addr4;
    protected $ShipAddress_Addr5;
    protected $ShipAddress_City;
    protected $ShipAddress_State;
    protected $ShipAddress_PostalCode;
    protected $ShipAddress_Country;
    protected $ShipAddress_Note;
    protected $PrintAs;
    protected $Phone;
    protected $Mobile;
    protected $Pager;
    protected $AltPhone;
    protected $Fax;
    protected $Email;
    protected $Cc;
    protected $Contact;
    protected $AltContact;
    protected $CustomerTypeRef_ListID;
    protected $CustomerTypeRef_FullName;
    protected $TermsRef_ListID;
    protected $TermsRef_FullName;
    protected $SalesRepRef_ListID;
    protected $SalesRepRef_FullName;
    protected $Balance;
    protected $TotalBalance;
    protected $SalesTaxCodeRef_ListID;
    protected $SalesTaxCodeRef_FullName;
    protected $ItemSalesTaxRef_ListID;
    protected $ItemSalesTaxRef_FullName;
    protected $SalesTaxCountry;
    protected $ResaleNumber;
    protected $AccountNumber;
    protected $CreditLimit;
    protected $PreferredPaymentMethodRef_ListID;
    protected $PreferredPaymentMethodRef_FullName;
    protected $CreditCardNumber;
    protected $ExpirationMonth;
    protected $ExpirationYear;
    protected $NameOnCard;
    protected $CreditCardAddress;
    protected $CreditCardPostalCode;
    protected $JobStatus;
    protected $JobStartDate;
    protected $JobProjectedEndDate;
    protected $JobEndDate;
    protected $JobDesc;
    protected $JobTypeRef_ListID;
    protected $JobTypeRef_FullName;
    protected $Notes;
    protected $PriceLevelRef_ListID;
    protected $PriceLevelRef_FullName;
    protected $TaxRegistrationNumber;
    protected $CurrencyRef_ListID;
    protected $CurrencyRef_FullName;
    protected $IsStatementWithParent;
    protected $PreferredDeliveryMethod;
    protected $CustomField1;
    protected $CustomField2;
    protected $CustomField3;
    protected $CustomField4;
    protected $CustomField5;
    protected $CustomField6;
    protected $CustomField7;
    protected $CustomField8;
    protected $CustomField9;
    protected $CustomField10;
    protected $CustomField11;
    protected $CustomField12;
    protected $CustomField13;
    protected $CustomField14;
    protected $CustomField15;
    protected $Status;

    public function initialize() {
        $this->setSchema("coopdb");
        $this->setSource("customer");
        $this->hasMany('listID', 'Invoice', 'CustomerRef_ListID');
        $this->hasMany('listID', 'Creditmemo', 'CustomerRef_ListID');
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource() {
        return 'customer';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Customer[]|Customer|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null) {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Customer|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null) {
        return parent::findFirst($parameters);
    }

// **********************
// GETTER METHODS
// **********************


    function getListID() {
        return $this->ListID;
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

    function getName() {
        return $this->Name;
    }

    function getFullName() {
        return $this->FullName;
    }

    function getIsActive() {
        return $this->IsActive;
    }

    function getClassRefListID() {
        return $this->ClassRef_ListID;
    }

    function getClassRefFullName() {
        return $this->ClassRef_FullName;
    }

    function getParentRefListID() {
        return $this->ParentRef_ListID;
    }

    function getParentRefFullName() {
        return $this->ParentRef_FullName;
    }

    function getSublevel() {
        return $this->Sublevel;
    }

    function getCompanyName() {
        return $this->CompanyName;
    }

    function getSalutation() {
        return $this->Salutation;
    }

    function getFirstName() {
        return $this->FirstName;
    }

    function getMiddleName() {
        return $this->MiddleName;
    }

    function getLastName() {
        return $this->LastName;
    }

    function getSuffix() {
        return $this->Suffix;
    }

    function getBillAddressAddr1() {
        return $this->BillAddress_Addr1;
    }

    function getBillAddressAddr2() {
        return $this->BillAddress_Addr2;
    }

    function getBillAddressAddr3() {
        return $this->BillAddress_Addr3;
    }

    function getBillAddressAddr4() {
        return $this->BillAddress_Addr4;
    }

    function getBillAddressAddr5() {
        return $this->BillAddress_Addr5;
    }

    function getBillAddressCity() {
        return $this->BillAddress_City;
    }

    function getBillAddressState() {
        return $this->BillAddress_State;
    }

    function getBillAddressPostalCode() {
        return $this->BillAddress_PostalCode;
    }

    function getBillAddressCountry() {
        return $this->BillAddress_Country;
    }

    function getBillAddressNote() {
        return $this->BillAddress_Note;
    }

    function getShipAddressAddr1() {
        return $this->ShipAddress_Addr1;
    }

    function getShipAddressAddr2() {
        return $this->ShipAddress_Addr2;
    }

    function getShipAddressAddr3() {
        return $this->ShipAddress_Addr3;
    }

    function getShipAddressAddr4() {
        return $this->ShipAddress_Addr4;
    }

    function getShipAddressAddr5() {
        return $this->ShipAddress_Addr5;
    }

    function getShipAddressCity() {
        return $this->ShipAddress_City;
    }

    function getShipAddressState() {
        return $this->ShipAddress_State;
    }

    function getShipAddressPostalCode() {
        return $this->ShipAddress_PostalCode;
    }

    function getShipAddressCountry() {
        return $this->ShipAddress_Country;
    }

    function getShipAddressNote() {
        return $this->ShipAddress_Note;
    }

    function getPrintAs() {
        return $this->PrintAs;
    }

    function getPhone() {
        return $this->Phone;
    }

    function getMobile() {
        return $this->Mobile;
    }

    function getPager() {
        return $this->Pager;
    }

    function getAltPhone() {
        return $this->AltPhone;
    }

    function getFax() {
        return $this->Fax;
    }

    function getEmail() {
        return $this->Email;
    }

    function getCc() {
        return $this->Cc;
    }

    function getContact() {
        return $this->Contact;
    }

    function getAltContact() {
        return $this->AltContact;
    }

    function getCustomerTypeRefListID() {
        return $this->CustomerTypeRef_ListID;
    }

    function getCustomerTypeRefFullName() {
        return $this->CustomerTypeRef_FullName;
    }

    function getTermsRefListID() {
        return $this->TermsRef_ListID;
    }

    function getTermsRefFullName() {
        return $this->TermsRef_FullName;
    }

    function getSalesRepRefListID() {
        return $this->SalesRepRef_ListID;
    }

    function getSalesRepRefFullName() {
        return $this->SalesRepRef_FullName;
    }

    function getBalance() {
        return $this->Balance;
    }

    function getTotalBalance() {
        return $this->TotalBalance;
    }

    function getSalesTaxCodeRefListID() {
        return $this->SalesTaxCodeRef_ListID;
    }

    function getSalesTaxCodeRefFullName() {
        return $this->SalesTaxCodeRef_FullName;
    }

    function getItemSalesTaxRefListID() {
        return $this->ItemSalesTaxRef_ListID;
    }

    function getItemSalesTaxRefFullName() {
        return $this->ItemSalesTaxRef_FullName;
    }

    function getSalesTaxCountry() {
        return $this->SalesTaxCountry;
    }

    function getResaleNumber() {
        return $this->ResaleNumber;
    }

    function getAccountNumber() {
        return $this->AccountNumber;
    }

    function getCreditLimit() {
        return $this->CreditLimit;
    }

    function getPreferredPaymentMethodRefListID() {
        return $this->PreferredPaymentMethodRef_ListID;
    }

    function getPreferredPaymentMethodRefFullName() {
        return $this->PreferredPaymentMethodRef_FullName;
    }

    function getCreditCardNumber() {
        return $this->CreditCardNumber;
    }

    function getExpirationMonth() {
        return $this->ExpirationMonth;
    }

    function getExpirationYear() {
        return $this->ExpirationYear;
    }

    function getNameOnCard() {
        return $this->NameOnCard;
    }

    function getCreditCardAddress() {
        return $this->CreditCardAddress;
    }

    function getCreditCardPostalCode() {
        return $this->CreditCardPostalCode;
    }

    function getJobStatus() {
        return $this->JobStatus;
    }

    function getJobStartDate() {
        return $this->JobStartDate;
    }

    function getJobProjectedEndDate() {
        return $this->JobProjectedEndDate;
    }

    function getJobEndDate() {
        return $this->JobEndDate;
    }

    function getJobDesc() {
        return $this->JobDesc;
    }

    function getJobTypeRefListID() {
        return $this->JobTypeRef_ListID;
    }

    function getJobTypeRefFullName() {
        return $this->JobTypeRef_FullName;
    }

    function getNotes() {
        return $this->Notes;
    }

    function getPriceLevelRefListID() {
        return $this->PriceLevelRef_ListID;
    }

    function getPriceLevelRefFullName() {
        return $this->PriceLevelRef_FullName;
    }

    function getTaxRegistrationNumber() {
        return $this->TaxRegistrationNumber;
    }

    function getCurrencyRefListID() {
        return $this->CurrencyRef_ListID;
    }

    function getCurrencyRefFullName() {
        return $this->CurrencyRef_FullName;
    }

    function getIsStatementWithParent() {
        return $this->IsStatementWithParent;
    }

    function getPreferredDeliveryMethod() {
        return $this->PreferredDeliveryMethod;
    }

    function getCustomField1() {
        return $this->CustomField1;
    }

    function getCustomField2() {
        return $this->CustomField2;
    }

    function getCustomField3() {
        return $this->CustomField3;
    }

    function getCustomField4() {
        return $this->CustomField4;
    }

    function getCustomField5() {
        return $this->CustomField5;
    }

    function getCustomField6() {
        return $this->CustomField6;
    }

    function getCustomField7() {
        return $this->CustomField7;
    }

    function getCustomField8() {
        return $this->CustomField8;
    }

    function getCustomField9() {
        return $this->CustomField9;
    }

    function getCustomField10() {
        return $this->CustomField10;
    }

    function getCustomField11() {
        return $this->CustomField11;
    }

    function getCustomField12() {
        return $this->CustomField12;
    }

    function getCustomField13() {
        return $this->CustomField13;
    }

    function getCustomField14() {
        return $this->CustomField14;
    }

    function getCustomField15() {
        return $this->CustomField15;
    }

    function getStatus() {
        return $this->Status;
    }

// **********************
// SETTER METHODS
// **********************


    function setListID($val) {
        $this->ListID = $val;
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

    function setName($val) {
        $this->Name = $val;
    }

    function setFullName($val) {
        $this->FullName = $val;
    }

    function setIsActive($val) {
        $this->IsActive = $val;
    }

    function setClassRefListID($val) {
        $this->ClassRef_ListID = $val;
    }

    function setClassRefFullName($val) {
        $this->ClassRef_FullName = $val;
    }

    function setParentRefListID($val) {
        $this->ParentRef_ListID = $val;
    }

    function setParentRefFullName($val) {
        $this->ParentRef_FullName = $val;
    }

    function setSublevel($val) {
        $this->Sublevel = $val;
    }

    function setCompanyName($val) {
        $this->CompanyName = $val;
    }

    function setSalutation($val) {
        $this->Salutation = $val;
    }

    function setFirstName($val) {
        $this->FirstName = $val;
    }

    function setMiddleName($val) {
        $this->MiddleName = $val;
    }

    function setLastName($val) {
        $this->LastName = $val;
    }

    function setSuffix($val) {
        $this->Suffix = $val;
    }

    function setBillAddressAddr1($val) {
        $this->BillAddress_Addr1 = $val;
    }

    function setBillAddressAddr2($val) {
        $this->BillAddress_Addr2 = $val;
    }

    function setBillAddressAddr3($val) {
        $this->BillAddress_Addr3 = $val;
    }

    function setBillAddressAddr4($val) {
        $this->BillAddress_Addr4 = $val;
    }

    function setBillAddressAddr5($val) {
        $this->BillAddress_Addr5 = $val;
    }

    function setBillAddressCity($val) {
        $this->BillAddress_City = $val;
    }

    function setBillAddressState($val) {
        $this->BillAddress_State = $val;
    }

    function setBillAddressPostalCode($val) {
        $this->BillAddress_PostalCode = $val;
    }

    function setBillAddressCountry($val) {
        $this->BillAddress_Country = $val;
    }

    function setBillAddressNote($val) {
        $this->BillAddress_Note = $val;
    }

    function setShipAddressAddr1($val) {
        $this->ShipAddress_Addr1 = $val;
    }

    function setShipAddressAddr2($val) {
        $this->ShipAddress_Addr2 = $val;
    }

    function setShipAddressAddr3($val) {
        $this->ShipAddress_Addr3 = $val;
    }

    function setShipAddressAddr4($val) {
        $this->ShipAddress_Addr4 = $val;
    }

    function setShipAddressAddr5($val) {
        $this->ShipAddress_Addr5 = $val;
    }

    function setShipAddressCity($val) {
        $this->ShipAddress_City = $val;
    }

    function setShipAddressState($val) {
        $this->ShipAddress_State = $val;
    }

    function setShipAddressPostalCode($val) {
        $this->ShipAddress_PostalCode = $val;
    }

    function setShipAddressCountry($val) {
        $this->ShipAddress_Country = $val;
    }

    function setShipAddressNote($val) {
        $this->ShipAddress_Note = $val;
    }

    function setPrintAs($val) {
        $this->PrintAs = $val;
    }

    function setPhone($val) {
        $this->Phone = $val;
    }

    function setMobile($val) {
        $this->Mobile = $val;
    }

    function setPager($val) {
        $this->Pager = $val;
    }

    function setAltPhone($val) {
        $this->AltPhone = $val;
    }

    function setFax($val) {
        $this->Fax = $val;
    }

    function setEmail($val) {
        $this->Email = $val;
    }

    function setCc($val) {
        $this->Cc = $val;
    }

    function setContact($val) {
        $this->Contact = $val;
    }

    function setAltContact($val) {
        $this->AltContact = $val;
    }

    function setCustomerTypeRefListID($val) {
        $this->CustomerTypeRef_ListID = $val;
    }

    function setCustomerTypeRefFullName($val) {
        $this->CustomerTypeRef_FullName = $val;
    }

    function setTermsRefListID($val) {
        $this->TermsRef_ListID = $val;
    }

    function setTermsRefFullName($val) {
        $this->TermsRef_FullName = $val;
    }

    function setSalesRepRefListID($val) {
        $this->SalesRepRef_ListID = $val;
    }

    function setSalesRepRefFullName($val) {
        $this->SalesRepRef_FullName = $val;
    }

    function setBalance($val) {
        $this->Balance = $val;
    }

    function setTotalBalance($val) {
        $this->TotalBalance = $val;
    }

    function setSalesTaxCodeRefListID($val) {
        $this->SalesTaxCodeRef_ListID = $val;
    }

    function setSalesTaxCodeRefFullName($val) {
        $this->SalesTaxCodeRef_FullName = $val;
    }

    function setItemSalesTaxRefListID($val) {
        $this->ItemSalesTaxRef_ListID = $val;
    }

    function setItemSalesTaxRefFullName($val) {
        $this->ItemSalesTaxRef_FullName = $val;
    }

    function setSalesTaxCountry($val) {
        $this->SalesTaxCountry = $val;
    }

    function setResaleNumber($val) {
        $this->ResaleNumber = $val;
    }

    function setAccountNumber($val) {
        $this->AccountNumber = $val;
    }

    function setCreditLimit($val) {
        $this->CreditLimit = $val;
    }

    function setPreferredPaymentMethodRefListID($val) {
        $this->PreferredPaymentMethodRef_ListID = $val;
    }

    function setPreferredPaymentMethodRefFullName($val) {
        $this->PreferredPaymentMethodRef_FullName = $val;
    }

    function setCreditCardNumber($val) {
        $this->CreditCardNumber = $val;
    }

    function setExpirationMonth($val) {
        $this->ExpirationMonth = $val;
    }

    function setExpirationYear($val) {
        $this->ExpirationYear = $val;
    }

    function setNameOnCard($val) {
        $this->NameOnCard = $val;
    }

    function setCreditCardAddress($val) {
        $this->CreditCardAddress = $val;
    }

    function setCreditCardPostalCode($val) {
        $this->CreditCardPostalCode = $val;
    }

    function setJobStatus($val) {
        $this->JobStatus = $val;
    }

    function setJobStartDate($val) {
        $this->JobStartDate = $val;
    }

    function setJobProjectedEndDate($val) {
        $this->JobProjectedEndDate = $val;
    }

    function setJobEndDate($val) {
        $this->JobEndDate = $val;
    }

    function setJobDesc($val) {
        $this->JobDesc = $val;
    }

    function setJobTypeRefListID($val) {
        $this->JobTypeRef_ListID = $val;
    }

    function setJobTypeRefFullName($val) {
        $this->JobTypeRef_FullName = $val;
    }

    function setNotes($val) {
        $this->Notes = $val;
    }

    function setPriceLevelRefListID($val) {
        $this->PriceLevelRef_ListID = $val;
    }

    function setPriceLevelRefFullName($val) {
        $this->PriceLevelRef_FullName = $val;
    }

    function setTaxRegistrationNumber($val) {
        $this->TaxRegistrationNumber = $val;
    }

    function setCurrencyRefListID($val) {
        $this->CurrencyRefListID = $val;
    }

    function setCurrencyRefFullName($val) {
        $this->CurrencyRef_FullName = $val;
    }

    function setIsStatementWithParent($val) {
        $this->IsStatementWithParent = $val;
    }

    function setPreferredDeliveryMethod($val) {
        $this->PreferredDeliveryMethod = $val;
    }

    function setCustomField1($val) {
        $this->CustomField1 = $val;
    }

    function setCustomField2($val) {
        $this->CustomField2 = $val;
    }

    function setCustomField3($val) {
        $this->CustomField3 = $val;
    }

    function setCustomField4($val) {
        $this->CustomField4 = $val;
    }

    function setCustomField5($val) {
        $this->CustomField5 = $val;
    }

    function setCustomField6($val) {
        $this->CustomField6 = $val;
    }

    function setCustomField7($val) {
        $this->CustomField7 = $val;
    }

    function setCustomField8($val) {
        $this->CustomField8 = $val;
    }

    function setCustomField9($val) {
        $this->CustomField9 = $val;
    }

    function setCustomField10($val) {
        $this->CustomField10 = $val;
    }

    function setCustomField11($val) {
        $this->CustomField11 = $val;
    }

    function setCustomField12($val) {
        $this->CustomField12 = $val;
    }

    function setCustomField13($val) {
        $this->CustomField13 = $val;
    }

    function setCustomField14($val) {
        $this->CustomField14 = $val;
    }

    function setCustomField15($val) {
        $this->CustomField15 = $val;
    }

    function setStatus($val) {
        $this->Status = $val;
    }

}
