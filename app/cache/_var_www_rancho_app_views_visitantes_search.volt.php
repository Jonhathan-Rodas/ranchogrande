<div class="row">
    <nav>
        <ul class="pager">
            <li class="previous"><?php echo $this->tag->linkTo(array('visitantes/index', 'Go Back')); ?></li>
            <li class="next"><?php echo $this->tag->linkTo(array('visitantes/new', 'Create ')); ?></li>
        </ul>
    </nav>
</div>

<div class="page-header">
    <h1>Search result</h1>
</div>

<?php echo $this->getContent(); ?>

<div class="row">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Idvisitante</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Entrada</th>
            <th>Salida</th>
            <th>Idcondominio</th>
            <th>Placa</th>

                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        <?php if (isset($page->items)) { ?>
        <?php foreach ($page->items as $visitante) { ?>
            <tr>
                <td><?php echo $visitante->idvisitante; ?></td>
            <td><?php echo $visitante->nombre; ?></td>
            <td><?php echo $visitante->apellido; ?></td>
            <td><?php echo $visitante->entrada; ?></td>
            <td><?php echo $visitante->salida; ?></td>
            <td><?php echo $visitante->idcondominio; ?></td>
            <td><?php echo $visitante->placa; ?></td>

                <td><?php echo $this->tag->linkTo(array('visitantes/edit/' . $visitante->idvisitante, 'Edit')); ?></td>
                <td><?php echo $this->tag->linkTo(array('visitantes/delete/' . $visitante->idvisitante, 'Delete')); ?></td>
            </tr>
        <?php } ?>
        <?php } ?>
        </tbody>
    </table>
</div>

<div class="row">
    <div class="col-sm-1">
        <p class="pagination" style="line-height: 1.42857;padding: 6px 12px;">
            <?php echo $page->current . '/' . $page->total_pages; ?>
        </p>
    </div>
    <div class="col-sm-11">
        <nav>
            <ul class="pagination">
                <li><?php echo $this->tag->linkTo(array('visitantes/search', 'First')); ?></li>
                <li><?php echo $this->tag->linkTo(array('visitantes/search?page=' . $page->before, 'Previous')); ?></li>
                <li><?php echo $this->tag->linkTo(array('visitantes/search?page=' . $page->next, 'Next')); ?></li>
                <li><?php echo $this->tag->linkTo(array('visitantes/search?page=' . $page->last, 'Last')); ?></li>
            </ul>
        </nav>
    </div>
</div>
