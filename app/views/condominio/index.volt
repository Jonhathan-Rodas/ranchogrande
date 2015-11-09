
{{ content() }}

<div align="right">
    {{ link_to("condominio/new", "Crear condominio",  "class" : "btn btn-success" ) }}
</div>

{{ form("condominio/search", "method":"post", "autocomplete" : "off") }}

<div >
    <h1>Buscar Condominio</h1>
</div>
    <div class="form-group">
            <label for="nombre">Nombre</label>
            {{ text_field("nombre", "size" : 30, "class" : "form-control") }}
    </div>

    <div class="form-group">
        {{ submit_button("Buscar", "class" : "btn btn-primary") }}
    </div>
</form>
