<?php

class Acceso extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idacceso;

    /**
     *
     * @var integer
     */
    public $idusuario;

    /**
     *
     * @var string
     */
    public $time;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->belongsTo('idusuario', 'Usuario', 'idusuario', array('alias' => 'Usuario'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'acceso';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Acceso[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Acceso
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
