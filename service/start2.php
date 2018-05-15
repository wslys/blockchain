<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-11
 * Time: 下午3:23
 */

// 定义参数
define("ROOT_DIR", __DIR__ . "/../");
define('ACCOUNT_ID', ''); // 你的账户ID
define('ACCESS_KEY', '4e72129e-92d31434-490f0e68-8a06e'); // 你的ACCESS_KEY
define('SECRET_KEY', '61d4c356-efaf48a7-7f7951b9-35b1c'); // 你的SECRET_KEY

include "../vendor/autoload.php";
include "../lib/sdk/gateio/GateIO.php";
include "../lib/sdk/huobi/HuoBi.php";
include "../lib/EasyDB/basic_db.php";
include "../lib/func/func.php";

// TODO Binance
$api = new Binance\API("aoQnqGahZBOA9Hjs9t6AxXtky2ZztuocelQLnWwKR6LCkaBoqsoNXK3jUq1ah7Tr", "hYyAKJbgfZ2FjWtBIpZzIukrbHunoESCMdpMpUHlRtG4FQtu6MHO9LHEMNBAiFWn");
$prices = $api->prices();

$binance_data = [];
foreach ($prices as $key => $price) {
    $pair1    = substr($key,-3);
    $bi_name1 = substr($key,0, (strlen($key) - 3));
    $pair2    = substr($key,-4);
    $bi_name2 = substr($key,0, (strlen($key) - 4));

    // 拆分 BTC
    if ($pair1 == "BTC") {
        $binance_data[($pair1 . "_" . $bi_name1)] = [
            "bi_name" => $bi_name1,
            "pair"    => $pair1,
            "price"   => $price
        ];
    }
    // 拆分 USDT
    if ($pair2 == 'USDT') {
        $binance_data[($pair1 . "_" . $bi_name1)] = [
            "bi_name" => $bi_name2,
            "pair"    => $pair2,
            "price"   => $price
        ];
    }
    // 拆分 ETH
    if ($pair1 == 'ETH') {
        $binance_data[($pair1 . "_" . $bi_name1)] = [
            "bi_name" => $bi_name1,
            "pair"    => $pair1,
            "price"   => $price
        ];
    }
}

$data = [];
$sql4 = "INSERT INTO counter_currencys(tp_id, tag_id, bi_name, pair, price) VALUES";
foreach ($binance_data as $item) {
    $sql4 .= "('3', '".$tag."', '".$item['bi_name']."', '".$item["pair"]."', '".$item['price']."'),";

    $pair = strtolower(($item['bi_name'] . "_" . $item["pair"]));
    $data[$pair]['symbol'] = $pair;
    $data[$pair]['datas']['name'] = $item['bi_name'];
    $data[$pair]['datas']['binance_price'] = $item['price'];
    $data[$pair]['datas']['pair'] = strtoupper($item["pair"]);
}

var_dump($binance_data);
var_dump($data);






