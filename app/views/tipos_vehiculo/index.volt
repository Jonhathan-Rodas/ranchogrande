
{{ content() }}

<div align="right">
    {{ link_to("tipos_vehiculo/new", "Crear tipo vehiculo" ,  "class" : "btn btn-success") }}
</div>

{{ form("tipos_vehiculo/search", "method":"post", "autocomplete" : "on") }}

<div align="center">
    <h1>Buscar Tipo de Vehiculos</h1>
</div>

<table>
    <div class="form-group">
            {{ text_field("tipo", "size" : 30 , "class" : "form-control" ) }}
    </div>

    <div class="form-group">
        {{ submit_button("Buscar", "class" : "btn btn-primary") }}
    </div>
</table>

</form>
