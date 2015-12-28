
<?php echo $this->getContent(); ?>

<div align="right">
    <?php echo $this->tag->linkTo(array('tipos_usuario/new', 'Create tipo  de usuarios', 'class' => 'btn btn-success')); ?>
</div>

<?php echo $this->tag->form(array('tipos_usuario/search', 'method' => 'post', 'autocomplete' => 'off')); ?>

<div align="center">
    <h1>Buscar Tipos de Usuarios</h1>
</div>

<table>
    <div class="form-group">
            <label for="tipo">Tipo</label>
            <?php echo $this->tag->textField(array('tipo', 'size' => 30, 'class' => 'form-control')); ?>
    </div>

    <div class="form-group">
        <?php echo $this->tag->submitButton(array('Buscar', 'class' => 'btn btn-primary')); ?>
    </div>
</table>

</form>
