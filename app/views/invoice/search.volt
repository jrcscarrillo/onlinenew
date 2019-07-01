{{ content() }}
{% include "layouts/cabecera.volt" %}
<div class="w-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-2">
                {{ link_to("invoice/index", "&larr; Atras", "class": "btn btn-warning") }}
            </div>

            <div class="col col-md-1">
            </div>
            <div class="col col-md-2">
                <div class="btn-group " role="group" aria-label="Basic example">
                    {{ link_to("invoice/search", '<i class="icon-fast-backward"></i> Inicio', "class": "btn btn-warning") }}
                    {{ link_to("invoice/search?page=" ~ page.before, '<i class="icon-step-backward"></i> Ant.', "class": "btn btn-info") }}
                    {{ link_to("invoice/search?page=" ~ page.next, '<i class="icon-step-forward"></i> Prox.', "class": "btn btn-warning") }}
                    {{ link_to("invoice/search?page=" ~ page.last, '<i class="icon-fast-forward"></i> Fin', "class": "btn btn-info") }}

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
                <thead class="font-weight-bold">
                    <tr class="table-warning">
                        <th class="lead">Direccion</th>
                        <th class="lead">Nombres/Razon </th>
                        <th class="col col-md-1" witdh="10%">Fecha Emision</th>
                        <th class="col col-md-1">Numero Factura</th>
                        
                        <th>Vendedor</th>
                        <th>Subtotal</th>
                        <th>Valor IVA</th>
                        <th>Total</th>
                        <th class="lead">Estado SRI</th>

                        <th>Firma</th>
                        <th>Autoriza</th>
                        <th>Imprime</th>
                    </tr>
                </thead>
                <tbody>
                    {% if page.items is defined%}
                        {% for miscodigos in page.items %}
                            {% set fecha = date('F j, Y', strtotime(miscodigos.getTxnDate()))%}
                            <tr>
                                <td>{{ miscodigos.getBilladdressAddr1() }}</td>
                                <td>{{ miscodigos.getCustomerrefFullname() }}</td>
                                <td>{{ fecha }}</td>
                                <td>{{ miscodigos.getTxnNumber() }}</td>
                                
                                <td>{{ miscodigos.getSalesreprefFullname() }}</td>
                                <td>{{ miscodigos.getSubtotal() | number_format(2, ',', '.') }}</td>
                                <td>{{ miscodigos.getSalestaxtotal() | number_format(2, ',', '.') }}</td>
                                <td>{{ miscodigos.getAppliedamount() | number_format(2, ',', '.') }}</td>
                                <td>{{ miscodigos.getCustomField15() }}</td>
                                <td width="2%">{{ link_to("invoice/firmar/" ~ miscodigos.getTxnid(), '<i class="fa fa-pencil-square-o" aria-hidden="true"></i>', "class": "btn btn-outline-primary") }}</td>
                                <td width="2%">{{ link_to("invoice/autorizar/" ~ miscodigos.getTxnid(), '<i class="fa fa-certificate" aria-hidden="true"></i>', "class": "btn btn-outline-primary") }}</td>
                                <td width="2%">{{ link_to("invoice/impresion/" ~ miscodigos.getTxnid(), '<i class="fa fa-print" aria-hidden="true"></i>', "class": "btn btn-outline-primary") }}</td>
                            </tr>
                        </tbody>
                    {% endfor %}
                {% else %}
                    No se han encontrado facturas sincronizadas desde el Quickbooks
                {% endif %}
            </table>
        </div>
    </div>
</div>
