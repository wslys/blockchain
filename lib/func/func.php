<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-14
 * Time: 上午11:29
 */


/*标记数据拉取时间*/
function getTags($db) {
    //  TODO 标记数据拉取时间
    $sql = "INSERT INTO tags(create_at) VALUE('".date("Y-m-d H:i:s",time())."')";
    $db->querySql($sql);

    $sql = "SELECT * FROM tags ORDER BY id DESC LIMIT 1;";
    return $db->queryOne($sql);
}

/**
 * 多维数组排序
 * @param $arrays
 * @param $sort_key
 * @param int $sort_order
 * @param int $sort_type
 * @return bool
 */
function func_sort($arrays,$sort_key,$sort_order=SORT_ASC,$sort_type=SORT_NUMERIC ){
    if(is_array($arrays)){
        foreach ($arrays as $array){
            if(is_array($array)){
                $key_arrays[] = $array[$sort_key];
            }else{
                return false;
            }
        }
    }else{
        return false;
    }
    array_multisort($key_arrays,$sort_order,$sort_type,$arrays);
    return $arrays;
}

/**
 * 格式化币结果列表
 * @param $rows
 * @param $data
 */
function formatIcon($rows, &$data) {
    foreach ($rows as $row) {
        if (!isset($data[$row['bi_name']])) {
            $data[$row['bi_name']] = [];
        }

        array_push($data[$row['bi_name']],[
            "bi_name"        => $row['bi_name'],
            "tag_id"         => $row['tag_id'],
            "huobi_price"    => $row['huobi_price'],
            "gateio_price"   => $row['gateio_price'],
            "binance_price"  => $row['binance_price'],
            "bittrex_price"  => $row['bittrex_price'],
            "pair"           => $row['pair'],
            "percentage"     => $row['percentage'],
            "percentage_pri" => $row['percentage_pri'],
            "create_at"      => $row['create_at'],
        ]);
    }
}

/**
 * @param $rows
 * @return array
 */
