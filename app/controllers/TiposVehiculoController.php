<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class TiposVehiculoController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for tipos_vehiculo
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "TiposVehiculo", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "idtipos_vehiculo";

        $tipos_vehiculo = TiposVehiculo::find($parameters);
        if (count($tipos_vehiculo) == 0) {
            $this->flash->notice("The search did not find any tipos_vehiculo");

            return $this->dispatcher->forward(array(
                "controller" => "tipos_vehiculo",
                "action" => "index"
            ));
        }

        $paginator = new Paginator(array(
            "data" => $tipos_vehiculo,
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
     * Edits a tipos_vehiculo
     *
     * @param string $idtipos_vehiculo
     */
    public function editAction($idtipos_vehiculo)
    {

        if (!$this->request->isPost()) {

            $tipos_vehiculo = TiposVehiculo::findFirstByidtipos_vehiculo($idtipos_vehiculo);
            if (!$tipos_vehiculo) {
                $this->flash->error("tipos_vehiculo was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "tipos_vehiculo",
                    "action" => "index"
                ));
            }

            $this->view->idtipos_vehiculo = $tipos_vehiculo->idtipos_vehiculo;

            $this->tag->setDefault("idtipos_vehiculo", $tipos_vehiculo->idtipos_vehiculo);
            $this->tag->setDefault("tipo", $tipos_vehiculo->tipo);
            $this->tag->setDefault("tarifa", $tipos_vehiculo->tarifa);
            
        }
    }

    /**
     * Creates a new tipos_vehiculo
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "tipos_vehiculo",
                "action" => "index"
            ));
        }

        $tipos_vehiculo = new TiposVehiculo();

        $tipos_vehiculo->tipo = $this->request->getPost("tipo");
        $tipos_vehiculo->tarifa = $this->request->getPost("tarifa");
        

        if (!$tipos_vehiculo->save()) {
            foreach ($tipos_vehiculo->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "tipos_vehiculo",
                "action" => "new"
            ));
        }

        $this->flash->success("tipos_vehiculo was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "tipos_vehiculo",
            "action" => "index"
        ));

    }

    /**
     * Saves a tipos_vehiculo edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "tipos_vehiculo",
                "action" => "index"
            ));
        }

        $idtipos_vehiculo = $this->request->getPost("idtipos_vehiculo");

        $tipos_vehiculo = TiposVehiculo::findFirstByidtipos_vehiculo($idtipos_vehiculo);
        if (!$tipos_vehiculo) {
            $this->flash->error("tipos_vehiculo does not exist " . $idtipos_vehiculo);

            return $this->dispatcher->forward(array(
                "controller" => "tipos_vehiculo",
                "action" => "index"
            ));
        }

        $tipos_vehiculo->tipo = $this->request->getPost("tipo");
        $tipos_vehiculo->tarifa = $this->request->getPost("tarifa");
        

        if (!$tipos_vehiculo->save()) {

            foreach ($tipos_vehiculo->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "tipos_vehiculo",
                "action" => "edit",
                "params" => array($tipos_vehiculo->idtipos_vehiculo)
            ));
        }

        $this->flash->success("tipos_vehiculo was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "tipos_vehiculo",
            "action" => "index"
        ));

    }

    /**
     * Deletes a tipos_vehiculo
     *
     * @param string $idtipos_vehiculo
     */
    public function deleteAction($idtipos_vehiculo)
    {

        $tipos_vehiculo = TiposVehiculo::findFirstByidtipos_vehiculo($idtipos_vehiculo);
        if (!$tipos_vehiculo) {
            $this->flash->error("tipos_vehiculo was not found");

            return $this->dispatcher->forward(array(
                "controller" => "tipos_vehiculo",
                "action" => "index"
            ));
        }

        if (!$tipos_vehiculo->delete()) {

            foreach ($tipos_vehiculo->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "tipos_vehiculo",
                "action" => "search"
            ));
        }

        $this->flash->success("tipos_vehiculo was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "tipos_vehiculo",
            "action" => "index"
        ));
    }

}
