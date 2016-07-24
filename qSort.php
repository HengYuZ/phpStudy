<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/7/22
 * Time: 16:01
 * 快速排序
 */

function Partition(&$arr, $left, $right)
{
    //选择数组的第一个值作为参照值
    $pivot = $arr[$left];
    while ($left < $right) {
        //循环处理比 $pivot大的值，右边的游标往左边移一个
        while ($left < $right && $pivot < $arr[$right]) {
            $right--;
        }
        //右边值比$pivot大，把右边值赋给$left(左边游标)下标的数组元素。
        //并且左边游标往右移动一个
        if ($left < $right) {
            $arr[$left] = $arr[$right];
            $left++;
        }
        //循环处理比 $pivot小的值，左边的游标往右边移一个
        while ($left < $right && $pivot > $arr[$left]) {
            $left++;
        }
        //左边值比$pivot大，把左边值赋给$right下标(右边游标)的数组元素。
        //并且右边游标往左移动一个
        if ($left < $right) {
            $arr[$right] = $arr[$left];
            $right--;
        }
    }
    //因为是把数组弄为比$pivot大的在右边，比$pivot小的在左边
    //而最外层while循环完后，$Left与$right重合，也就是$pivot在数组的位置
    $arr[$left] = $pivot;
    //返回$pivot的下标
    return $left;
}

function qSort(&$arr, $left, $right)
{
    //设置递归出口
    if ($left > $right)
        return;
    else {
        //获取参照值位置
        $pivotloc = Partition($arr, $left, $right);
        qSort($arr, $left, $pivotloc - 1);
        qSort($arr, $pivotloc + 1, $right);
    }
}

$arr = array(9, 2, 232, 12, 1, 3, 53, 17, 7);
qSort($arr, 0, count($arr) - 1);
var_dump($arr);

