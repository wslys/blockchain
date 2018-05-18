<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-17
 * Time: 下午3:11
 * api/v1/depth
 * v3/ticker/price
 */

class Binance {
    private $basic = 'https://api.binance.com';

    public function __construct() {}

    public function getPrice() {
        $url = $this->basic . "/api/v3/ticker/price";

        $return = $this->curl($url);
        $result = json_decode($return, true);
        return $result;
    }

    public function getDepth($symbol, $limit=100) {
        if (!$symbol) {
            return "没有参数symbol";
        }
        $url = $this->basic . "/api/v1/depth?symbol=".$symbol."&limit=".$limit;

        $return = $this->curl($url);
        $result = json_decode($return, true);
        return $result;
    }

    private function curl($url) {
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_HEADER,0);
        curl_setopt($ch, CURLOPT_TIMEOUT,60);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
        ]);
        $output = curl_exec($ch);
        $info   = curl_getinfo($ch);
        curl_close($ch);
        return $output;
    }
}