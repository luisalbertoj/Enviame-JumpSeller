<?php

require_once(realpath(dirname(__FILE__) . '/Controller/jump-seller.php'));
require_once(realpath(dirname(__FILE__) . '/Controller/enviame.php'));

$origen = 'Pudahuel';
$state = 'Quilicura';
$total = '5';

/* $request = json_decode($_REQUEST["request"], true);
$state = $request['to']['municipality'];
$total = $request['package']['weight']; */

$dataEnviame = Enviame::conexion($origen, $state, $total);
$response = [];
foreach ($dataEnviame["data"] as $i) {
    foreach ($i["services"] as $s) {
        array_push($response, array("service_name" => $s["name"], "service_code" => $s["code"], "total_price" => $s["price"]));
      }
}
$response = array("rates" => ($response));
header('Content-type: application/json');
echo json_encode($response);