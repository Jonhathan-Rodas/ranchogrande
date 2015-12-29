<div class="page-header">
    <h1>
        Search visitantes
    </h1>
    <p>
        <?php echo $this->tag->linkTo(array('visitantes/new', 'Create visitantes')); ?>
    </p>
</div>

<?php echo $this->getContent(); ?>

<?php echo $this->tag->form(array('visitantes/search', 'method' => 'post', 'autocomplete' => 'off', 'class' => 'form-horizontal')); ?>

<div class="form-group">
    <label for="fieldIdvisitante" class="col-sm-2 control-label">Idvisitante</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(array('idvisitante', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldIdvisitante')); ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldNombre" class="col-sm-2 control-label">Nombre</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(array('nombre', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldNombre')); ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldApellido" class="col-sm-2 control-label">Apellido</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(array('apellido', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldApellido')); ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldEntrada" class="col-sm-2 control-label">Entrada</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(array('entrada', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldEntrada')); ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldSalida" class="col-sm-2 control-label">Salida</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(array('salida', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldSalida')); ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldIdcondominio" class="col-sm-2 control-label">Idcondominio</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(array('idcondominio', 'type' => 'numeric', 'class' => 'form-control', 'id' => 'fieldIdcondominio')); ?>
    </div>
</div>

<div class="form-group">
    <label for="fieldPlaca" class="col-sm-2 control-label">Placa</label>
    <div class="col-sm-10">
        <?php echo $this->tag->textField(array('placa', 'size' => 30, 'class' => 'form-control', 'id' => 'fieldPlaca')); ?>
    </div>
</div>


<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        <?php echo $this->tag->submitButton(array('Search', 'class' => 'btn btn-default')); ?>
    </div>
</div>

</form>
