
<?php echo $this->getContent(); ?>

<div align="right">
    <?php echo $this->tag->linkTo(array('usuario/new', 'Crear usuario', 'class' => 'btn btn-success')); ?>
</div>

<?php echo $this->tag->form(array('usuario/search', 'method' => 'post', 'autocomplete' => 'off')); ?>

<div align="center">
    <h3>Busca por:</h3>
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
        <?php echo $this->tag->submitButton(array('Buscar', 'class' => 'btn btn-primary ')); ?>
    </div>
</table>

</form>
