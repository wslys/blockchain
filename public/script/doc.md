启动编辑定时文件：crontab -e
定时命令：*/30 * * * * lynx -dump http://127.0.0.1:8090/script/script.php
重启定时任务：/etc/init.d/cron restart
            /etc/init.d/crond status
            
            
            
*/10 * * * * lynx -dump http://127.0.0.1:8090/script/binance_script.php 
*/10 * * * * lynx -dump http://127.0.0.1:8090/script/bittrex_script.php 
*/10 * * * * lynx -dump http://127.0.0.1:8090/script/gateio_script.php  
*/10 * * * * lynx -dump http://127.0.0.1:8090/script/huobi_script.php 