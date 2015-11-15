
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("acceso/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("acceso/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse table table-striped" >
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Condominio</th>
            <th>Placa</th>
            <th>Tipo</th>
            <th>Datos de Acceso</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for acceso in page.items %}
        <tr>
            <td>{{ acceso.usuario.nombre }} {{ acceso.usuario.apellido }}</td>
            <td>{{ acceso.usuario.condominio.nombre }}</td>
            <td>{{ acceso.usuario.vehiculo.placa }}</td>
            <td>{{ acceso.usuario.vehiculo.tipos_vehiculo.tipo }}</td>
            <td>
                {% if  acceso.tipo == 1 %}
                   <span class="alert-success" > Entrada:  {{ acceso.time }} </span>
                {% else %}
                  <span class="alert-warning">  Salida:  {{ acceso.time }} </span>
                {% endif %}
            </td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("acceso/search", "First") }}</td>
                        <td>{{ link_to("acceso/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("acceso/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("acceso/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
