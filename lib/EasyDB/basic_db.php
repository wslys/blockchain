<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-14
 * Time: 上午11:26
 */

include "EasyDB.php";

$config = array(
    'host'     => '127.0.0.1',//数据库连接ip,默认本机
    'port'     => 3306,       //端口号,默认3306
    'username' => 'root',     //用户名,默认root
    'password' => '123456',   //密码,默认空
    'dbname'   => 'platform_bi', //数据库名字
    'charset'  => 'utf8'      //字符集,默认utf8
);

$db = new EasyDB($config);