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

$lables = $conf['lables'];

/* >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */
/* >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */
/* >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> */
$name = isset($_GET['name'])?$_GET['name']:'SBTC';
$type = isset($_GET['type'])?$_GET['type']:'BTC_type12';
$type_arr = explode('_', $type);
$pair = $type_arr[0];
$type = $type_arr[1];

$plat1_data = [];
$plat2_data = [];

//$HuoBi = new HuoBi();
//$huobi_kline = $HuoBi->get_history_kline('btcusdt', '1min', '1');// 火币K线数据
//$huobi_depth = $HuoBi->get_market_depth('btcusdt', 'step1');// 火币聚合行情
//var_dump($huobi_kline);
//var_dump($huobi_depth);

/* Binance 平台 */
//$Binance = new Binance();
//// 获取Kline
//$binance_kline = $Binance->getKlines('ETHBTC', '5m', '1');
//$binance_depth = $Binance->getDepth('ETHBTC', 20);
//var_dump($binance_kline);
//var_dump($binance_depth);


switch ($type) {
    case 'type12': // 火币平台 --- GateIO平台
        /* HuoBi 平台 */
        $_pair = strtolower($name.''.$pair);
        $HuoBi = new HuoBi();
        $huobi_kline = $HuoBi->get_history_kline($_pair, '1min', '1');// 火币K线数据
        $huobi_depth = $HuoBi->get_market_depth($_pair, 'step1');// 火币聚合行情

        $plat1_data['price'] = $huobi_kline['data'][0]['close'];
        $plat1_data['depth'] = [
                'asks' => $huobi_depth['tick']['asks'],
                'bids' => $huobi_depth['tick']['bids'],
        ];

        /* GateIO 平台 */
        $pair = strtolower($name . "_" . $pair);
        $GateIO = new GateIO($conf['gateio']['ACCESS_KEY'], $conf['gateio']['SECRET_KEY']);
        //交易对的市场深度
        $gateio_market = $GateIO->get_marketlist();
        $gateio_books  = $GateIO->get_orderbook($pair);

        foreach ($gateio_market['data'] as $gateio_market) {
            // pair
            if ($pair == $gateio_market['pair']) {
                $plat2_data['price'] = $gateio_market['rate'];
            }
        }

        $plat2_data['depth'] = [
            "asks" => $gateio_books['asks'],
            "bids" => $gateio_books['bids']
        ];

        break;
    case 'type13': // 火币平台 --- Binance平台
        /* HuoBi 平台 */
        $_pair = strtolower($name.''.$pair);
        $HuoBi = new HuoBi();
        $huobi_kline = $HuoBi->get_history_kline($_pair, '1min', '1');// 火币K线数据
        $huobi_depth = $HuoBi->get_market_depth($_pair, 'step1');// 火币聚合行情

        $plat1_data['price'] = $huobi_kline['data'][0]['close'];
        $plat1_data['depth'] = [
            'asks' => $huobi_depth['tick']['asks'],
            'bids' => $huobi_depth['tick']['bids'],
        ];

        /* Binance 平台 */
        $Binance = new Binance();
        // 获取Kline
        $binance_kline = $Binance->getKlines('ETHBTC', '5m', '1');
        $binance_depth = $Binance->getDepth('ETHBTC', 20);
        var_dump($binance_kline);
        var_dump($binance_depth);

        break;
    case 'type14': // 火币平台 --- Bittrex平台
        /* HuoBi 平台 */
        $_pair = strtolower($name.''.$pair);
        $HuoBi = new HuoBi();
        $huobi_kline = $HuoBi->get_history_kline($_pair, '1min', '1');// 火币K线数据
        $huobi_depth = $HuoBi->get_market_depth($_pair, 'step1');// 火币聚合行情

        /* Bittrex 平台 暂时 API 不好使 */
        $Bittrex = new Bittrex();
        $bittrex_price = $Bittrex->getticker('BTC-LTC');// 获取价格数据
        $bittrex_kline = $Bittrex->getorderbookDepth('BTC-LTC');// 获取 Depth 数据
        break;
    case 'type23':
        /* GateIO 平台 */
        $pair = strtolower($name . "_" . $pair);
        $GateIO = new GateIO($conf['gateio']['ACCESS_KEY'], $conf['gateio']['SECRET_KEY']);
        //交易对的市场深度
        $gateio_market = $GateIO->get_marketlist();
        $gateio_books  = $GateIO->get_orderbook($pair);

        foreach ($gateio_market['data'] as $gateio_market) {
            // pair
            if ($pair == $gateio_market['pair']) {
                $plat2_data['price'] = $gateio_market['rate'];
            }
        }

        /* Binance 平台 */
        $Binance = new Binance();
        // 获取Kline
        $binance_kline = $Binance->getKlines('ETHBTC', '5m', '1');
        $binance_depth = $Binance->getDepth('ETHBTC', 20);
        var_dump($binance_kline);
        var_dump($binance_depth);
        $plat2_data['depth'] = [
            "asks" => $gateio_books['asks'],
            "bids" => $gateio_books['bids']
        ];
        break;
    case 'type24':
        // code
        break;
    case 'type34':
        // code
        break;

    default:
        // code
}

//var_dump($plat1_data);
//var_dump($plat2_data);

// */1 * * * * php /home/user/www/test.php


/* TODO Okex */
/*$OKcoin = new OKCoin(new OKCoin_ApiKeyAuthentication($conf['okex']['API_KEY'], $conf['okex']['SECRET_KEY']));
$OKex_kline = $OKcoin->depthApi(array('symbol'=>'btc_usd', 'size'=>5));//获取OKCoin k线数据
$OKex_depth = $OKcoin->depthFutureApi(array('symbol'=>'btc_usd', 'contract_type'=>'this_week', 'size'=>5));//获取OKCoin期货深度信息*/

