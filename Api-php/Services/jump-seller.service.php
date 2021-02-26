<?php

class JumpSellerService
{

    static function get($url)
    {

        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        } catch (Exception $e) {
            $data = ['error', 'Excepción capturada', $e->getMessage()];
            return  $data;
        }
    }

    static function post($grant_type, $client_id, $client_secret, $code, $redirect_uri)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://accounts.jumpseller.com/oauth/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $post = array(
            'grant_type' => $grant_type,
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'code' => $code,
            'redirect_uri' => $redirect_uri
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }

    static function createShipping()
    {
        $url = 'https://api.jumpseller.com/v1/shipping_methods.json?login=85617bcb2792449a4c6323545b033314&authtoken=1086cb85dc40be87014e5ccee56d41a5"';

        $ch = curl_init($url);
        $data = array(
            "name" => "Enviame",
            "callback_url" => "https://hechoenespana.com/shipping.php",
            "fetch_services_url" => "https://hechoenespana.com/list-shipping.php",
            "token" => 'SyuHJzSj-jurKqDgbWJ1AX3etMScF8Y8apiA-CWHEbU',
            "state" => "Aisén",
            "city" => "Santiago",
            "postal" => "9060692"
        );
        $payload = json_encode(array("shipping_method" => $data));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }
}
