<?php

class EnviameService
{

    static function get($url)
    {
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Accept: application/json",
                "x-api-key: afw6mcptnjy448t227a1vh74lcv36jhz"
            ));
            $data = json_decode(curl_exec($ch), true);
            curl_close($ch);
            return $data;
        } catch (Exception $e) {
            $data = ['error', 'Excepción capturada', $e->getMessage()];
            return  $data;
        }
    }
}
