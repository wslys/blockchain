<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-11
 * Time: 下午3:23
 */
header("Content-Type: text/plain");
set_time_limit(0);

// 定义参数
define("ROOT_DIR", __DIR__ . "/../");
define('ACCOUNT_ID', ''); // 你的账户ID

include "../../vendor/autoload.php";
include "../../lib/sdk/gateio/GateIO.php";
include "../../lib/sdk/huobi/HuoBi.php";
include '../../lib/sdk/okex/OKCoin/OKCoin.php';
include "../../lib/sdk/bittrex/Bittrex.php";

include "../../lib/EasyDB/basic_db.php";
include "../../lib/func/func.php";
include "../../conf/conf.php";

include "./tuto/binance.php";
include "./tuto/bittrex.php";
include "./tuto/gateio.php";
include "./tuto/huobi.php";

define("FILE", "/home/user/php-projects/blockchain/public/file/log-test ----- ".date('Y-m-d H:i:s', time()).".txt");

//  TODO 标记数据拉取时间
$tags = getTags($db);
$tag  = $tags['id'];
$tag_time  = $tags['id'];

$HuoBi   = new HuoBi($conf['huobi']['ACCESS_KEY'], $conf['huobi']['SECRET_KEY']);
$GateIO  = new GateIO($conf['gateio']['ACCESS_KEY'], $conf['gateio']['SECRET_KEY']);
$Binance = new Binance\API($conf['binance']['ACCESS_KEY'], $conf['binance']['SECRET_KEY']);
$OKCoin  = new OKCoin(new OKCoin_ApiKeyAuthentication($conf['okex']['API_KEY'], $conf['okex']['SECRET_KEY']));
$Bittrex = new Bittrex();

$data = [];
// TODO 火币交易平台
runHuobi($HuoBi, $tag, $db, $data);

// TODO GateIO 交易平台
runGateIo($GateIO, $tag, $db, $data);

// TODO Binance
runBinance($Binance, $tag, $db, $data);

// TODO Bittrex
runBittrex($Bittrex, $tag, $db, $data);

$sql3 = "INSERT INTO sort_table(tag_id, bi_name, huobi_price, gateio_price, binance_price, bittrex_price, pair, percentage, percentage_pri, create_at) VALUES";
foreach ($data as $item) {
    $percentage = "";
    if ($item['datas']['huobi_price'] && $item['datas']['gateio_price']) {
        $percentage = ($item['datas']['huobi_price'] - $item['datas']['gateio_price']) / ($item['datas']['huobi_price'] + $item['datas']['gateio_price']) * 100;
    }
    $percentage_pri = abs($percentage);
    $sql3 .= "('".$tag."', '".$item['datas']['name']."', '".$item['datas']['huobi_price']."', '".$item['datas']['gateio_price']."', '".$item['datas']['binance_price']."',  '".$item['datas']['bittrex_price']."', '".$item['datas']['pair']."', '".$percentage."', '".$percentage_pri."', '".date("Y-m-d H:i:s",time())."'),";
}
$sql3 = rtrim($sql3, ",");
$db->querySql($sql3);
