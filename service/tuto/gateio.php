<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-16
 * Time: 下午1:48
 */

//  TODO  GateIO 交易平台
function runGateIo($GateIO, $tag, $db, &$data) {
    echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
    echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>  ========GateIO 交易平台======== >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
    echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
    $marketlist = $GateIO->get_marketlist();
    $sql = "INSERT INTO counter_currencys(tp_id, tag_id, bi_name, pair, price) VALUES";
    foreach ($marketlist['data'] as $item) {
        $sql .= "('2', '" . $tag . "', '" . strtoupper($item['symbol']) . "', '" . strtoupper(explode('_', $item["pair"])[1]) . "', '" . $item['rate'] . "'),";

        $pair = strtolower($item["pair"]);
        if (!isset($data[$pair])) {
            $data[$pair] = [
                'symbol' => $pair,
                'datas'  => [
                    'name' => strtoupper($item['symbol']),
                    'huobi_price'   => '',
                    'gateio_price'  => $item['rate'],
                    'binance_price' => '',
                    'bittrex_price' => '',
                    'pair' => strtoupper(explode('_', $item["pair"])[1])
                ]
            ];
        }else {
            // if (!isset($data[$pair]['symbol']))
            $data[$pair]['symbol'] = $pair;
            // if (!isset($data[$pair]['datas']['name']))
            $data[$pair]['datas']['name'] = strtoupper($item['symbol']);
            // if (!isset($data[$pair]['datas']['gateio_price']))
            $data[$pair]['datas']['gateio_price'] = $item['rate'];
            // if (!isset($data[$pair]['datas']['pair']))
            $data[$pair]['datas']['pair'] = strtoupper(explode('_', $item["pair"])[1]);
        }
    }
    $sql = rtrim($sql, ",");
    // echo $sql . "\n";
    $db->querySql($sql);
}
