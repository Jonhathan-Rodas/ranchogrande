
{{ content() }}

<div align="right">
    {{ link_to("acceso/new", "Create acceso") }}
</div>

{{ form("acceso/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Search acceso</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="idacceso">Idacceso</label>
        </td>
        <td align="left">
            {{ text_field("idacceso", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="idusuario">Idusuario</label>
        </td>
        <td align="left">
            {{ text_field("idusuario", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="time">Time</label>
        </td>
        <td align="left">
            {{ text_field("time", "size" : 30) }}
        </td>
    </tr>

    <tr>
        <td></td>
        <td>{{ submit_button("Search") }}</td>
    </tr>
</table>

</form>
