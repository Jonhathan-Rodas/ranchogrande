{{ content() }}
<h1> {{ condominio.nombre  }} </h1>
<b/>Del: </b>  {{  desde }} <b>Al: </b> {{ hasta }}
<hr/>
<table class="browse table table-striped" >
    <thead>
    <tr>
        <th>Usuario</th>
        <th>Placa</th>
        <th>Tipo</th>
        <th>Datos de Acceso</th>
    </tr>
    </thead>

{% for acceso in accesos %}
    <tbody>
<tr>
{% if acceso.usuario.condominio.nombre == condominio.nombre  %}
    <td>{{ acceso.usuario.nombre }} {{ acceso.usuario.apellido }}</td>
    <td>{{ acceso.usuario.vehiculo.placa }}</td>
    <td>{{ acceso.usuario.vehiculo.tipos_vehiculo.tipo }}</td>
    <td>
        {% if  acceso.tipo == 1 %}
        <span class="alert-success" > Entrada:  {{ acceso.time }} </span>
        {% else %}
        <span class="alert-warning">  Salida:  {{ acceso.time }} </span>
        {% endif %}
    </td>
{% endif  %}
</tr>
{% endfor  %}
<script>
    $('.side-nav').hide();
    $('#wrapper').css('padding-left','0px');
</script>

