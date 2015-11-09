<?php

class Condominio extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idcondominio;

    /**
     *
     * @var string
     */
    public $nombre;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('idcondominio', 'Usuario', 'idcondominio', array('alias' => 'Usuario'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'condominio';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Condominio[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Condominio
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
