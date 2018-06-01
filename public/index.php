<?php
define("ROOT_DIR", __DIR__ . "/../");
include "../lib/EasyDB/basic_db.php";
include "../lib/func/func.php";
include "../conf/conf.php";

$tags      = $db->query("SELECT * FROM tags WHERE DATE(create_at)=CURDATE()")->fetchAll();
$btc_rows  = $db->query("SELECT * FROM sort_table WHERE TO_DAYS(create_at)=TO_DAYS(NOW()) AND pair='BTC'  ORDER BY `percentage_pri` DESC")->fetchAll();
$eth_rows  = $db->query("SELECT * FROM sort_table WHERE TO_DAYS(create_at)=TO_DAYS(NOW()) AND pair='ETH'  ORDER BY `percentage_pri` DESC")->fetchAll();
$usdt_rows = $db->query("SELECT * FROM sort_table WHERE TO_DAYS(create_at)=TO_DAYS(NOW()) AND pair='USDT' ORDER BY `percentage_pri` DESC")->fetchAll();

$btc_arr  = [];
$eth_arr  = [];
$usdt_arr = [];
formatIcon($btc_rows, $btc_arr);
formatIcon($eth_rows, $eth_arr);
formatIcon($usdt_rows, $usdt_arr);

$btc_list = [];
$eth_list = [];
$usdt_list = [];
foreach ($btc_arr as $key => $btc_row) {
    $btc_list[$key] = [];

    $val = 0;
    $count = count($btc_row);
    foreach ($btc_row as $item) {
        $val += $item['percentage_pri'];

        $btc_list[$key]['bi_name'] = $item['bi_name'];
        $btc_list[$key]['tag_id'] = $item['tag_id'];
        $btc_list[$key]['huobi_price'] = $item['huobi_price'];
        $btc_list[$key]['gateio_price'] = $item['gateio_price'];
        $btc_list[$key]['pair'] = $item['pair'];
        $btc_list[$key]['percentage'] = $item['percentage'];
        $btc_list[$key]['percentage_pri'] = $item['percentage_pri'];
        $btc_list[$key]['create_at'] = $item['create_at'];
    }

    $btc_list[$key]['average'] = round(($val / $count),4);
}
foreach ($eth_arr as $key => $btc_row) {
    $eth_list[$key] = [];

    $val = 0;
    $count = count($btc_row);
    foreach ($btc_row as $item) {
        $val += $item['percentage_pri'];

        $eth_list[$key]['bi_name'] = $item['bi_name'];
        $eth_list[$key]['tag_id'] = $item['tag_id'];
        $eth_list[$key]['huobi_price'] = $item['huobi_price'];
        $eth_list[$key]['gateio_price'] = $item['gateio_price'];
        $eth_list[$key]['pair'] = $item['pair'];
        $eth_list[$key]['percentage'] = $item['percentage'];
        $eth_list[$key]['percentage_pri'] = $item['percentage_pri'];
        $eth_list[$key]['create_at'] = $item['create_at'];
    }

    $eth_list[$key]['average'] = round(($val / $count),4);
}
foreach ($usdt_arr as $key => $btc_row) {
    $usdt_list[$key] = [];

    $val = 0;
    $count = count($btc_row);
    foreach ($btc_row as $item) {
        $val += $item['percentage_pri'];

        $usdt_list[$key]['bi_name'] = $item['bi_name'];
        $usdt_list[$key]['tag_id'] = $item['tag_id'];
        $usdt_list[$key]['huobi_price'] = $item['huobi_price'];
        $usdt_list[$key]['gateio_price'] = $item['gateio_price'];
        $usdt_list[$key]['pair'] = $item['pair'];
        $usdt_list[$key]['percentage'] = $item['percentage'];
        $usdt_list[$key]['percentage_pri'] = $item['percentage_pri'];
        $usdt_list[$key]['create_at'] = $item['create_at'];
    }

    $usdt_list[$key]['average'] = round(($val / $count),4);
}

