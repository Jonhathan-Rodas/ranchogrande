<?php
use Phalcon\Mvc\Model\Query;
use Store\Models\Acceso;
class ReportController extends ControllerBase{
    public function indexAction()
    {
        $this->persistent->parameters = null;

        $condominio = Condominio::findFirstByidcondominio('1');

        print_r($condominio->usuario->acceso);
    }
    public  function   resumenAction (){
        $query =$this->modelsManager->createQuery("SELECT * FROM acceso");
        $cars  = $query->execute();

    }
}