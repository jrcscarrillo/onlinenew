{{ content() }}
{{ elements.getModelosAdicional() }}
{% include "layouts/cabecera.volt" %}
<div class="wrapper solid-form">

    <div class="l-container w-100" id="solid-formve-container">

        <div class="l-row">
            <div class="l-col-6">
                <div class="form-body pad-0">        
                    {{ form('ventas/masproductos/' ~ ticket.RefNumber, 'id':'consumo')}}
                    <fieldset>
                        <legend> Productos </legend>
                        <div class="l-row">
                            <div class="l-col-7">

                                <div class="form-group">

                                    <label for="ItemRefListID"> Producto </label>

                                    <div class="l-pos-r">
                                        {{ form.render('ItemRefListID', ['class': 'form-element form-element-icon','id':'ItemRefListID', 'name':'ItemRefListID', 'placeholder':'Seleccione' ]) }}
                                        <i class="fa fa-product-hunt fa-absolute fa-background"></i>
                                    </div>

                                </div>

                            </div>
                            <div class="l-col-3">

                                <div class="form-group">

                                    <label for="qty"> Cantidad</label>

                                    <div class="l-pos-r">
                                        {{ form.render('qty', ['class': 'form-element form-element-icon','id':'qty', 'name':'qty', 'placeholder':'0' ]) }}
                                        <i class="fa fa-clone fa-absolute fa-background"></i>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="l-row">
                            <div class="l-col-12">
                                <div class="form-group">
                                    {{ submit_button('Aumentar Producto', 'class': 'btn btn-default') }}
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    </form>
                </div>
            </div> <!-- end col -->    
            <div class="l-col-6">
                <div class="form-body pad-0">
                    {{ form('ventas/cliente/' ~ ticket.RefNumber, 'id':'cliente')}}
                    <fieldset>
                        <legend> Caja </legend>

                        <div class="l-row">
                            <div class="l-col-12">
                                <table class="table table-responsive table-bordered table-striped table-hover w-auto" align="center">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th class="lead">Producto</th>
                                            <th class="lead">Qty</th>
                                            <th class="lead">Uni</th>
                                            <th class="lead">Total</th>
                                            <th class="lead">Eliminar</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {% set subtotal = 0 %}
                                        {% set iva = 0 %}
                                        {% set total = 0 %}
                                        {% for lineas in ticketline %}
                                            <tr>
                                                <td> {{ lineas.ItemRefFullName }} </td>
                                                <td> {{ lineas.Qty }} </td>
                                                <td> {{ lineas.Price }} </td>
                                                <td> {{ lineas.Price * lineas.Qty }} </td>
                                                <td> {{ link_to('ventas/delproducto/'~lineas.TxnLineID, '<i class="fa fa-times" aria-hidden="true"></i>') }} </td>
                                                <td></td>
                                            </tr>
                                            {% set subtotal = subtotal + (lineas.Qty * lineas.Price) %}
                                            {% set iva = iva + (12/100 * lineas.Qty * lineas.Price) %}
                                            {% set total = subtotal + iva %}
                                        {% endfor %}                                        
                                        <tr>
                                            <td colspan="3">Subtotal</td>
                                            <td> {{ subtotal }} </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">IVA</td>
                                            <td> {{ iva }} </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">A Pagar</td>
                                            <td> {{ total }} </td>
                                        </tr>
                                    <tbody>
                                </table>
                                {{ link_to("ventas/final/" ~ ticket.RefNumber, 'Consumidor Final', "class": "btn btn-info") }}
                                {{ link_to("customer/index/"  ~ ticket.RefNumber, 'Cliente', "class": "btn btn-default") }}

                            </div>
                        </div>


                    </fieldset>

                    </form>

                </div>

            </div> <!-- end col -->

        </div> <!-- end row -->

        <div class="l-row">

            <div class="l-col-12">
                <div class="form-body">
                    {{ form("ventas/index") }}
                    <fieldset>
                        <legend> FACTURA </legend>
                        <section>
                            <div class="l-row">
                                <div class="l-col-3">
                                    <h4> {{ ruc['NombreComercial']}} </h4>
                                    <h5> {{ ruc['ruc'] }} </h5>
                                    <h5>Establecimiento {{ ruc['estab'] }} Punto de Emision {{ ruc['punto'] }} </h5>
                                </div>
                                <div class="l-col-2">
                                    <div class="form-group">
                                        <label for="refNumber">  Numero del pedido </label>
                                        <div class="l-pos-r">
                                            {{ ticket.RefNumber }}
                                        </div>
                                        <br>
                                        <label for="fnumero">  Numero de la Factura</label>
                                        <div class="l-pos-r">
                                            {{ ticket.Fnumero }}
                                        </div>
                                        <br>
                                        <label for="gnumero">  Numero de la Guia</label>
                                        <div class="l-pos-r">
                                            {{ ticket.Gnumero }}
                                        </div>
                                    </div>
                                </div>
                                <div class="l-col-2">
                                    <div class="form-group">
                                        <label for="txnDate">  Fecha Emision</label>
                                        <div class="l-pos-r">{{ ticket.TxnDate }}
                                        </div>
                                        <br>
                                        <label for="frecuencia">  Frecuencia Emision </label>
                                        <div class="l-pos-r">{{ ticket.Ffrecuencia }}
                                        </div>
                                        <br>
                                        <label for="formapago">  Forma de Pago </label>
                                        <div class="l-pos-r">{{ ticket.Fplazo }}
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <div class="l-col-5">
                                    <div class="form-group">
                                        <label for="referencia">  Referencia </label>
                                        <div class="l-pos-r">{{ ticket.Referencia}}
                                        </div>
                                        <br>
                                        <label for="notascomprador">  Notas al Comprador </label>
                                        <div class="l-pos-r">{{ ticket.NotasComprador }}
                                        </div>
                                        <br>
                                        <label for="condiciones">  Terminos y Condiciones </label>
                                        <div class="l-pos-r">{{ ticket.TerminosCondiciones }}
                                        </div>
                                        <br>
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
