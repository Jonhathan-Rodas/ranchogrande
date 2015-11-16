<?php

class ReportController extends ControllerBase{
    public function indexAction()
    {
        $this->persistent->parameters = null;

        $condominio = Condominio::findFirstByidcondominio('1');

        print_r($condominio->usuario->acceso);
    }
}