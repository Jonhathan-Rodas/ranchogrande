
{{ content() }}

<table width="100%">
    <tr>
        <td align="left">
            {{ link_to("vehiculo/index", "Regresar", "class" : "btn btn-default") }}
        </td>
        <td align="right">
            {{ link_to("vehiculo/new", "Agregar un nuevo vehiculo ", "class" : "btn btn-success" ) }}
        </td>
    </tr>
</table>

<table class="browse table table-striped" align="center">
    <thead>
        <tr>
            <th>Placa</th>
            <th>Tipo de Vehiculo</th>

         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for vehiculo in page.items %}
        <tr>

            <td>{{ vehiculo.placa }}</td>
            <td>{{ vehiculo.TiposVehiculo.tipo }}</td>
            <td>{{ link_to("vehiculo/edit/"~vehiculo.idvehiculo, "Edit", "class" : "btn btn-success") }}</td>
            <td>{{ link_to("vehiculo/delete/"~vehiculo.idvehiculo, "Delete" ,"class" : "btn btn-danger") }}</td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td>{{ link_to("vehiculo/search","<<","class" : "btn btn-default") }}</td>
                        <td>{{ link_to("vehiculo/search?page="~page.before, "Anterior", "class" : "btn btn-default") }}</td>
                        <td>{{ link_to("vehiculo/search?page="~page.next, "Siguiente", "class" : "btn btn-default") }}</td>
                        <td>{{ link_to("vehiculo/search?page="~page.last,  ">>", "class" : "btn btn-default") }}</td>
                        <td class="btn btn-info">{{ page.current~"/"~page.total_pages }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
