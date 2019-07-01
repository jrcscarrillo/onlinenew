<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("aticket/index", "Go Back") }}</li>
            <li class="next">{{ link_to("aticket/new", "Create ") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Search result</h1>
</div>

{{ content() }}

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>TxnID</th>
            <th>TimeCreated</th>
            <th>TimeModified</th>
            <th>TxnDate</th>
            <th>Estab</th>
            <th>Punto</th>
            <th>RefNumber</th>
            <th>NroFactura</th>
            <th>SubTotal</th>
            <th>ConIva</th>
            <th>SinIva</th>
            <th>Iva</th>
            <th>Single</th>
            <th>NroCaja</th>
            <th>CustomerRefListID</th>
            <th>CustomerRefFullName</th>
            <th>Ftipo</th>
            <th>Festab</th>
            <th>Fpunto</th>
            <th>Fnumero</th>
            <th>Ffrecuencia</th>
            <th>Fplazo</th>
            <th>Gtipo</th>
            <th>Gestab</th>
            <th>Gpunto</th>
            <th>Gnumero</th>
            <th>Referencia</th>
            <th>NotasComprador</th>
            <th>TerminosCondiciones</th>
            <th>Estado</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for aticket in page.items %}
            <tr>
                <td>{{ aticket.getTxnid() }}</td>
            <td>{{ aticket.getTimecreated() }}</td>
            <td>{{ aticket.getTimemodified() }}</td>
            <td>{{ aticket.getTxndate() }}</td>
            <td>{{ aticket.getEstab() }}</td>
            <td>{{ aticket.getPunto() }}</td>
            <td>{{ aticket.getRefnumber() }}</td>
            <td>{{ aticket.getNrofactura() }}</td>
            <td>{{ aticket.getSubtotal() }}</td>
            <td>{{ aticket.getConiva() }}</td>
            <td>{{ aticket.getSiniva() }}</td>
            <td>{{ aticket.getIva() }}</td>
            <td>{{ aticket.getSingle() }}</td>
            <td>{{ aticket.getNrocaja() }}</td>
            <td>{{ aticket.getCustomerreflistid() }}</td>
            <td>{{ aticket.getCustomerreffullname() }}</td>
            <td>{{ aticket.getFtipo() }}</td>
            <td>{{ aticket.getFestab() }}</td>
            <td>{{ aticket.getFpunto() }}</td>
            <td>{{ aticket.getFnumero() }}</td>
            <td>{{ aticket.getFfrecuencia() }}</td>
            <td>{{ aticket.getFplazo() }}</td>
            <td>{{ aticket.getGtipo() }}</td>
            <td>{{ aticket.getGestab() }}</td>
            <td>{{ aticket.getGpunto() }}</td>
            <td>{{ aticket.getGnumero() }}</td>
            <td>{{ aticket.getReferencia() }}</td>
            <td>{{ aticket.getNotascomprador() }}</td>
            <td>{{ aticket.getTerminoscondiciones() }}</td>
            <td>{{ aticket.getEstado() }}</td>

                <td>{{ link_to("aticket/edit/"~aticket.getTxnid(), "Edit") }}</td>
                <td>{{ link_to("aticket/delete/"~aticket.getTxnid(), "Delete") }}</td>
            </tr>
        {% endfor %}
        {% endif %}
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            {{ page.current~"/"~page.total_pages }}
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li>{{ link_to("aticket/search", "First") }}</li>
                <li>{{ link_to("aticket/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("aticket/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("aticket/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
