{{ content() }}
{{ form("acceso/save", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("acceso", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

<div align="center">
    <h1>Edit acceso</h1>
</div>

<table>
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
        <td>{{ hidden_field("id") }}</td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
