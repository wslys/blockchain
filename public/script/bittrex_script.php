<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-6-2
 * Time: 下午4:21
 */

set_time_limit(0);

// 定义参数
define("ROOT_DIR", __DIR__ . "/../");
define('ACCOUNT_ID', ''); // 你的账户ID

include "../../lib/sdk/bittrex/Bittrex.php";

include "../../lib/EasyDB/basic_db.php";
include "../../lib/func/func.php";
include "../../conf/conf.php";

sleep(5); // 程序暂停5秒后在运行
$time_stamp = time();
$tags = getTag2($db);
$tag  = $tags['id'];

$file = "/home/user/php-projects/blockchain/public/file/log-bittres.txt";
file_put_contents($file, date("Y:m:d H:i:s", time()) . ":> tag is : " . $tag ." \n", FILE_APPEND);

$Bittrex = new Bittrex();

$Bittrex_markets = $Bittrex->getmarkets();
$bittrex_data = [];
foreach ($Bittrex_markets['result'] as $key => $item) {
    $marketName = $item['BaseCurrency'];
    $market = $item['MarketCurrency']. '_' . $marketName;

    if ($marketName == 'ETH' || $marketName == 'BTC' || $marketName == 'USDT') {
        $ticker = $Bittrex->getticker($item['MarketName']);
        $bittrex_data[$item['MarketCurrency']. '_' . $marketName] = [
            'symbol' => $item['MarketCurrency']. '_' . $marketName,
            'datas' => [
                'bi_name' => $item['MarketCurrency'],
                'price' => $ticker['result']['Last'],
                'pair' => $marketName,
            ]
        ];
    }
}
$sql = "INSERT INTO counter_currencys(tp_id, tag_id, bi_name, pair, pair_lable, price, create_at) VALUES";
foreach ($bittrex_data as $item) {
    $time_stamp = time();
    $pair = strtolower(($item['datas']['bi_name'] . "_" . $item['datas']["pair"]));

    $sql .= "('4', '".$tag."', '".$item['datas']['bi_name']."', '".strtoupper($pair)."', '".strtoupper($item['datas']["pair"])."', '".$item['datas']['price']."',  " . $time_stamp . "),";
}
$sql = rtrim($sql, ",");
$db->querySql($sql);
