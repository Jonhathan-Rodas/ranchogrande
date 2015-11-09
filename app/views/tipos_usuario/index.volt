
{{ content() }}

<div align="right">
    {{ link_to("tipos_usuario/new", "Create tipo  de usuarios",  "class" : "btn btn-success") }}
</div>

{{ form("tipos_usuario/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h1>Buscar Tipos de Usuarios</h1>
</div>

<table>
    <div class="form-group">
            <label for="tipo">Tipo</label>
            {{ text_field("tipo", "size" : 30, "class" : "form-control" ) }}
    </div>

    <div class="form-group">
        {{ submit_button("Buscar", "class" : "btn btn-primary") }}
    </div>
</table>

</form>
