<?php
/**
 * 取市场深度数据
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-17
 * Time: 下午2:11
 */

// 定义参数
define("ROOT_DIR", __DIR__ . "/../");
define('ACCOUNT_ID', ''); // 你的账户ID

include "../lib/sdk/binance/Binance.php";
include "../lib/sdk/huobi/HuoBi.php";
include '../lib/sdk/okex/OKCoin/OKCoin.php';


include "../lib/EasyDB/basic_db.php";
include "../lib/func/func.php";
include "../conf/conf.php";

// TODO Binance
$Binance2 = new Binance();
//
//$prices = $Binance2->getPrice();
//$kt = 0;
//foreach ($prices as $price) {
//    $depth = $Binance2->getDepth($price['symbol'], 1000);
//    echo $kt . " :>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> \n";
//    echo $kt . " :>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> \n";
//    echo $kt . " :>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> \n";
//    var_dump(count($depth['bids']));
//    var_dump(count($depth['asks']));
//
//    if ($kt > 10) {
//        break;
//    }
//    $kt ++ ;
//}


// TODO HuoBi
$HuoBi = new HuoBi();
// 火币K线数据
$huobi_kline = $HuoBi->get_history_kline('btcusdt', '1min', '1');
// 火币聚合行情
$huobi_depth = $HuoBi->get_market_depth('btcusdt', 'step1');
print_r($huobi_depth);


//$OKCoin = new OKCoin(new OKCoin_ApiKeyAuthentication($conf['okex']['API_KEY'], $conf['okex']['SECRET_KEY']));
////获取OKCoin市场深度
//$params = array('symbol' => 'btc_usd');
//$result = $OKCoin -> depthApi($params);
//print_r($result);

//获取OKCoin期货深度信息
//$params = array('symbol' => 'btc_usd', 'contract_type' => 'this_week', 'size' => 5);
//$result = $OKCoin -> depthFutureApi($params);
//print_r($result);