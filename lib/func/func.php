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
