
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("condominio/index", "Regresar", "class" : "btn btn-default") }}
        </td>
        <td align="right">
            {{ link_to("condominio/new", "Crear un nuevo Condominio ", "class" : "btn btn-success") }}
        </td>
    </tr>
</table>

<table class="browse table table-striped" align="center">
    <thead>
        <tr>
            <th>Nombre</th>
         </tr>
        <tr></tr>
        <tr></tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for condominio in page.items %}
        <tr>
            <td>{{ condominio.nombre }}</td>
            <td>{{ link_to("condominio/edit/"~condominio.idcondominio, "Editar", "class" : "btn btn-success") }}</td>
            <td>{{ link_to("condominio/delete/"~condominio.idcondominio, "Eliminar" , "class" : "btn btn-danger") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("condominio/search", "<<","class" : "btn btn-default") }}</td>
                        <td>{{ link_to("condominio/search?page="~page.before, "Anterior", "class" : "btn btn-default") }}</td>
                        <td>{{ link_to("condominio/search?page="~page.next, "Siguiente", "class" : "btn btn-default") }}</td>
                        <td>{{ link_to("condominio/search?page="~page.last, ">>", "class" : "btn btn-default") }}</td>
                        <td class="btn btn-info">{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
