<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-15
 * Time: 下午4:54
 */

$conf = [
    "huobi" => [
        "ACCESS_KEY" => '4e72129e-92d31434-490f0e68-8a06e',
        "SECRET_KEY" => '61d4c356-efaf48a7-7f7951b9-35b1c'
    ],
    "gateio" => [
        "ACCESS_KEY" => '5C1D9150-8FA9-44E7-87A5-F3F918FC08ED',
        "SECRET_KEY" => '3e19b12719beeefd97d74da5ebae8d5feffd5636f6249759317362f09409bc62'
    ],
    "binance" => [
        "ACCESS_KEY" => 'aoQnqGahZBOA9Hjs9t6AxXtky2ZztuocelQLnWwKR6LCkaBoqsoNXK3jUq1ah7Tr',
        "SECRET_KEY" => 'hYyAKJbgfZ2FjWtBIpZzIukrbHunoESCMdpMpUHlRtG4FQtu6MHO9LHEMNBAiFWn'
    ],
    "okex" => [
        "API_KEY" => 'd5eb7d58-ff33-4600-8121-7a26cec4fd9b',
        "SECRET_KEY" => 'BD67A37972581615EEDFD145A0304AE9'
    ],
    'lables' => [
        "type12" => ["type"=>'type12', "lble"=>'火币平台 --- GateIO平台',      "pt1"=>'火币平台',    "pt2"=>"GateIO平台"],
        "type13" => ["type"=>'type13', "lble"=>'火币平台 --- Binance平台',     "pt1"=>'火币平台',    "pt2"=>"Binance平台"],
        "type14" => ["type"=>'type14', "lble"=>'火币平台 --- Bittrex平台',     "pt1"=>'火币平台',    "pt2"=>"Bittrex平台"],
        "type23" => ["type"=>'type23', "lble"=>'GateIO平台 ---- Binance平台', "pt1"=>'GateIO平台',  "pt2"=>"Binance平台"],
        "type24" => ["type"=>'type24', "lble"=>'GateIO平台 ---- Bittrex平台', "pt1"=>'GateIO平台',  "pt2"=>"Bittrex平台"],
        "type34" => ["type"=>'type34', "lble"=>'Binance平台 ---- Bittrex平台',"pt1"=>'Binance平台', "pt2"=>"Bittrex平台"],
    ]
];

// accounts 账户表
// actions  资源表
// groups   权限组表
// authority_db