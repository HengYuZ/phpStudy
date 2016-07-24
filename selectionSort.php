<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/7/24
 * Time: 13:38
 * 选择排序
 */

function selectionSort(&$arr){
    $len = count($arr);
    for($i=0;$i<$len; $i++) {
        $lowindex = $i;
        for ($j = $i + 1; $j < $len; $j++) {
            if ($arr[$j] < $arr[$lowindex]) {
                $lowindex = $j;
            }
        }
        $tmp = $arr[$i];
        $arr[$i] = $arr[$lowindex];
        $arr[$lowindex] = $tmp;
    }
}
$arr = array(9, 2, 232, 12, 1, 3, 53, 17, 7);
selectionSort($arr);
var_dump($arr);