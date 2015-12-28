
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("usuario/index" , "Buscar", "class" : "btn btn-default") }}

        </td>
        <td align="right">
            {{ link_to("tipos_usuario/search", "Ir a: Tipos de Usuario", "class" : "btn btn-primary") }}

            {{ link_to("usuario/new", "Agregar un Nuevo Usuario", "class" : "btn btn-success") }}
        </td>
    </tr>
</table>

<table class="browse table table-striped" align="center">
    <thead>
        <tr>

            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dpi</th>
            <th>Condominio</th>
            <th>Tipo de Usuario</th>
            <th>Vehiculo</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for usuario in page.items %}
        <tr>

            <td>{{ usuario.nombre }}</td>
            <td>{{ usuario.apellido }}</td>
            <td>{{ usuario.dpi }}</td>
            <td>{{ usuario.condominio.nombre }}</td>
            <td>{{ usuario.tiposusuario.tipo }}</td>
            <td>{{ usuario.vehiculo.placa }}</td>
            <td>{{ link_to("usuario/edit/"~usuario.idusuario, "Editar", "class" : "btn btn-success") }}</td>
            <td>{{ link_to("usuario/delete/"~usuario.idusuario, "Eliminar" , "class" : "btn btn-danger") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("usuario/search", "<<","class" : "btn btn-default") }}</td>
                        <td>{{ link_to("usuario/search?page="~page.before, "Anterior", "class" : "btn btn-default") }}</td>
                        <td>{{ link_to("usuario/search?page="~page.next, "Siguiente", "class" : "btn btn-default") }}</td>
                        <td>{{ link_to("usuario/search?page="~page.last, ">>", "class" : "btn btn-default") }}</td>
                        <td class="btn btn-info"> {{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
