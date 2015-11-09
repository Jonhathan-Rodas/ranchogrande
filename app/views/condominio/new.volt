
{{ form("condominio/create", "method":"post") }}

<table width="100%">
    <tr>
        {{ link_to("condominio/index", "Regresar", "class" : "btn btn-default") }}
    </tr>
</table>

{{ content() }}

<div align="center">
    <h1>Crear un nuevo Condominio</h1>
</div>

<table>
    <div class="form-group">
            <label for="nombre">Nombre</label>
            {{ text_field("nombre", "size" : 30,  "class" : "form-control") }}

    </div>

    <tr>
        <td></td>
        <td>{{ submit_button("Save", "class" : "btn btn-primary") }}</td>
    </tr>
</table>

</form>
