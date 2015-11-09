
<?php echo $this->getContent(); ?>

<div align="right">
    <?php echo $this->tag->linkTo(array('tipos_vehiculo/new', 'Crear tipo vehiculo', 'class' => 'btn btn-success')); ?>
</div>

<?php echo $this->tag->form(array('tipos_vehiculo/search', 'method' => 'post', 'autocomplete' => 'on')); ?>

<div align="center">
    <h1>Buscar Tipo de Vehiculos</h1>
</div>

<table>
    <div class="form-group">
            <?php echo $this->tag->textField(array('tipo', 'size' => 30, 'class' => 'form-control')); ?>
    </div>

    <div class="form-group">
        <?php echo $this->tag->submitButton(array('Buscar', 'class' => 'btn btn-primary')); ?>
    </div>
</table>

</form>
