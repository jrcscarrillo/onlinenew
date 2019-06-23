{{ content() }}
{% include "layouts/cabecera.volt" %}
<div class="row full-width">

    <div class="col-md-12">
        {{ form('pedidostmp/saveventas', 'id': 'pedidosCabForm', 'class': 'sky-form') }}
        <fieldset>
            <section>
                <div class="row">
                    <div class="col col-4">
                        <div class="col col-sm-1">
                            {{ form.render('CustomerRef_ListID') }}
                        </div>
                        <div class="col col-sm-11">
                            <label>Cliente : </label>
                            {{ form.render('CustomerRef_FullName') }}
                        </div>
                    </div>
                    <div class="col col-4">
                        <div class="col col-sm-1">
                            {{ form.render('SalesRepRef_ListID') }}
                        </div>
                        <div class="col col-sm-11">
                            <label>Representante : </label>
                            {{ form.render('SalesRepRef_FullName') }}
                        </div>
                    </div>
                    <div class="col col-4">
                        <div class="col col-sm-1">
                            {{ form.render('TermsRef_ListID') }}
                        </div>
                        <div class="col col-sm-11">
                            <label>Plazo : </label>
                            {{ form.render('TermsRef_FullName') }}
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col col-4">
                        <div class="col col-sm-1"></div>
                        <div class="col col-sm-11">
                            <label>Fecha Pedido:</label>
                            {{ form.render('TxnDate') }}
                        </div>
                    </div>
                    <div class="col col-4">
                        <div class="col col-sm-1"></div>
                        <div class="col col-sm-11">
                            <label>Numero Pedido:</label>
                            {{ form.render('RefNumber') }}
                        </div>
                    </div>
                    <div class="col col-4">
                        <div class="col col-sm-1"></div>
                        <div class="col col-sm11">
                            <label>Fecha Pago:</label>
                            {{ form.render('DueDate') }}
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col col-8">
                        <div class="col col-sm-1"></div>
                        <div class="col col-sm-11">
                            <label>Observaciones:</label>
                            {{ form.render('Memo') }}
                        </div>
                    </div>
                    <div class="col col-4">
                        <div class="col col-sm-1"></div>
                        <div class="col col-sm-11">
                            <label>Orden Compra:</label>
                            {{ form.render('PONumber') }}
                        </div>
                    </div>
                </div>
            </section>
        </fieldset>
        <fieldset>
            <table class="table table-responsive table-bordered table-striped w-auto" align="center">
                <thead class="thead-dark">
                    <tr>
                        <th class="lead">Producto</th>
                        <th class="lead">Descripcion</th>
                        <th class="lead">Disponible</th>
                        <th class="lead">Precio Venta</th>
                        <th class="lead">A Pedir</th>
                        <th class="lead">Cortesia</th>
                        <th class="lead">Bonifica</th>
                    </tr>
                </thead>
                <tbody>
                    {% set l = 0 %}
                    {% for productos in helados %}
                        {% set campo = 'ingresa' ~ l %}
                        {% set campo1 = 'cortesia' ~ l %}
                        {% set campo2 = 'bonifica' ~ l %}
                        <tr>
                            <td>{{ productos['name'] }}</td>
                            <td>{{ productos['sales_desc'] }}</td>
                            <td>{{ productos['quantityOnHand'] }}</td>
                            <td>{{ productos['sales_price'] }}</td>
                            <td>
                                {{ numeric_field(campo) }}
                            </td>
                            <td>
                                {{ numeric_field(campo1) }}
                            </td>
                            <td>
                                {{ numeric_field(campo2) }}
                            </td>
                        </tr>
                        {% set l = l + 1 %}
                    {% endfor %}
                </tbody>
            </table>
        </fieldset>

        <footer>
            <div class="row">
                <div class="col col-2">
                </div>
                <div class="col col-4">
                    <label>IVA</label>
                    {{ form.render('tipo') }}
                </div>                
                <div class="col col-6">
                    {{ submit_button('Generar Pedido', 'class': 'btn btn-primary') }}
                    <p class="help-block">Usted esta generando un nuevo pedido.</p>
                </div>                
            </div>

        </footer>
        </form>
             {% include "layouts/footer.volt" %}
    </div>
