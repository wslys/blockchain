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
include "../../lib/sdk/gateio/GateIO.php";
include "../../vendor/autoload.php";
include "../../lib/sdk/bittrex/Bittrex.php";
include "../../lib/EasyDB/basic_db.php";
include "../../lib/func/func.php";
include "../../conf/conf.php";

$action = "local_action";
$file = "/home/user/php-projects/blockchain/public/file/log-tag.txt";
/**TODO****************************************** *****************************************************************************/
/**TODO START GET TAG**********************************************************************************************************/
$select_sql = "SELECT * FROM tags ORDER BY id DESC LIMIT 1;";
$result = $db->queryOne($select_sql);
$tm  = time();
if ($result) {
    $time_stamp = $result['time_stamp'] + (60 * 30); // 十分钟
    if ($time_stamp < $tm) {// 插入一个新的 TAG
        $sql = "INSERT INTO tags(create_at, time_stamp) VALUE('".date("Y-m-d H:i:s", $tm)."', $tm)";
        $db->querySql($sql);
    }
}else {// 插入一个新的 TAG
    $sql = "INSERT INTO tags(create_at, time_stamp) VALUE('".date("Y-m-d H:i:s", $tm)."', $tm)";
    $db->querySql($sql);
}

file_put_contents($file, "新一次数据拉取开始 \n\n", FILE_APPEND);
file_put_contents($file, date("Y:m:d H:i:s", time()) . ":> tag is : " . $result['id']." \n\n", FILE_APPEND);

$select_sql = "SELECT * FROM tags ORDER BY id DESC LIMIT 1;";
$result = $db->queryOne($select_sql);
$tag  = $result['id'];
/**TODO EDN GET TAG************************************************************************************************************/
/**TODO************************************************************************************************************************/


/** TODO *************************************************************************************************************************/
/** TODO START 火币平台数据拉取 *****************************************************************************************************/
file_put_contents($file, "START 火币平台数据拉取 >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> \n\n", FILE_APPEND);
$HuoBi = new HuoBi($conf['huobi']['ACCESS_KEY'], $conf['huobi']['SECRET_KEY']);

$symbols = $HuoBi->get_common_symbols();
$sql = "INSERT INTO counter_currencys(tp_id, tag_id, bi_name, pair, pair_lable, price, create_at, action_local) VALUES";
if ($symbols['status'] != 'ok') {
    var_dump($symbols);
    echo "ERROR :>> 货币平台获取 平台所支持的交易币种失败 \n\n";
    return;
}

foreach ($symbols['data'] as $symbol) {
    $time_stamp = time();
    $symbol_name  = $symbol['base-currency'] . $symbol["quote-currency"];
    $symbol_name2 = $symbol['base-currency'] . "_" . $symbol["quote-currency"];

    $key_line_data = $HuoBi->get_history_kline($symbol_name, '1min', 1);

    if ($key_line_data['status'] == 'ok') {
        $sql .= "('1',   '" . $tag . "',   '" . strtoupper($symbol['base-currency']) . "',   '" . strtoupper(($symbol['base-currency'] . "_" .$symbol["quote-currency"])) . "',   '" . strtoupper($symbol["quote-currency"]) . "',   '" . $key_line_data['data'][0]['close'] . "',  " . $time_stamp . ", '".$action."'),";
    }
}
$sql = rtrim($sql, ",");
$db->querySql($sql);
echo $sql . "\n\n";
file_put_contents($file, "END 火币平台数据拉取 >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> \n\n", FILE_APPEND);
/**TODO END 火币平台数据拉取*****************************************************************************************************/
/**TODO***********************************************************************************************************************/


/**TODO***********************************************************************************************************************/
/**TODO START GateIO平台数据拉取************************************************************************************************/
file_put_contents($file, "START GateIO平台数据拉取 >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> \n\n", FILE_APPEND);
$GateIO  = new GateIO($conf['gateio']['ACCESS_KEY'], $conf['gateio']['SECRET_KEY']);

$marketlist = $GateIO->get_marketlist();
$sql = "INSERT INTO counter_currencys(tp_id, tag_id, bi_name, pair, pair_lable, price, create_at, action_local) VALUES";
foreach ($marketlist['data'] as $item) {
    $time_stamp = time();
    $sql .= "('2',  '" . $tag . "',  '" . strtoupper($item['symbol']) . "',  '" . strtoupper($item["pair"]) . "',  '" . strtoupper(explode('_', $item["pair"])[1]) . "',  '" . $item['rate'] . "',  " . $time_stamp . ", '".$action."'),";
}
$sql = rtrim($sql, ",");
$db->querySql($sql);
echo $sql . "\n\n";
file_put_contents($file, "END GateIO平台数据拉取 >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> \n\n", FILE_APPEND);
/**TODO END GateIO平台数据拉取***************************************************************************************************/
/**TODO************************************************************************************************************************/



