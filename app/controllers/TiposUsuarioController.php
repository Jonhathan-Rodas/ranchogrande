<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class TiposUsuarioController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for tipos_usuario
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "TiposUsuario", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "idtipos_usuario";

        $tipos_usuario = TiposUsuario::find($parameters);
        if (count($tipos_usuario) == 0) {
            $this->flash->notice("The search did not find any tipos_usuario");

            return $this->dispatcher->forward(array(
                "controller" => "tipos_usuario",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $tipos_usuario,
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

    }

    /**
     * Edits a tipos_usuario
     *
     * @param string $idtipos_usuario
     */
    public function editAction($idtipos_usuario)
    {

        if (!$this->request->isPost()) {

            $tipos_usuario = TiposUsuario::findFirstByidtipos_usuario($idtipos_usuario);
            if (!$tipos_usuario) {
                $this->flash->error("tipos_usuario was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "tipos_usuario",
                    "action" => "index"
                ));
            }

            $this->view->idtipos_usuario = $tipos_usuario->idtipos_usuario;

            $this->tag->setDefault("idtipos_usuario", $tipos_usuario->idtipos_usuario);
            $this->tag->setDefault("tipo", $tipos_usuario->tipo);
            
        }
    }

    /**
     * Creates a new tipos_usuario
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "tipos_usuario",
                "action" => "index"
            ));
        }

        $tipos_usuario = new TiposUsuario();

        $tipos_usuario->tipo = $this->request->getPost("tipo");
        

        if (!$tipos_usuario->save()) {
            foreach ($tipos_usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "tipos_usuario",
                "action" => "new"
            ));
        }

        $this->flash->success("tipos_usuario was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "tipos_usuario",
            "action" => "index"
        ));

    }

    /**
     * Saves a tipos_usuario edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "tipos_usuario",
                "action" => "index"
            ));
        }

        $idtipos_usuario = $this->request->getPost("idtipos_usuario");

        $tipos_usuario = TiposUsuario::findFirstByidtipos_usuario($idtipos_usuario);
        if (!$tipos_usuario) {
            $this->flash->error("tipos_usuario does not exist " . $idtipos_usuario);

            return $this->dispatcher->forward(array(
                "controller" => "tipos_usuario",
                "action" => "index"
            ));
        }

        $tipos_usuario->tipo = $this->request->getPost("tipo");
        

        if (!$tipos_usuario->save()) {

            foreach ($tipos_usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "tipos_usuario",
                "action" => "edit",
                "params" => array($tipos_usuario->idtipos_usuario)
            ));
        }

        $this->flash->success("tipos_usuario was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "tipos_usuario",
            "action" => "index"
        ));

    }

    /**
     * Deletes a tipos_usuario
     *
     * @param string $idtipos_usuario
     */
    public function deleteAction($idtipos_usuario)
    {

        $tipos_usuario = TiposUsuario::findFirstByidtipos_usuario($idtipos_usuario);
        if (!$tipos_usuario) {
            $this->flash->error("tipos_usuario was not found");

            return $this->dispatcher->forward(array(
                "controller" => "tipos_usuario",
                "action" => "index"
            ));
        }

        if (!$tipos_usuario->delete()) {

            foreach ($tipos_usuario->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "tipos_usuario",
                "action" => "search"
            ));
        }

        $this->flash->success("tipos_usuario was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "tipos_usuario",
            "action" => "index"
        ));
    }

}
