
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("tipos_usuario/index", "Regresar","class" : "btn btn-default") }}
        </td>
        <td align="right">
            {{ link_to("tipos_usuario/new", "Agregar un nuevo Tipo de Usuario ", "class" : "btn btn-success") }}
        </td>
    </tr>
</table>

<table class="browse table table-striped"  align="center">
    <thead>
        <tr>
            <th>Tipo</th>
         </tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for tipos_usuario in page.items %}
        <tr>
            <td>{{ tipos_usuario.tipo }}</td>
            <td>{{ link_to("tipos_usuario/edit/"~tipos_usuario.idtipos_usuario, "Editar", "class" : "btn btn-success") }}</td>
            <td>{{ link_to("tipos_usuario/delete/"~tipos_usuario.idtipos_usuario, "Eliminar", "class" : "btn btn-danger") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("tipos_usuario/search","<<","class" : "btn btn-default") }}</td>
                        <td>{{ link_to("tipos_usuario/search?page="~page.before, "Anterior", "class" : "btn btn-default") }}</td>
                        <td>{{ link_to("tipos_usuario/search?page="~page.next, "Siguiente", "class" : "btn btn-default") }}</td>
                        <td>{{ link_to("tipos_usuario/search?page="~page.last,  ">>", "class" : "btn btn-default") }}</td>
                        <td class="btn btn-info">{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
