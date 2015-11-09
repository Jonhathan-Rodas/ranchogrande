
<?php echo $this->tag->form(array('tipos_vehiculo/create', 'method' => 'post')); ?>

<table width="100%">
    <tr>
        <td align="left"><?php echo $this->tag->linkTo(array('tipos_vehiculo', 'Regresar', 'class' => 'btn btn-success')); ?></td>

    </tr>
</table>

<?php echo $this->getContent(); ?>

<div align="center">
    <h1>Crear un nuevo tipo de vehiculo</h1>
</div>

<table>
    <div class="form-group">
            <label for="tipo">Tipo</label>

            <?php echo $this->tag->textField(array('tipo', 'size' => 30, 'class' => 'form-control')); ?>

    </div>
    <div class="form-group">
            <label for="tarifa">Tarifa</label>

            <?php echo $this->tag->textField(array('tarifa', 'type' => 'numeric', 'class' => 'form-control')); ?>

    </div>

    <tr>
        <td><?php echo $this->tag->submitButton(array('Save', 'class' => 'btn btn-primary')); ?></td>
    </div>
</table>

</form>
