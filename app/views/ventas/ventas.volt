{% extends "layouts/fullscreen.volt" %}
{% block forma %}
    {{ content() }}
{% endblock %}
{% block cabecera %}
    <div class="l-container w-100" id="solid-formve-container">

        <div class="l-row">
            <div class="l-col-6">
                <div class="form-body">        
                    {{ form('vendor/aumenta', 'id':'consumo')}}
                {% endblock %}
                {% block cuerpoforma %}
                    <fieldset>
                        <legend> Productos </legend>
                        <div class="l-row">

                            <div class="l-col-3">

                                <div class="form-group">

                                    <label for="qty"> Cantidad</label>

                                    <div class="l-pos-r">
                                        {{ numeric_field('class':'form-element form-element-icon', 'id':'qty', 'name':'qty', 'placeholder':'0' ) }}
                                        <i class="fa fa-clone fa-absolute fa-background"></i>
                                    </div>

                                </div>

                            </div>

                            <div class="l-col-7">

                                <div class="form-group">

                                    <label for="item"> Producto </label>

                                    <div class="l-pos-r">
                                        {{ text_field('class':'form-element form-element-icon', 'id':'item', 'name':'item', 'placeholder':'Codigo Barras' ) }}
                                        <i class="fa fa-product-hunt fa-absolute fa-background"></i>
                                    </div>

                                </div>

                            </div>

                            <div class="l-col-1">
                                {{ link_to("ventas/consumo", "title":"Consumo", '<i class="fa fa-sort-numeric-asc"></i></a>' ) }}
                            </div>                       
                            <div class="l-col-1">
                                {{ link_to("ventas/alfa", "title":"Alfa", '<i class="fa fa-sort-alpha-asc"></i></a>' ) }}
                            </div>                       
                            <div class="l-col-1">
                                {{ link_to("ventas/grupo", "title":"Grupo", '<i class="fa fa-sort-asc"></i></a>' ) }}
                            </div>                       
                        </div>

                        {% set fila = 0 %}
                        {% set directorio = 'https://carrillosteam.com/public/img/' %}
                        {% set l = 0 %}
                        {% for productos in helados %}
                            {% if fila === 0 %}
                                <div class="l-row">
                                {% endif %}
                                <div class="l-col-2">
                                    {% set mi_imagen = image(directorio + productos['ImageFile'])  %}
                                    {{ link_to('ventas/aumenta/'~ productos['ListID'], mi_imagen ) }}
                                    <div>
                                        <ul>
                                            <li class="nombreproducto">
                                                {{ productos['SalesDesc']}}
                                            </li>
                                            <li class="precioproducto">
                                                {{ productos['SalesPrice'] }} 
                                            </li>
                                        </ul>
                                    </div>
                                </div>                        
                                {% set fila = fila + 1 %}
                                {% if fila === 6 %}
                                    {% set fila = 0 %}
                                </div>
                            {% endif %}
                        {% endfor %}                        
                        <div class="l-row">
                            <div class="l-col-12">
                                <div class="form-group">
                                    {{ submit_button('Buscar', 'class': 'btn btn-default') }}
                                    {{ link_to("vendor/new", 'Nuevo', "class": "btn btn-info") }}
                                </div>
                            </div>
                        </div>

                        </form>
                </div>
            </div> <!-- end col -->
            <div class="l-col-6">
                <div class="form-body">
                    <form action="" id="forma-ventas">
                        <fieldset>
                            <legend> Caja </legend>
                            <div class="l-row">
                                <table class="coqueiros table-responsive table-bordered table-striped table-hover" align="center">
                                    <thead class="coloreando" style="background-color: brown">
                                        <tr>
                                            <th width="52%">Producto</th>
                                            <th width="12%">Qty</th>
                                            <th width="12%">Uni</th>
                                            <th width="22%">Total</th>
                                            <th width="2%">Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {% set subtotal = 0 %}
                                        {% set iva = 0 %}
                                        {% set total = 0 %}
                                        {% for lineas in cajas %}
                                            <tr>
                                                <td> {{ lineas['SalesDesc'] }} </td>
                                                <td> {{ lineas['qty'] }} </td>
                                                <td> {{ lineas['SalesPrice'] }} </td>
                                                <td> {{ lineas['SalesPrice'] * lineas['qty']}} </td>
                                                <td width="2%"> {{ link_to('ventas/elimina/'~lineas['ListID'], '<i class="fa fa-times" aria-hidden="true"></i>' ) }} </td>
                                            </tr>
                                            {% set subtotal = subtotal + (lineas['qty'] * lineas['SalesPrice']) %}
                                            {% set iva = iva + (12/100 * lineas['qty'] * lineas['SalesPrice']) %}
                                            {% set total = subtotal + iva %}
                                        {% endfor %}                                        
                                    </tbody>
                                    <tbody>
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
                                {{ link_to("ventas/final", 'Consumidor Final', "class": "btn btn-info") }}
                                {{ link_to("ventas/cliente", 'Cliente', "class": "btn btn-default") }}

                            </div>


                        </fieldset>

                    </form>

                </div>

            </div> <!-- end col -->

        </div> <!-- end row -->
    </div> <!-- end container -->                                    
{% endblock %}