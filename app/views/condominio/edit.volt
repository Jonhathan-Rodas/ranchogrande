{{ content() }}
{{ form("condominio/save", "method":"post") }}

<table width="100%">
    <tr>
        {{ link_to("condominio/index", "Regresar", "class" : "btn btn-default") }}
      </tr>
</table>

<div align="center">
    <h1>Editar condominio</h1>
</div>

<table>
    <div class="form-group">
            <label for="nombre">Nombre</label>
            {{ text_field("nombre", "size" : 30 , "class" : "form-control") }}

    </div>

    <tr>
        <td>{{ hidden_field("id") }}</td>
        <td>{{ submit_button("Guardar", "class" : "btn btn-primary") }}</td>
    </tr>
</table>

</form>