/**TODO*************************************************************************************************************************/
/**TODO START Binance平台数据拉取*************************************************************************************************/
file_put_contents($file, "START Binance平台数据拉取 >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> \n\n", FILE_APPEND);
$Binance = new Binance\API($conf['binance']['ACCESS_KEY'], $conf['binance']['SECRET_KEY']);
$prices  = $Binance->prices();

$binance_data = [];
foreach ($prices as $key => $price) {
    $pair1    = substr($key,-3);
    $bi_name1 = substr($key,0, (strlen($key) - 3));
    $pair2    = substr($key,-4);
    $bi_name2 = substr($key,0, (strlen($key) - 4));

    // 拆分 BTC
    if ($pair1 == "BTC") {
        $binance_data[($pair1 . "_" . $bi_name1)] = [
            "bi_name" => $bi_name1,
            "pair"    => $pair1,
            "price"   => $price
        ];
    }
    // 拆分 USDT
    if ($pair2 == 'USDT') {
        $binance_data[($pair1 . "_" . $bi_name1)] = [
            "bi_name" => $bi_name2,
            "pair"    => $pair2,
            "price"   => $price
        ];
    }
    // 拆分 ETH
    if ($pair1 == 'ETH') {
        $binance_data[($pair1 . "_" . $bi_name1)] = [
            "bi_name" => $bi_name1,
            "pair"    => $pair1,
            "price"   => $price
        ];
    }
}
$sql = "INSERT INTO counter_currencys(tp_id, tag_id, bi_name, pair, pair_lable, price, create_at, action_local) VALUES";
foreach ($binance_data as $item) {
    $time_stamp = time();
    $pair = strtolower(($item['bi_name'] . "_" . $item["pair"]));
    $sql .= "('3',  '" . $tag . "',  '" . strtoupper($item['bi_name']) . "',  '" . strtoupper($pair) . "',  '" . strtoupper($item["pair"]) . "',  '" . $item['price'] . "',  " . $time_stamp . ", '".$action."'),";
}

$sql = rtrim($sql, ",");
$db->querySql($sql);
echo $sql . "\n\n";
file_put_contents($file, "END GateIO平台数据拉取 >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> \n\n", FILE_APPEND);
/**TODO END Binance平台数据拉取**************************************************************************************************/
/**TODO************************************************************************************************************************/


/**TODO*************************************************************************************************************************/
/**TODO START Bittrex平台数据拉取*************************************************************************************************/
file_put_contents($file, "START Bittrex平台数据拉取 >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> \n\n", FILE_APPEND);
$Bittrex = new Bittrex();

$Bittrex_markets = $Bittrex->getmarkets();
$bittrex_data = [];
foreach ($Bittrex_markets['result'] as $key => $item) {
    $marketName = $item['BaseCurrency'];
    $market = $item['MarketCurrency']. '_' . $marketName;

    if ($marketName == 'ETH' || $marketName == 'BTC' || $marketName == 'USDT') {
        $ticker = $Bittrex->getticker($item['MarketName']);
        $bittrex_data[$item['MarketCurrency']. '_' . $marketName] = [
            'symbol' => $item['MarketCurrency']. '_' . $marketName,
            'datas' => [
                'bi_name' => $item['MarketCurrency'],
                'price' => $ticker['result']['Last'],
                'pair' => $marketName,
            ]
        ];
    }
}
$sql = "INSERT INTO counter_currencys(tp_id, tag_id, bi_name, pair, pair_lable, price, create_at, action_local) VALUES";
foreach ($bittrex_data as $item) {
    $time_stamp = time();
    $pair = strtolower(($item['datas']['bi_name'] . "_" . $item['datas']["pair"]));

    $sql .= "('4', '".$tag."', '".$item['datas']['bi_name']."', '".strtoupper($pair)."', '".strtoupper($item['datas']["pair"])."', '".$item['datas']['price']."',  " . $time_stamp . ", '".$action."'),";
}
$sql = rtrim($sql, ",");
$db->querySql($sql);
echo $sql . "\n\n";
file_put_contents($file, "END Bittrex平台数据拉取 >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> \n\n", FILE_APPEND);
/**TODO END Bittrex平台数据拉取**************************************************************************************************/
/**TODO************************************************************************************************************************/

file_put_contents($file, "新一次数据拉取结束 \n\n\n\n", FILE_APPEND);
