
<?php echo $this->getContent(); ?>

<div align="right">
    <?php echo $this->tag->linkTo(array('acceso/new', 'Create acceso')); ?>
</div>

<?php echo $this->tag->form(array('acceso/search', 'method' => 'post', 'autocomplete' => 'off')); ?>

<div align="center">
    <h1>Search acceso</h1>
</div>

<table>
    <tr>
        <td align="right">
            <label for="idacceso">Idacceso</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('idacceso', 'type' => 'numeric')); ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="idusuario">Idusuario</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('idusuario', 'type' => 'numeric')); ?>
        </td>
    </tr>
    <tr>
        <td align="right">
            <label for="time">Time</label>
        </td>
        <td align="left">
            <?php echo $this->tag->textField(array('time', 'size' => 30)); ?>
        </td>
    </tr>

    <tr>
        <td></td>
        <td><?php echo $this->tag->submitButton(array('Search')); ?></td>
    </tr>
</table>

</form>
