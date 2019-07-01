{{ content() }}
{% include "layouts/cabecera.volt" %}
<div class="w-100">
    <div class="card">
        <div class="row card-header"> 
            <div class="col col-md-2">
                {{ link_to("customer/index", "&larr; Atras", "class": "btn btn-warning") }}
            </div>
            <div class="col col-md-3">
                {{ link_to("customer/new", "Agregar Cliente" , "class": "btn btn-info") }}
            </div>

            <div class="col col-md-1">
            </div>
            <div class="col col-md-2">
                <div class="btn-group " role="group" aria-label="Basic example">
                    {{ link_to("customer/search", '<i class="icon-fast-backward"></i> Inicio', "class": "btn btn-warning") }}
                    {{ link_to("customer/search?page=" ~ page.before, '<i class="icon-step-backward"></i> Ant.', "class": "btn btn-info") }}
                    {{ link_to("customer/search?page=" ~ page.next, '<i class="icon-step-forward"></i> Prox.', "class": "btn btn-warning") }}
                    {{ link_to("customer/search?page=" ~ page.last, '<i class="icon-fast-forward"></i> Fin', "class": "btn btn-info") }}

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
                        <th class="lead">Nombre Comercial</th>
                        <th width="30%">Direccion</th>
                        <th>Phone</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th class="lead">RUC/Ced</th>
                        <th>Nuevo Pedido</th>
                        <th>Consulta Pedidos</th>
                    </tr>
                </thead>
                <tbody>
                    {% if page.items is defined %}
                        {% for customer in page.items %}
                            <tr>
                                <td>{{ customer.getCompanyname() }}</td>
                                <td>{{ customer.getBilladdressAddr1() ~ ' ' ~ customer.getBilladdressCity() ~ ' ' ~ customer.getBilladdressState() ~ ' ' ~ customer.getBilladdressPostalcode() ~ customer.getBilladdressCountry() }}</td>
                                <td>{{ customer.getPhone() }}</td>
                                <td>{{ customer.getMobile() }}</td>
                                <td>{{ customer.getEmail() }}</td>
                                <td>{{ customer.getAccountnumber() }}</td>
                                <td width="2%">{{ link_to("ventas/index/"~customer.getListid(), '<i class="fa fa-plus-square-o" aria-hidden="true" style="font-size:24px;color:green;"></i>') }}</td>
                                <td width="2%">{{ link_to("pedidos/searchventas/"~customer.getListid(), '<i class="fa fa-list" aria-hidden="true" style="font-size:24px;color:green;"></i>') }}</td>
                            </tr>
                        {% endfor %}
                    {% else %}
                        No se han encontrado al cliente o clientes con esos parametros
                    {% endif %}
                </tbody>
            </table>
        </div>
    </div>
    {% include "layouts/footer.volt" %}
</div> 
