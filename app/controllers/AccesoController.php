<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class AccesoController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for acceso
     */
    public function searchAction()
    {

       $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Acceso", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "time DESC";

        $acceso = Acceso::find($parameters);
      
	 if (count($acceso) == 0) {
            $this->flash->notice("The search did not find any acceso");

            return $this->dispatcher->forward(array(
                "controller" => "acceso",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $acceso,
          "limit" => 300,
            "page" => $numberPage
        ));

         $condominios =  Phalcon\Tag::select(array(
            "idcondominio",
            Condominio::find(),
            "using" => array("idcondominio","nombre")
        ,"class" => "form-control"
        ));

        $this->view->setVar( "condominios" , $condominios );
 
	$this->view->page =  $paginator->getPaginate();
    }

    public function userAction(){
	 
	$dpi  = $this->request->getPost("dpi");
	$desde  = $this->request->getPost("desde");
	$time_desde = new DateTime($desde);
	$time_desde =$time_desde->format('Y-m-d H:i:s') ;


	$hasta  = $this->request->getPost("hasta");
	$time_hasta = new DateTime($hasta);
	$time_hasta =$time_hasta->format('Y-m-d H:i:s') ;
        
	$this->view->setVar("time_desde", $time_hasta );
	
        $usuario = Usuario::findFirstBydpi($dpi);
        $idusuario =   $usuario->idusuario;
	
	#$this->request->getPost("idusuario");
   	$conditions = "idusuario = ?1  AND (  time >= ?2 and time <= ?3 )";
	$parameters = array(1 => $idusuario, 2 => $time_desde, 3 => $time_hasta); 
	$users = Acceso::find(
		array(
		$conditions,
			"bind" => $parameters
		)	
	);
	 
	$this->view->setVar("usuario",$usuario);
        $this->view->setVar("users",$users);
        $this->view->setVar("desde",$desde);
        $this->view->setVar("hasta",$hasta);
	

	
   }	

   public function empresaAction(){
	$desde  = $this->request->getPost("desde");
	$time_desde = new DateTime($desde);
	$time_desde =$time_desde->format('Y-m-d H:i:s') ;


	$hasta  = $this->request->getPost("hasta");
	$time_hasta = new DateTime($hasta);
	$time_hasta =$time_hasta->format('Y-m-d H:i:s') ;
       
	$idcondominio  = $this->request->getPost("idcondominio");
	$condominio = Condominio::findFirstByidcondominio ($idcondominio);

        $conditions = "  time >= ?1 and time <= ?2 ";
	$parameters = array(1 => $time_desde, 2 => $time_hasta); 
	$acceso = Acceso::find(
		array(
                	$conditions,
                        "bind" => $parameters
                )      
	);	
	 $this->view->setVar("accesos",$acceso);
	 $this->view->setVar("condominio",$condominio);
         $this->view->setVar("desde",$desde);
         $this->view->setVar("hasta",$hasta);

    } 	

    /**
     * Displays the creation form
     */
    public function newAction()
    {
        $acceso = Acceso::find(array(
            "order" => "time DESC",
            "limit" => "8"
        ));
        $this->view->setVar("accesos",$acceso);

        $date = new DateTime();
        $this->view->setVar("date",$date);

    }

    public function movilAction()
    {
        $acceso = Acceso::find(array(
            "order" => "time DESC",
            "limit" => "8"
        ));
        $this->view->setVar("accesos",$acceso);

        $date = new DateTime();
        $this->view->setVar("date",$date);

    }

    /**
     * Edits a acceso
     *
     * @param string $idacceso
     */
    public function editAction($idacceso)
    {

        if (!$this->request->isPost()) {

            $acceso = Acceso::findFirstByidacceso($idacceso);
            if (!$acceso) {
                $this->flash->error("acceso was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "acceso",
                    "action" => "index"
                ));
            }

            $this->view->idacceso = $acceso->idacceso;

            $this->tag->setDefault("idacceso", $acceso->idacceso);
            $this->tag->setDefault("idusuario", $acceso->idusuario);
            $this->tag->setDefault("time", $acceso->time);
            
        }
    }

    /**
     * Creates a new acceso
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "acceso",
                "action" => "index"
            ));
        }

        $acceso = new Acceso();
        $usuario  = $this->request->getPost("idusuario");
        $usuario = Usuario::findFirstBydpi($usuario);
        $acceso->idusuario =   $usuario->idusuario;
        $acceso->time = $this->request->getPost("time");

        $log = Acceso::findByidusuario($acceso->idusuario);
        $ultimo =  count($log);
        $tipo = ( $log[$ultimo-1]->tipo == 0 ) ? 1 : 0;
        $acceso->tipo = $tipo;

        if (!$acceso->save()) {
            foreach ($acceso->getMessages() as $message) {
                $this->flash->error(
                    '<div class="alert alert-danger" role="alert">
                        El Usuario no existe
                    </div>'
                );
            }
            return $this->dispatcher->forward(array(
                "controller" => "acceso",
                "action" => "new"
            ));
        }

        $msg_tipo = ($tipo == 0 )
            ? '<div class="alert alert-success" role="alert">Se Registro una Salida</div>'
            :'<div class="alert alert-info" role="alert">Se Registro un Entrada</div>';

        $this->flash->success($msg_tipo);

        return $this->dispatcher->forward(array(
            "controller" => "acceso",
            "action" => "new"
        ));

    }

    /**
     * Saves a acceso edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "acceso",
                "action" => "index"
            ));
        }

        $idacceso = $this->request->getPost("idacceso");

        $acceso = Acceso::findFirstByidacceso($idacceso);
        if (!$acceso) {
            $this->flash->error("acceso does not exist " . $idacceso);

            return $this->dispatcher->forward(array(
                "controller" => "acceso",
                "action" => "index"
            ));
        }

        $acceso->idusuario = $this->request->getPost("idusuario");
        $acceso->time = $this->request->getPost("time");
        

        if (!$acceso->save()) {

            foreach ($acceso->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "acceso",
                "action" => "edit",
                "params" => array($acceso->idacceso)
            ));
        }

        $this->flash->success("acceso was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "acceso",
            "action" => "index"
        ));

    }

    /**
     * Deletes a acceso
     *
     * @param string $idacceso
     */
    public function deleteAction($idacceso)
    {

        $acceso = Acceso::findFirstByidacceso($idacceso);
        if (!$acceso) {
            $this->flash->error("acceso was not found");

            return $this->dispatcher->forward(array(
                "controller" => "acceso",
                "action" => "index"
            ));
        }

        if (!$acceso->delete()) {

            foreach ($acceso->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "acceso",
                "action" => "search"
            ));
        }

        $this->flash->success("acceso was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "acceso",
            "action" => "index"
        ));
    }

    public function resumenAction()
    {

        $desde  = $this->request->getPost("desde");
        $time_desde = new DateTime($desde);
        $time_desde =$time_desde->format('Y-m-d H:i:s') ;


        $hasta  = $this->request->getPost("hasta");
        $time_hasta = new DateTime($hasta);
        $time_hasta =$time_hasta->format('Y-m-d H:i:s') ;
       
        $idcondominio  = $this->request->getPost("idcondominio");        

        $acceso = new Acceso;

        $condominios = Condominio::find();
        $tipos_v = TiposVehiculo::find();

        echo '<h1>Resumen de Accesos</h1>';
        echo "Del: $desde  Al: $hasta";

        if($condominios->count() > 0 ) {
            foreach ($condominios as $condominio) {
                echo "<hr/>
                        <h4>". $condominio->nombre .'</h4>
                     <hr/>
                    <table class="table table-striped">
                    <tr>
                        <td>Tipo de Vehiculo</td>
                        <td> Total de Entradas y Salidas</td>
                    </tr>
                '; 
                $total= 0;
                foreach ($tipos_v as $tipo) {
                    $resumen = $acceso->resumen( 
                        $condominio->idcondominio, $time_desde, $time_hasta, $tipo->idtipos_vehiculo 
                    );
                    if($resumen->count() > 0){
                      $totaltipo=round($resumen->count() / 2);
                       echo '<tr>
                        <td>'. $tipo->tipo.'</td>
                        <td>'. $totaltipo .'</td>
                        </tr>'; 
                        $total = $total + $totaltipo;
                    }                    
                }
                 echo ' </table> ';
                 echo '<div class="well">Total de Entradas/Saldias: '. $total .'</div>';
            }
        } 
        echo "
        <script>
            $('.side-nav').remove();
            $('#wrapper').css('padding-left','0px');
        </script>
        ";
        header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=accesos.xlsx"); 
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false);   
    }              
}
