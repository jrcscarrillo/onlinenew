<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("itemservice/index", "Go Back") }}</li>
            <li class="next">{{ link_to("itemservice/new", "Create ") }}</li>
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
                <th>ListID</th>
            <th>TimeCreated</th>
            <th>TimeModified</th>
            <th>EditSequence</th>
            <th>Name</th>
            <th>FullName</th>
            <th>BarCodeValue</th>
            <th>IsActive</th>
            <th>ClassRef Of ListID</th>
            <th>ClassRef Of FullName</th>
            <th>ParentRef Of ListID</th>
            <th>ParentRef Of FullName</th>
            <th>Sublevel</th>
            <th>UnitOfMeasureSetRef Of ListID</th>
            <th>UnitOfMeasureSetRef Of FullName</th>
            <th>IsTaxIncluded</th>
            <th>SalesTaxCodeRef Of ListID</th>
            <th>SalesTaxCodeRef Of FullName</th>
            <th>CustomField1</th>
            <th>CustomField2</th>
            <th>CustomField3</th>
            <th>CustomField4</th>
            <th>CustomField5</th>
            <th>CustomField6</th>
            <th>CustomField7</th>
            <th>CustomField8</th>
            <th>CustomField9</th>
            <th>CustomField10</th>
            <th>CustomField11</th>
            <th>CustomField12</th>
            <th>CustomField13</th>
            <th>CustomField14</th>
            <th>CustomField15</th>
            <th>Status</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for itemservice in page.items %}
            <tr>
                <td>{{ itemservice.getListid() }}</td>
            <td>{{ itemservice.getTimecreated() }}</td>
            <td>{{ itemservice.getTimemodified() }}</td>
            <td>{{ itemservice.getEditsequence() }}</td>
            <td>{{ itemservice.getName() }}</td>
            <td>{{ itemservice.getFullname() }}</td>
            <td>{{ itemservice.getBarcodevalue() }}</td>
            <td>{{ itemservice.getIsactive() }}</td>
            <td>{{ itemservice.getClassrefListid() }}</td>
            <td>{{ itemservice.getClassrefFullname() }}</td>
            <td>{{ itemservice.getParentrefListid() }}</td>
            <td>{{ itemservice.getParentrefFullname() }}</td>
            <td>{{ itemservice.getSublevel() }}</td>
            <td>{{ itemservice.getUnitofmeasuresetrefListid() }}</td>
            <td>{{ itemservice.getUnitofmeasuresetrefFullname() }}</td>
            <td>{{ itemservice.getIstaxincluded() }}</td>
            <td>{{ itemservice.getSalestaxcoderefListid() }}</td>
            <td>{{ itemservice.getSalestaxcoderefFullname() }}</td>
            <td>{{ itemservice.getCustomfield1() }}</td>
            <td>{{ itemservice.getCustomfield2() }}</td>
            <td>{{ itemservice.getCustomfield3() }}</td>
            <td>{{ itemservice.getCustomfield4() }}</td>
            <td>{{ itemservice.getCustomfield5() }}</td>
            <td>{{ itemservice.getCustomfield6() }}</td>
            <td>{{ itemservice.getCustomfield7() }}</td>
            <td>{{ itemservice.getCustomfield8() }}</td>
            <td>{{ itemservice.getCustomfield9() }}</td>
            <td>{{ itemservice.getCustomfield10() }}</td>
            <td>{{ itemservice.getCustomfield11() }}</td>
            <td>{{ itemservice.getCustomfield12() }}</td>
            <td>{{ itemservice.getCustomfield13() }}</td>
            <td>{{ itemservice.getCustomfield14() }}</td>
            <td>{{ itemservice.getCustomfield15() }}</td>
            <td>{{ itemservice.getStatus() }}</td>

                <td>{{ link_to("itemservice/edit/"~itemservice.getListid(), "Edit") }}</td>
                <td>{{ link_to("itemservice/delete/"~itemservice.getListid(), "Delete") }}</td>
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
                <li>{{ link_to("itemservice/search", "First") }}</li>
                <li>{{ link_to("itemservice/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("itemservice/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("itemservice/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
