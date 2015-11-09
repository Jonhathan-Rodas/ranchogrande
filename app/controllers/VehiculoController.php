<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;

class VehiculoController extends ControllerBase
{

    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
        $tipo_vehiculo =  Phalcon\Tag::select(array(
            "idtipos_vehiculo",
            TiposVehiculo::find(),
                "using" => array("idtipos_vehiculo","tipo")
        ,"class" => "form-control"
        ));
        $this->view->setVar("tipo_vehiculo",$tipo_vehiculo);
    }

    /**
     * Searches for vehiculo
     */
    public function searchAction()
    {

        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, "Vehiculo", $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = array();
        }
        $parameters["order"] = "idvehiculo";

        $vehiculo = Vehiculo::find($parameters);
        if (count($vehiculo) == 0) {
            $this->flash->notice("The search did not find any vehiculo");

            return $this->dispatcher->forward(array(
                "controller" => "vehiculo",
                "action" => "index"
            ));
        }

        foreach($vehiculo as $v){
            //print_r($v->TiposVehiculo);
        }

        $paginator = new Paginator(array(
            "data" => $vehiculo,
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
        $tipo_vehiculo =  Phalcon\Tag::select(array(
            "idtipos_vehiculo",
            TiposVehiculo::find(),
            "using" => array("idtipos_vehiculo","tipo")
        ,"class" => "form-control"
        ));
        $this->view->setVar("tipo_vehiculo",$tipo_vehiculo);
    }

    /**
     * Edits a vehiculo
     *
     * @param string $idvehiculo
     */
    public function editAction($idvehiculo)
    {

        if (!$this->request->isPost()) {

            $vehiculo = Vehiculo::findFirstByidvehiculo($idvehiculo);
            if (!$vehiculo) {
                $this->flash->error("vehiculo was not found");

                return $this->dispatcher->forward(array(
                    "controller" => "vehiculo",
                    "action" => "index"
                ));
            }

            $this->view->idvehiculo = $vehiculo->idvehiculo;

            $this->tag->setDefault("idvehiculo", $vehiculo->idvehiculo);
            $this->tag->setDefault("idtipos_vehiculo", $vehiculo->idtipos_vehiculo);
            $this->tag->setDefault("placa", $vehiculo->placa);
            
        }
    }

    /**
     * Creates a new vehiculo
     */
    public function createAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "vehiculo",
                "action" => "index"
            ));
        }

        $vehiculo = new Vehiculo();

        $vehiculo->idtipos_vehiculo = $this->request->getPost("idtipos_vehiculo");
        $vehiculo->placa = $this->request->getPost("placa");
        

        if (!$vehiculo->save()) {
            foreach ($vehiculo->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "vehiculo",
                "action" => "new"
            ));
        }

        $this->flash->success("vehiculo was created successfully");

        return $this->dispatcher->forward(array(
            "controller" => "vehiculo",
            "action" => "index"
        ));

    }

    /**
     * Saves a vehiculo edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            return $this->dispatcher->forward(array(
                "controller" => "vehiculo",
                "action" => "index"
            ));
        }

        $idvehiculo = $this->request->getPost("idvehiculo");

        $vehiculo = Vehiculo::findFirstByidvehiculo($idvehiculo);
        if (!$vehiculo) {
            $this->flash->error("vehiculo does not exist " . $idvehiculo);

            return $this->dispatcher->forward(array(
                "controller" => "vehiculo",
                "action" => "index"
            ));
        }

        $vehiculo->idtipos_vehiculo = $this->request->getPost("idtipos_vehiculo");
        $vehiculo->placa = $this->request->getPost("placa");
        

        if (!$vehiculo->save()) {

            foreach ($vehiculo->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "vehiculo",
                "action" => "edit",
                "params" => array($vehiculo->idvehiculo)
            ));
        }

        $this->flash->success("vehiculo was updated successfully");

        return $this->dispatcher->forward(array(
            "controller" => "vehiculo",
            "action" => "index"
        ));

    }

    /**
     * Deletes a vehiculo
     *
     * @param string $idvehiculo
     */
    public function deleteAction($idvehiculo)
    {

        $vehiculo = Vehiculo::findFirstByidvehiculo($idvehiculo);
        if (!$vehiculo) {
            $this->flash->error("vehiculo was not found");

            return $this->dispatcher->forward(array(
                "controller" => "vehiculo",
                "action" => "index"
            ));
        }

        if (!$vehiculo->delete()) {

            foreach ($vehiculo->getMessages() as $message) {
                $this->flash->error($message);
            }

            return $this->dispatcher->forward(array(
                "controller" => "vehiculo",
                "action" => "search"
            ));
        }

        $this->flash->success("vehiculo was deleted successfully");

        return $this->dispatcher->forward(array(
            "controller" => "vehiculo",
            "action" => "index"
        ));
    }

}
