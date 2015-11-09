
{{ content() }}

<div align="right">
    {{ link_to("usuario/new", "Crear usuario", "class" : "btn btn-success") }}
</div>

{{ form("usuario/search", "method":"post", "autocomplete" : "off") }}

<div align="center">
    <h3>Busca por:</h3>
</div>

<table>

    <div class="form-group">

            <label for="nombre">Nombre</label>
            {{ text_field("nombre", "size" : 30, "class" : "form-control") }}
    </div>
    <div class="form-group">
        <label for="apellido">Apellido</label>
        {{ text_field("apellido", "size" : 30, "class" : "form-control") }}
    </div>
    <div class="form-group">
       <label for="dpi">Dpi</label>
       {{ text_field("dpi", "size" : 30, "class" : "form-control") }}
    </div>
    <div class="form-group">
        <label for="idcondominio">Condominio</label>
        {{ condominio }}
    </div>
    <div class="form-group">
        {{ submit_button("Buscar", "class" : "btn btn-primary ") }}
    </div>
</table>

</form>
