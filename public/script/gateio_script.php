<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-6-2
 * Time: 下午1:42
 */
set_time_limit(0);

// 定义参数
define("ROOT_DIR", __DIR__ . "/../");
define('ACCOUNT_ID', ''); // 你的账户ID

include "../../lib/sdk/gateio/GateIO.php";

include "../../lib/EasyDB/basic_db.php";
include "../../lib/func/func.php";
include "../../conf/conf.php";

include "./tuto/huobi.php";

$time_stamp = time();
$tags = getTag2($db);
$tag  = $tags['id'];

$GateIO  = new GateIO($conf['gateio']['ACCESS_KEY'], $conf['gateio']['SECRET_KEY']);

$marketlist = $GateIO->get_marketlist();
$sql = "INSERT INTO counter_currencys(tp_id, tag_id, bi_name, pair, price, create_at) VALUES";
foreach ($marketlist['data'] as $item) {
    $sql .= "('2',  '" . $tag . "',  '" . strtoupper($item['symbol']) . "',  '" . strtoupper($item["pair"]) . "',  '" . $item['rate'] . "',  " . $time_stamp . "),";
}
$sql = rtrim($sql, ",");
$db->querySql($sql);