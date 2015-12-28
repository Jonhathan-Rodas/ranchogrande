<?php echo $this->getContent(); ?>
<?php echo $this->tag->form(array('tipos_usuario/save', 'method' => 'post')); ?>

<table width="100%">
    <tr>
        <td align="left"><?php echo $this->tag->linkTo(array('tipos_usuario', 'Regresar', 'class' => 'btn btn-default')); ?></td>
    </tr>
</table>

<div align="center">
    <h1>Editar Tipo de Usuario</h1>
</div>

<table>
    <div class="form-group">
            <label for="tipo">Tipo</label>
            <?php echo $this->tag->textField(array('tipo', 'size' => 30, 'class' => 'form-control')); ?>
    </div>

    <div class="form-group">
        <?php echo $this->tag->hiddenField(array('id')); ?>
        <?php echo $this->tag->submitButton(array('Guardar', 'class' => 'btn btn-primary')); ?>
    </div>
</table>

</form>
