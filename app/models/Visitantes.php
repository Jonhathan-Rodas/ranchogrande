<?php

class Visitantes extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idvisitante;

    /**
     *
     * @var string
     */
    public $nombre;

    /**
     *
     * @var string
     */
    public $apellido;

    /**
     *
     * @var string
     */
    public $entrada;

    /**
     *
     * @var string
     */
    public $salida;

    /**
     *
     * @var integer
     */
    public $idcondominio;

    /**
     *
     * @var string
     */
    public $placa;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('idcondominio', 'Condominio', 'idcondominio', array('alias' => 'Condominio'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'visitantes';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Visitantes[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Visitantes
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
