
<?php echo $this->getContent(); ?>

<div align="right">
    <?php echo $this->tag->linkTo(array('condominio/new', 'Crear condominio', 'class' => 'btn btn-success')); ?>
</div>

<?php echo $this->tag->form(array('condominio/search', 'method' => 'post', 'autocomplete' => 'off')); ?>

<div >
    <h1>Buscar Condominio</h1>
</div>
    <div class="form-group">
            <label for="nombre">Nombre</label>
            <?php echo $this->tag->textField(array('nombre', 'size' => 30, 'class' => 'form-control')); ?>
    </div>

    <div class="form-group">
        <?php echo $this->tag->submitButton(array('Buscar', 'class' => 'btn btn-primary')); ?>
    </div>
</form>
