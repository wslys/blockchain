<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-11
 * Time: 下午3:23
 */
// 定义参数
define("ROOT_DIR", __DIR__ . "/../");
define('ACCOUNT_ID', ''); // 你的账户ID
define('ACCESS_KEY', '4e72129e-92d31434-490f0e68-8a06e'); // 你的ACCESS_KEY
define('SECRET_KEY', '61d4c356-efaf48a7-7f7951b9-35b1c'); // 你的SECRET_KEY

include "../lib/sdk/gateio/GateIO.php";
include "../lib/sdk/huobi/HuoBi.php";
include "../lib/EasyDB/basic_db.php";
include "../lib/func/func.php";

//  TODO 标记数据拉取时间
$tags = getTags($db);
$tag  = $tags['id'];
$tag_time  = $tags['id'];

$HuoBi  = new HuoBi();
$GateIO = new GateIO();

//交易市场详细行情

// TODO 火币交易平台
// 一、 获取火begibf平台所支持的交易币种
echo "start >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>" . date("Y-m-d H:i:s",time()) . " \n ";
$symbols = $HuoBi->get_common_symbols();
$sql = "INSERT INTO counter_currencys(tp_id, tag_id, bi_name, pair, price) VALUES";
if ($symbols['status'] != 'ok') {
    echo "货币平台获取 平台所支持的交易币种失败";
    return;
}
$kt = 0;
$data = [];
foreach ($symbols['data'] as $symbol) {
    $symbol_name  = $symbol['base-currency'] . $symbol["quote-currency"];
    $symbol_name2 = $symbol['base-currency'] . "_" . $symbol["quote-currency"];

    $key_line_data = $HuoBi->get_history_kline($symbol_name, '1min', 1);

    if ($key_line_data['status'] == 'ok') {
        echo "OK >>>>>>>>>>>>>>>>>>>>>>>>>>>>> \n ";
        $sql .= "('1', '" . $tag . "', '" . strtoupper($symbol['base-currency']) . "', '" . strtoupper($symbol["quote-currency"]) . "', '" . $key_line_data['data'][0]['close'] . "'),";

        $data[$symbol_name2] = [
            'symbol' => $symbol_name2,
            'datas'  => [
                'name' => strtoupper($symbol['base-currency']),
                'huobi_price' => $key_line_data['data'][0]['close'],
                'gateio_price' => '',
                'pair' => strtoupper($symbol["quote-currency"])
            ]
        ];
    }
}
$sql = rtrim($sql, ",");
/*$db->querySql($sql);*/

// TODO GateIO 交易平台
$marketlist = $GateIO->get_marketlist();

$sql2 = "INSERT INTO counter_currencys(tp_id, tag_id, bi_name, pair, price) VALUES";
foreach ($marketlist['data'] as $item) {
    $sql2 .= "('2', '" . $tag . "', '" . strtoupper($item['symbol']) . "', '" . strtoupper(explode('_', $item["pair"])[1]) . "', '" . $item['rate'] . "'),";

    $data[$item["pair"]]['symbol'] = $item["pair"];
    $data[$item["pair"]]['datas']['name'] = $item['symbol'];
    $data[$item["pair"]]['datas']['gateio_price'] = $item['rate'];
    $data[$item["pair"]]['datas']['pair'] = strtoupper(explode('_', $item["pair"])[1]);
}
$sql2 = rtrim($sql2, ",");
// $db->querySql($sql2);
echo "\n >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>. " . date("Y-m-d H:i:s",time()) . "\n";

$sql3 = "INSERT INTO sort_table(tag_id, bi_name, huobi_price, gateio_price, pair, percentage, percentage_pri, create_at) VALUES";
foreach ($data as $item) {
    $percentage = "";
    if ($item['datas']['huobi_price'] && $item['datas']['gateio_price']) {
        $percentage = ($item['datas']['huobi_price'] - $item['datas']['gateio_price']) / ($item['datas']['huobi_price'] + $item['datas']['gateio_price']) * 100;
    }
    $percentage_pri = abs($percentage);
    $sql3 .= "('".$tag."', '".$item['datas']['name']."', '".$item['datas']['huobi_price']."', '".$item['datas']['gateio_price']."', '".$item['datas']['pair']."', '".$percentage."', '".$percentage_pri."', '".date("Y-m-d H:i:s",time())."'),";
}
$sql3 = rtrim($sql3, ",");

echo '$sql3 >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>';
echo $sql3 . "\n";
echo '$sql3 >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>' . "\n";
$db->querySql($sql3);

