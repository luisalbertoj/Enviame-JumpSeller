<?php
require_once(realpath(dirname(__FILE__) . '/../Services/jump-seller.service.php'));

class JumpSeller {

    static function conexion($client_id, $redirect_uri, $response_type, $scope) {

        $url = 'https://accounts.jumpseller.com/oauth/authorize?client_id='.$client_id.
        '&redirect_uri='.$redirect_uri.
        '&response_type='.$response_type.
        '&scope='.$scope.'';

        return $url;
        
        
        //return JumpSellerService::get($url);

    }

    static function token($grant_type, $client_id, $client_secret, $code, $redirect_uri) {
        return JumpSellerService::post($grant_type, $client_id, $client_secret, $code, $redirect_uri);
    }
    static function createShipping() {
        return JumpSellerService::createShipping();
    }
}