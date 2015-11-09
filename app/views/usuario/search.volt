
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("usuario/index", "Go Back") }}
        </td>
        <td align="right">
            {{ link_to("usuario/new", "Create ") }}
        </td>
    </tr>
</table>

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Idusuario</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dpi</th>
            <th>Idcondominio</th>
            <th>Puesto</th>
            <th>Idtipos Of Usuario</th>
            <th>Idvehiculo</th>
            <th>Fotografia</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for usuario in page.items %}
        <tr>
            <td>{{ usuario.idusuario }}</td>
            <td>{{ usuario.nombre }}</td>
            <td>{{ usuario.apellido }}</td>
            <td>{{ usuario.dpi }}</td>
            <td>{{ usuario.idcondominio }}</td>
            <td>{{ usuario.puesto }}</td>
            <td>{{ usuario.idtipos_usuario }}</td>
            <td>{{ usuario.idvehiculo }}</td>
            <td>{{ usuario.fotografia }}</td>
            <td>{{ link_to("usuario/edit/"~usuario.idusuario, "Edit") }}</td>
            <td>{{ link_to("usuario/delete/"~usuario.idusuario, "Delete") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("usuario/search", "First") }}</td>
                        <td>{{ link_to("usuario/search?page="~page.before, "Previous") }}</td>
                        <td>{{ link_to("usuario/search?page="~page.next, "Next") }}</td>
                        <td>{{ link_to("usuario/search?page="~page.last, "Last") }}</td>
                        <td>{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
