<?php echo $this->getContent(); ?>
<h1> <?php echo $condominio->nombre; ?> </h1>
<b/>Del: </b>  <?php echo $desde; ?> <b>Al: </b> <?php echo $hasta; ?>
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

<?php foreach ($accesos as $acceso) { ?>
    <tbody>
<tr>
<?php if ($acceso->usuario->condominio->nombre == $condominio->nombre) { ?>
    <td><?php echo $acceso->usuario->nombre; ?> <?php echo $acceso->usuario->apellido; ?></td>
    <td><?php echo $acceso->usuario->vehiculo->placa; ?></td>
    <td><?php echo $acceso->usuario->vehiculo->tipos_vehiculo->tipo; ?></td>
    <td>
        <?php if ($acceso->tipo == 1) { ?>
        <span class="alert-success" > Entrada:  <?php echo $acceso->time; ?> </span>
        <?php } else { ?>
        <span class="alert-warning">  Salida:  <?php echo $acceso->time; ?> </span>
        <?php } ?>
    </td>
<?php } ?>
</tr>
<?php } ?>
<script>
    $('.side-nav').hide();
    $('#wrapper').css('padding-left','0px');
</script>

