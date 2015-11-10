
<?php echo $this->getContent(); ?>

<table width="100%">
    <tr>
        <td align="left">
            <?php echo $this->tag->linkTo(array('usuario/index', 'Buscar', 'class' => 'btn btn-default')); ?>

        </td>
        <td align="right">
            <?php echo $this->tag->linkTo(array('tipos_usuario/search', 'Ir a: Tipos de Usuario', 'class' => 'btn btn-primary')); ?>

            <?php echo $this->tag->linkTo(array('usuario/new', 'Agregar un Nuevo Usuario', 'class' => 'btn btn-success')); ?>
        </td>
    </tr>
</table>

<table class="browse table table-striped" align="center">
    <thead>
        <tr>

            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dpi</th>
            <th>Codigo</th>
            <th>Condominio</th>
            <th>Tipo de Usuario</th>
            <th>Vehiculo</th>
         </tr>
    </thead>
    <tbody>
    <?php if (isset($page->items)) { ?>
    <?php foreach ($page->items as $usuario) { ?>
        <tr>

            <td><?php echo $usuario->nombre; ?></td>
            <td><?php echo $usuario->apellido; ?></td>
            <td><?php echo $usuario->dpi; ?></td>
            <td><?php echo $barcode->code39($usuario->dpi); ?></td>
            <td><?php echo $usuario->condominio->nombre; ?></td>
            <td><?php echo $usuario->tiposusuario->tipo; ?></td>
            <td><?php echo $usuario->vehiculo->placa; ?></td>
            <td><?php echo $this->tag->linkTo(array('usuario/edit/' . $usuario->idusuario, 'Editar', 'class' => 'btn btn-success')); ?></td>
            <td><?php echo $this->tag->linkTo(array('usuario/delete/' . $usuario->idusuario, 'Eliminar', 'class' => 'btn btn-danger')); ?></td>
        </tr>
    <?php } ?>
    <?php } ?>
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td><?php echo $this->tag->linkTo(array('usuario/search', '<<', 'class' => 'btn btn-default')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('usuario/search?page=' . $page->before, 'Anterior', 'class' => 'btn btn-default')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('usuario/search?page=' . $page->next, 'Siguiente', 'class' => 'btn btn-default')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('usuario/search?page=' . $page->last, '>>', 'class' => 'btn btn-default')); ?></td>
                        <td class="btn btn-info"> <?php echo $page->current . '/' . $page->total_pages; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
