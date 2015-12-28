<?php echo $this->getContent(); ?>
<?php echo $this->tag->form(array('usuario/save', 'method' => 'post')); ?>

<table width="100%">
    <tr>
        <td align="left"><?php echo $this->tag->linkTo(array('usuario', 'Go Back')); ?></td>
        <td align="right"><?php echo $this->tag->submitButton(array('Save')); ?></td>
    </tr>
</table>

<div align="center">
    <h1>Edit usuario</h1>
</div>

<table>
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <?php echo $this->tag->textField(array('nombre', 'size' => 30, 'class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <label for="apellido">Apellido</label>
        <?php echo $this->tag->textField(array('apellido', 'size' => 30, 'class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <label for="dpi">Dpi</label>
        <?php echo $this->tag->textField(array('dpi', 'size' => 30, 'class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <label for="idcondominio">Condominio</label>
        <?php echo $condominio; ?>
    </div>
    <div class="form-group">
        <label for="puesto">Puesto</label>
        <?php echo $this->tag->textField(array('puesto', 'size' => 30, 'class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <label for="idtipos_usuario">Tipo de Usuario</label>
        <?php echo $tipousuario; ?>
    </div>
    <div class="form-group">
        <label for="idvehiculo">Vehiculo</label>
        <?php echo $vehiculo; ?>
    </div>
    <div class="form-group">
        <label for="fotografia">Fotografia</label>
        <?php echo $this->tag->textField(array('fotografia', 'size' => 30, 'class' => 'form-control')); ?>
    </div>
    <div class="form-group">
        <td><?php echo $this->tag->hiddenField(array('id')); ?></td>
        <td><?php echo $this->tag->submitButton(array('Save', 'class' => 'btn btn-primary')); ?></td>
    </div>
</table>

</form>
