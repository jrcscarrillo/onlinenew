{{ content() }}
{% include "layouts/cabecera.volt" %}
<div class="w-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-2">
                {{ link_to("pedidos/index", "&larr; Atras", "class": "btn btn-warning") }}
            </div>
            <div class="col col-md-1">
            </div>
            <div class="col col-md-2">
                <div class="btn-group " role="group" aria-label="Basic example">
                    {{ link_to("pedidos/search", '<i class="icon-fast-backward"></i> Inicio', "class": "btn btn-warning") }}
                    {{ link_to("pedidos/search?page=" ~ page.before, '<i class="icon-step-backward"></i> Ant.', "class": "btn btn-info") }}
                    {{ link_to("pedidos/search?page=" ~ page.next, '<i class="icon-step-forward"></i> Prox.', "class": "btn btn-warning") }}
                    {{ link_to("pedidos/search?page=" ~ page.last, '<i class="icon-fast-forward"></i> Fin', "class": "btn btn-info") }}

                </div>
            </div>
            <div class="col col-md-1">
            </div>
            <div class="col col-md-3">
                <p class="btn btn-outline-primary">Pagina {{ page.current }} de {{ page.total_pages }} paginas</p>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-xs-12">
            <table class="table table-responsive table-bordered table-striped table-hover w-auto" align="center">
                <thead class="thead-dark font-weight-bold">
                    <tr>
                        <th class="lead">Cliente Nombres/Razon </th>
                        <th class="lead">Fecha Emision</th>
                        <th class="lead">Numero Pedido</th>
                        <th class="lead">Orden Compra</th>
                        <th class="lead">Representante</th>
                        <th class="lead">Subtotal</th>
                        <th class="lead">IVA</th>
                        <th class="lead">Total</th>
                        <th class="lead">Estado</th>

                        <th class="lead">Pasar a QB</th>
                        <th class="lead">Print</th>
                    </tr>
                </thead>
                <tbody>
                    {% if page.items is defined %}
                        {% for pedido in page.items %}
                            <tr>
                                <td>{{ pedido.getCustomerrefFullname() }}</td>
                                <td>{{ pedido.getTxndate() }}</td>
                                <td>{{ pedido.getRefnumber() }}</td>
                                <td>{{ pedido.getPonumber() }}</td>
                                <td>{{ pedido.getSalesreprefFullname() }}</td>
                                <td>{{ pedido.getSubtotal() | number_format(2, ',', '.') }}</td>
                                <td>{{ pedido.getSalestaxtotal() | number_format(2, ',', '.') }}</td>
                                <td>{{ pedido.getTotalamount() | number_format(2, ',', '.') }}</td>
                                <td>{{ pedido.getStatus() }}</td>

                                <td>{{ link_to("pedidos/edit/" ~ pedido.getRefnumber(), '<i class="fa fa-upload" aria-hidden="true" style="font-size:24px;color:green;"></i>') }}</td>
                                <td>{{ link_to("pedidos/delete/" ~ pedido.getRefnumber(), '<i class="fa fa-print" aria-hidden="true" style="font-size:24px;color:green;"></i>') }}</td>
                            </tr>
                        {% endfor %}
                    {% endif %}
                </tbody>
            </table>
        </div>
    </div>
    {% include "layouts/footer.volt" %}
</div>

