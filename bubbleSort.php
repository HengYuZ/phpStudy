<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/7/22
 * Time: 10:16
 * 没有优化的冒泡排序
 */

function bubbleSort(&$arr)
{
    //计算数组长度
    $len = count($arr);

    for ($i = 0; $i < $len; $i++) {
        for ($j = $len - 1; $j > $i; $j--) {
            if ($arr[$j] < $arr[$j - 1]) {
                $tmp = $arr[$j - 1];
                $arr[$j - 1] = $arr[$j];
                $arr[$j] = $tmp;
            }
        }
    }
}

$arr = array(9, 2, 232, 12, 1, 3, 53, 17, 7);
bubbleSort($arr);
var_dump($arr);
