<?php

class Itemservice extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var string
     */
    protected $listID;

    /**
     *
     * @var string
     */
    protected $timeCreated;

    /**
     *
     * @var string
     */
    protected $timeModified;

    /**
     *
     * @var integer
     */
    protected $editSequence;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $fullName;

    /**
     *
     * @var string
     */
    protected $barCodeValue;

    /**
     *
     * @var string
     */
    protected $isActive;

    /**
     *
     * @var string
     */
    protected $classRef_ListID;

    /**
     *
     * @var string
     */
    protected $classRef_FullName;

    /**
     *
     * @var string
     */
    protected $parentRef_ListID;

    /**
     *
     * @var string
     */
    protected $parentRef_FullName;

    /**
     *
     * @var integer
     */
    protected $sublevel;

    /**
     *
     * @var string
     */
    protected $unitOfMeasureSetRef_ListID;

    /**
     *
     * @var string
     */
    protected $unitOfMeasureSetRef_FullName;

    /**
     *
     * @var string
     */
    protected $isTaxIncluded;

    /**
     *
     * @var string
     */
    protected $salesTaxCodeRef_ListID;

    /**
     *
     * @var string
     */
    protected $salesTaxCodeRef_FullName;

    /**
     *
     * @var string
     */
    protected $customField1;

    /**
     *
     * @var string
     */
    protected $customField2;

    /**
     *
     * @var string
     */
    protected $customField3;

    /**
     *
     * @var string
     */
    protected $customField4;

    /**
     *
     * @var string
     */
    protected $customField5;

    /**
     *
     * @var string
     */
    protected $customField6;

    /**
     *
     * @var string
     */
    protected $customField7;

    /**
     *
     * @var string
     */
    protected $customField8;

    /**
     *
     * @var string
     */
    protected $customField9;

    /**
     *
     * @var string
     */
    protected $customField10;

    /**
     *
     * @var string
     */
    protected $customField11;

    /**
     *
     * @var string
     */
    protected $customField12;

    /**
     *
     * @var string
     */
    protected $customField13;

    /**
     *
     * @var string
     */
    protected $customField14;

    /**
     *
     * @var string
     */
    protected $customField15;

    /**
     *
     * @var string
     */
    protected $status;

    /**
     * Method to set the value of field ListID
     *
     * @param string $listID
     * @return $this
     */
    public function setListID($listID)
    {
        $this->listID = $listID;

        return $this;
    }

    /**
     * Method to set the value of field TimeCreated
     *
     * @param string $timeCreated
     * @return $this
     */
    public function setTimeCreated($timeCreated)
    {
        $this->timeCreated = $timeCreated;

        return $this;
    }

    /**
     * Method to set the value of field TimeModified
     *
     * @param string $timeModified
     * @return $this
     */
    public function setTimeModified($timeModified)
    {
        $this->timeModified = $timeModified;

        return $this;
    }

    /**
     * Method to set the value of field EditSequence
     *
     * @param integer $editSequence
     * @return $this
     */
    public function setEditSequence($editSequence)
    {
        $this->editSequence = $editSequence;

        return $this;
    }

    /**
     * Method to set the value of field Name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field FullName
     *
     * @param string $fullName
     * @return $this
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Method to set the value of field BarCodeValue
     *
     * @param string $barCodeValue
     * @return $this
     */
    public function setBarCodeValue($barCodeValue)
    {
        $this->barCodeValue = $barCodeValue;

        return $this;
    }

    /**
     * Method to set the value of field IsActive
     *
     * @param string $isActive
     * @return $this
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Method to set the value of field ClassRef_ListID
     *
     * @param string $classRef_ListID
     * @return $this
     */
    public function setClassRefListID($classRef_ListID)
    {
        $this->classRef_ListID = $classRef_ListID;

        return $this;
    }

    /**
     * Method to set the value of field ClassRef_FullName
     *
     * @param string $classRef_FullName
     * @return $this
     */
    public function setClassRefFullName($classRef_FullName)
    {
        $this->classRef_FullName = $classRef_FullName;

        return $this;
    }

    /**
     * Method to set the value of field ParentRef_ListID
     *
     * @param string $parentRef_ListID
     * @return $this
     */
    public function setParentRefListID($parentRef_ListID)
    {
        $this->parentRef_ListID = $parentRef_ListID;

        return $this;
    }

    /**
     * Method to set the value of field ParentRef_FullName
     *
     * @param string $parentRef_FullName
     * @return $this
     */
    public function setParentRefFullName($parentRef_FullName)
    {
        $this->parentRef_FullName = $parentRef_FullName;

        return $this;
    }

    /**
     * Method to set the value of field Sublevel
     *
     * @param integer $sublevel
     * @return $this
     */
    public function setSublevel($sublevel)
    {
        $this->sublevel = $sublevel;

        return $this;
    }

    /**
     * Method to set the value of field UnitOfMeasureSetRef_ListID
     *
     * @param string $unitOfMeasureSetRef_ListID
     * @return $this
     */
    public function setUnitOfMeasureSetRefListID($unitOfMeasureSetRef_ListID)
    {
        $this->unitOfMeasureSetRef_ListID = $unitOfMeasureSetRef_ListID;

        return $this;
    }

    /**
     * Method to set the value of field UnitOfMeasureSetRef_FullName
     *
     * @param string $unitOfMeasureSetRef_FullName
     * @return $this
     */
    public function setUnitOfMeasureSetRefFullName($unitOfMeasureSetRef_FullName)
    {
        $this->unitOfMeasureSetRef_FullName = $unitOfMeasureSetRef_FullName;

        return $this;
    }

    /**
     * Method to set the value of field IsTaxIncluded
     *
     * @param string $isTaxIncluded
     * @return $this
     */
    public function setIsTaxIncluded($isTaxIncluded)
    {
        $this->isTaxIncluded = $isTaxIncluded;

        return $this;
    }

    /**
     * Method to set the value of field SalesTaxCodeRef_ListID
     *
     * @param string $salesTaxCodeRef_ListID
     * @return $this
     */
    public function setSalesTaxCodeRefListID($salesTaxCodeRef_ListID)
    {
        $this->salesTaxCodeRef_ListID = $salesTaxCodeRef_ListID;

        return $this;
    }

    /**
     * Method to set the value of field SalesTaxCodeRef_FullName
     *
     * @param string $salesTaxCodeRef_FullName
     * @return $this
     */
    public function setSalesTaxCodeRefFullName($salesTaxCodeRef_FullName)
    {
        $this->salesTaxCodeRef_FullName = $salesTaxCodeRef_FullName;

        return $this;
    }

    /**
     * Method to set the value of field CustomField1
     *
     * @param string $customField1
     * @return $this
     */
    public function setCustomField1($customField1)
    {
        $this->customField1 = $customField1;

        return $this;
    }

    /**
     * Method to set the value of field CustomField2
     *
     * @param string $customField2
     * @return $this
     */
    public function setCustomField2($customField2)
    {
        $this->customField2 = $customField2;

        return $this;
    }

    /**
     * Method to set the value of field CustomField3
     *
     * @param string $customField3
     * @return $this
     */
    public function setCustomField3($customField3)
    {
        $this->customField3 = $customField3;

        return $this;
    }

    /**
     * Method to set the value of field CustomField4
     *
     * @param string $customField4
     * @return $this
     */
    public function setCustomField4($customField4)
    {
        $this->customField4 = $customField4;

        return $this;
    }

    /**
     * Method to set the value of field CustomField5
     *
     * @param string $customField5
     * @return $this
     */
    public function setCustomField5($customField5)
    {
        $this->customField5 = $customField5;

        return $this;
    }

    /**
     * Method to set the value of field CustomField6
     *
     * @param string $customField6
     * @return $this
     */
    public function setCustomField6($customField6)
    {
        $this->customField6 = $customField6;

        return $this;
    }

    /**
     * Method to set the value of field CustomField7
     *
     * @param string $customField7
     * @return $this
     */
    public function setCustomField7($customField7)
    {
        $this->customField7 = $customField7;

        return $this;
    }

    /**
     * Method to set the value of field CustomField8
     *
     * @param string $customField8
     * @return $this
     */
    public function setCustomField8($customField8)
    {
        $this->customField8 = $customField8;

        return $this;
    }

    /**
     * Method to set the value of field CustomField9
     *
     * @param string $customField9
     * @return $this
     */
    public function setCustomField9($customField9)
    {
        $this->customField9 = $customField9;

        return $this;
    }

    /**
     * Method to set the value of field CustomField10
     *
     * @param string $customField10
     * @return $this
     */
    public function setCustomField10($customField10)
    {
        $this->customField10 = $customField10;

        return $this;
    }

    /**
     * Method to set the value of field CustomField11
     *
     * @param string $customField11
     * @return $this
     */
    public function setCustomField11($customField11)
    {
        $this->customField11 = $customField11;

        return $this;
    }

    /**
     * Method to set the value of field CustomField12
     *
     * @param string $customField12
     * @return $this
     */
    public function setCustomField12($customField12)
    {
        $this->customField12 = $customField12;

        return $this;
    }

    /**
     * Method to set the value of field CustomField13
     *
     * @param string $customField13
     * @return $this
     */
    public function setCustomField13($customField13)
    {
        $this->customField13 = $customField13;

        return $this;
    }

    /**
     * Method to set the value of field CustomField14
     *
     * @param string $customField14
     * @return $this
     */
    public function setCustomField14($customField14)
    {
        $this->customField14 = $customField14;

        return $this;
    }

    /**
     * Method to set the value of field CustomField15
     *
     * @param string $customField15
     * @return $this
     */
    public function setCustomField15($customField15)
    {
        $this->customField15 = $customField15;

        return $this;
    }

    /**
     * Method to set the value of field Status
     *
     * @param string $status
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Returns the value of field listID
     *
     * @return string
     */
    public function getListID()
    {
        return $this->listID;
    }

    /**
     * Returns the value of field timeCreated
     *
     * @return string
     */
    public function getTimeCreated()
    {
        return $this->timeCreated;
    }

    /**
     * Returns the value of field timeModified
     *
     * @return string
     */
    public function getTimeModified()
    {
        return $this->timeModified;
    }

    /**
     * Returns the value of field editSequence
     *
     * @return integer
     */
    public function getEditSequence()
    {
        return $this->editSequence;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Returns the value of field barCodeValue
     *
     * @return string
     */
    public function getBarCodeValue()
    {
        return $this->barCodeValue;
    }

    /**
     * Returns the value of field isActive
     *
     * @return string
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Returns the value of field classRef_ListID
     *
     * @return string
     */
    public function getClassRefListID()
    {
        return $this->classRef_ListID;
    }

    /**
     * Returns the value of field classRef_FullName
     *
     * @return string
     */
    public function getClassRefFullName()
    {
        return $this->classRef_FullName;
    }

    /**
     * Returns the value of field parentRef_ListID
     *
     * @return string
     */
    public function getParentRefListID()
    {
        return $this->parentRef_ListID;
    }

    /**
     * Returns the value of field parentRef_FullName
     *
     * @return string
     */
    public function getParentRefFullName()
    {
        return $this->parentRef_FullName;
    }

    /**
     * Returns the value of field sublevel
     *
     * @return integer
     */
    public function getSublevel()
    {
        return $this->sublevel;
    }

    /**
     * Returns the value of field unitOfMeasureSetRef_ListID
     *
     * @return string
     */
    public function getUnitOfMeasureSetRefListID()
    {
        return $this->unitOfMeasureSetRef_ListID;
    }

    /**
     * Returns the value of field unitOfMeasureSetRef_FullName
     *
     * @return string
     */
    public function getUnitOfMeasureSetRefFullName()
    {
        return $this->unitOfMeasureSetRef_FullName;
    }

    /**
     * Returns the value of field isTaxIncluded
     *
     * @return string
     */
    public function getIsTaxIncluded()
    {
        return $this->isTaxIncluded;
    }

    /**
     * Returns the value of field salesTaxCodeRef_ListID
     *
     * @return string
     */
    public function getSalesTaxCodeRefListID()
    {
        return $this->salesTaxCodeRef_ListID;
    }

    /**
     * Returns the value of field salesTaxCodeRef_FullName
     *
     * @return string
     */
    public function getSalesTaxCodeRefFullName()
    {
        return $this->salesTaxCodeRef_FullName;
    }

    /**
     * Returns the value of field customField1
     *
     * @return string
     */
    public function getCustomField1()
    {
        return $this->customField1;
    }

    /**
     * Returns the value of field customField2
     *
     * @return string
     */
    public function getCustomField2()
    {
        return $this->customField2;
    }

    /**
     * Returns the value of field customField3
     *
     * @return string
     */
    public function getCustomField3()
    {
        return $this->customField3;
    }

    /**
     * Returns the value of field customField4
     *
     * @return string
     */
    public function getCustomField4()
    {
        return $this->customField4;
    }

    /**
     * Returns the value of field customField5
     *
     * @return string
     */
    public function getCustomField5()
    {
        return $this->customField5;
    }

    /**
     * Returns the value of field customField6
     *
     * @return string
     */
    public function getCustomField6()
    {
        return $this->customField6;
    }

    /**
     * Returns the value of field customField7
     *
     * @return string
     */
    public function getCustomField7()
    {
        return $this->customField7;
    }

    /**
     * Returns the value of field customField8
     *
     * @return string
     */
    public function getCustomField8()
    {
        return $this->customField8;
    }

    /**
     * Returns the value of field customField9
     *
     * @return string
     */
    public function getCustomField9()
    {
        return $this->customField9;
    }

    /**
     * Returns the value of field customField10
     *
     * @return string
     */
    public function getCustomField10()
    {
        return $this->customField10;
    }

    /**
     * Returns the value of field customField11
     *
     * @return string
     */
    public function getCustomField11()
    {
        return $this->customField11;
    }

    /**
     * Returns the value of field customField12
     *
     * @return string
     */
    public function getCustomField12()
    {
        return $this->customField12;
    }

    /**
     * Returns the value of field customField13
     *
     * @return string
     */
    public function getCustomField13()
    {
        return $this->customField13;
    }

    /**
     * Returns the value of field customField14
     *
     * @return string
     */
    public function getCustomField14()
    {
        return $this->customField14;
    }

    /**
     * Returns the value of field customField15
     *
     * @return string
     */
    public function getCustomField15()
    {
        return $this->customField15;
    }

    /**
     * Returns the value of field status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("coopdb");
        $this->setSource("itemservice");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'itemservice';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Itemservice[]|Itemservice|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Itemservice|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
