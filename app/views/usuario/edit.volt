{{ content() }}
{{ form("usuario/save", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("usuario", "Go Back") }}</td>
        <td align="right">{{ submit_button("Save") }}</td>
    </tr>
</table>

<div align="center">
    <h1>Edit usuario</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="nombre">Nombre</label>
        </td>
        <td align="left">
            {{ text_field("nombre", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="apellido">Apellido</label>
        </td>
        <td align="left">
            {{ text_field("apellido", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="dpi">Dpi</label>
        </td>
        <td align="left">
            {{ text_field("dpi", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="idcondominio">Idcondominio</label>
        </td>
        <td align="left">
            {{ text_field("idcondominio", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="puesto">Puesto</label>
        </td>
        <td align="left">
            {{ text_field("puesto", "size" : 30) }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="idtipos_usuario">Idtipos Of Usuario</label>
        </td>
        <td align="left">
            {{ text_field("idtipos_usuario", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="idvehiculo">Idvehiculo</label>
        </td>
        <td align="left">
            {{ text_field("idvehiculo", "type" : "numeric") }}
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="fotografia">Fotografia</label>
        </td>
        <td align="left">
            {{ text_field("fotografia", "size" : 30) }}
        </td>
    </tr>

    <tr>
        <td>{{ hidden_field("id") }}</td>
        <td>{{ submit_button("Save") }}</td>
    </tr>
</table>

</form>
