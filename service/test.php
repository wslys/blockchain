<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-6-1
 * Time: 下午12:18
 */

include "../vendor/autoload.php";
include "../conf/conf.php";

var_dump($conf);
/* Binance 平台 */
$Binance = new Binance\API($conf['binance']['ACCESS_KEY'], $conf['binance']['SECRET_KEY']);
// 获取Kline
$binance_kline = $Binance->candlesticks('ETHBTC', '5m');

var_dump($binance_kline);

