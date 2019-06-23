{% extends "layouts/fullscreen_1.volt" %}
{% block forma %}
{% endblock %}
{% block cabecera %}

    <div class="row">
        <div class="col-md-6" id="solid-form-container" style="border-radius: 0; margin-top: 120px;">



            <div class="tab-container margin-top-1">

                <input type="radio" name="tabs" id="tab-1" class="tab-content-1" checked>
                <label for="tab-1"> Efectivo </label>
                <input type="radio" name="tabs" id="tab-2" class="tab-content-2">
                <label for="tab-2"> Cheque </label>
                <input type="radio" name="tabs" id="tab-3" class="tab-content-3">
                <label for="tab-3"> Tarjeta </label>

                <ul class="tab-content-container text-left">

                    <li class="tab-content-1">

                        <div class="l-container margin-0 border-radius-0">

                            <div class="l-row">

                                <div class="l-col-12">

                                    <div class="form-header">
                                    <div class="l-row">

                                        <div class="l-col-4">

                                            <div class="form-group">

                                                <label for="elsubtotal"> Sub Total </label> 
                                                <div class="l-pos-r">
                                                    {{ subtotal | number_format(2, ',', '.')  }}
                                                </div>                                                

                                            </div>

                                        </div>
                                        <div class="l-col-4">

                                            <div class="form-group">

                                                <label for="poriva"> Iva </label> 
                                                <div class="l-pos-r">
                                                    {{ iva | number_format(2, ',', '.')  }}
                                                </div>                                                

                                            </div>

                                        </div>
                                        <div class="l-col-4">

                                            <div class="form-group">

                                                <label for="apagar"> Valor a Pagar </label> 
                                                <div class="l-pos-r">
                                                    {{ apagar | number_format(2, ',', '.')  }}
                                                </div>                                                

                                            </div>

                                        </div>

                                    </div>
                                    </div>

                                    <div class="form-body">

                                        {{ form('ventas/pagar/' ~ 11, 'id':'consumo')}}

                                        <div class="l-row">

                                            <div class="l-col-12">

                                                <div class="form-group">

                                                    <label for="efectivo"> Valor Recibido </label> 

                                                    <div class="l-pos-r">
                                                        {{ form.render('efectivo', ['class': 'form-element form-element-icon','id':'efectivo', 'name':'efectivo', 'placeholder':'0' ]) }}
                                                        <i class="fa fa-money fa-absolute fa-background"></i> 

                                                    </div> 

                                                </div>

                                            </div>

                                        </div>

                                        <div class="l-row margin-0">

                                            <div class="l-col-12">

                                                <div class="form-group">

                                                    <input type="submit" value="PAGAR" id="submit" name="submit" class="btn btn-default  l-inline-block l-float-right">

                                                </div>

                                            </div>

                                        </div>

                                        </form>

                                    </div>

                                </div> <!-- end col -->

                            </div> <!-- end row -->	

                            <div>

                                </li>
                                <li class="tab-content-2">

                                    <div class="l-container margin-0 border-radius-0">

                                        <div class="l-row">

                                            <div class="l-col-12">

                                                <div class="form-header">

                                                    <h1 class="margin-bottom-0"> CHEQUE </h1>
                                                    <span> Sujeto a verificacion. <a href="#" class="text-info"> Verificando </a></span>

                                                </div>

                                                <div class="form-body">

                                                    {{ form('ventas/pagar/' ~ 12, 'id':'consumo')}}

                                                    <div class="l-row">

                                                        <div class="l-col-12">

                                                            <div class="form-group">

                                                                <label for="chNombre"> Nombre en el Cheque </label>  

                                                                <div class="l-pos-r">
                                                                    {{ form.render('chNombre', ['class': 'form-element form-element-icon','id':'chNombre', 'name':'chNombre', 'placeholder':'Nombre en el cheque' ]) }}
                                                                    <i class="fa fa-address fa-absolute fa-background"></i> 

                                                                </div> 

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="l-row">

                                                        <div class="l-col-12">

                                                            <div class="form-group">

                                                                <label for="chBanco"> Nombre del Banco </label>

                                                                <div class="l-pos-r">
                                                                    {{ form.render('chBanco', ['class': 'form-element form-element-icon','id':'chBanco', 'name':'chBanco', 'placeholder':'Nombre del Banco' ]) }}
                                                                    <i class="fa fa-building fa-absolute fa-background"></i>
                                                                </div> 


                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="l-row">

                                                        <div class="l-col-12">

                                                            <div class="form-group">

                                                                <label for="chCuenta"> # CUENTA </label>
                                                                <div class="l-pos-r"> 
                                                                    {{ form.render('chCuenta', ['class': 'form-element form-element-icon','id':'chCuenta', 'name':'chCuenta', 'placeholder':'Numero de cuenta' ]) }}
                                                                    <i class="fa fa-building-o fa-absolute fa-background"></i>
                                                                </div> 

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="l-row">

                                                        <div class="l-col-12">

                                                            <div class="form-group">

                                                                <label for="chNumero"> # CHEQUE </label>
                                                                <div class="l-pos-r"> 
                                                                    {{ form.render('chNumero', ['class': 'form-element form-element-icon','id':'chNumero', 'name':'chNumero', 'placeholder':'Numero del cheque' ]) }}
                                                                    <i class="fa fa-building-o fa-absolute fa-background"></i>
                                                                </div> 

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="l-row">

                                                        <div class="l-col-12">

                                                            <div class="form-group form-group-checkbox">

                                                                <label for="agreement"> 
                                                                    <input type="checkbox" class="form-element" id="agreement" name="agreement">
                                                                    <span class="check-svg-2"></span>
                                                                    <svg viewBox="-5.362 -7.374 42 42">

                                                                    <path class="check-start" d="M0,18.838c0,0,3.867,8.116,4.942,9.185"></path>
                                                                    <path class="check-end" d="M4.942,28.023c0,0,26.821-26.636,27.737-28.023"></path>

                                                                    </svg>

                                                                    Usted esta de acuerdo con las reglas de aceptacion de cheques.

                                                                </label>

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="l-row">

                                                        <div class="l-col-12">

                                                            <div class="form-group">

                                                                <input type="submit" value="PAGAR" id="submit" name="submit" class="btn btn-default  l-float-right">  

                                                            </div>

                                                        </div>

                                                    </div>

                                                    </form>

                                                </div>

                                            </div> <!-- end col -->

                                        </div> <!-- end row -->

                                    </div> <!-- end container -->

                                </li>

                                <li class="tab-content-3">

                                    <div class="l-container margin-0 border-radius-0">

                                        <div class="l-row">

                                            <div class="l-col-12">

                                                <div class="form-header">

                                                    <h1 class="margin-bottom-0"> PAGO CON TARJETA </h1>
                                                    <span> El servicio de pago con tarjetas solo sobre montos superiores s $20. </span>

                                                </div>

                                                <div class="form-body">

                                                    {{ form('ventas/pagar/' ~ 13, 'id':'consumo')}}

                                                    <div class="l-row">

                                                        <div class="l-col-12">

                                                            <div class="form-group">

                                                                <div class="l-pos-r">

                                                                    <label for="tjNombre"> Nombre en la Tarjeta </label>
                                                                    <div class="l-pos-r">
                                                                        {{ form.render('tjNombre', ['class': 'form-element form-element-icon','id':'tjNombre', 'name':'tjNombre', 'placeholder':'Nombre en el cheque' ]) }}
                                                                        <i class="fa fa-address-card fa-absolute fa-background"></i> 
                                                                    </div>

                                                                </div> 

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="l-row">

                                                        <div class="l-col-12">

                                                            <div class="form-group">

                                                                <div class="l-pos-r">

                                                                    <label for="tjBanco"> Emisor de la Tarjeta </label>

                                                                    <div class="l-pos-r">
                                                                        {{ form.render('tjBanco', ['class': 'form-element form-element-icon','id':'tjBanco', 'name':'tjBanco', 'placeholder':'Nombre en el cheque' ]) }}
                                                                        <input type="text" class="form-element form-element-icon recovery" id="r_emisor" name="r_emisor" placeholder="Banco emisor ">
                                                                        <i class="fa fa-building fa-absolute fa-background"></i> 
                                                                    </div>

                                                                </div> 

                                                            </div>

                                                        </div>

                                                        <div class="l-row">

                                                            <div class="l-col-12">

                                                                <div class="form-group">

                                                                    <div class="l-pos-r">

                                                                        <label for="tjFechaVence"> Fecha Vencimiento </label>

                                                                        <div class="l-pos-r">
                                                                            {{ form.render('tjFechaVence', ['class': 'form-element form-element-icon','id':'tjFechaVence', 'name':'tjFechaVence', 'placeholder':'Nombre en el cheque' ]) }}
                                                                            <i class="fa fa-calendar fa-absolute fa-background"></i> 
                                                                        </div>

                                                                    </div> 

                                                                </div>

                                                            </div>

                                                        </div>			                            </div>

                                                    <div class="l-row">

                                                        <div class="l-col-12">

                                                            <div class="form-group">

                                                                <input type="submit" value="PAGAR" id="submit" name="submit" class="btn btn-default  l-inline-block l-float-right margin-0">

                                                            </div>

                                                        </div>

                                                    </div>

                                                    </form>

                                                </div>

                                            </div> <!-- end col -->

                                        </div> <!-- end row -->

                                    </div>

                                </li>
                                </ul>

                            </div> <!-- end tab-container -->

                        </div>
                        <div class="col-md-6" id="solid-form-container" style="border-radius: 0; margin-top: 120px;">                                                                        
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-body">
                                        {{ form("", "id" : "solid-form") }}
                                        <fieldset>
                                            <header> Cliente </header>
                                            <section>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label for="listid">  Codigo Cliente </label>
                                                        <div class="centro">
                                                            {{ codigocliente }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label for="name">  Razon Social </label>
                                                        <div class="centro">{{ nombrecliente }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>

                                            <section>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label for="ruc">  ID Cliente </label>
                                                        <div class="centro">
                                                            {{ ruccliente }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label for="direccion">  Direccion Registrada </label>
                                                        <div class="centro">{{ direccioncliente }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>                        
                                        </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>

                    {% endblock %}
                    {% block cuerpoforma %}                            
                    {% endblock %}
