
<?php echo $this->tag->form(array('condominio/create', 'method' => 'post')); ?>

<table width="100%">
    <tr>
        <?php echo $this->tag->linkTo(array('condominio/index', 'Regresar', 'class' => 'btn btn-default')); ?>
    </tr>
</table>

<?php echo $this->getContent(); ?>

<div align="center">
    <h1>Crear un nuevo Condominio</h1>
</div>

<table>
    <div class="form-group">
            <label for="nombre">Nombre</label>
            <?php echo $this->tag->textField(array('nombre', 'size' => 30, 'class' => 'form-control')); ?>

    </div>

    <tr>
        <td></td>
        <td><?php echo $this->tag->submitButton(array('Save', 'class' => 'btn btn-primary')); ?></td>
    </tr>
</table>

</form>