$btc_list_data  = coinIncrease($btc_arr);
$eth_list_data  = coinIncrease($eth_arr);
$usdt_list_data = coinIncrease($usdt_arr);

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
    <!--<nav class="navbar navbar-default">
        <div class="container">

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="test/logo.png" class="img-responsive"></a>
            </div>

            <div class="collapse navbar-collapse text-center" id="bs-example-navbar-collapse-1">
                <ul class="nav">
                    <li><a href="#solution" class="page-scroll">首页</a></li>
                    <li><a href="#how_it_works" class="page-scroll">Title</a></li>
                    <li><a href="#features" class="page-scroll">Title</a></li>
                    <li><a href="#testimonials" class="page-scroll">Title</a></li>
                    <li><a href="#pricing" class="page-scroll">Title</a></li>

                    <a href="#register" class="btn btn-sm start-trial">sign up for free</a>
                </ul>
            </div>
        </div>
    </nav>-->
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
                        <li class="active"><a href="#BTC" data-toggle="tab">BTC</a></li>
                        <li><a href="#USDT" data-toggle="tab">USDT</a></li>
                        <li><a href="#ETH" data-toggle="tab">ETH</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="BTC"><br/><br/>
                            <div class="panel-group" id="accordion">
                                <?php $BTCi=1;foreach ($btc_list_data as $key=>$item_arr) { ?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="text-align: left;">
                                            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#<?= 'BTC' . $lables[$key]['type'] ?>"><?= $lables[$key]['lble']?></a></h4>
                                        </div>
                                        <div id="<?= 'BTC' . $lables[$key]['type']?>" class="<?= $BTCi==1?'panel-collapse collapse in':'panel-collapse collapse' ?>">
                                            <div class="panel-body" style="max-height: 480px;overflow:auto;">
                                                <table class="table">
                                                    <thead>
                                                    <th style="text-align: center">币名</th>
                                                    <th style="text-align: center">对币</th>
                                                    <th style="text-align: center"><?= $lables[$key]['pt1']?></th>
                                                    <th style="text-align: center"><?= $lables[$key]['pt2']?></th>
                                                    <th style="text-align: center">涨幅波动比</th>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($item_arr as $item) { ?>
                                                        <tr>
                                                            <td><a href="detail.php?name=<?= $item['bi_name'] ?>&type=<?= 'BTC_' . $lables[$key]['type'] ?>"><?= $item['bi_name'] ?></a></td>
                                                            <td><?= $item['pair'] ?></td>
                                                            <td><?= $item['price1'] ? $item['price1'] : '此平台暂不支持此币种' ?></td>
                                                            <td><?= $item['price2'] ? $item['price2'] : '此平台暂不支持此币种' ?></td>
                                                            <td><?= $item['average'] ?> % </td>
                                                        </tr>
                                                    <?php }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php $BTCi ++;} ?>

                            </div>

                        </div>

                        <div class="tab-pane fade in " id="USDT"><br/><br/>
                            <div class="panel-group" id="accordion">
                                <?php $USDTi2=1;foreach ($usdt_list_data as $key=>$item_arr) {?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="text-align: left;">
                                            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#<?= 'USDT' . $lables[$key]['type'] ?>"><?= $lables[$key]['lble']?></a></h4>
                                        </div>
                                        <div id="<?= 'USDT' . $lables[$key]['type']?>" class="<?= $USDTi2==1?'panel-collapse collapse in':'panel-collapse collapse' ?>">
                                            <div class="panel-body" style="max-height: 360px;overflow:auto;">
                                                <table class="table">
                                                    <thead>
                                                    <th style="text-align: center">币名</th>
                                                    <th style="text-align: center">对币</th>
                                                    <th style="text-align: center"><?= $lables[$key]['pt1']?></th>
                                                    <th style="text-align: center"><?= $lables[$key]['pt2']?></th>
                                                    <th style="text-align: center">涨幅波动比</th>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($item_arr as $item) { ?>
                                                        <tr>
                                                            <td><a href="detail.php?name=<?= $item['bi_name'] ?>&type=<?= 'USDT_' . $lables[$key]['type'] ?>"><?= $item['bi_name'] ?></a></td>
                                                            <td><?= $item['pair'] ?></td>
                                                            <td><?= $item['price1'] ? $item['price1'] : '此平台暂不支持此币种' ?></td>
                                                            <td><?= $item['price2'] ? $item['price2'] : '此平台暂不支持此币种' ?></td>
                                                            <td><?= $item['average'] ?> % </td>
                                                        </tr>
                                                    <?php }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php $USDTi2++;} ?>

                            </div>

                        </div>

                        <div class="tab-pane fade in " id="ETH"><br/><br/>
                            <div class="panel-group" id="accordion">
                                <?php $ETHi3=1;foreach ($eth_list_data as $key=>$item_arr) {?>
                                    <div class="panel panel-default">
                                        <div class="panel-heading" style="text-align: left;">
                                            <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#<?= 'ETH' . $lables[$key]['type'] ?>"><?= $lables[$key]['lble']?></a></h4>
                                        </div>
                                        <div id="<?= 'ETH' . $lables[$key]['type']?>" class="<?= $ETHi3==1?'panel-collapse collapse in':'panel-collapse collapse' ?>">
                                            <div class="panel-body" style="max-height: 360px;overflow:auto;">
                                                <table class="table">
                                                    <thead>
                                                    <th style="text-align: center">币名</th>
                                                    <th style="text-align: center">对币</th>
                                                    <th style="text-align: center"><?= $lables[$key]['pt1']?></th>
                                                    <th style="text-align: center"><?= $lables[$key]['pt2']?></th>
                                                    <th style="text-align: center">涨幅波动比</th>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($item_arr as $item) { ?>
                                                        <tr>
                                                            <td><a href="detail.php?name=<?= $item['bi_name'] ?>&type=<?= 'ETH_' . $lables[$key]['type'] ?>"><?= $item['bi_name'] ?></a></td>
                                                            <td><?= $item['pair'] ?></td>
                                                            <td><?= $item['price1'] ? $item['price1'] : '此平台暂不支持此币种' ?></td>
                                                            <td><?= $item['price2'] ? $item['price2'] : '此平台暂不支持此币种' ?></td>
                                                            <td><?= $item['average'] ?> % </td>
                                                        </tr>
                                                    <?php }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                <?php $ETHi3++;} ?>

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
