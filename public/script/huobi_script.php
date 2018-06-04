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

include "../../lib/sdk/huobi/HuoBi.php";

include "../../lib/EasyDB/basic_db.php";
include "../../lib/func/func.php";
include "../../conf/conf.php";

include "./tuto/huobi.php";

$time_stamp = time();
$tags = getTag2($db);
$tag  = $tags['id'];

$file = "/home/user/php-projects/blockchain/public/file/log-huobi.txt";
file_put_contents($file, date("Y:m:d H:i:s", time()) . ":> tag is : " . $tag ." \n", FILE_APPEND);

$HuoBi = new HuoBi($conf['huobi']['ACCESS_KEY'], $conf['huobi']['SECRET_KEY']);

// =============================================================================================
$symbols = $HuoBi->get_common_symbols();
$sql = "INSERT INTO counter_currencys(tp_id, tag_id, bi_name, pair, pair_lable, price, create_at) VALUES";
if ($symbols['status'] != 'ok') {
    var_dump($symbols);
    echo "ERROR :>> 货币平台获取 平台所支持的交易币种失败\n";
    return;
}

foreach ($symbols['data'] as $symbol) {
    $time_stamp = time();
    $symbol_name  = $symbol['base-currency'] . $symbol["quote-currency"];
    $symbol_name2 = $symbol['base-currency'] . "_" . $symbol["quote-currency"];

    $key_line_data = $HuoBi->get_history_kline($symbol_name, '1min', 1);

    if ($key_line_data['status'] == 'ok') {
        $sql .= "('1',   '" . $tag . "',   '" . strtoupper($symbol['base-currency']) . "',   '" . strtoupper(($symbol['base-currency'] . "_" .$symbol["quote-currency"])) . "',   '" . strtoupper($symbol["quote-currency"]) . "',   '" . $key_line_data['data'][0]['close'] . "',  " . $time_stamp . "),";
    }
}
$sql = rtrim($sql, ",");
$db->querySql($sql);
