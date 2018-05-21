<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-16
 * Time: 上午11:10
 *
 * 官网 ： https://bittrex.com/
 * API  ： https://support.bittrex.com/hc/en-us/articles/115003723911
 */

/**
 * TODO 自定义SDK
 * Class Bittrex
 */
class BittrexApi {
    // 用于获取市场当前的价格。【要用】
    // https://bittrex.com/api/v1.1/public/getticker?market=BTC-LTC

    // 用于在Bittrex获得所有支持的货币以及其他元数据。
    // https://bittrex.com/api/v1.1/public/getcurrencies

    // 用于在Bittrex获得开放和可用的交易市场以及其他元数据。【要用】
    // https://bittrex.com/api/v1.1/public/getmarkets

    private $version  = 'v1.1';
    private $apikey   = 'v1.1';
    private $basicUrl = 'https://bittrex.com/api/';
    private $path     = '';

    public function __construct($version = 'v1.1', $apikey) {
        $this->version = $version;
        $this->apikey  = $apikey;
    }

    /**
     * 用于获取市场当前的价格。
     * @param string $market
     * @return array|mixed
     */
    public function getticker($market = '') {
        if (!$market) {
            return ["msg"=>"没有参数market"];
        }

        $params = ['market'=>$market];
        $return = $this->curl($params);
        $result = json_decode($return, true);
        return $result;
    }

    /**
     * 用于在Bittrex获得开放和可用的交易市场以及其他元数据。
     * @return mixed
     */
    public function getmarkets() {
        $params = [];
        $return = $this->curl($params);

        $result = json_decode($return, true);
        return $result;
    }

    /**
     * @param $symbol
     * @param $type
     * @return mixed
     */
    public function getorderbookDepth($symbol, $type='both') {
        if (!$symbol)
            return ["msg"=>"没有参数market"];

        $params = ['market'=>$symbol, 'type'=>$type];
        $return = $this->curl($params);
        $result = json_decode($return, true);
        return $result;
    }

    private function bind_param($params = []) {
        $u = [];
        foreach($params as $k=>$v) {
            $u[] = $k."=".urlencode($v);
        }
        return implode('&', $u);
    }

    private function curl($params = []) {
        $url = $this->basicUrl . $this->version . $this->path;
        $param = $this->bind_param($params);
        if ($param)
            $url .= "?" . $param;

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
        $info = curl_getinfo($ch);
        curl_close($ch);
        return $output;
    }
}