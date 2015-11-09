
<?php echo $this->getContent(); ?>

<table width="100%">
    <tr>
        <td align="left">
            <?php echo $this->tag->linkTo(array('tipos_usuario/index', 'Regresar', 'class' => 'btn btn-default')); ?>
        </td>
        <td align="right">
            <?php echo $this->tag->linkTo(array('tipos_usuario/new', 'Agregar un nuevo vehiculo ', 'class' => 'btn btn-success')); ?>
        </td>
    </tr>
</table>

<table class="browse table table-striped"  align="center">
    <thead>
        <tr>
            <th>Tipo</th>
         </tr>
        <tr></tr>
        <tr></tr>
        <tr></tr>
    </thead>
    <tbody>
    <?php if (isset($page->items)) { ?>
    <?php foreach ($page->items as $tipos_usuario) { ?>
        <tr>
            <td><?php echo $tipos_usuario->tipo; ?></td>
            <td><?php echo $this->tag->linkTo(array('tipos_usuario/edit/' . $tipos_usuario->idtipos_usuario, 'Edit')); ?></td>
            <td><?php echo $this->tag->linkTo(array('tipos_usuario/delete/' . $tipos_usuario->idtipos_usuario, 'Delete')); ?></td>
        </tr>
    <?php } ?>
    <?php } ?>
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td><?php echo $this->tag->linkTo(array('tipos_usuario/search', '<<', 'class' => 'btn btn-default')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('tipos_usuario/search?page=' . $page->before, 'Anterior', 'class' => 'btn btn-default')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('tipos_usuario/search?page=' . $page->next, 'Siguiente', 'class' => 'btn btn-default')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('tipos_usuario/search?page=' . $page->last, '>>', 'class' => 'btn btn-default')); ?></td>
                        <td class="btn btn-info"><?php echo $page->current . '/' . $page->total_pages; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
