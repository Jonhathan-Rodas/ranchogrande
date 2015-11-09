
<?php echo $this->getContent(); ?>

<table width="100%">
    <tr>
        <td align="left">
            <?php echo $this->tag->linkTo(array('tipos_vehiculo/index', 'Regresar', 'class' => 'btn btn-default')); ?>
        </td>
        <td align="right">
            <?php echo $this->tag->linkTo(array('tipos_vehiculo/new', 'Crear un nuevo tipo de vehiculo', 'class' => 'btn btn-success')); ?>
        </td>
    </tr>
</table>

<table class="browse table table-striped"align="center">
    <thead>
        <tr>

            <th>Tipo</th>
            <th>Tarifa</th>
            <th></th>
            <th></th>
         </tr>
    </thead>
    <tbody>
    <?php if (isset($page->items)) { ?>
    <?php foreach ($page->items as $tipos_vehiculo) { ?>

            <td><?php echo $tipos_vehiculo->tipo; ?></td>
            <td><?php echo $tipos_vehiculo->tarifa; ?></td>
            <td><?php echo $this->tag->linkTo(array('tipos_vehiculo/edit/' . $tipos_vehiculo->idtipos_vehiculo, 'Editar', 'class' => 'btn btn-success')); ?></td>
            <td><?php echo $this->tag->linkTo(array('tipos_vehiculo/delete/' . $tipos_vehiculo->idtipos_vehiculo, 'Eliminar ', 'class' => 'btn btn-danger')); ?></td>
        </tr>
    <?php } ?>
    <?php } ?>
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td><?php echo $this->tag->linkTo(array('tipos_vehiculo/search', '<<', 'class' => 'btn btn-default')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('tipos_vehiculo/search?page=' . $page->before, 'Anterior', 'class' => 'btn btn-default')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('tipos_vehiculo/search?page=' . $page->next, 'Siguiente', 'class' => 'btn btn-default')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('tipos_vehiculo/search?page=' . $page->last, '>>', 'class' => 'btn btn-default')); ?></td>
                        <td class="btn btn-info"><?php echo $page->current . '/' . $page->total_pages; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
