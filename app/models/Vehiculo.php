<?php

class Vehiculo extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idvehiculo;

    /**
     *
     * @var integer
     */
    public $idtipos_vehiculo;

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
        $this->hasMany('idvehiculo', 'Usuario', 'idvehiculo', array('alias' => 'Usuario'));
        $this->belongsTo('idtipos_vehiculo', 'TiposVehiculo', 'idtipos_vehiculo', array('alias' => 'TiposVehiculo'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'vehiculo';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Vehiculo[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Vehiculo
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
