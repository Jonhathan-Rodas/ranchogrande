
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

<table class="browse" align="center">
    <thead>
        <tr>
            <th>Idacceso</th>
            <th>Idusuario</th>
            <th>Time</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for acceso in page.items %}
        <tr>
            <td>{{ acceso.idacceso }}</td>
            <td>{{ acceso.idusuario }}</td>
            <td>{{ acceso.time }}</td>
            <td>{{ link_to("acceso/edit/"~acceso.idacceso, "Edit") }}</td>
            <td>{{ link_to("acceso/delete/"~acceso.idacceso, "Delete") }}</td>
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