function coinIncrease($rows) {
    $data = [
        'type12' => [],
        'type13' => [],
        'type14' => [],
        'type23' => [],
        'type24' => [],
        'type34' => []
    ];
    $type12 = [];
    $type13 = [];
    $type14 = [];
    $type23 = [];
    $type24 = [];
    $type34 = [];

    foreach ($rows as $key => $value) {
        $type12[$key] = [];
        $type13[$key] = [];
        $type14[$key] = [];
        $type23[$key] = [];
        $type24[$key] = [];
        $type34[$key] = [];

        $val = 0;
        $count = count($value);
        $val_arr = [
            'type12' => 0,
            'type13' => 0,
            'type14' => 0,
            'type23' => 0,
            'type24' => 0,
            'type34' => 0
        ];
        foreach ($value as $item) {
            $val += $item['percentage_pri'];

            if ($item['huobi_price'] && $item['gateio_price'])
                $val_arr['type12'] += abs((($item['huobi_price'] - $item['gateio_price'])    / ($item['huobi_price'] + $item['gateio_price']))    * 100);

            if ($item['huobi_price'] && $item['binance_price'])
                $val_arr['type13'] += abs((($item['huobi_price'] - $item['binance_price'])   / ($item['huobi_price'] + $item['binance_price']))   * 100);

            if ($item['huobi_price'] && $item['bittrex_price'])
                $val_arr['type14'] += abs((($item['huobi_price'] - $item['bittrex_price'])   / ($item['huobi_price'] + $item['bittrex_price']))   * 100);

            if ($item['gateio_price'] && $item['binance_price'])
                $val_arr['type23'] += abs((($item['gateio_price'] - $item['binance_price'])  / ($item['gateio_price'] + $item['binance_price']))  * 100);

            if ($item['gateio_price'] && $item['bittrex_price'])
                $val_arr['type24'] += abs((($item['gateio_price'] - $item['bittrex_price'])  / ($item['gateio_price'] + $item['bittrex_price']))  * 100);

            if ($item['binance_price'] && $item['bittrex_price'])
                $val_arr['type34'] += abs((($item['binance_price'] - $item['bittrex_price']) / ($item['binance_price'] + $item['bittrex_price'])) * 100);

            /*$data['type12'][$key]['bi_name']       = $item['bi_name'];
            $data['type12'][$key]['tag_id']        = $item['tag_id'];
            $data['type12'][$key]['price1']        = $item['huobi_price'];
            $data['type12'][$key]['price2']        = $item['gateio_price'];
            $data['type12'][$key]['huobi_price']   = $item['huobi_price'];
            $data['type12'][$key]['gateio_price']  = $item['gateio_price'];
            $data['type12'][$key]['binance_price'] = $item['binance_price'];
            $data['type12'][$key]['bittrex_price'] = $item['bittrex_price'];
            $data['type12'][$key]['pair']          = $item['pair'];
            $data['type12'][$key]['percentage']    = $item['percentage'];
            $data['type12'][$key]['percentage_pri']= $item['percentage_pri'];
            $data['type12'][$key]['create_at']     = $item['create_at'];*/
            $type12[$key]['bi_name']       = $item['bi_name'];
            $type12[$key]['tag_id']        = $item['tag_id'];
            $type12[$key]['price1']        = $item['huobi_price'];
            $type12[$key]['price2']        = $item['gateio_price'];
            $type12[$key]['huobi_price']   = $item['huobi_price'];
            $type12[$key]['gateio_price']  = $item['gateio_price'];
            $type12[$key]['binance_price'] = $item['binance_price'];
            $type12[$key]['bittrex_price'] = $item['bittrex_price'];
            $type12[$key]['pair']          = $item['pair'];
            $type12[$key]['percentage']    = $item['percentage'];
            $type12[$key]['percentage_pri']= $item['percentage_pri'];
            $type12[$key]['create_at']     = $item['create_at'];

            /*$data['type13'][$key]['bi_name']       = $item['bi_name'];
            $data['type13'][$key]['tag_id']        = $item['tag_id'];
            $data['type13'][$key]['price1']        = $item['huobi_price'];
            $data['type13'][$key]['price2']        = $item['binance_price'];
            $data['type13'][$key]['huobi_price']   = $item['huobi_price'];
            $data['type13'][$key]['gateio_price']  = $item['gateio_price'];
            $data['type13'][$key]['binance_price'] = $item['binance_price'];
            $data['type13'][$key]['bittrex_price'] = $item['bittrex_price'];
            $data['type13'][$key]['pair']          = $item['pair'];
            $data['type13'][$key]['percentage']    = $item['percentage'];
            $data['type13'][$key]['percentage_pri']= $item['percentage_pri'];
            $data['type13'][$key]['create_at']     = $item['create_at'];*/
            $type13[$key]['bi_name']       = $item['bi_name'];
            $type13[$key]['tag_id']        = $item['tag_id'];
            $type13[$key]['price1']        = $item['huobi_price'];
            $type13[$key]['price2']        = $item['binance_price'];
            $type13[$key]['huobi_price']   = $item['huobi_price'];
            $type13[$key]['gateio_price']  = $item['gateio_price'];
            $type13[$key]['binance_price'] = $item['binance_price'];
            $type13[$key]['bittrex_price'] = $item['bittrex_price'];
            $type13[$key]['pair']          = $item['pair'];
            $type13[$key]['percentage']    = $item['percentage'];
            $type13[$key]['percentage_pri']= $item['percentage_pri'];
            $type13[$key]['create_at']     = $item['create_at'];

            /*$data['type14'][$key]['bi_name']       = $item['bi_name'];
            $data['type14'][$key]['tag_id']        = $item['tag_id'];
            $data['type14'][$key]['price1']        = $item['huobi_price'];
            $data['type14'][$key]['price2']        = $item['bittrex_price'];
            $data['type14'][$key]['huobi_price']   = $item['huobi_price'];
            $data['type14'][$key]['gateio_price']  = $item['gateio_price'];
            $data['type14'][$key]['binance_price'] = $item['binance_price'];
            $data['type14'][$key]['bittrex_price'] = $item['bittrex_price'];
            $data['type14'][$key]['pair']          = $item['pair'];
            $data['type14'][$key]['percentage']    = $item['percentage'];
            $data['type14'][$key]['percentage_pri']= $item['percentage_pri'];
            $data['type14'][$key]['create_at']     = $item['create_at'];*/
            $type14[$key]['bi_name']       = $item['bi_name'];
            $type14[$key]['tag_id']        = $item['tag_id'];
            $type14[$key]['price1']        = $item['huobi_price'];
            $type14[$key]['price2']        = $item['bittrex_price'];
            $type14[$key]['huobi_price']   = $item['huobi_price'];
            $type14[$key]['gateio_price']  = $item['gateio_price'];
            $type14[$key]['binance_price'] = $item['binance_price'];
            $type14[$key]['bittrex_price'] = $item['bittrex_price'];
            $type14[$key]['pair']          = $item['pair'];
            $type14[$key]['percentage']    = $item['percentage'];
            $type14[$key]['percentage_pri']= $item['percentage_pri'];
            $type14[$key]['create_at']     = $item['create_at'];

            /*$data['type23'][$key]['bi_name']       = $item['bi_name'];
            $data['type23'][$key]['tag_id']        = $item['tag_id'];
            $data['type23'][$key]['price1']        = $item['gateio_price'];
            $data['type23'][$key]['price2']        = $item['binance_price'];
            $data['type23'][$key]['huobi_price']   = $item['huobi_price'];
            $data['type23'][$key]['gateio_price']  = $item['gateio_price'];
            $data['type23'][$key]['binance_price'] = $item['binance_price'];
            $data['type23'][$key]['bittrex_price'] = $item['bittrex_price'];
            $data['type23'][$key]['pair']          = $item['pair'];
            $data['type23'][$key]['percentage']    = $item['percentage'];
            $data['type23'][$key]['percentage_pri']= $item['percentage_pri'];
            $data['type23'][$key]['create_at']     = $item['create_at'];*/
            $type23[$key]['bi_name']       = $item['bi_name'];
            $type23[$key]['tag_id']        = $item['tag_id'];
            $type23[$key]['price1']        = $item['gateio_price'];
            $type23[$key]['price2']        = $item['binance_price'];
            $type23[$key]['huobi_price']   = $item['huobi_price'];
            $type23[$key]['gateio_price']  = $item['gateio_price'];
            $type23[$key]['binance_price'] = $item['binance_price'];
            $type23[$key]['bittrex_price'] = $item['bittrex_price'];
            $type23[$key]['pair']          = $item['pair'];
            $type23[$key]['percentage']    = $item['percentage'];
            $type23[$key]['percentage_pri']= $item['percentage_pri'];
            $type23[$key]['create_at']     = $item['create_at'];

            /*$data['type24'][$key]['bi_name']       = $item['bi_name'];
            $data['type24'][$key]['tag_id']        = $item['tag_id'];
            $data['type24'][$key]['price1']        = $item['gateio_price'];
            $data['type24'][$key]['price2']        = $item['bittrex_price'];
            $data['type24'][$key]['huobi_price']   = $item['huobi_price'];
            $data['type24'][$key]['gateio_price']  = $item['gateio_price'];
            $data['type24'][$key]['binance_price'] = $item['binance_price'];
            $data['type24'][$key]['bittrex_price'] = $item['bittrex_price'];
            $data['type24'][$key]['pair']          = $item['pair'];
            $data['type24'][$key]['percentage']    = $item['percentage'];
            $data['type24'][$key]['percentage_pri']= $item['percentage_pri'];
            $data['type24'][$key]['create_at']     = $item['create_at'];*/
            $type24[$key]['bi_name']       = $item['bi_name'];
            $type24[$key]['tag_id']        = $item['tag_id'];
            $type24[$key]['price1']        = $item['gateio_price'];
            $type24[$key]['price2']        = $item['bittrex_price'];
            $type24[$key]['huobi_price']   = $item['huobi_price'];
            $type24[$key]['gateio_price']  = $item['gateio_price'];
            $type24[$key]['binance_price'] = $item['binance_price'];
            $type24[$key]['bittrex_price'] = $item['bittrex_price'];
            $type24[$key]['pair']          = $item['pair'];
            $type24[$key]['percentage']    = $item['percentage'];
            $type24[$key]['percentage_pri']= $item['percentage_pri'];
            $type24[$key]['create_at']     = $item['create_at'];

            /*$data['type34'][$key]['bi_name']       = $item['bi_name'];
            $data['type34'][$key]['tag_id']        = $item['tag_id'];
            $data['type34'][$key]['price1']        = $item['binance_price'];
            $data['type34'][$key]['price2']        = $item['bittrex_price'];
            $data['type34'][$key]['huobi_price']   = $item['huobi_price'];
            $data['type34'][$key]['gateio_price']  = $item['gateio_price'];
            $data['type34'][$key]['binance_price'] = $item['binance_price'];
            $data['type34'][$key]['bittrex_price'] = $item['bittrex_price'];
            $data['type34'][$key]['pair']          = $item['pair'];
            $data['type34'][$key]['percentage']    = $item['percentage'];
            $data['type34'][$key]['percentage_pri']= $item['percentage_pri'];
            $data['type34'][$key]['create_at']     = $item['create_at'];*/
            $type34[$key]['bi_name']       = $item['bi_name'];
            $type34[$key]['tag_id']        = $item['tag_id'];
            $type34[$key]['price1']        = $item['binance_price'];
            $type34[$key]['price2']        = $item['bittrex_price'];
            $type34[$key]['huobi_price']   = $item['huobi_price'];
            $type34[$key]['gateio_price']  = $item['gateio_price'];
            $type34[$key]['binance_price'] = $item['binance_price'];
            $type34[$key]['bittrex_price'] = $item['bittrex_price'];
            $type34[$key]['pair']          = $item['pair'];
            $type34[$key]['percentage']    = $item['percentage'];
            $type34[$key]['percentage_pri']= $item['percentage_pri'];
            $type34[$key]['create_at']     = $item['create_at'];

        }

        /*$data['type12'][$key]['average'] = round(($val_arr['type12'] / $count),4);
        $data['type13'][$key]['average'] = round(($val_arr['type13'] / $count),4);
        $data['type14'][$key]['average'] = round(($val_arr['type14'] / $count),4);
        $data['type23'][$key]['average'] = round(($val_arr['type23'] / $count),4);
        $data['type24'][$key]['average'] = round(($val_arr['type24'] / $count),4);
        $data['type34'][$key]['average'] = round(($val_arr['type34'] / $count),4);*/
        $type12[$key]['average'] = round(($val_arr['type12'] / $count),4);
        $type13[$key]['average'] = round(($val_arr['type13'] / $count),4);
        $type14[$key]['average'] = round(($val_arr['type14'] / $count),4);
        $type23[$key]['average'] = round(($val_arr['type23'] / $count),4);
        $type24[$key]['average'] = round(($val_arr['type24'] / $count),4);
        $type34[$key]['average'] = round(($val_arr['type34'] / $count),4);

        /*$data[$key]['type12'] = round(($val_arr['type12'] / $count),4);
        $data[$key]['type13'] = round(($val_arr['type13'] / $count),4);
        $data[$key]['type14'] = round(($val_arr['type14'] / $count),4);
        $data[$key]['type23'] = round(($val_arr['type23'] / $count),4);
        $data[$key]['type24'] = round(($val_arr['type24'] / $count),4);
        $data[$key]['type34'] = round(($val_arr['type34'] / $count),4);*/
    }

    $data = [
        'type12' => func_sort($type12,'average',SORT_DESC,SORT_STRING),
        'type13' => func_sort($type13,'average',SORT_DESC,SORT_STRING),
        'type14' => func_sort($type14,'average',SORT_DESC,SORT_STRING),
        'type23' => func_sort($type23,'average',SORT_DESC,SORT_STRING),
        'type24' => func_sort($type24,'average',SORT_DESC,SORT_STRING),
        'type34' => func_sort($type34,'average',SORT_DESC,SORT_STRING)
    ];

    return $data;
}
