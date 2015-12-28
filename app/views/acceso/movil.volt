

<h4>
    Ultimos registros:
</h4>
<table class="browse table table-striped" >
    <thead>
    <tr>
        <th>Usuario</th>
        <th>Condominio</th>
        <th>Placa</th>
        <th>Tipo</th>
        <th>Datos de Acceso</th>
    </tr>
    </thead>

{% for acceso in accesos %}
    <tbody>
<tr>
    <td>{{ acceso.usuario.nombre }} {{ acceso.usuario.apellido }}</td>
    <td>{{ acceso.usuario.condominio.nombre }}</td>
    <td>{{ acceso.usuario.vehiculo.placa }}</td>
    <td>{{ acceso.usuario.vehiculo.tipos_vehiculo.tipo }}</td>
    <td>
        {% if  acceso.tipo == 1 %}
        <span class="alert-success" > Entrada:  {{ acceso.time }} </span>
        {% else %}
        <span class="alert-warning">  Salida:  {{ acceso.time }} </span>
        {% endif %}
    </td>
</tr>
{% endfor %}
    <tbody>
</table>

<script>
    $( document ).ready(function() {
        $('#idusuario').focus();
        $('#idusuario').attr('value','');
    });

   setTimeout("location.reload()", 1000);	
</script>
