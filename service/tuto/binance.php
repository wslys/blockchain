<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-16
 * Time: 下午1:52
 */

//  TODO  Binance
function runBinance($Binance, $tag, $db, &$data) {
    echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
    echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>  ========Binance 交易平台======== >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
    echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n\n\n\n";
    $prices = $Binance->prices();
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

    $sql = "INSERT INTO counter_currencys(tp_id, tag_id, bi_name, pair, price) VALUES";
    foreach ($binance_data as $item) {
        $sql .= "('3', '".$tag."', '".$item['bi_name']."', '".$item["pair"]."', '".$item['price']."'),";

        $pair = strtolower(($item['bi_name'] . "_" . $item["pair"]));
        if (!isset($data[$pair])) {
            $data[$pair] = [
                'symbol' => $pair,
                'datas'  => [
                    'name' => strtoupper($item['bi_name']),
                    'huobi_price'   => '',
                    'gateio_price'  => '',
                    'binance_price' => $item['price'],
                    'bittrex_price' => '',
                    'pair' => strtoupper($item["pair"])
                ]
            ];
        }else {
            // if (!isset($data[$pair]['symbol']))
            $data[$pair]['symbol'] = $pair;
            // if (!isset($data[$pair]['datas']['name']))
            $data[$pair]['datas']['name'] = $item['bi_name'];
            // if (!isset($data[$pair]['datas']['binance_price']))
            $data[$pair]['datas']['binance_price'] = $item['price'];
            // if (!isset($data[$pair]['datas']['pair']))
            $data[$pair]['datas']['pair'] = strtoupper($item["pair"]);
        }
    }

    $sql = rtrim($sql, ",");
    //echo $sql . "\n";
    $db->querySql($sql);
}

