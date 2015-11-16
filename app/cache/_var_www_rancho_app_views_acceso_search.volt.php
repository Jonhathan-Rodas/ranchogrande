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
    <?php if (isset($page->items)) { ?>
    <?php foreach ($page->items as $acceso) { ?>
        <tr>
            <td><?php echo $acceso->usuario->nombre; ?> <?php echo $acceso->usuario->apellido; ?></td>
            <td><?php echo $acceso->usuario->condominio->nombre; ?></td>
            <td><?php echo $acceso->usuario->vehiculo->placa; ?></td>
                 <td>
                <?php if ($acceso->tipo == 1) { ?>
                   <span class="alert-success" > Entrada:  <?php echo $acceso->time; ?> </span>
                <?php } else { ?>
                  <span class="alert-warning">  Salida:  <?php echo $acceso->time; ?> </span>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
    <?php } ?>
    </tbody>
    <tbody>
    </tbody>
</table>
<script>
    $('.side-nav').hide();
    $('#wrapper').css('padding-left','0px');
</script>