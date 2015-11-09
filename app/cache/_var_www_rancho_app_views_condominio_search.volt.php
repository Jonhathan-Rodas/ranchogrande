
<?php echo $this->getContent(); ?>

<table width="100%">
    <tr>
        <td align="left">
            <?php echo $this->tag->linkTo(array('condominio/index', 'Regresar', 'class' => 'btn btn-default')); ?>
        </td>
        <td align="right">
            <?php echo $this->tag->linkTo(array('condominio/new', 'Crear un nuevo Condominio ', 'class' => 'btn btn-success')); ?>
        </td>
    </tr>
</table>

<table class="browse table table-striped" align="center">
    <thead>
        <tr>
            <th>Nombre</th>
         </tr>
        <tr></tr>
        <tr></tr>
    </thead>
    <tbody>
    <?php if (isset($page->items)) { ?>
    <?php foreach ($page->items as $condominio) { ?>
        <tr>
            <td><?php echo $condominio->nombre; ?></td>
            <td><?php echo $this->tag->linkTo(array('condominio/edit/' . $condominio->idcondominio, 'Editar', 'class' => 'btn btn-success')); ?></td>
            <td><?php echo $this->tag->linkTo(array('condominio/delete/' . $condominio->idcondominio, 'Eliminar', 'class' => 'btn btn-danger')); ?></td>
        </tr>
    <?php } ?>
    <?php } ?>
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td><?php echo $this->tag->linkTo(array('condominio/search', '<<', 'class' => 'btn btn-default')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('condominio/search?page=' . $page->before, 'Anterior', 'class' => 'btn btn-default')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('condominio/search?page=' . $page->next, 'Siguiente', 'class' => 'btn btn-default')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('condominio/search?page=' . $page->last, '>>', 'class' => 'btn btn-default')); ?></td>
                        <td class="btn btn-info"><?php echo $page->current . '/' . $page->total_pages; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
