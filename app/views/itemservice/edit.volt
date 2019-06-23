<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("itemservice", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit itemservice
    </h1>
</div>

{{ content() }}

{{ form("itemservice/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldListid" class="col-sm-2 control-label">ListID</label>
    <div class="col-sm-10">
        {{ text_field("ListID", "size" : 30, "class" : "form-control", "id" : "fieldListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTimecreated" class="col-sm-2 control-label">TimeCreated</label>
    <div class="col-sm-10">
        {{ text_field("TimeCreated", "size" : 30, "class" : "form-control", "id" : "fieldTimecreated") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTimemodified" class="col-sm-2 control-label">TimeModified</label>
    <div class="col-sm-10">
        {{ text_field("TimeModified", "size" : 30, "class" : "form-control", "id" : "fieldTimemodified") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEditsequence" class="col-sm-2 control-label">EditSequence</label>
    <div class="col-sm-10">
        {{ text_field("EditSequence", "type" : "numeric", "class" : "form-control", "id" : "fieldEditsequence") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldName" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-10">
        {{ text_field("Name", "size" : 30, "class" : "form-control", "id" : "fieldName") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFullname" class="col-sm-2 control-label">FullName</label>
    <div class="col-sm-10">
        {{ text_field("FullName", "size" : 30, "class" : "form-control", "id" : "fieldFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldBarcodevalue" class="col-sm-2 control-label">BarCodeValue</label>
    <div class="col-sm-10">
        {{ text_field("BarCodeValue", "size" : 30, "class" : "form-control", "id" : "fieldBarcodevalue") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIsactive" class="col-sm-2 control-label">IsActive</label>
    <div class="col-sm-10">
        {{ text_field("IsActive", "size" : 30, "class" : "form-control", "id" : "fieldIsactive") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldClassrefListid" class="col-sm-2 control-label">ClassRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("ClassRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldClassrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldClassrefFullname" class="col-sm-2 control-label">ClassRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("ClassRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldClassrefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldParentrefListid" class="col-sm-2 control-label">ParentRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("ParentRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldParentrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldParentrefFullname" class="col-sm-2 control-label">ParentRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("ParentRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldParentrefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSublevel" class="col-sm-2 control-label">Sublevel</label>
    <div class="col-sm-10">
        {{ text_field("Sublevel", "type" : "numeric", "class" : "form-control", "id" : "fieldSublevel") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldUnitofmeasuresetrefListid" class="col-sm-2 control-label">UnitOfMeasureSetRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("UnitOfMeasureSetRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldUnitofmeasuresetrefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldUnitofmeasuresetrefFullname" class="col-sm-2 control-label">UnitOfMeasureSetRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("UnitOfMeasureSetRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldUnitofmeasuresetrefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIstaxincluded" class="col-sm-2 control-label">IsTaxIncluded</label>
    <div class="col-sm-10">
        {{ text_field("IsTaxIncluded", "size" : 30, "class" : "form-control", "id" : "fieldIstaxincluded") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSalestaxcoderefListid" class="col-sm-2 control-label">SalesTaxCodeRef Of ListID</label>
    <div class="col-sm-10">
        {{ text_field("SalesTaxCodeRef_ListID", "size" : 30, "class" : "form-control", "id" : "fieldSalestaxcoderefListid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSalestaxcoderefFullname" class="col-sm-2 control-label">SalesTaxCodeRef Of FullName</label>
    <div class="col-sm-10">
        {{ text_field("SalesTaxCodeRef_FullName", "size" : 30, "class" : "form-control", "id" : "fieldSalestaxcoderefFullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield1" class="col-sm-2 control-label">CustomField1</label>
    <div class="col-sm-10">
        {{ text_field("CustomField1", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield1") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield2" class="col-sm-2 control-label">CustomField2</label>
    <div class="col-sm-10">
        {{ text_field("CustomField2", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield2") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield3" class="col-sm-2 control-label">CustomField3</label>
    <div class="col-sm-10">
        {{ text_field("CustomField3", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield3") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield4" class="col-sm-2 control-label">CustomField4</label>
    <div class="col-sm-10">
        {{ text_field("CustomField4", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield4") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield5" class="col-sm-2 control-label">CustomField5</label>
    <div class="col-sm-10">
        {{ text_field("CustomField5", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield5") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield6" class="col-sm-2 control-label">CustomField6</label>
    <div class="col-sm-10">
        {{ text_field("CustomField6", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield6") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield7" class="col-sm-2 control-label">CustomField7</label>
    <div class="col-sm-10">
        {{ text_field("CustomField7", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield7") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield8" class="col-sm-2 control-label">CustomField8</label>
    <div class="col-sm-10">
        {{ text_field("CustomField8", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield8") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield9" class="col-sm-2 control-label">CustomField9</label>
    <div class="col-sm-10">
        {{ text_field("CustomField9", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield9") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield10" class="col-sm-2 control-label">CustomField10</label>
    <div class="col-sm-10">
        {{ text_field("CustomField10", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield10") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield11" class="col-sm-2 control-label">CustomField11</label>
    <div class="col-sm-10">
        {{ text_field("CustomField11", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield11") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield12" class="col-sm-2 control-label">CustomField12</label>
    <div class="col-sm-10">
        {{ text_field("CustomField12", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield12") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield13" class="col-sm-2 control-label">CustomField13</label>
    <div class="col-sm-10">
        {{ text_field("CustomField13", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield13") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield14" class="col-sm-2 control-label">CustomField14</label>
    <div class="col-sm-10">
        {{ text_field("CustomField14", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield14") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomfield15" class="col-sm-2 control-label">CustomField15</label>
    <div class="col-sm-10">
        {{ text_field("CustomField15", "size" : 30, "class" : "form-control", "id" : "fieldCustomfield15") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldStatus" class="col-sm-2 control-label">Status</label>
    <div class="col-sm-10">
        {{ text_field("Status", "size" : 30, "class" : "form-control", "id" : "fieldStatus") }}
    </div>
</div>


{{ hidden_field("id") }}

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Send', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
