<div class="text-align: center;">
<h2><?php echo $usuario->nombre; ?></h2>
 <b>DPI:</b> <?php echo $usuario->dpi; ?> | <b>Empresa:</b> <?php echo $usuario->condominio->nombre; ?>
<p>
<b>Placa Vehiculo:</b> <?php echo $usuario->vehiculo->placa; ?>
</p>
<b/>Del: </b>  <?php echo $desde; ?> <b>Al: </b> <?php echo $hasta; ?>
<hr/>
</div>
<?php echo $time_desde; ?>
<table class="browse table table-striped" >
    <thead>
        <tr>
            <th>Datos de Acceso</th>
         </tr>
    </thead>
    <tbody>
  	
     <?php foreach ($users as $acceso) { ?>
	 <tr>
             <td>
                <?php if ($acceso->tipo == 1) { ?>
                   <span class="alert-success" > Entrada:  <?php echo $acceso->time; ?> </span>
                <?php } else { ?>
                  <span class="alert-warning">  Salida:  <?php echo $acceso->time; ?> </span>
                <?php } ?>
            </td>
        </tr>
       <?php } ?>

     </tbody>
    <tbody>
    </tbody>
</table>
<script>
    $('.side-nav').hide();
    $('#wrapper').css('padding-left','0px');
</script>
