<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-6-2
 * Time: 下午4:51
 */
include "../../lib/EasyDB/basic_db.php";

$select_sql = "SELECT * FROM tags ORDER BY id DESC LIMIT 1;";
$result = $db->queryOne($select_sql);
$tm  = time();
if ($result) {
    $time_stamp = $result['time_stamp'] + (60 * 30); // 十分钟
    if ($time_stamp < $tm) {// 插入一个新的 TAG
        $sql = "INSERT INTO tags(create_at, time_stamp) VALUE('".date("Y-m-d H:i:s", $tm)."', $tm)";
        $db->querySql($sql);
    }
}else {// 插入一个新的 TAG
    $sql = "INSERT INTO tags(create_at, time_stamp) VALUE('".date("Y-m-d H:i:s", $tm)."', $tm)";
    $db->querySql($sql);
}

$select_sql = "SELECT * FROM tags ORDER BY id DESC LIMIT 1;";
$result = $db->queryOne($select_sql);

$file = "/home/user/php-projects/blockchain/public/file/log-tag.txt";
file_put_contents($file, date("Y:m:d H:i:s", time()) . ":> tag is : " . $result['id']." \n", FILE_APPEND);
