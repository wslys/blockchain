<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-17
 * Time: 下午3:11
 * api/v1/depth
 * v3/ticker/price
 *
 * 官网  : https://www.binance.com/
 * API  : https://github.com/binance-exchange/binance-official-api-docs
 */

class Binance {
    private $basic = 'https://api.binance.com';

    public function __construct() {}

    public function getPrice($symbol) {
        $url = $this->basic . "/api/v3/ticker/price";

        if (isset($symbol))
            $url .= "?symbol=" . $symbol;

        $return = $this->curl($url);
        $result = json_decode($return, true);
        return $result;
    }

    //1m,3m,5m,15m,30m,1h,2h,4h,6h,8h,12h,1d,3d,1w,1M
    public function getKlines($symbol, $interval = "5m", $limit = 1) {
        $url = $this->basic . "/api/v1/klines?symbol=".$symbol."&interval=".$interval.'&limit='.$limit;

        $return = $this->curl($url);
        $result = json_decode($return, true);
        return $result;
    }

    public function getDepth($symbol, $limit=20) {
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