/*$plat1_json = '{"price":8504.81,"depth":{"asks":[[8504.8,0.19609984949675477],[8504.81,0.6218],[8504.85,0.6911],[8504.86,0.6719002299046731],[8504.99,0.274],[8505,0.0301],[8505.28,0.823],[8505.36,0.383],[8505.37,0.1893],[8505.84,0.549],[8505.85,0.8293],[8505.91,0.658],[8506.22,0.549],[8506.45,0.001],[8508.43,0.1156],[8509.86,0.1],[8510.43,0.1156],[8510.7,0.002],[8510.71,0.001],[8510.72,0.1839]],"bids":[[8504.51,0.001],[8504.14,0.109],[8503.99,0.2888],[8503.88,0.274],[8503.15,0.001],[8503.14,0.2176],[8502.76,0.823],[8500.69,0.001],[8500.54,0.3418],[8500.49,0.02],[8499.85,0.001],[8499.82,0.001],[8498.89,0.3401],[8498.84,0.8917],[8498.4,0.063],[8498.08,1],[8497.51,0.0157],[8497.11,0.4971],[8496.56,0.1358],[8496.48,0.4879]]}}';
$plat2_json = '{"price":"0.001870","depth":{"asks":[["0.00347","150.79622188"],["0.00337","0.410764"],["0.00335","449.162994"],["0.0033","0.606"],["0.00323","354.6234"],["0.0032","253.88241707"],["0.003","125.45406879"],["0.00296","50.153999"],["0.00294","6.1426"],["0.00291","22"],["0.00289","4.95"],["0.00285","10.35"],["0.00279","12.27311873"],["0.00261","10.12"],["0.00255","100"],["0.0025","67.39892082"],["0.0023","1.033"],["0.00229","30.3738"],["0.00224","100.09725364"],["0.00212","0.703882"],["0.00209","90"],["0.00208","8.5977554"],["0.00205","0.49776708"],["0.00197","2.05820849"],["0.00196","1936.8372"],["0.00194","23.45"],["0.00192","0.80618305"],["0.00191","21"],["0.00189","24.998"],["0.00187","0.00029971"]],"bids":[["0.00183","94.161957"],["0.00181","29.632452"],["0.0018","110.3128132475"],["0.00179","2"],["0.00166","72.23090131"],["0.00165","29.2727"],["0.00163","77"],["0.00161","111"],["0.0016","58"],["0.00159","88"],["0.00155","60.5"],["0.00154","111"],["0.00153","50.5"],["0.00151","111"],["0.0015","79.5333"],["0.00149","60.5"],["0.00146","30.09540226"],["0.00144","30"],["0.00143","19.0909"],["0.00136","55.09672381"],["0.00134","0.74627"],["0.0013","13.923"],["0.00124","2.16537111"],["0.00123","65.4471"],["0.0011","2.19163325"],["0.00109","62.7522"],["0.00102","20.5"],["0.00065","0.6"],["0.00055","0.00012727"],["0.0005","4"]]}}';

$plat1_data = json_decode($plat1_json);
$plat2_data = json_decode($plat2_json);*/
?>

<!DOCTYPE html>
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
                <h2 class="section-heading" style="/*display: inline-block;*/">多交易平台虚拟货币<br class="hidden-xs"> 市场深度 <span class="text-green"> 对比 </span></h2>
                <div class="row">

                    <div class="col-md-6">
                        <h4><?= $lables[$type]['pt1'] ?></h4>
                        <table style="border: 0px solid transparent !important;width: 50%;float: left">
                            <thead>
                            <th style="text-align: center;">卖价</th>
                            <th style="text-align: center;">卖量</th>
                            </thead>
                            <tbody>
                            <?php foreach ($plat1_data['depth']['asks'] as $ask) { ?>
                                <tr>
                                    <td><?= $ask[0] ?></td>
                                    <td><?= $ask[1] ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>

                        <table style="border: 0px solid transparent !important;width: 50%;float: left">
                            <thead>
                            <th style="text-align: center;">买价</th>
                            <th style="text-align: center;">买量</th>
                            </thead>
                            <tbody>
                            <?php foreach ($plat1_data['depth']['bids'] as $ask) { ?>
                                <tr>
                                    <td><?= $ask[0] ?></td>
                                    <td><?= $ask[1] ?></td>
                                </tr>
                            <?php }?>
                            </tbody>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <h4><?= $lables[$type]['pt2'] ?></h4>
                        <table style="border: 0px solid transparent !important;width: 50%;float: left">
                            <thead>
                            <th style="text-align: center;">卖价</th>
                            <th style="text-align: center;">卖量</th>
                            </thead>
                            <tbody>
                            <?php foreach ($plat2_data['depth']['bids'] as $ask) { ?>
                                <tr>
                                    <td><?= $ask[0] ?></td>
                                    <td><?= $ask[1] ?></td>
                                </tr>
                            <?php }?>
                            </tbody>
                            </tbody>
                        </table>
                        <table style="border: 0px solid transparent !important;width: 50%;float: left">
                            <thead>
                            <th style="text-align: center;">买价</th>
                            <th style="text-align: center;">买量</th>
                            </thead>
                            <tbody>
                            <?php foreach ($plat2_data['depth']['bids'] as $ask) { ?>
                                <tr>
                                    <td><?= $ask[0] ?></td>
                                    <td><?= $ask[1] ?></td>
                                </tr>
                            <?php }?>
                            </tbody>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Start Trial -->

</body>
</html>
