
{{ content() }}

<div align="right">
    {{ link_to("tipos_vehiculo/new", "Agregar un Tipo de Vehiculo", "class" : "btn btn-default") }}
    {{ link_to("vehiculo/new", "Agregar un Nuevo Vehiculo", "class" : "btn btn-success") }}
</div>

{{ form("vehiculo/search", "method":"post", "autocomplete" : "on") }}

<div align="center">
    <h1>Buscar Vehiculos</h1>
</div>

<table>
    <div class="form-group">
            <label for="idtipos_vehiculo">Tipo de vehiculo</label>
            {{ tipo_vehiculo }}
    </div>
    <div class="form-group">
            <label for="placa">Placa</label>
           {{ text_field("placa", "size" : 30,"class" : "form-control") }}
    </div>
    <div class="form-group">
        {{ submit_button("Buscar", "class" : "btn btn-primary") }}
    </div>
</table>

</form>
