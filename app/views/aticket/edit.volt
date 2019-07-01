<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("aticket", "Go Back") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Edit aticket
    </h1>
</div>

{{ content() }}

{{ form("aticket/save", "method":"post", "autocomplete" : "off", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldTxnid" class="col-sm-2 control-label">TxnID</label>
    <div class="col-sm-10">
        {{ text_field("TxnID", "size" : 30, "class" : "form-control", "id" : "fieldTxnid") }}
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
    <label for="fieldTxndate" class="col-sm-2 control-label">TxnDate</label>
    <div class="col-sm-10">
        {{ text_field("TxnDate", "type" : "date", "class" : "form-control", "id" : "fieldTxndate") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEstab" class="col-sm-2 control-label">Estab</label>
    <div class="col-sm-10">
        {{ text_field("Estab", "size" : 30, "class" : "form-control", "id" : "fieldEstab") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldPunto" class="col-sm-2 control-label">Punto</label>
    <div class="col-sm-10">
        {{ text_field("Punto", "size" : 30, "class" : "form-control", "id" : "fieldPunto") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldRefnumber" class="col-sm-2 control-label">RefNumber</label>
    <div class="col-sm-10">
        {{ text_field("RefNumber", "size" : 30, "class" : "form-control", "id" : "fieldRefnumber") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNrofactura" class="col-sm-2 control-label">NroFactura</label>
    <div class="col-sm-10">
        {{ text_field("NroFactura", "size" : 30, "class" : "form-control", "id" : "fieldNrofactura") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSubtotal" class="col-sm-2 control-label">SubTotal</label>
    <div class="col-sm-10">
        {{ text_field("SubTotal", "type" : "numeric", "class" : "form-control", "id" : "fieldSubtotal") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldConiva" class="col-sm-2 control-label">ConIva</label>
    <div class="col-sm-10">
        {{ text_field("ConIva", "type" : "numeric", "class" : "form-control", "id" : "fieldConiva") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSiniva" class="col-sm-2 control-label">SinIva</label>
    <div class="col-sm-10">
        {{ text_field("SinIva", "type" : "numeric", "class" : "form-control", "id" : "fieldSiniva") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldIva" class="col-sm-2 control-label">Iva</label>
    <div class="col-sm-10">
        {{ text_field("Iva", "type" : "numeric", "class" : "form-control", "id" : "fieldIva") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldSingle" class="col-sm-2 control-label">Single</label>
    <div class="col-sm-10">
        {{ text_field("Single", "type" : "numeric", "class" : "form-control", "id" : "fieldSingle") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNrocaja" class="col-sm-2 control-label">NroCaja</label>
    <div class="col-sm-10">
        {{ text_field("NroCaja", "size" : 30, "class" : "form-control", "id" : "fieldNrocaja") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomerreflistid" class="col-sm-2 control-label">CustomerRefListID</label>
    <div class="col-sm-10">
        {{ text_field("CustomerRefListID", "size" : 30, "class" : "form-control", "id" : "fieldCustomerreflistid") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldCustomerreffullname" class="col-sm-2 control-label">CustomerRefFullName</label>
    <div class="col-sm-10">
        {{ text_field("CustomerRefFullName", "size" : 30, "class" : "form-control", "id" : "fieldCustomerreffullname") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFtipo" class="col-sm-2 control-label">Ftipo</label>
    <div class="col-sm-10">
        {{ text_field("Ftipo", "size" : 30, "class" : "form-control", "id" : "fieldFtipo") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFestab" class="col-sm-2 control-label">Festab</label>
    <div class="col-sm-10">
        {{ text_field("Festab", "size" : 30, "class" : "form-control", "id" : "fieldFestab") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFpunto" class="col-sm-2 control-label">Fpunto</label>
    <div class="col-sm-10">
        {{ text_field("Fpunto", "size" : 30, "class" : "form-control", "id" : "fieldFpunto") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFnumero" class="col-sm-2 control-label">Fnumero</label>
    <div class="col-sm-10">
        {{ text_field("Fnumero", "type" : "numeric", "class" : "form-control", "id" : "fieldFnumero") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFfrecuencia" class="col-sm-2 control-label">Ffrecuencia</label>
    <div class="col-sm-10">
        {{ text_field("Ffrecuencia", "size" : 30, "class" : "form-control", "id" : "fieldFfrecuencia") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldFplazo" class="col-sm-2 control-label">Fplazo</label>
    <div class="col-sm-10">
        {{ text_field("Fplazo", "size" : 30, "class" : "form-control", "id" : "fieldFplazo") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldGtipo" class="col-sm-2 control-label">Gtipo</label>
    <div class="col-sm-10">
        {{ text_field("Gtipo", "size" : 30, "class" : "form-control", "id" : "fieldGtipo") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldGestab" class="col-sm-2 control-label">Gestab</label>
    <div class="col-sm-10">
        {{ text_field("Gestab", "size" : 30, "class" : "form-control", "id" : "fieldGestab") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldGpunto" class="col-sm-2 control-label">Gpunto</label>
    <div class="col-sm-10">
        {{ text_field("Gpunto", "size" : 30, "class" : "form-control", "id" : "fieldGpunto") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldGnumero" class="col-sm-2 control-label">Gnumero</label>
    <div class="col-sm-10">
        {{ text_field("Gnumero", "type" : "numeric", "class" : "form-control", "id" : "fieldGnumero") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldReferencia" class="col-sm-2 control-label">Referencia</label>
    <div class="col-sm-10">
        {{ text_field("Referencia", "size" : 30, "class" : "form-control", "id" : "fieldReferencia") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldNotascomprador" class="col-sm-2 control-label">NotasComprador</label>
    <div class="col-sm-10">
        {{ text_field("NotasComprador", "size" : 30, "class" : "form-control", "id" : "fieldNotascomprador") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldTerminoscondiciones" class="col-sm-2 control-label">TerminosCondiciones</label>
    <div class="col-sm-10">
        {{ text_field("TerminosCondiciones", "size" : 30, "class" : "form-control", "id" : "fieldTerminoscondiciones") }}
    </div>
</div>

<div class="form-group">
    <label for="fieldEstado" class="col-sm-2 control-label">Estado</label>
    <div class="col-sm-10">
        {{ text_field("Estado", "size" : 30, "class" : "form-control", "id" : "fieldEstado") }}
    </div>
</div>


{{ hidden_field("id") }}

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ submit_button('Send', 'class': 'btn btn-default') }}
    </div>
</div>

</form>
