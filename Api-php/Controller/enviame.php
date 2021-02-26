<?php
require_once(realpath(dirname(__FILE__) . '/../Services/enviame.service.php'));
require_once(realpath(dirname(__FILE__) . '/../Models/Factory.php'));

class Enviame
{
    private $factory;
    public function __construct()
     {
          
          $this->factory = Factory;
     }
    static function conexion($origen, $state, $total)
    {

        $url = 'https://facturacion.enviame.io/api/v1/prices?from_place='
        .$origen.'&to_place='
        .$state.'&weight='
        .$total;
        return EnviameService::get($url);
    }

    /* static function getShippings() {
        Factory
    } */
}
