
{{ form("vehiculo/create", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("vehiculo", "Regresar", "class" : "btn btn-default") }}</td>
    </tr>
</table>

{{ content() }}

<div align="center">
    <h1>Create vehiculo</h1>
</div>

<table>
    <div class="form-group">
        <label for="idtipos_vehiculo">Tipo de vehiculo</label>
        {{ tipo_vehiculo }}
        </td>
    </div>
    <div class="form-group">
        <label for="placa">Placa</label>
        {{ text_field("placa", "size" : 30 , "class" : "form-control") }}
    </div>
    <div class="form-group">
        {{ hidden_field("id") }}
        {{ submit_button("Guardar",  "class" : "btn btn-primary") }}
    </div>
</table>

</form>
