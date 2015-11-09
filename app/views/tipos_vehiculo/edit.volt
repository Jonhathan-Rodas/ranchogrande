{{ content() }}
{{ form("tipos_vehiculo/save", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("tipos_vehiculo", "Regresar", "class" : "btn btn-success") }}</td>

    </tr>
</table>

<div align="center">
    <h1>Editar tipo de vehiculo</h1>
</div>

<table>
    <div class="form-group">
            <label for="tipo">Tipo</label>

            {{ text_field("tipo", "size" : 30,  "class" : "form-control") }}
    </div>
    <div class="form-group">
            <label for="tarifa">Tarifa</label>
            {{ text_field("tarifa", "type" : "numeric",  "class" : "form-control") }}
    </div>

    <tr>
        <td>{{ submit_button("Save", "class" : "btn btn-primary") }}</td>
    </tr>
</table>

</form>
