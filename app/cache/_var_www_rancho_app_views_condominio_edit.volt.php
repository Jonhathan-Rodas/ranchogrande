<?php echo $this->getContent(); ?>
<?php echo $this->tag->form(array('condominio/save', 'method' => 'post')); ?>

<table width="100%">
    <tr>
        <?php echo $this->tag->linkTo(array('condominio/index', 'Regresar', 'class' => 'btn btn-default')); ?>
      </tr>
</table>

<div align="center">
    <h1>Editar condominio</h1>
</div>

<table>
    <div class="form-group">
            <label for="nombre">Nombre</label>
            <?php echo $this->tag->textField(array('nombre', 'size' => 30, 'class' => 'form-control')); ?>

    </div>

    <tr>
        <td><?php echo $this->tag->hiddenField(array('id')); ?></td>
        <td><?php echo $this->tag->submitButton(array('Guardar', 'class' => 'btn btn-primary')); ?></td>
    </tr>
</table>

</form>
