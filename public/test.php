<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 18-5-19
 * Time: 下午5:22
 */

$stringtime = date("Y-m-d", time());

$start_time = $stringtime . " 00:00:00";
$end_time   = $stringtime . " 23:59:59";

echo strtotime($start_time)."<br/>";
echo strtotime($end_time)."<br/>";

echo date("Y-m-d H:i:s", strtotime($start_time))."<br/>";
echo date("Y-m-d H:i:s", strtotime($end_time))."<br/>";
