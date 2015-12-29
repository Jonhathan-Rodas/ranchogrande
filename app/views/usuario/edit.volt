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
    <div class="form-group">
        <label for="nombre">Nombre</label>
        {{ text_field("nombre", "size" : 30 , "class" : "form-control") }}
    </div>
    <div class="form-group">
        <label for="apellido">Apellido</label>
        {{ text_field("apellido", "size" : 30 , "class" : "form-control") }}
    </div>
    <div class="form-group">
        <label for="dpi">Dpi</label>
        {{ text_field("dpi", "size" : 30 , "class" : "form-control") }}
    </div>
    <div class="form-group">
        <label for="idcondominio">Condominio</label>
        {{ condominio }}
    </div>
    <div class="form-group">
        <label for="puesto">Puesto</label>
        {{ text_field("puesto", "size" : 30 , "class" : "form-control") }}
    </div>
    <div class="form-group">
        <label for="idtipos_usuario">Tipo de Usuario</label>
        {{ tipousuario }}
    </div>
    <div class="form-group">
        <label for="idvehiculo">Vehiculo</label>
        {{ vehiculo }}
    </div>
    <div class="form-group">
        <label for="fotografia">Fotografia</label>
        {{ text_field("fotografia", "size" : 30 , "class" : "form-control") }}
    </div>
    <div class="form-group">
        <td>{{ hidden_field("idusuario") }}</td>
        <td>{{ submit_button("Save",  "class" : "btn btn-primary") }}</td>
    </div>
</table>

</form>
