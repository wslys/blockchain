<?php
// 定义参数
define('ACCOUNT_ID', ''); // 你的账户ID 
define('ACCESS_KEY', '78694c8e-49f6f767-9cdc8b41-bc8b9'); // 你的ACCESS_KEY
define('SECRET_KEY', 'ab7e1b06-897bc505-7a1c0799-52d77'); // 你的SECRET_KEY

include "HuoBi.php";

//实例化类库
$req = new req();
// 获取账户余额示例
var_dump($req->get_common_symbols());

?>