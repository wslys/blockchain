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

//include "../vendor/autoload.php";
include "../lib/sdk/gateio/GateIO.php";
include "../lib/sdk/huobi/HuoBi.php";
include '../lib/sdk/okex/OKCoin/OKCoin.php';
include "../lib/sdk/bittrex/Bittrex.php";
include "../lib/sdk/binance/Binance.php";

include "../lib/EasyDB/basic_db.php";
include "../lib/func/func.php";
include "../conf/conf.php";

include "tuto/binance.php";
include "tuto/bittrex.php";
include "tuto/gateio.php";
include "tuto/huobi.php";

$name = isset($_GET['name'])?$_GET['name']:'';
$type = isset($_GET['type'])?$_GET['type']:'btc_usdt';
$type_arr = explode('_', $type);
$pair = $type_arr[0];
$type = $type_arr[1];

/* TODO Binance */
/*$Binance = new Binance();
// 获取Kline
$binance_kline = $Binance->getKlines('ETHBTC', '5m', '1');
$binance_depth = $Binance->getDepth('ETHBTC', 20);
var_dump($binance_kline);
var_dump($binance_depth);*/


/* TODO HuoBi */
$HuoBi = new HuoBi();
/*// 火币K线数据
$huobi_kline = $HuoBi->get_history_kline('btcusdt', '1min', '1');*/
// 火币聚合行情
$huobi_depth = $HuoBi->get_market_depth('btcusdt', 'step1');
//$huobi_depth = $HuoBi->get_detail_merged('btcusdt');
var_dump($huobi_depth);

/* TODO Okex */
$OKCoin = new OKCoin(new OKCoin_ApiKeyAuthentication($conf['okex']['API_KEY'], $conf['okex']['SECRET_KEY']));
//获取OKCoin k线数据
//$OKex_kline = $OKCoin->depthApi(array('symbol' => 'eth_btc'));
//获取OKCoin期货深度信息 contract_type
//$OKex_depth = $OKCoin -> depthFutureApi(array('symbol' => 'btc_usd', 'contract_type' => 'this_week', 'size' => 5, 'merge'=>1));
//var_dump($OKex_kline);

/* TODO Bittrex 暂时 API 不好使 */
/*$Bittrex = new Bittrex();
// 获取价格数据
$bittrex_price = $Bittrex->getticker('BTC-LTC');
// 获取 Depth 数据
$bittrex_kline = $Bittrex->getorderbookDepth('BTC-LTC');
print_r($bittrex_kline);*/


/* TODO GateIO */
//$GateIO = new GateIO($conf['gateio']['ACCESS_KEY'], $conf['gateio']['SECRET_KEY']);

//交易对的市场深度
//    print_r(get_orderbooks());

//指定交易对的市场深度
//    print_r(get_orderbook('btc_usdt'));

