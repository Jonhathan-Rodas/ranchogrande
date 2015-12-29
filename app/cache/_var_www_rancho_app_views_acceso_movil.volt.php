

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

<?php foreach ($accesos as $acceso) { ?>
    <tbody>
<tr>
    <td><?php echo $acceso->usuario->nombre; ?> <?php echo $acceso->usuario->apellido; ?></td>
    <td><?php echo $acceso->usuario->condominio->nombre; ?></td>
    <td><?php echo $acceso->usuario->vehiculo->placa; ?></td>
    <td><?php echo $acceso->usuario->vehiculo->tipos_vehiculo->tipo; ?></td>
    <td>
        <?php if ($acceso->tipo == 1) { ?>
        <span class="alert-success" > Entrada:  <?php echo $acceso->time; ?> </span>
        <?php } else { ?>
        <span class="alert-warning">  Salida:  <?php echo $acceso->time; ?> </span>
        <?php } ?>
    </td>
</tr>
<?php } ?>
    <tbody>
</table>

<script>
    $( document ).ready(function() {
        $('#idusuario').focus();
        $('#idusuario').attr('value','');
    });

   setTimeout("location.reload()", 1000);	
</script>
