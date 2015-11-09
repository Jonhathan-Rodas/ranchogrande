
<?php echo $this->getContent(); ?>

<table width="100%">
    <tr>
        <td align="left">
            <?php echo $this->tag->linkTo(array('vehiculo/index', 'Regresar', 'class' => 'btn btn-default')); ?>
        </td>
        <td align="right">
            <?php echo $this->tag->linkTo(array('vehiculo/new', 'Agregar un nuevo vehiculo ', 'class' => 'btn btn-success')); ?>
        </td>
    </tr>
</table>

<table class="browse table table-striped" align="center">
    <thead>
        <tr>
            <th>Placa</th>
            <th>Tipo de Vehiculo</th>

         </tr>
    </thead>
    <tbody>
    <?php if (isset($page->items)) { ?>
    <?php foreach ($page->items as $vehiculo) { ?>
        <tr>

            <td><?php echo $vehiculo->placa; ?></td>
            <td><?php echo $vehiculo->TiposVehiculo->tipo; ?></td>
            <td><?php echo $this->tag->linkTo(array('vehiculo/edit/' . $vehiculo->idvehiculo, 'Edit', 'class' => 'btn btn-success')); ?></td>
            <td><?php echo $this->tag->linkTo(array('vehiculo/delete/' . $vehiculo->idvehiculo, 'Delete', 'class' => 'btn btn-danger')); ?></td>
        </tr>
    <?php } ?>
    <?php } ?>
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td><?php echo $this->tag->linkTo(array('vehiculo/search', '<<', 'class' => 'btn btn-default')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('vehiculo/search?page=' . $page->before, 'Anterior', 'class' => 'btn btn-default')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('vehiculo/search?page=' . $page->next, 'Siguiente', 'class' => 'btn btn-default')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('vehiculo/search?page=' . $page->last, '>>', 'class' => 'btn btn-default')); ?></td>
                        <td class="btn btn-info"><?php echo $page->current . '/' . $page->total_pages; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
