<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;
use Rodrigues\Barcode\Barcode;

class UsuarioController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $condominio =  Phalcon\Tag::select(array(
            "idcondominio",
            Condominio::find(),
            "using" => array("idcondominio","nombre")
        ,"class" => "form-control"
        ));
        $this->view->setVar("condominio",$condominio);
        $this->persistent->parameters = null;
    }

    /**
     * Searches for usuario
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Usuario", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "idusuario";

        $usuario = Usuario::find($parameters);
        if (count($usuario) == 0) {
            $this->flash->notice("The search did not find any usuario");

            return $this->dispatcher->forward(array(
                "controller" => "usuario",
                "action" => "index"
            ));
        }

        $barcode = new Barcode;

        echo "<style>";
        echo $barcode->getCssStyle();
        echo "</style>";

        //echo $barcode->code39("AB20150wewesdsd");


        $this->view->setVar("barcode",$barcode);

        $paginator = new Paginator(array(
            "data" => $usuario,
            "limit"=> 10,
            "page" => $numberPage
        ));

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    {
        $condominio =  Phalcon\Tag::select(array(
            "idcondominio",
            Condominio::find(),
            "using" => array("idcondominio","nombre")
        ,"class" => "form-control"
        ));
        $this->view->setVar("condominio",$condominio);

        $tipousuario =  Phalcon\Tag::select(array(
            "idtipos_usuario",
             TiposUsuario::find(),
            "using" => array("idtipos_usuario","tipo")
        ,"class" => "form-control"
        ));
        $this->view->setVar("tipousuario",$tipousuario);

        $vehiculo =  Phalcon\Tag::select(array(
            "idvehiculo",
            Vehiculo::find(),
            "using" => array("idvehiculo","placa")
        ,"class" => "form-control"
        ));
        $this->view->setVar("vehiculo",$vehiculo);
    }

    /**
     * Edits a usuario
     *
     * @param string $idusuario
     */
    public function editAction($idusuario)
    {

        if (!$this->request->isPost()) {

            $usuario = Usuario::findFirstByidusuario($idusuario);
            if (!$usuario) {
                $this->flash->error("usuario was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "usuario",
                    "action" => "index"
                ));
            }

            $condominio =  Phalcon\Tag::select(array(
                "idcondominio",
                Condominio::find(),
                "using" => array("idcondominio","nombre")
            ,"class" => "form-control"
            ));
            $this->view->setVar("condominio",$condominio);

            $tipousuario =  Phalcon\Tag::select(array(
                "idtipos_usuario",
                TiposUsuario::find(),
                "using" => array("idtipos_usuario","tipo")
            ,"class" => "form-control"
            ));
            $this->view->setVar("tipousuario",$tipousuario);

            $vehiculo =  Phalcon\Tag::select(array(
                "idvehiculo",
                Vehiculo::find(),
                "using" => array("idvehiculo","placa")
            ,"class" => "form-control"
            ));
            $this->view->setVar("vehiculo",$vehiculo);


            $this->view->idusuario = $usuario->idusuario;

            $this->tag->setDefault("idusuario", $usuario->idusuario);
            $this->tag->setDefault("nombre", $usuario->nombre);
            $this->tag->setDefault("apellido", $usuario->apellido);
            $this->tag->setDefault("dpi", $usuario->dpi);
            $this->tag->setDefault("idcondominio", $usuario->idcondominio);
            $this->tag->setDefault("puesto", $usuario->puesto);
            $this->tag->setDefault("idtipos_usuario", $usuario->idtipos_usuario);
            $this->tag->setDefault("idvehiculo", $usuario->idvehiculo);
            $this->tag->setDefault("fotografia", $usuario->fotografia);
            
        }
    }

    /**
     * Creates a new usuario
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "usuario",
                "action" => "index"
            ));
        }

        $usuario = new Usuario();

        $usuario->nombre = $this->request->getPost("nombre");
        $usuario->apellido = $this->request->getPost("apellido");
        $usuario->dpi = $this->request->getPost("dpi");
        $usuario->idcondominio = $this->request->getPost("idcondominio");
        $usuario->puesto = $this->request->getPost("puesto");
        $usuario->idtipos_usuario = $this->request->getPost("idtipos_usuario");
        $usuario->idvehiculo = $this->request->getPost("idvehiculo");
        $usuario->fotografia = $this->request->getPost("fotografia");
        

        if (!$usuario->save()) {
            foreach ($usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "usuario",
                "action" => "new"
            ));
        }

        $this->flash->success("usuario was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "usuario",
            "action" => "index"
        ));

    }

    /**
     * Saves a usuario edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "usuario",
                "action" => "index"
            ));
        }

        $idusuario = $this->request->getPost("idusuario");

        $usuario = Usuario::findFirstByidusuario($idusuario);
        if (!$usuario) {
            $this->flash->error("usuario does not exist " . $idusuario);

            return $this->dispatcher->forward(array(
                "controller" => "usuario",
                "action" => "index"
            ));
        }

        $usuario->nombre = $this->request->getPost("nombre");
        $usuario->apellido = $this->request->getPost("apellido");
        $usuario->dpi = $this->request->getPost("dpi");
        $usuario->idcondominio = $this->request->getPost("idcondominio");
        $usuario->puesto = $this->request->getPost("puesto");
        $usuario->idtipos_usuario = $this->request->getPost("idtipos_usuario");
        $usuario->idvehiculo = $this->request->getPost("idvehiculo");
        $usuario->fotografia = $this->request->getPost("fotografia");
        

        if (!$usuario->save()) {

            foreach ($usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "usuario",
                "action" => "edit",
                "params" => array($usuario->idusuario)
            ));
        }

        $this->flash->success("usuario was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "usuario",
            "action" => "index"
        ));

    }

    /**
     * Deletes a usuario
     *
     * @param string $idusuario
     */
    public function deleteAction($idusuario)
    {

        $usuario = Usuario::findFirstByidusuario($idusuario);
        if (!$usuario) {
            $this->flash->error("usuario was not found");

            return $this->dispatcher->forward(array(
                "controller" => "usuario",
                "action" => "index"
            ));
        }

        if (!$usuario->delete()) {

            foreach ($usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "usuario",
                "action" => "search"
            ));
        }

        $this->flash->success("usuario was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "usuario",
            "action" => "index"
        ));
    }

}
