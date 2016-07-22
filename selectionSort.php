<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/7/22
 * Time: 14:47
 * 选择排序,每一次把最小或者最大的待排序数选出，
 * 然后放到最前面去。我这里是升序排序，即把最小
 * 的数往前面提
 */

function selectionSort(&$arr)
{
    $len = count($arr);
    for ($i = 0; $i < $len; $i++) {
        //遍历后面待排序的数，通过不断的交换值，把最小放到数组当前的 i 坐标处。
        for ($j = $i + 1; $j < $len; $j++) {
            if ($arr[$j] < $arr[$i]) {
                $tmp = $arr[$i];
                $arr[$i] = $arr[$j];
                $arr[$j] = $tmp;
            }
        }
    }
}

$arr = array(9, 2, 232, 12, 1, 3, 53, 17, 7);
selectionSort($arr);
var_dump($arr);