<?php

require_once(realpath(dirname(__FILE__) . '/Controller/jump-seller.php'));
require_once(realpath(dirname(__FILE__) . '/Controller/enviame.php'));
require_once(realpath(dirname(__FILE__) . '/environment.php'));

if (!isset($_GET['code'])) {
  echo 'El usuario no autorizo';
  return 0;
}

$grant_type = 'authorization_code';
$token = JumpSeller::token($grant_type, Environment::$client_id, Environment::$client_secret, $_GET['code'], Environment::$redirect_uri);
$shippingList = Jum
$result = JumpSeller::createShipping();

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
          <h3>El token de tu app es <br>' . $token . '</h3>
          <br>
          <h3><b>Se crearan los metodos de envio</b></h3>
          <span>' . $result . '</span>
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>
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
