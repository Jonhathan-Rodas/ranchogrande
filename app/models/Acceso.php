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

    public  function resumen($condominio, $desde, $hasta,$vehiculo){
        $time_hasta = new DateTime();
        $time_hasta =$time_hasta->format('Y-m-d H:i:s') ;
        $query ="SELECT * FROM";
        $cars  = $this->modelsManager->createBuilder()
        ->from('acceso')
        ->leftJoin(
            'Usuario',
            'acceso.idusuario = u.idusuario',
            'u'
            )
        ->leftJoin(
            'Condominio',
            'u.idcondominio = c.idcondominio',
            'c'
            )
         ->leftJoin(
            'Vehiculo',
            'v.idvehiculo = u.idvehiculo',
            'v'
            )
         ->leftJoin(
            'TiposVehiculo',
            't.idtipos_vehiculo = v.idtipos_vehiculo',
            't'
            )
        ->where('c.idcondominio < :id:', array('id' => $condominio ))
        ->andWhere('acceso.time >= :time1:', array('time1' => $desde))
        ->andWhere('acceso.time <= :time2:', array('time2' => $hasta))
        ->andWhere('t.idtipos_vehiculo = :tipo:', array('tipo' => $vehiculo))
        ->getQuery()
        ->execute();
        return $cars;
    }


}
