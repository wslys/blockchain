<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-16
 * Time: 下午1:39
 */
// TODO 火币交易平台
function runHuobi($HuoBi, $tag, $db, &$data) {
    echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
    echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>  ========火币交易平台======== >>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
    echo ">>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
    $kt = 0;
    $symbols = $HuoBi->get_common_symbols();
    $sql = "INSERT INTO counter_currencys(tp_id, tag_id, bi_name, pair, price) VALUES";
    if ($symbols['status'] != 'ok') {
        var_dump($symbols);
        echo "ERROR :>> 货币平台获取 平台所支持的交易币种失败\n";
        return;
    }
    foreach ($symbols['data'] as $symbol) {
        $symbol_name  = $symbol['base-currency'] . $symbol["quote-currency"];
        $symbol_name2 = $symbol['base-currency'] . "_" . $symbol["quote-currency"];

        $key_line_data = $HuoBi->get_history_kline($symbol_name, '1min', 1);

        if ($key_line_data['status'] == 'ok') {
            echo "OK >>>>>>>>>>>>>>>>>>>>>>>>>>>>>\n";
            $sql .= "('1', '" . $tag . "', '" . strtoupper($symbol['base-currency']) . "', '" . strtoupper($symbol["quote-currency"]) . "', '" . $key_line_data['data'][0]['close'] . "'),";

            $data[$symbol_name2] = [
                'symbol' => $symbol_name2,
                'datas'  => [
                    'name' => strtoupper($symbol['base-currency']),
                    'huobi_price'   => $key_line_data['data'][0]['close'],
                    'gateio_price'  => '',
                    'binance_price' => '',
                    'bittrex_price' => '',
                    'pair' => strtoupper($symbol["quote-currency"])
                ]
            ];
            /*$pair = strtolower($symbol_name2);
            if (!isset($data[$pair]['symbol']))
                $data[$pair]['symbol'] = $symbol_name2;
            if (!isset($data[$pair]['datas']['name']))
                $data[$pair]['datas']['name'] = strtoupper($symbol['base-currency']);
            if (!isset($data[$pair]['datas']['huobi_price']))
                $data[$pair]['datas']['huobi_price'] = $key_line_data['data'][0]['close'];
            if (!isset($data[$pair]['datas']['pair']))
                $data[$pair]['datas']['pair'] = strtoupper($symbol["quote-currency"]);*/
        }

        //  TODO
//        if ($kt > 10) {
//            break;
//        }
//        $kt ++;
    }
    $sql = rtrim($sql, ",");
    // echo $sql . "\n";
    $db->querySql($sql);
}