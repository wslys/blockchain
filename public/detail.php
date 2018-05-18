<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-15
 * Time: 下午12:30
 */

define("ROOT_DIR", __DIR__ . "/../");
define('ACCOUNT_ID', ''); // 你的账户ID

include "../vendor/autoload.php";
include "../lib/sdk/gateio/GateIO.php";
include "../lib/sdk/huobi/HuoBi.php";
include '../lib/sdk/okex/OKCoin/OKCoin.php';
include "../lib/sdk/bittrex/Bittrex.php";

include "../lib/EasyDB/basic_db.php";
include "../lib/func/func.php";
include "../conf/conf.php";

$name = isset($_GET['name'])?$_GET['name']:'';
$type = isset($_GET['type'])?$_GET['type']:'';
$pair = explode('_', $type)[0];
$type = explode('_', $type)[1];

/*$gate  = new Gate();
$huobi = new Huobi();*/

$title = $name;
$name  = strtolower($name);

/*// 火币数据                  get_market_detail
$usdt_huobi_datas = $huobi->get_market_trade($name . 'usdt');
$btc_huobi_datas  = $huobi->get_market_trade($name . 'btc');
$eth_huobi_datas  = $huobi->get_market_trade($name . 'eth');

// GateIO数据
$usdt_gateio_datas = $gate->get_ticker($name . '_usdt');
$btc_gateio_datas  = $gate->get_ticker($name . '_btc');
$eth_gateio_datas  = $gate->get_ticker($name . '_eth');*/
?>

<!DOCTYPE html>
<!-- saved from url=(0030)https://confidentcustomer.com/ -->
<html class="no-js" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="robots" content="index, follow">
    <!-- title -->
    <title> <?= $title ?> 当下行情 </title>

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

