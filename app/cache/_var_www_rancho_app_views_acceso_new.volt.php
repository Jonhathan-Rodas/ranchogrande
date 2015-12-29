
<?php echo $this->tag->form(array('acceso/create', 'method' => 'post', 'class' => 'well')); ?>

<table width="100%">

</table>

<?php echo $this->getContent(); ?>


<table>
        <div class="form-group">
            <label for="idusuario">Ingrese Codigo</label>

            <?php echo $this->tag->textField(array('idusuario', 'type' => 'numeric', 'class' => 'form-control')); ?>
        </div>

    <tr>
        <td align="left">
            <input type="hidden" value="<?php echo $date->format('Y-m-d H:i:s'); ?>" name="time" id="time">
            <input value="1" name="tipo" type="hidden">
        </td>
    </tr>

    <tr>
        <td></td>
        <td><?php echo $this->tag->submitButton(array('Save', 'id' => 'guardar-acceso')); ?></td>
    </tr>
</table>
</form>

<h4>
    Ultimos registros:
</h4>
<table class="browse table table-striped" >
    <thead>
    <tr>
        <th>Usuario</th>
        <th>Tipo</th>
        <th>Condominio</th>
        <th>Placa</th>
        <th>Tipo</th>
        <th>Datos de Acceso</th>
    </tr>
    </thead>

<?php foreach ($accesos as $acceso) { ?>
    <tbody>
<tr>
    <td><?php echo $acceso->usuario->nombre; ?> <?php echo $acceso->usuario->apellido; ?> </td>
    <td><?php echo $acceso->usuario->tiposUsuario->tipo; ?></td>
    <td><?php echo $acceso->usuario->condominio->nombre; ?></td>
    <td><?php echo $acceso->usuario->vehiculo->placa; ?></td>
    <td><?php echo $acceso->usuario->vehiculo->tiposVehiculo->tipo; ?></td>
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
</script>