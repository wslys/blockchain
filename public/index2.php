<?php
define("ROOT_DIR", __DIR__ . "/../");
include "../lib/EasyDB/basic_db.php";
include "../lib/func/func.php";
include "../conf/conf.php";

$stringtime = date("Y-m-d", time());
$start_time = $stringtime . " 00:00:00";
$end_time   = $stringtime . " 23:59:59";
$start_time_stamp = strtotime($start_time);
$end_time_stamp   = strtotime($end_time);

// USDT
$usdt_sql  = "SELECT * FROM counter_currencys WHERE tag_id IN (SELECT id FROM tags WHERE time_stamp>$start_time_stamp AND time_stamp<$end_time_stamp) AND pair_lable='USDT'";
$usdt_rows = $db->query($usdt_sql)->fetchAll();
$usdt_data_list = formatIconCount(formatIcon2($usdt_rows));
$usdt_list['type12'] = func_sort($usdt_data_list['list'], 'type12', SORT_DESC);
$usdt_list['type13'] = func_sort($usdt_data_list['list'], 'type13', SORT_DESC);
$usdt_list['type14'] = func_sort($usdt_data_list['list'], 'type14', SORT_DESC);
$usdt_list['type23'] = func_sort($usdt_data_list['list'], 'type23', SORT_DESC);
$usdt_list['type24'] = func_sort($usdt_data_list['list'], 'type24', SORT_DESC);
$usdt_list['type34'] = func_sort($usdt_data_list['list'], 'type34', SORT_DESC);

// BTC
$btc_sql  = "SELECT * FROM counter_currencys WHERE tag_id IN (SELECT id FROM tags WHERE time_stamp>$start_time_stamp AND time_stamp<$end_time_stamp) AND pair_lable='BTC'";
$btc_rows = $db->query($btc_sql)->fetchAll();
$btc_data_list = formatIconCount(formatIcon2($btc_rows));
$btc_list['type12'] = func_sort($btc_data_list['list'], 'type12', SORT_DESC);
$btc_list['type13'] = func_sort($btc_data_list['list'], 'type13', SORT_DESC);
$btc_list['type14'] = func_sort($btc_data_list['list'], 'type14', SORT_DESC);
$btc_list['type23'] = func_sort($btc_data_list['list'], 'type23', SORT_DESC);
$btc_list['type24'] = func_sort($btc_data_list['list'], 'type24', SORT_DESC);
$btc_list['type34'] = func_sort($btc_data_list['list'], 'type34', SORT_DESC);

// ETH
$eth_sql  = "SELECT * FROM counter_currencys WHERE tag_id IN (SELECT id FROM tags WHERE time_stamp>$start_time_stamp AND time_stamp<$end_time_stamp) AND pair_lable='ETH'";
$eth_rows = $db->query($eth_sql)->fetchAll();
$eth_data_list = formatIconCount(formatIcon2($eth_rows));
$eth_list['type12'] = func_sort($eth_data_list['list'], 'type12', SORT_DESC);
$eth_list['type13'] = func_sort($eth_data_list['list'], 'type13', SORT_DESC);
$eth_list['type14'] = func_sort($eth_data_list['list'], 'type14', SORT_DESC);
$eth_list['type23'] = func_sort($eth_data_list['list'], 'type23', SORT_DESC);
$eth_list['type24'] = func_sort($eth_data_list['list'], 'type24', SORT_DESC);
$eth_list['type34'] = func_sort($eth_data_list['list'], 'type34', SORT_DESC);

$lables = $conf['lables'];
?>

<!DOCTYPE html>
<!-- saved from url=(0030)https://confidentcustomer.com/ -->
<html class="no-js" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="robots" content="index, follow">
    <!-- title -->
    <title> Demo </title>

    <meta property="og:description" content="">

    <meta property="og:type" content="website">

    <link rel="stylesheet" href="test/font-awesome-4.7.0/css/font-awesome.css">

    <link rel="stylesheet" href="test/font-awesome.min.css">
    <link rel="stylesheet" href="test/style_new_common.css">
    <link rel="stylesheet" href="test/style_cc_new.css">
    <link rel="stylesheet" href="test/app.css">

    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
</head>
<body>
<!-- Start header -->
<header>

</header>
<!-- End header -->

