<?php

require_once(realpath(dirname(__FILE__) . '/Controller/jump-seller.php'));
require_once(realpath(dirname(__FILE__) . '/Controller/enviame.php'));
require_once(realpath(dirname(__FILE__) . '/environment.php'));

session_start();

$data = JumpSeller::conexion(Environment::$client_id, Environment::$redirect_uri, Environment::$response_type, Environment::$scope);

echo '
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Enviame App!</title>
  </head>
  <body>
    <div class="container-flex">
      <div class="container">
      <br>
      <br>
      <div class="card">
        <div class="card-header text-white bg-primary">
          <h2>Enviame App</h2>
        </div>
        <div class="card-body">
          <h5 class="card-title">Desarrollado por Visual Chile</h5>
          <p class="card-text">Para configurar la aplicacion debes permitir el acceso.</p>
          <a href="'.$data.'" class="btn btn-success">Autentificarse</a>
        </div>
      </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
  </body>
</html>
';

/* echo '<br><h1>Decode</h1><br>';

$request = "{
    request: {
      from: {
        country: 'CL',
        region: '02',
        municipality: 'Aisen',
        postal: '',
        name: 'Test',
        address: null,
        email: 'luis@visualchile.com',
        company: null
      },
      to: {
        country: 'CL',
        region: '12',
        municipality: 'Quilicura',
        postal: null,
        name: null,
        address: null,
        email: '',
        phone: '',
        company: null
      },
      package: { weight: 15, height: 44, width: 44, length: 50 },
      unit_measurement: 'cm',
      weight_unit: 'kg',
      currency: 'COP',
      locale: 'co',
      store_code: 'test20'
    }
  }";
echo var_dump($request);
echo '<br>';
echo var_dump(json_encode($request));
echo '<br>';
echo '<hr>';
$parse = json_decode(json_encode($request), true);
echo var_dump(json_decode(json_encode($request), true));
echo '<br>';
echo '<hr>';
parse
array(explode(':', $parse));
echo var_dump($parse.str_split("municipality")); */