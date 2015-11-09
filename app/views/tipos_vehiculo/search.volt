
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("tipos_vehiculo/index", "Regresar", "class" : "btn btn-default") }}
        </td>
        <td align="right">
            {{ link_to("tipos_vehiculo/new", "Crear un nuevo tipo de vehiculo", "class" : "btn btn-success" ) }}
        </td>
    </tr>
</table>

<table class="browse table table-striped" align="center">
    <thead>
        <tr>

            <th>Tipo</th>
            <th>Tarifa</th>
            <th></th>
            <th></th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for tipos_vehiculo in page.items %}

            <td>{{ tipos_vehiculo.tipo }}</td>
            <td>{{ tipos_vehiculo.tarifa }}</td>
            <td>{{ link_to("tipos_vehiculo/edit/"~tipos_vehiculo.idtipos_vehiculo, "Editar", "class" : "btn btn-success") }}</td>
            <td>{{ link_to("tipos_vehiculo/delete/"~tipos_vehiculo.idtipos_vehiculo, "Eliminar " ,"class" : "btn btn-danger") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("tipos_vehiculo/search","<<","class" : "btn btn-default") }}</td>
                        <td>{{ link_to("tipos_vehiculo/search?page="~page.before, "Anterior", "class" : "btn btn-default") }}</td>
                        <td>{{ link_to("tipos_vehiculo/search?page="~page.next, "Siguiente", "class" : "btn btn-default") }}</td>
                        <td>{{ link_to("tipos_vehiculo/search?page="~page.last,  ">>", "class" : "btn btn-default") }}</td>
                        <td class="btn btn-info">{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
