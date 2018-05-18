<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-11
 * Time: 下午3:23
 */

include "../lib/sdk/bittrex/Bittrex.php";
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

var_dump($bittrex_data);
