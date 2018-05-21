<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-11
 * Time: 下午3:23
 */

/*include "../lib/sdk/bittrex/Bittrex.php";
$Bittrex = new Bittrex();
$list    = $Bittrex->getmarkets();

$bittrex_data = [];
$kt = 0;
foreach ($list['result'] as $key => $item) {
    $marketName = $item['BaseCurrency'];
    $market = $item['MarketCurrency']. '-' . $marketName;

    if ($marketName == 'ETH' || $marketName == 'BTC' || $marketName == 'USDT') {
        $ticker = $Bittrex->getticker($item['MarketName']);
        echo "OK >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>> \n ";
        $bittrex_data[$item['MarketCurrency']. '_' . $marketName] = [
            'symbol' => $item['MarketCurrency']. '_' . $marketName,
            'datas' => [
                'name' => $item['MarketCurrency'],
                'bittrex_price' => $ticker['result']['Last'],
                'pair' => $marketName,
            ]
        ];
    }
}

var_dump($bittrex_data);*/
?>

<?php
/**
 * 取市场深度数据
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-17
 * Time: 下午2:11
 */

// 定义参数
define("ROOT_DIR", __DIR__ . "/../");
define('ACCOUNT_ID', ''); // 你的账户ID

include "../vendor/autoload.php";
include "../lib/sdk/gateio/GateIO.php";
include "../lib/sdk/huobi/HuoBi.php";
include '../lib/sdk/okex/OKCoin/OKCoin.php';
include "../lib/sdk/bittrex/Bittrex.php";
//include "../lib/sdk/binance/Binance.php";

include "../lib/EasyDB/basic_db.php";
include "../lib/func/func.php";
include "../conf/conf.php";

/* Binance 平台 */
//$Binance = new Binance();
$Binance = new Binance\API($conf['binance']['ACCESS_KEY'], $conf['binance']['SECRET_KEY']);
// 获取Kline
$prices = $Binance->prices();

echo ".............................";
var_dump($prices);
echo ".............................";

