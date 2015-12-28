
<?php echo $this->tag->form(array('tipos_usuario/create', 'method' => 'post')); ?>

<table width="100%">
    <tr>
        <td align="left"><?php echo $this->tag->linkTo(array('tipos_usuario', 'Regresar', 'class' => 'btn btn-default')); ?></td>
    </tr>
</table>

<?php echo $this->getContent(); ?>

<div align="center">
    <h1>Crear Tipo de usuarios</h1>
</div>

<table>
    <div class="form-group">
            <label for="tipo">Tipo</label>
            <?php echo $this->tag->textField(array('tipo', 'size' => 30, 'class' => 'form-control')); ?>
    </div>

    <div class="form-group">
       <?php echo $this->tag->submitButton(array('Guardar', 'class' => 'btn btn-primary')); ?>
    </div>
</table>

</form>
