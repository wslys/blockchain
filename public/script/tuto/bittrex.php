<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-16
 * Time: 下午12:30
 */

function runBittrex($Bittrex, $tag, $db, &$data) {
    echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
    echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>  ========Bittrex 交易平台======== >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
    echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n\n\n\n";

    file_put_contents(FILE, date("Y:m:d H:i:s", time()) . ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>  ========Bittrex 交易平台 获取数据开始======== >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n", FILE_APPEND);
    $Bittrex_markets = $Bittrex->getmarkets();
    $bittrex_data = [];
    foreach ($Bittrex_markets['result'] as $key => $item) {
        $marketName = $item['BaseCurrency'];
        $market = $item['MarketCurrency']. '_' . $marketName;

        if ($marketName == 'ETH' || $marketName == 'BTC' || $marketName == 'USDT') {
            $ticker = $Bittrex->getticker($item['MarketName']);
            echo "Bittrex OK >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
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
    $sql = "INSERT INTO counter_currencys(tp_id, tag_id, bi_name, pair, price) VALUES";
    foreach ($bittrex_data as $item) {
        $sql .= "('4', '".$tag."', '".$item['datas']['bi_name']."', '".$item['datas']["pair"]."', '".$item['datas']['price']."'),";

        $pair = strtolower(($item['datas']['bi_name'] . "_" . $item['datas']["pair"]));
        if (!isset($data[$pair])) {
            $data[$pair] = [
                'symbol' => $pair,
                'datas'  => [
                    'name' => strtoupper($item['datas']['bi_name']),
                    'huobi_price'   => '',
                    'gateio_price'  => '',
                    'binance_price' => '',
                    'bittrex_price' => $item['datas']['price'],
                    'pair' => strtoupper($item['datas']["pair"])
                ]
            ];
        }else {
            // if (!isset($data[$pair]['symbol']))
            $data[$pair]['symbol'] = $pair;
            // if (!isset($data[$pair]['datas']['name']))
            $data[$pair]['datas']['name'] = $item['datas']['bi_name'];
            // if (!isset($data[$pair]['datas']['bittrex_price']))
            $data[$pair]['datas']['bittrex_price'] = $item['datas']['price'];
            // if (!isset($data[$pair]['datas']['pair']))
            $data[$pair]['datas']['pair'] = strtoupper($item['datas']["pair"]);
        }

    }
    $sql = rtrim($sql, ",");
    //echo $sql . "\n";
    $db->querySql($sql);

    file_put_contents(FILE, date("Y:m:d H:i:s", time()) . ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>  ========Bittrex 交易平台 获取数据结束======== >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n", FILE_APPEND);
}