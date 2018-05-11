<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-11
 * Time: 下午3:23
 */

include "../lib/sdk/gateio/GateIO.php";
include "../lib/sdk/huobi/HuoBi.php";

// 定义参数
define('ACCOUNT_ID', ''); // 你的账户ID
define('ACCESS_KEY', '78694c8e-49f6f767-9cdc8b41-bc8b9'); // 你的ACCESS_KEY
define('SECRET_KEY', 'ab7e1b06-897bc505-7a1c0799-52d77'); // 你的SECRET_KEY

$GateIO = new GateIO();
$HuoBi  = new HuoBi();

//交易市场详细行情
//print_r($GateIO->get_marketlist());
echo "lllllllllllllllllllllllllllllll";
print_r($HuoBi->get_detail_merged("btcusdt"));
