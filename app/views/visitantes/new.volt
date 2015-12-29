<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous">{{ link_to("visitantes", "Buscar Visitante") }}</li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>
        Crear Visitante
    </h1>
</div>

{{ content() }}

{{ form("visitantes/create", "method":"post", "autocomplete" : "on", "class" : "form-horizontal") }}

<div class="form-group">
    <label for="fieldNombre" class="control-label">Nombre</label>
        {{ text_field("nombre", "size" : 30, "class" : "form-control", "id" : "fieldNombre", "x-webkit-speech" : "") }}
</div>

<div class="form-group">
    <label for="fieldApellido" class="control-label">Apellido</label>
        {{ text_field("apellido", "size" : 30, "class" : "form-control", "id" : "fieldApellido",  "x-webkit-speech" : "" ) }}
</div>

    <input type="hidden" value="{{ date.format('Y-m-d H:i:s') }}" name="entrada" id="fieldEntrada">





<div class="form-group">
    {{ text_field("salida", "size" : 30, "class" : "form-control", "id" : "fieldSalida", "style" : "display:none" ) }}
</div>

<div class="form-group"><br/>
<label for="idcondominio">Condominio</label>
{{ condominio }}
</div>

<div class="form-group">
    <label for="fieldPlaca" class="control-label">Placa</label>
    {{ text_field("placa", "size" : 30, "class" : "form-control", "id" : "fieldPlaca",  "x-webkit-speech" : "") }}
</div>


<div class="form-group">
        {{ submit_button('Guardar', 'class': 'btn btn-default') }}
</div>

</form>
<script>
(function( $ ) {
    $.widget( "custom.combobox", {
        _create: function() {
            this.wrapper = $( "<span>" )
                    .addClass( "custom-combobox" )
                    .insertAfter( this.element );

            this.element.hide();
            this._createAutocomplete();
            this._createShowAllButton();
        },

        _createAutocomplete: function() {
            var selected = this.element.children( ":selected" ),
                    value = selected.val() ? selected.text() : "";

            this.input = $( "<input>" )
                    .appendTo( this.wrapper )
                    .val( value )
                    .attr( "title", "" )
                    .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
                    .autocomplete({
                        delay: 0,
                        minLength: 0,
                        source: $.proxy( this, "_source" )
                    })
                    .tooltip({
                        tooltipClass: "ui-state-highlight"
                    });

            this._on( this.input, {
                autocompleteselect: function( event, ui ) {
                    ui.item.option.selected = true;
                    this._trigger( "select", event, {
                        item: ui.item.option
                    });
                },

                autocompletechange: "_removeIfInvalid"
            });
        },

        _createShowAllButton: function() {
            var input = this.input,
                    wasOpen = false;

            $( "<a>" )
                    .attr( "tabIndex", -1 )
                    .attr( "title", "Show All Items" )
                    .tooltip()
                    .appendTo( this.wrapper )
                    .button({
                        icons: {
                            primary: "ui-icon-triangle-1-s"
                        },
                        text: false
                    })
                    .removeClass( "ui-corner-all" )
                    .addClass( "custom-combobox-toggle ui-corner-right" )
                    .mousedown(function() {
                        wasOpen = input.autocomplete( "widget" ).is( ":visible" );
                    })
                    .click(function() {
                        input.focus();

                        // Close if already visible
                        if ( wasOpen ) {
                            return;
                        }

                        // Pass empty string as value to search for, displaying all results
                        input.autocomplete( "search", "" );
                    });
        },

        _source: function( request, response ) {
            var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
            response( this.element.children( "option" ).map(function() {
                var text = $( this ).text();
                if ( this.value && ( !request.term || matcher.test(text) ) )
                    return {
                        label: text,
                        value: text,
                        option: this
                    };
            }) );
        },

        _removeIfInvalid: function( event, ui ) {

            // Selected an item, nothing to do
            if ( ui.item ) {
                return;
            }

            // Search for a match (case-insensitive)
            var value = this.input.val(),
                    valueLowerCase = value.toLowerCase(),
                    valid = false;
            this.element.children( "option" ).each(function() {
                if ( $( this ).text().toLowerCase() === valueLowerCase ) {
                    this.selected = valid = true;
                    return false;
                }
            });

            // Found a match, nothing to do
            if ( valid ) {
                return;
            }

            // Remove invalid value
            this.input
                    .val( "" )
                    .attr( "title", value + " didn't match any item" )
                    .tooltip( "open" );
            this.element.val( "" );
            this._delay(function() {
                this.input.tooltip( "close" ).attr( "title", "" );
            }, 2500 );
            this.input.autocomplete( "instance" ).term = "";
        },

        _destroy: function() {
            this.wrapper.remove();
            this.element.show();
        }
    });
})( jQuery );

$(function() {
    $( "#idcondominio" ).combobox();

});
</script>