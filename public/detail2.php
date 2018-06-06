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

$name = isset($_GET['name'])?$_GET['name']:'SBTC';
$type = isset($_GET['type'])?$_GET['type']:'BTC_type12';
$type_arr = explode('_', $type);
$pair = $type_arr[0];
$type = $type_arr[1];

$plat1_data = [];
$plat2_data = [];

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
                    <table class="table">
                        <tr>
                            <td>币名</td>
                            <td>BTC————————</td>
                        </tr>
                        <tr>
                            <td>平台一</td>
                            <td>BTC++++</td>
                        </tr>
                        <tr>
                            <td>平台二</td>
                            <td>BTC====</td>
                        </tr>
                    </table>
                </div>
                <div class="row">

                    <div class="col-md-6">
                        <h4><?= $lables[$type]['pt1'] ?></h4>
                        <table class="table">
                            <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">价格</th>
                                <th class="text-center">数量</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($plat1_data['depth']['asks'] as $ask) { ?>
                                <tr>
                                    <td>卖</td>
                                    <td><?= $ask[0] ?></td>
                                    <td><?= $ask[1] ?></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="3"><hr style="border: 1px solid #ddd"/></td>
                            </tr>
                            <?php foreach ($plat2_data['depth']['bids'] as $ask) { ?>
                                <tr>
                                    <td>买</td>
                                    <td><?= $ask[0] ?></td>
                                    <td><?= $ask[1] ?></td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <h4><?= $lables[$type]['pt2'] ?></h4>
                        <table>
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
                        <table>
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
