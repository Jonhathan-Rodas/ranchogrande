
<?php echo $this->getContent(); ?>

<table width="100%">
    <tr>
        <td align="left">
            <?php echo $this->tag->linkTo(array('acceso/index', 'Go Back')); ?>
        </td>
        <td align="right">
            <?php echo $this->tag->linkTo(array('acceso/new', 'Create ')); ?>
        </td>
    </tr>
</table>

<table class="browse table table-striped" >
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Condominio</th>
            <th>Placa</th>
            <th>Tipo</th>
            <th>Datos de Acceso</th>
         </tr>
    </thead>
    <tbody>
    <?php if (isset($page->items)) { ?>
    <?php foreach ($page->items as $acceso) { ?>
        <tr>
            <td><?php echo $acceso->usuario->nombre; ?> <?php echo $acceso->usuario->apellido; ?></td>
            <td><?php echo $acceso->usuario->condominio->nombre; ?></td>
            <td><?php echo $acceso->usuario->vehiculo->placa; ?></td>
            <td><?php echo $acceso->usuario->vehiculo->tipos_vehiculo->tipo; ?></td>
            <td>
                <?php if ($acceso->tipo == 1) { ?>
                   <span class="alert-success" > Entrada:  <?php echo $acceso->time; ?> </span>
                <?php } else { ?>
                  <span class="alert-warning">  Salida:  <?php echo $acceso->time; ?> </span>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
    <?php } ?>
    </tbody>
    <tbody>
        <tr>
            <td colspan="2" align="right">
                <table align="center">
                    <tr>
                        <td><?php echo $this->tag->linkTo(array('acceso/search', 'First')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('acceso/search?page=' . $page->before, 'Previous')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('acceso/search?page=' . $page->next, 'Next')); ?></td>
                        <td><?php echo $this->tag->linkTo(array('acceso/search?page=' . $page->last, 'Last')); ?></td>
                        <td><?php echo $page->current . '/' . $page->total_pages; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>
