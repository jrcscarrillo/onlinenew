{{ content() }}
{% include "layouts/cabecera.volt" %}
<div class="row full-width">

    <div class="col-md-12">
        {{ form('pedidostmp/pasaventas', 'id': 'pedidosokForm', 'class': 'sky-form') }}
        <fieldset>
            <section>
                <div class="row">
                    <div class="col col-4">
                        <div class="col col-sm-1 invisible">
                            {{ pedido.getCustomerRefListID() }}
                        </div>
                        <div class="col col-sm-11">
                            <label>Cliente : </label>
                            {{ pedido.getCustomerRefFullName() }}
                        </div>
                    </div>
                    <div class="col col-4">
                        <div class="col col-sm-1 invisible">
                            {{ pedido.getSalesRepRefListID() }}
                        </div>
                        <div class="col col-sm-11">
                            <label>Representante : </label>
                            {{ pedido.getSalesRepRefFullName() }}
                        </div>
                    </div>
                    <div class="col col-4">
                        <div class="col col-sm-1 invisible">
                            {{ pedido.getTermsRefListID() }}
                        </div>
                        <div class="col col-sm-11">
                            <label>Plazo : </label>
                            {{ pedido.getTermsRefFullName() }}
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
                            {{ pedido.getTxnDate() }}
                        </div>
                    </div>
                    <div class="col col-4">
                        <div class="col col-sm-1"></div>
                        <div class="col col-sm-11">
                            <label>Numero Pedido:</label>
                            {{ pedido.getRefNumber() }}
                        </div>
                    </div>
                    <div class="col col-4">
                        <div class="col col-sm-1"></div>
                        <div class="col col-sm11">
                            <label>Fecha Pago:</label>
                            {{ pedido.getDueDate() }}
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col col-4">
                        <div class="col col-sm-1"></div>
                        <div class="col col-sm-11">
                            <label>Subtotal:</label>
                            {{ pedido.getSubtotal() | number_format(2, ',', '.') }}
                        </div>
                    </div>
                    <div class="col col-4">
                        <div class="col col-sm-1"></div>
                        <div class="col col-sm-11">
                            <label>IVA:</label>
                            {{ pedido.getSalesTaxTotal() | number_format(2, ',', '.') }}
                        </div>
                    </div>
                    <div class="col col-4">
                        <div class="col col-sm-1"></div>
                        <div class="col col-sm11">
                            <label>Valor Pedido:</label>
                            {{ pedido.getTotalAmount() | number_format(2, ',', '.') }}
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
                            {{ pedido.getMemo() }}
                        </div>
                    </div>
                    <div class="col col-4">
                        <div class="col col-sm-1"></div>
                        <div class="col col-sm-11">
                            <label>Orden Compra:</label>
                            {{ pedido.getPONumber() }}
                        </div>
                    </div>
                </div>
            </section>
        </fieldset>
        <fieldset>
            <table class="table table-responsive table-bordered table-striped" align="center">
                <thead class="coloreando" style="background-color: brown">
                    <tr>
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th>Precio Venta</th>
                        <th>Valor</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <tbody>

                    {% for productos in pedido.pedidosdetalle %}
                        <tr>
                            <td>{{ productos.getDescription() }}</td>
                            <td>{{ productos.getQuantity() | number_format(2, ',', '.') }}</td>
                            <td>{{ productos.getRate() | number_format(2, ',', '.') }}</td>
                            <td>{{ productos.getAmount() | number_format(2, ',', '.') }}</td>
                            {% if productos.getRate() > 0 %}
                                <td>Pedido</td>
                            {% else %}
                                <td>Cortesia</td>
                            {% endif %}
                        </tr>
                    {% endfor %}
                    {% for bonificas in pedido.bonificadetalle %}
                        <tr>
                            <td>{{ bonificas.getDescription() }}</td>
                            <td>{{ bonificas.getQuantity() | number_format(2, ',', '.') }}</td>
                            <td>{{ bonificas.getRate() | number_format(2, ',', '.') }}</td>
                            <td>{{ bonificas.getAmount() | number_format(2, ',', '.') }}</td>
                            <td>Bonifica</td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
        </fieldset>

        <footer>
            <div class="row">
                <div class="col col-md-3">
                </div>
                <div class="col col-md-5">
                    <div class="btn-group " role="group" aria-label="Basic example">
                        {{ link_to("pedidostmp/pasaventas/", '<i class="fa fa-thumbs-o-up fa-3x" aria-hidden="true"></i>Aprobar Pedido', "class": "btn btn-primary") }}
                        {{ link_to("pedidostmp/eliminar/", '<i class="fa fa-trash-o fa-3x" aria-hidden="true"></i>Eliminar Pedido', "class": "btn btn-danger") }}
                        {{ link_to("pedidostmp/corregir/", '<i class="fa fa-pencil-square-o fa-3x" aria-hidden="true"></i>Corregir Pedido', "class": "btn btn-warning") }}

                    </div>
                </div>
                <div class="col col-md-4">
                </div>
            </div>            

        </footer>
        </form>
        {% include "layouts/footer.volt" %}
    </div>
