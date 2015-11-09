
<?php echo $this->tag->form(array('vehiculo/create', 'method' => 'post')); ?>

<table width="100%">
    <tr>
        <td align="left"><?php echo $this->tag->linkTo(array('vehiculo', 'Regresar', 'class' => 'btn btn-default')); ?></td>
    </tr>
</table>

<?php echo $this->getContent(); ?>

<div align="center">
    <h1>Create vehiculo</h1>
</div>

<table>
    <div class="form-group">
        <label for="idtipos_vehiculo">Tipo de vehiculo</label>
        <?php echo $tipo_vehiculo; ?>
        </td>
    </div>
    <div class="form-group">
        <label for="placa">Placa</label>
        <?php echo $this->tag->textField(array('placa', 'size' => 30, 'class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <?php echo $this->tag->hiddenField(array('id')); ?>
        <?php echo $this->tag->submitButton(array('Guardar', 'class' => 'btn btn-primary')); ?>
    </div>
</table>

</form>
