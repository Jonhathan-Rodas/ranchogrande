<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class VisitantesController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for visitantes
     */
    public function searchAction()
    {
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Visitantes', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "idvisitante";

        $visitantes = Visitantes::find($parameters);
        if (count($visitantes) == 0) {
            $this->flash->notice("The search did not find any visitantes");

            return $this->dispatcher->forward(array(
                "controller" => "visitantes",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $visitantes,
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
        $date = new DateTime();
        $this->view->setVar("date",$date);
    }

    /**
     * Edits a visitante
     *
     * @param string $idvisitante
     */
    public function editAction($idvisitante)
    {
        if (!$this->request->isPost()) {

            $visitante = Visitantes::findFirstByidvisitante($idvisitante);
            if (!$visitante) {
                $this->flash->error("visitante was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "visitantes",
                    "action" => "index"
                ));
            }

            $this->view->idvisitante = $visitante->idvisitante;

            $this->tag->setDefault("idvisitante", $visitante->idvisitante);
            $this->tag->setDefault("nombre", $visitante->nombre);
            $this->tag->setDefault("apellido", $visitante->apellido);
            $this->tag->setDefault("entrada", $visitante->entrada);
            $this->tag->setDefault("salida", $visitante->salida);
            $this->tag->setDefault("idcondominio", $visitante->idcondominio);
            $this->tag->setDefault("placa", $visitante->placa);
            
        }
    }

    /**
     * Creates a new visitante
     */
    public function createAction()
    {
        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "visitantes",
                "action" => "index"
            ));
        }

        $visitante = new Visitantes();

        $visitante->nombre = $this->request->getPost("nombre");
        $visitante->apellido = $this->request->getPost("apellido");
        $visitante->entrada = $this->request->getPost("entrada");
        $visitante->salida = $this->request->getPost("salida");
        $visitante->idcondominio = $this->request->getPost("idcondominio");
        $visitante->placa = $this->request->getPost("placa");
        

        if (!$visitante->save()) {
            foreach ($visitante->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "visitantes",
                "action" => "new"
            ));
        }

        $this->flash->success("visitante was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "visitantes",
            "action" => "index"
        ));
    }

    /**
     * Saves a visitante edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "visitantes",
                "action" => "index"
            ));
        }

        $idvisitante = $this->request->getPost("idvisitante");

        $visitante = Visitantes::findFirstByidvisitante($idvisitante);
        if (!$visitante) {
            $this->flash->error("visitante does not exist " . $idvisitante);

            return $this->dispatcher->forward(array(
                "controller" => "visitantes",
                "action" => "index"
            ));
        }

        $visitante->nombre = $this->request->getPost("nombre");
        $visitante->apellido = $this->request->getPost("apellido");
        $visitante->entrada = $this->request->getPost("entrada");
        $visitante->salida = $this->request->getPost("salida");
        $visitante->idcondominio = $this->request->getPost("idcondominio");
        $visitante->placa = $this->request->getPost("placa");
        

        if (!$visitante->save()) {

            foreach ($visitante->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "visitantes",
                "action" => "edit",
                "params" => array($visitante->idvisitante)
            ));
        }

        $this->flash->success("visitante was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "visitantes",
            "action" => "index"
        ));
    }

    /**
     * Deletes a visitante
     *
     * @param string $idvisitante
     */
    public function deleteAction($idvisitante)
    {
        $visitante = Visitantes::findFirstByidvisitante($idvisitante);
        if (!$visitante) {
            $this->flash->error("visitante was not found");

            return $this->dispatcher->forward(array(
                "controller" => "visitantes",
                "action" => "index"
            ));
        }

        if (!$visitante->delete()) {

            foreach ($visitante->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "visitantes",
                "action" => "search"
            ));
        }

        $this->flash->success("visitante was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "visitantes",
            "action" => "index"
        ));
    }

}
