{{ content() }}
{{ form("tipos_usuario/save", "method":"post") }}

<table width="100%">
    <tr>
        <td align="left">{{ link_to("tipos_usuario", "Regresar", "class" : "btn btn-default") }}</td>
    </tr>
</table>

<div align="center">
    <h1>Editar Tipo de Usuario</h1>
</div>

<table>
    <div class="form-group">
            <label for="tipo">Tipo</label>
            {{ text_field("tipo", "size" : 30 , "class" : "form-control") }}
    </div>

    <div class="form-group">
        {{ hidden_field("id") }}
        {{ submit_button("Guardar", "class" : "btn btn-primary") }}
    </div>
</table>

</form>
