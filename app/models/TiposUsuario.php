<?php

class TiposUsuario extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idtipos_usuario;

    /**
     *
     * @var string
     */
    public $tipo;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('idtipos_usuario', 'Usuario', 'idtipos_usuario', array('alias' => 'Usuario'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tipos_usuario';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TiposUsuario[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TiposUsuario
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
