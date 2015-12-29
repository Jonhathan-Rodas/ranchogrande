
{{ form("usuario/create", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("usuario","Regresar", "class" : "btn btn-default") }}</td>
    </tr>
</table>

{{ content() }}

<div align="center">
    <h1>Create usuario</h1>
</div>

<table>
    <div class="form-group">
            <label for="nombre">Nombre</label>
            {{ text_field("nombre", "size" : 30 , "class" : "form-control" ,"x-webkit-speech": '' , "speech":'') }}
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
            <label for="idcondominio">Idcondominio</label>
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
            <label for="idvehiculo">Idvehiculo</label>
            {{ vehiculo }}
    </div>
    <div class="form-group">
            <label for="fotografia">Fotografia</label>
            {{ text_field("fotografia", "size" : 30 , "class" : "form-control") }}
    </div>

    <div class="form-group">
        {{ submit_button("Guardar",  "class" : "btn btn-primary") }}
    </div>
</table>

</form>
