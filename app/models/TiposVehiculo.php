<?php

class TiposVehiculo extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $idtipos_vehiculo;

    /**
     *
     * @var string
     */
    public $tipo;

    /**
     *
     * @var integer
     */
    public $tarifa;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->hasMany('idtipos_vehiculo', 'Vehiculo', 'idtipos_vehiculo', array('alias' => 'Vehiculo'));
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'tipos_vehiculo';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return TiposVehiculo[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return TiposVehiculo
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
