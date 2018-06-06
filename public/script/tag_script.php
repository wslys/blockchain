<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-6-2
 * Time: 下午4:51
 */
include "../../lib/EasyDB/basic_db.php";

$tm  = time();
$sql = "INSERT INTO tags(create_at, time_stamp) VALUE('".date("Y-m-d H:i:s", $tm)."', $tm)";
$id  = $db->querySql($sql);

$file = "/home/user/php-projects/blockchain/public/file/log-tag.txt";
file_put_contents($file, date("Y:m:d H:i:s", time()) . " : > tag is : ".$id." \n", FILE_APPEND);
