
<?php echo $this->tag->form(array('usuario/create', 'method' => 'post')); ?>

<table width="100%">
    <tr>
        <td align="left"><?php echo $this->tag->linkTo(array('usuario', 'Regresar', 'class' => 'btn btn-default')); ?></td>
    </tr>
</table>

<?php echo $this->getContent(); ?>

<div align="center">
    <h1>Create usuario</h1>
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
            <label for="idcondominio">Idcondominio</label>
            <?php echo $this->tag->textField(array('idcondominio', 'type' => 'numeric', 'class' => 'form-control')); ?>
    </div>
    <div class="form-group">
            <label for="puesto">Puesto</label>
            <?php echo $this->tag->textField(array('puesto', 'size' => 30, 'class' => 'form-control')); ?>
    </div>
    <div class="form-group">
            <label for="idtipos_usuario">Idtipos Of Usuario</label>
            <?php echo $this->tag->textField(array('idtipos_usuario', 'type' => 'numeric', 'class' => 'form-control')); ?>
    </div>
    <div class="form-group">
            <label for="idvehiculo">Idvehiculo</label>
            <?php echo $this->tag->textField(array('idvehiculo', 'type' => 'numeric', 'class' => 'form-control')); ?>
    </div>
    <div class="form-group">
            <label for="fotografia">Fotografia</label>
            <?php echo $this->tag->textField(array('fotografia', 'size' => 30, 'class' => 'form-control')); ?>
    </div>

    <div class="form-group">
        <?php echo $this->tag->submitButton(array('Guardar', 'class' => 'btn btn-primary')); ?>
    </div>
</table>

</form>
