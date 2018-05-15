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

$HuoBi  = new HuoBi();

echo "start 22222 >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>";
$symbols = $HuoBi->get_common_symbols();
var_dump($symbols);

