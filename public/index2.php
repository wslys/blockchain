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

$usdt_sql = "SELECT * FROM counter_currencys WHERE tag_id IN (SELECT id FROM tags WHERE time_stamp>$start_time_stamp AND time_stamp<$end_time_stamp) AND pair_lable='USDT'";
$btc_rows = $db->query($usdt_sql)->fetchAll();

$usdt_arr = formatIcon2($btc_rows, $btc_arr);

$data_list= formatIconCount($usdt_arr);

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
                    <div class="col-md-6">
                        <pre><?= var_dump($data_list) ?></pre>
                    </div>
                    <div class="col-md-6">
                        <pre><?= var_dump($usdt_arr) ?></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Start Trial -->

</body>
</html>
