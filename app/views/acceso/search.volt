<div class="text-align: center;">
<h2>REPORTE DE ACCESOS</h2>
    <div>RANCHOGRANDE <br/>PARQUE INMOBILIARIO</div>
<hr/>
</div>
<table class="browse table table-striped" >
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Condominio</th>
            <th>Placa</th>
            <th>Datos de Acceso</th>
         </tr>
    </thead>
    <tbody>
    {% if page.items is defined %}
    {% for acceso in page.items %}
        <tr>
            <td>{{ acceso.usuario.nombre }} {{ acceso.usuario.apellido }}</td>
            <td>{{ acceso.usuario.condominio.nombre }}</td>
            <td>{{ acceso.usuario.vehiculo.placa }}</td>
                 <td>
                {% if  acceso.tipo == 1 %}
                   <span class="alert-success" > Entrada:  {{ acceso.time }} </span>
                {% else %}
                  <span class="alert-warning">  Salida:  {{ acceso.time }} </span>
                {% endif %}
            </td>
        </tr>
    {% endfor %}
    {% endif %}
    </tbody>
    <tbody>
    </tbody>
</table>
<script>
    $('.side-nav').hide();
    $('#wrapper').css('padding-left','0px');
</script>