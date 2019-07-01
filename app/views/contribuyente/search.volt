{{ content() }}
{% include "layouts/cabecera.volt" %}
<div class="w-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-2">
                {{ link_to("contribuyente/index", "&larr; Atras", "class": "btn btn-warning") }}
            </div>
            <div class="col col-md-3">
                {{ link_to("contribuyente/new", "Agregar Contribuyente" , "class": "btn btn-info") }}
            </div>

            <div class="col col-md-1">
            </div>
            <div class="col col-md-2">
                <div class="btn-group " role="group" aria-label="Basic example">
                    {{ link_to("contribuyente/search", '<i class="icon-fast-backward"></i> Inicio', "class": "btn btn-warning") }}
                    {{ link_to("contribuyente/search?page=" ~ page.before, '<i class="icon-step-backward"></i> Ant.', "class": "btn btn-info") }}
                    {{ link_to("contribuyente/search?page=" ~ page.next, '<i class="icon-step-forward"></i> Prox.', "class": "btn btn-warning") }}
                    {{ link_to("contribuyente/search?page=" ~ page.last, '<i class="icon-fast-forward"></i> Fin', "class": "btn btn-info") }}

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
                        <th class="lead">Ruc</th>
                        <th class="lead">Razon</th>
                        <th class="lead">NombreComercial</th>
                        <th class="lead">DirMatriz</th>
                        <th class="lead">DirEmisor</th>
                        <th class="lead">Estab</th>
                        <th class="lead">Punto</th>
                        <th class="lead">Ambiente</th>
                        <th class="lead">Emision</th>
                        <th class="lead">Editar</th>
                        <th class="lead">Borrar</th>
                        <th class="lead">Selecc</th>
                    </tr>
                </thead>
                <tbody>
                    {% if page.items is defined %}
                        {% for contribuyente in page.items %}
                            <tr>
                                <td>{{ contribuyente.Ruc }}</td>
                                <td>{{ contribuyente.Razon }}</td>
                                <td>{{ contribuyente.NombreComercial }}</td>
                                <td>{{ contribuyente.DirMatriz }}</td>
                                <td>{{ contribuyente.DirEmisor }}</td>
                                <td>{{ contribuyente.CodEmisor }}</td>
                                <td>{{ contribuyente.Punto }}</td>
                                <td>{{ contribuyente.Ambiente }}</td>
                                <td>{{ contribuyente.Emision }}</td>

                                <td style="text-align:center;">{{ link_to("contribuyente/edit/"~contribuyente.Id, '<i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size:24px;color:green;"></i>') }}</td>
                                <td style="text-align:center;">{{ link_to("contribuyente/delete/"~contribuyente.Id, '<i class="fa fa-trash-o" aria-hidden="true" style="font-size:24px;color:green;"></i>') }}</td>
                                <td style="text-align:center;">{{ link_to("contribuyente/seleccion/"~contribuyente.Id, '<i class="fa fa-check-circle-o" aria-hidden="true"  style="font-size:24px;color:green;"></i>') }}</td>
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
               