<!-- Start Trial -->
<section class="trial">
    <div class="container">
        <div class="row margin-b-lg">
            <div class="col-md-12 text-center">
                <h2 class="section-heading">多交易平台虚拟货币交易价<br class="hidden-xs"> 和各虚拟货币 <span class="text-green">在各交易平台的行情</span></h2>
                <div class="row">
                    <ul id="myTab" class="nav nav-tabs">
                        <li class="active"><a href="#USDT" data-toggle="tab">USDT</a></li>
                        <li><a href="#BTC" data-toggle="tab">BTC</a></li>
                        <li><a href="#ETH" data-toggle="tab">ETH</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="USDT"><br/><br/>
                            <div class="panel-group" id="accordion">
                                <?php $USDTkty = 1;foreach ($lables as $key=>$lable) { ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="text-align: left;">
                                            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#USDT<?=$key?>"><?= $lable['lble'] ?></a></h4>
                                        </div>
                                        <div id="USDT<?=$key?>" class="panel-collapse collapse <?=$USDTkty==1?"in":""?>">
                                            <div class="panel-body" style="max-height: 480px;overflow:auto;">
                                                <table class="table">
                                                    <thead>
                                                    <th style="text-align: center">币名</th>
                                                    <th style="text-align: center">对币</th>
                                                    <th style="text-align: center"><?= $lable['pt1'] ?></th>
                                                    <th style="text-align: center"><?= $lable['pt2'] ?></th>
                                                    <th style="text-align: center">涨幅波动比</th>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($usdt_list[$key] as $k=>$item) { ?>
                                                        <tr>
                                                            <td><a href="detail2.php?name=<?= $k ?>&type=USDT_<?= $key ?>"><?= $k ?></a></td>
                                                            <td><?= strtr($item['pair'], '_', '/') ?></td>
                                                            <td><?php
                                                                    switch ($key) {
                                                                        case 'type12':
                                                                            echo $item['huobi_price']?$item['huobi_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type13':
                                                                            echo $item['huobi_price']?$item['huobi_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type14':
                                                                            echo $item['huobi_price']?$item['huobi_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type23':
                                                                            echo $item['gateio_price']?$item['gateio_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type24':
                                                                            echo $item['gateio_price']?$item['gateio_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type34':
                                                                            echo $item['binance_price']?$item['binance_price']:'不支持此币种';
                                                                            break;
                                                                    } ?></td>
                                                            <td><?php
                                                                switch ($key) {
                                                                    case 'type12':
                                                                        echo $item['gateio_price']?$item['gateio_price']:'不支持此币种';
                                                                        break;
                                                                    case 'type13':
                                                                        echo $item['binance_price']?$item['binance_price']:'不支持此币种';
                                                                        break;
                                                                    case 'type14':
                                                                        echo $item['bittrex_price']?$item['bittrex_price']:'不支持此币种';
                                                                        break;
                                                                    case 'type23':
                                                                        echo $item['binance_price']?$item['binance_price']:'不支持此币种';
                                                                        break;
                                                                    case 'type24':
                                                                        echo $item['bittrex_price']?$item['bittrex_price']:'不支持此币种';
                                                                        break;
                                                                    case 'type34':
                                                                        echo $item['bittrex_price']?$item['bittrex_price']:'不支持此币种';
                                                                        break;
                                                                } ?></td>
                                                            <td><?= round(($item[$key]),4) ?> % </td>
                                                        </tr>
                                                    <?php }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php $USDTkty = 2;}?>
                            </div>
                        </div>

                        <div class="tab-pane fade in " id="BTC"><br/><br/>
                            <div class="panel-group" id="accordion">
                                <div class="panel-group" id="accordion">
                                    <?php $BTCkty = 1;foreach ($lables as $key=>$lable) { ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" style="text-align: left;">
                                                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#BTC<?=$key?>"><?= $lable['lble'] ?></a></h4>
                                            </div>
                                            <div id="BTC<?=$key?>" class="panel-collapse collapse <?=$BTCkty==1?"in":""?>">
                                                <div class="panel-body" style="max-height: 480px;overflow:auto;">
                                                    <table class="table">
                                                        <thead>
                                                        <th style="text-align: center">币名</th>
                                                        <th style="text-align: center">对币</th>
                                                        <th style="text-align: center"><?= $lable['pt1'] ?></th>
                                                        <th style="text-align: center"><?= $lable['pt2'] ?></th>
                                                        <th style="text-align: center">涨幅波动比</th>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($btc_list[$key] as $k=>$item) { ?>
                                                            <tr>
                                                                <td><a href="detail.php?name=<?= $k ?>&type=BTC_<?= $key ?>"><?= $k ?></a></td>
                                                                <td><?= strtr($item['pair'], '_', '/') ?></td>
                                                                <td><?php
                                                                    switch ($key) {
                                                                        case 'type12':
                                                                            echo $item['huobi_price']?$item['huobi_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type13':
                                                                            echo $item['huobi_price']?$item['huobi_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type14':
                                                                            echo $item['huobi_price']?$item['huobi_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type23':
                                                                            echo $item['gateio_price']?$item['gateio_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type24':
                                                                            echo $item['gateio_price']?$item['gateio_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type34':
                                                                            echo $item['binance_price']?$item['binance_price']:'不支持此币种';
                                                                            break;
                                                                    } ?></td>
                                                                <td><?php
                                                                    switch ($key) {
                                                                        case 'type12':
                                                                            echo $item['gateio_price']?$item['gateio_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type13':
                                                                            echo $item['binance_price']?$item['binance_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type14':
                                                                            echo $item['bittrex_price']?$item['bittrex_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type23':
                                                                            echo $item['binance_price']?$item['binance_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type24':
                                                                            echo $item['bittrex_price']?$item['bittrex_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type34':
                                                                            echo $item['bittrex_price']?$item['bittrex_price']:'不支持此币种';
                                                                            break;
                                                                    } ?></td>
                                                                <td><?= round(($item[$key]),4) ?> % </td>
                                                            </tr>
                                                        <?php }?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    <?php $BTCkty = 2;}?>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade in " id="ETH"><br/><br/>
                            <div class="panel-group" id="accordion">
                                <div class="panel-group" id="accordion">
                                    <?php $ETHkty = 1;foreach ($lables as $key=>$lable) { ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading" style="text-align: left;">
                                                <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#ETH<?=$key?>"><?= $lable['lble'] ?></a></h4>
                                            </div>
                                            <div id="ETH<?=$key?>" class="panel-collapse collapse <?=$ETHkty==1?"in":""?>">
                                                <div class="panel-body" style="max-height: 480px;overflow:auto;">
                                                    <table class="table">
                                                        <thead>
                                                        <th style="text-align: center">币名</th>
                                                        <th style="text-align: center">对币</th>
                                                        <th style="text-align: center"><?= $lable['pt1'] ?></th>
                                                        <th style="text-align: center"><?= $lable['pt2'] ?></th>
                                                        <th style="text-align: center">涨幅波动比</th>
                                                        </thead>
                                                        <tbody>
                                                        <?php foreach ($eth_list[$key] as $k=>$item) { ?>
                                                            <tr>
                                                                <td><a href="detail.php?name=<?= $k ?>&type=ETH_<?= $key ?>"><?= $k ?></a></td>
                                                                <td><?= strtr($item['pair'], '_', '/') ?></td>
                                                                <td><?php
                                                                    switch ($key) {
                                                                        case 'type12':
                                                                            echo $item['huobi_price']?$item['huobi_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type13':
                                                                            echo $item['huobi_price']?$item['huobi_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type14':
                                                                            echo $item['huobi_price']?$item['huobi_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type23':
                                                                            echo $item['gateio_price']?$item['gateio_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type24':
                                                                            echo $item['gateio_price']?$item['gateio_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type34':
                                                                            echo $item['binance_price']?$item['binance_price']:'不支持此币种';
                                                                            break;
                                                                    } ?></td>
                                                                <td><?php
                                                                    switch ($key) {
                                                                        case 'type12':
                                                                            echo $item['gateio_price']?$item['gateio_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type13':
                                                                            echo $item['binance_price']?$item['binance_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type14':
                                                                            echo $item['bittrex_price']?$item['bittrex_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type23':
                                                                            echo $item['binance_price']?$item['binance_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type24':
                                                                            echo $item['bittrex_price']?$item['bittrex_price']:'不支持此币种';
                                                                            break;
                                                                        case 'type34':
                                                                            echo $item['bittrex_price']?$item['bittrex_price']:'不支持此币种';
                                                                            break;
                                                                    } ?></td>
                                                                <td><?= round(($item[$key]),4) ?> % </td>
                                                            </tr>
                                                        <?php }?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    <?php $ETHkty = 2;}?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Start Trial -->

</body>
</html>
