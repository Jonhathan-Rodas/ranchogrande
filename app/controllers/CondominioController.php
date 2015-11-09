<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class CondominioController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for condominio
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Condominio", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "idcondominio";

        $condominio = Condominio::find($parameters);
        if (count($condominio) == 0) {
            $this->flash->notice("The search did not find any condominio");

            return $this->dispatcher->forward(array(
                "controller" => "condominio",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $condominio,
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
     * Edits a condominio
     *
     * @param string $idcondominio
     */
    public function editAction($idcondominio)
    {

        if (!$this->request->isPost()) {

            $condominio = Condominio::findFirstByidcondominio($idcondominio);
            if (!$condominio) {
                $this->flash->error("condominio was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "condominio",
                    "action" => "index"
                ));
            }

            $this->view->idcondominio = $condominio->idcondominio;

            $this->tag->setDefault("idcondominio", $condominio->idcondominio);
            $this->tag->setDefault("nombre", $condominio->nombre);
            
        }
    }

    /**
     * Creates a new condominio
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "condominio",
                "action" => "index"
            ));
        }

        $condominio = new Condominio();

        $condominio->nombre = $this->request->getPost("nombre");
        

        if (!$condominio->save()) {
            foreach ($condominio->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "condominio",
                "action" => "new"
            ));
        }

        $this->flash->success("condominio was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "condominio",
            "action" => "index"
        ));

    }

    /**
     * Saves a condominio edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "condominio",
                "action" => "index"
            ));
        }

        $idcondominio = $this->request->getPost("idcondominio");

        $condominio = Condominio::findFirstByidcondominio($idcondominio);
        if (!$condominio) {
            $this->flash->error("condominio does not exist " . $idcondominio);

            return $this->dispatcher->forward(array(
                "controller" => "condominio",
                "action" => "index"
            ));
        }

        $condominio->nombre = $this->request->getPost("nombre");
        

        if (!$condominio->save()) {

            foreach ($condominio->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "condominio",
                "action" => "edit",
                "params" => array($condominio->idcondominio)
            ));
        }

        $this->flash->success("condominio was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "condominio",
            "action" => "index"
        ));

    }

    /**
     * Deletes a condominio
     *
     * @param string $idcondominio
     */
    public function deleteAction($idcondominio)
    {

        $condominio = Condominio::findFirstByidcondominio($idcondominio);
        if (!$condominio) {
            $this->flash->error("condominio was not found");

            return $this->dispatcher->forward(array(
                "controller" => "condominio",
                "action" => "index"
            ));
        }

        if (!$condominio->delete()) {

            foreach ($condominio->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "condominio",
                "action" => "search"
            ));
        }

        $this->flash->success("condominio was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "condominio",
            "action" => "index"
        ));
    }

}
