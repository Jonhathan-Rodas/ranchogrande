<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("visitantes/index", "Go Back") }}</li>
            <li class="next">{{ link_to("visitantes/new", "Create ") }}</li>
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
                <th>Idvisitante</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Entrada</th>
            <th>Salida</th>
            <th>Idcondominio</th>
            <th>Placa</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        {% if page.items is defined %}
        {% for visitante in page.items %}
            <tr>
                <td>{{ visitante.idvisitante }}</td>
            <td>{{ visitante.nombre }}</td>
            <td>{{ visitante.apellido }}</td>
            <td>{{ visitante.entrada }}</td>
            <td>{{ visitante.salida }}</td>
            <td>{{ visitante.idcondominio }}</td>
            <td>{{ visitante.placa }}</td>

                <td>{{ link_to("visitantes/edit/"~visitante.idvisitante, "Edit") }}</td>
                <td>{{ link_to("visitantes/delete/"~visitante.idvisitante, "Delete") }}</td>
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
                <li>{{ link_to("visitantes/search", "First") }}</li>
                <li>{{ link_to("visitantes/search?page="~page.before, "Previous") }}</li>
                <li>{{ link_to("visitantes/search?page="~page.next, "Next") }}</li>
                <li>{{ link_to("visitantes/search?page="~page.last, "Last") }}</li>
            </ul>
        </nav>
    </div>
</div>
