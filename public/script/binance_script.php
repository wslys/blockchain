<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-6-2
 * Time: 下午4:14
 */
set_time_limit(0);

// 定义参数
define("ROOT_DIR", __DIR__ . "/../");
define('ACCOUNT_ID', ''); // 你的账户ID

include "../../vendor/autoload.php";
include "../../lib/EasyDB/basic_db.php";
include "../../lib/func/func.php";
include "../../conf/conf.php";

sleep(5);
$time_stamp = time();
$tags = getTag2($db);
$tag  = $tags['id'];

$file = "/home/user/php-projects/blockchain/public/file/log-binance.txt";
file_put_contents($file, date("Y:m:d H:i:s", time()) . ":> tag is : " . $tag ." \n", FILE_APPEND);

$Binance = new Binance\API($conf['binance']['ACCESS_KEY'], $conf['binance']['SECRET_KEY']);
$prices  = $Binance->prices();

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
$sql = "INSERT INTO counter_currencys(tp_id, tag_id, bi_name, pair, pair_lable, price, create_at) VALUES";
foreach ($binance_data as $item) {
    $time_stamp = time();
    $pair = strtolower(($item['bi_name'] . "_" . $item["pair"]));
    $sql .= "('3',  '" . $tag . "',  '" . strtoupper($item['bi_name']) . "',  '" . strtoupper($pair) . "',  '" . strtoupper($item["pair"]) . "',  '" . $item['price'] . "',  " . $time_stamp . "),";
}

$sql = rtrim($sql, ",");
$db->querySql($sql);
