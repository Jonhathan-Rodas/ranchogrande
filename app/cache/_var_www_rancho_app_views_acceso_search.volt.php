<hr/>
<h2> Buscar por Usuario</h2>
<?php echo $this->tag->form(array('acceso/user', 'method' => 'post', 'class' => 'well')); ?>
<?php echo $this->getContent(); ?>
<table>
         <tr>
	<div  class="form-group">
	Desde: <input type="text" name="desde" id="desde" size="30" class="form-control" required>  
	</div>
	
	<div  class="form-group">
		A: <input type="text" name="hasta" id="hasta" size="30" class="form-control" required>  
	</div>
	<script>
		$(function() {
			$( "#desde" ).datepicker();
   			$( "#desde" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
			$( "#hasta" ).datepicker();
   			$( "#hasta" ).datepicker( "option", "dateFormat", 'yy-mm-dd' )
   			 
  		});
	</script>

       <div class="form-group">
            <label for="idusuario">Ingrese DPI</label>
            <?php echo $this->tag->textField(array('dpi', 'type' => 'numeric', 'class' => 'form-control')); ?>
        </div>

        <td></td>
        <td><?php echo $this->tag->submitButton(array('Buscar', 'id' => 'Buscar por Usuario')); ?></td>
    </tr>
</table>
</form>


<hr/>
<h2> Buscar por empresa</h2>
<?php echo $this->tag->form(array('acceso/empresa', 'method' => 'post', 'class' => 'well')); ?>
<?php echo $this->getContent(); ?>
<table>
         <tr>
	<div  class="form-group">
	Desde: <input type="text" name="desde" id="desde-con" size="30" class="form-control" required>  
	</div>
	
	<div  class="form-group">
		A: <input type="text" name="hasta" id="hasta-con" size="30" class="form-control" required>  
	</div>
	<script>
		$(function() {
			$( "#desde-con" ).datepicker();
   			$( "#desde-con" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
			$( "#hasta-con" ).datepicker();
   			$( "#hasta-con" ).datepicker( "option", "dateFormat", 'yy-mm-dd' )
   			 
  		});
	</script>

       <div class="form-group">
            <label for="idusuario">Selecione el Condominio</label>
            <?php echo $condominios; ?>
        </div>

        <td></td>
        <td><?php echo $this->tag->submitButton(array('Buscar', 'id' => 'Buscar por Usuario')); ?></td>
    </tr>
</table>
</form>

<h2> Resumen</h2>
<?php echo $this->tag->form(array('acceso/resumen', 'method' => 'post', 'class' => 'well')); ?>
<?php echo $this->getContent(); ?>
<table>
         <tr>
  <div  class="form-group">
  Desde: <input type="text" name="desde" id="desde-res" size="30" class="form-control" required>  
  </div>
  
  <div  class="form-group">
    A: <input type="text" name="hasta" id="hasta-res" size="30" class="form-control" required>  
  </div>
  <script>
    $(function() {
      $( "#desde-res" ).datepicker();
        $( "#desde-res" ).datepicker( "option", "dateFormat", 'yy-mm-dd' );
      $( "#hasta-res" ).datepicker();
        $( "#hasta-res" ).datepicker( "option", "dateFormat", 'yy-mm-dd' )
         
      });
  </script>

        <td></td>
        <td><?php echo $this->tag->submitButton(array('Buscar', 'id' => 'Buscar por Usuario')); ?></td>
    </tr>
</table>
</form>




