{{ content() }}
{{ elements.getModelosAdicional() }}
{% include "layouts/cabecera.volt" %}
<div class="solid-form">
    <div class="solid-form l-container w-70" id="solid-form-container">

        <div class="l-row">

            <div class="l-col-12 pad-0">

                <div class="form-header">
                    <div class="l-row">
                        <div class="l-col-4">
                            <br>
                            <h4> {{ ruc['NombreComercial']}} </h4>
                            <h5> {{ ruc['ruc'] }} </h5>
                            <h5>Establecimiento {{ ruc['estab'] }} Punto de Emision {{ ruc['punto'] }} </h5>
                        </div>
                        <div class="l-col-4">
                            <h1 class="margin-bottom-0"> FACTURAS </h1>
                            <h5> Configuracion del tipo de factura. </h5>
                        </div>
                        <div class="l-col-4">
                            <br>
                            <h4> {{ ticket.CustomerRefFullName}} </h4>
                            <h5> {{ ticket.CustomerRefListID}} </h5>
                        </div>
                    </div>
                </div>

                <div class="form-body">
                    {{ form('id':'cabecera')}}

                    <fieldset>
                        <legend> GENERAL </legend>

                        <div class="l-row">

                            <div class="l-col-3">

                                <div class="form-group form-group-select" data-icon="&#xf078">

                                    <label for="tipofactura"> FACTURA DE: </label>

                                    <div class="l-pos-r">

                                        {{ form.render('tipofactura', ['class': 'form-element form-element-icon multi-select']) }}
                                        <i class="fa fa-list fa-absolute fa-background"></i>
                                    </div>
                                        {{ form.mensajes('tipofactura') }}

                                </div>

                            </div>
                            <div class="l-col-3">
                                <div class="form-group form-group-select" data-icon="&#xf078">

                                    <label for="tipoguia"> GUIA </label>

                                    <div class="l-pos-r">

                                        {{ form.render('tipoguia', ['class': 'form-element form-element-icon multi-select']) }}
                                        <i class="fa fa-list fa-absolute fa-background"></i>
                                    </div>
                                        {{ form.mensajes('tipoguia') }}

                                </div>
                            </div>


                            <div class="l-col-3">

                                <div class="form-group">

                                    <label for="fechaemision"> FECHA EMISION </label>

                                    <div class="l-pos-r">
                                        {{ form.render("fechaemision", ['class': 'form-element form-element-icon']) }}
                                        <i class="fa fa-calendar fa-absolute fa-background"></i>
                                    </div>
                                        {{ form.mensajes('fechaemision') }}

                                </div>

                            </div>
                            <div class="l-col-3">

                                <div class="form-group form-group-select" data-icon="&#xf078">

                                    <label for="frecuencia"> FRECUENCIA </label>

                                    <div class="l-pos-r">

                                        {{ form.render('frecuencia', ['class': 'form-element form-element-icon multi-select']) }}
                                        <i class="fa fa-arrows-v fa-absolute fa-background"></i>
                                    </div>
                                        {{ form.mensajes('frecuencia') }}

                                </div>

                            </div>
                        </div>
                        <div class="l-row">

                            <div class="l-col-3">

                                <div class="form-group">

                                    <label for="numerofactura"> NRO. FACTURA </label>

                                    <div class="l-pos-r">
                                        {{ form.render('numerofactura', ['class': 'form-element form-element-icon']) }}
                                        <i class="fa fa-arrows-v fa-absolute fa-background"></i>
                                    </div>
                                        {{ form.mensajes('numerofactura') }}

                                </div>

                            </div>
                            <div class="l-col-3">

                                <div class="form-group">

                                    <label for="numeroguia"> NRO. GUIA </label>

                                    <div class="l-pos-r">
                                        {{ form.render('numeroguia', ['class': 'form-element form-element-icon']) }}
                                        <i class="fa fa-arrows-v fa-absolute fa-background"></i>
                                    </div>
                                        {{ form.mensajes('numeroguia') }}

                                </div>

                            </div>
                            <div class="l-col-3">

                                <div class="form-group form-group-select">

                                    <label for="frecuencia"> NRO. EMISIONES </label>

                                    <div class="l-pos-r">
                                        {{ form.render('frecuencia', ['class': 'form-element form-element-icon']) }}
                                        <i class="fa fa-arrows-v fa-absolute fa-background"></i>
                                    </div>
                                        {{ form.mensajes('frecuencia') }}

                                </div>

                            </div>
                            <div class="l-col-3">

                                <div class="form-group form-group-select" data-icon="&#xf078">

                                    <label for="formapago"> FORMA DE PAGO </label>

                                    <div class="l-pos-r">

                                        {{ form.render('formapago', ['class': 'form-element form-element-icon multi-select']) }}
                                        <i class="fa fa-list fa-absolute fa-background"></i>
                                    </div>
                                        {{ form.mensajes('formapago') }}

                                </div>

                            </div>
                        </div>

                        <div class="l-row">

                            <div class="l-col-4">

                                <div class="form-group form-group-textarea">

                                    <label for="referencia"> REFERENCIA </label>

                                    <div class="l-pos-r">
                                        {{ form.render('referencia', ['class': 'form-element form-element-icon']) }}
                                        <i class="fa fa-text-width fa-absolute fa-background"></i>
                                    </div>
                                        {{ form.mensajes('referencia') }}

                                </div>

                            </div>
                            <div class="l-col-4">

                                <div class="form-group form-group-textarea">

                                    <label for="notacomprador"> NOTA COMPRADOR </label>

                                    <div class="l-pos-r">
                                        {{ form.render('notacomprador', ['class': 'form-element form-element-icon multi-select']) }}
                                        <i class="fa fa-text-width fa-absolute fa-background"></i>
                                    </div>
                                        {{ form.mensajes('notacomprador') }}

                                </div>

                            </div>
                            <div class="l-col-4">

                                <div class="form-group form-group-textarea">

                                    <label for="condiciones"> TERMINOS Y CONDICIONES</label>

                                    <div class="l-pos-r">
                                        {{ form.render('condiciones', ['class': 'form-element form-element-icon multi-select']) }}
                                        <i class="fa fa-text-width fa-absolute fa-background"></i>
                                    </div>
                                        {{ form.mensajes('condiciones') }}

                                </div>

                            </div>

                        </div>
                    </fieldset>

                    <div class="l-row">
                        <div class="l-col-12">
                            <div class="form-group">
                                <input type="submit" value="Productos"  class="btn btn-success btn-flat">
                            </div>
                        </div>

                    </div>


                    </form>

                </div>


            </div>                                    
        </div>
    </div>
</div>

