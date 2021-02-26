<?php
require_once(realpath(dirname(__FILE__) . '/Controller/jump-seller.php'));
require_once(realpath(dirname(__FILE__) . '/Controller/enviame.php'));

$origen = 'Pudahuel';
$state = 'Quilicura';
$total = '1';
$dataEnviame = Enviame::conexion($origen, $state, $total);
$response = [];
foreach ($dataEnviame["data"] as $i) {
    foreach ($i["services"] as $s) {
        array_push($response, array(
          "service_name" => $i["name"]." - ".$s["name"],
          "service_code" => $s["code"]
        ));
      }
}
$response = array("services" => ($response));
header('Content-type: application/json');
echo json_encode($response);

