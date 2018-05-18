<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-16
 * Time: 上午11:10
 */

/**
 * TODO 自定义SDK
 * Class Bittrex
 */
class Bittrex
{
    // 用于获取市场当前的价格。【要用】
    // https://bittrex.com/api/v1.1/public/getticker?market=BTC-LTC

    // 用于在Bittrex获得所有支持的货币以及其他元数据。
    // https://bittrex.com/api/v1.1/public/getcurrencies

    // 用于在Bittrex获得开放和可用的交易市场以及其他元数据。【要用】
    // https://bittrex.com/api/v1.1/public/getmarkets

    /**
     * 用于获取市场当前的价格。
     * @param string $market
     * @return array|mixed
     */
    public function getticker($market = '') {
        if (!$market) {
            return ["msg"=>"没有参数market"];
        }
        $url    = 'https://bittrex.com/api/v1.1/public/getticker?market=' . $market;
        $return = $this->curl($url);
        $result = json_decode($return, true);
        return $result;
    }

    /**
     * 用于在Bittrex获得开放和可用的交易市场以及其他元数据。
     * @return mixed
     */
    public function getmarkets() {
        $url    = 'https://bittrex.com/api/v1.1/public/getmarkets';
        $return = $this->curl($url);
        $result = json_decode($return, true);
        return $result;
    }

    private function curl($url) {
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);

        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_HEADER,0);
        curl_setopt($ch, CURLOPT_TIMEOUT,60);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt ($ch, CURLOPT_HTTPHEADER, [
            "Content-Type: application/json",
        ]);
        $output = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);
        return $output;
    }
}