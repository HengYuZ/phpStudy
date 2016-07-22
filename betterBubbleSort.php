<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/7/22
 * Time: 14:03
 *优化的冒泡排序，原理是判断排序过程有没有再次发生交换，
 * 因为如果没有发生交换，说明前面已经排好序了，不需要再继续进行
 * 排序。
 */
function betterBubbleSort(&$arr)
{
    $len = count($arr);
    //设定一个标志来记录循环一趟是否有发生交换。
    $swapFlag = true;
    while ($swapFlag) {
        $swapFlag = false;
        for ($i = 1; $i < $len; $i++) {
            if ($arr[$i] < $arr[$i - 1]) {
                $tmp = $arr[$i - 1];
                $arr[$i - 1] = $arr[$i];
                $arr[$i] = $tmp;
                $swapFlag = true;
            }
        }
        $len--;
    }
}

$arr = array(9, 2, 232, 12, 1, 3, 53, 17, 7);
betterBubbleSort($arr);
var_dump($arr);
