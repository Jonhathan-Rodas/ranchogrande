<?php

class Usuario extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idusuario;

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
    public $dpi;

    /**
     *
     * @var integer
     */
    public $idcondominio;

    /**
     *
     * @var string
     */
    public $puesto;

    /**
     *
     * @var integer
     */
    public $idtipos_usuario;

    /**
     *
     * @var integer
     */
    public $idvehiculo;

    /**
     *
     * @var string
     */
    public $fotografia;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('idusuario', 'Acceso', 'idusuario', array('alias' => 'Acceso'));
        $this->belongsTo('idcondominio', 'Condominio', 'idcondominio', array('alias' => 'Condominio'));
        $this->belongsTo('idtipos_usuario', 'TiposUsuario', 'idtipos_usuario', array('alias' => 'TiposUsuario'));
        $this->belongsTo('idvehiculo', 'Vehiculo', 'idvehiculo', array('alias' => 'Vehiculo'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'usuario';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuario[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Usuario
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
