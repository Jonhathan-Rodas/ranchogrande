
<?php echo $this->getContent(); ?>

<div align="right">
    <?php echo $this->tag->linkTo(array('tipos_vehiculo/new', 'Agregar un Tipo de Vehiculo', 'class' => 'btn btn-default')); ?>
    <?php echo $this->tag->linkTo(array('vehiculo/new', 'Agregar un Nuevo Vehiculo', 'class' => 'btn btn-success')); ?>
</div>

<?php echo $this->tag->form(array('vehiculo/search', 'method' => 'post', 'autocomplete' => 'on')); ?>

<div align="center">
    <h1>Buscar Vehiculos</h1>
</div>

<table>
    <div class="form-group">
            <label for="idtipos_vehiculo">Tipo de vehiculo</label>
            <?php echo $tipo_vehiculo; ?>
    </div>
    <div class="form-group">
            <label for="placa">Placa</label>
           <?php echo $this->tag->textField(array('placa', 'size' => 30, 'class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <?php echo $this->tag->submitButton(array('Buscar', 'class' => 'btn btn-primary')); ?>
    </div>
</table>

</form>
