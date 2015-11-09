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
        $parameters["order"] = "idacceso";

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

        $acceso->idusuario = $this->request->getPost("idusuario");
        $acceso->time = $this->request->getPost("time");
        

        if (!$acceso->save()) {
            foreach ($acceso->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "acceso",
                "action" => "new"
            ));
        }

        $this->flash->success("acceso was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "acceso",
            "action" => "index"
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

}
