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

/* >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */
/* >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */
/* >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */
$name = isset($_GET['name'])?$_GET['name']:'SBTC';
$type = isset($_GET['type'])?$_GET['type']:'BTC_type12';
$type_arr = explode('_', $type);
$pair = $type_arr[0];
$type = $type_arr[1];

/* Binance 平台 */
$Binance = new Binance();
//$Binance = new Binance\API($conf['binance']['ACCESS_KEY'], $conf['binance']['SECRET_KEY']);
// 获取Kline
$binance_kline = $Binance->getKlines('ETHBTC', '5m', '1');
$binance_depth = $Binance->getDepth('ETHBTC', 20);
var_dump($binance_kline);
var_dump($binance_depth);

/* HuoBi 平台 */
$HuoBi = new HuoBi();
/*$huobi_kline = $HuoBi->get_history_kline('btcusdt', '1min', '1');// 火币K线数据
$huobi_depth = $HuoBi->get_market_depth('btcusdt', 'step1');// 火币聚合行情*/

/* TODO Okex */
/*$OKcoin = new OKCoin(new OKCoin_ApiKeyAuthentication($conf['okex']['API_KEY'], $conf['okex']['SECRET_KEY']));
$OKex_kline = $OKcoin->depthApi(array('symbol'=>'btc_usd', 'size'=>5));//获取OKCoin k线数据
$OKex_depth = $OKcoin->depthFutureApi(array('symbol'=>'btc_usd', 'contract_type'=>'this_week', 'size'=>5));//获取OKCoin期货深度信息*/

/* Bittrex 平台 暂时 API 不好使 */
$Bittrex = new Bittrex();
/*$bittrex_price = $Bittrex->getticker('BTC-LTC');// 获取价格数据
$bittrex_kline = $Bittrex->getorderbookDepth('BTC-LTC');// 获取 Depth 数据*/

/* GateIO 平台 */
$GateIO = new GateIO($conf['gateio']['ACCESS_KEY'], $conf['gateio']['SECRET_KEY']);
//交易对的市场深度
/*$gateio_books = $GateIO->get_orderbooks();
print_r($gateio_books);*/

//指定交易对的市场深度
//print_r($GateIO->get_orderbook('btc_usdt'));

?>

<!DOCTYPE html>
<!-- saved from url=(0030)https://confidentcustomer.com/ -->
<html class="no-js" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="robots" content="index, follow">
    <!-- title -->
    <title> <?= strtoupper($name) ?> 当下行情 </title>

    <meta property="og:description" content="">

    <meta property="og:type" content="website">

    <link rel="stylesheet" href="test/font-awesome-4.7.0/css/font-awesome.css">

    <link rel="stylesheet" href="test/font-awesome.min.css">
    <link rel="stylesheet" href="test/style_new_common.css">
    <link rel="stylesheet" href="test/style_cc_new.css">
    <link rel="stylesheet" href="test/app.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!-- Start header -->
<header>
    <nav class="navbar navbar-default">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"> 价格对比 </a>
            </div>

            <!--<div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1">
                <ul class="nav">
                    <li><a href="#solution" class="page-scroll">首页</a></li>
                    <li><a href="#how_it_works" class="page-scroll">Title</a></li>
                    <li><a href="#features" class="page-scroll">Title</a></li>
                    <li><a href="#testimonials" class="page-scroll">Title</a></li>
                    <li><a href="#pricing" class="page-scroll">Title</a></li>

                    <a href="#register" class="btn btn-sm start-trial">sign up for free</a>
                </ul>
            </div>-->
        </div>
    </nav>
</header>
<!-- End header -->

<!-- Start Trial -->
<section class="trial">
    <div class="container">
        <div class="row margin-b-lg">
            <div class="col-md-12 text-center">
                <h2 class="section-heading">多交易平台虚拟货币交易价<br class="hidden-xs"> 和各虚拟货币在各交易平台的 <span class="text-green"> 价格对比 </span></h2>
                <!--<div class="row">
                    DDD
                </div>-->
            </div>
        </div>
    </div>
</section>
<!-- End Start Trial -->

</body>
</html>

