<?php
$file = include 'test.php';
echo "wsl ======================================================================================================== \n ";
file_put_contents($file, date("Y:m:d H:i:s", time()) . "\n", FILE_APPEND);
?>ll
