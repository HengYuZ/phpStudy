<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/24
 * Time: 21:58
 * 归并排序,这里使用了两个数组,$arr是待排序数组
 */

function mergeSort(&$arr, &$tmp, $left, $right)
{
    //设置递归出口，当递归到只有一个数组元素时，返回。
    if ($left == $right)
        return;
    //获取一半的数组长度,向下取整。这里需要与C++区分开来，不然会出现递归没法结束。
    $mid = floor(($left + $right) / 2);
    mergeSort($arr, $tmp, $left, $mid);
    mergeSort($arr, $tmp, $mid + 1, $right);
    //把$arr数组的值存放到临时数组$tmp中
    for ($i = $left; $i <= $right; $i++)
        $tmp[$i] = $arr[$i];

    //第一段数组的起始位置
    $i1 = $left;
    //第二段数组的起始位置
    $i2 = $mid + 1;

    for ($curr = $left; $curr <= $right; $curr++) {
        //当$i1 = $mid+1,证明左边的已经没有了，只需把右边的全部赋值给$arr数组就可以了
        if ($i1 == $mid + 1) {
            $arr[$curr] = $tmp[$i2++];
        } //当$i2 > $right;证明右边的已经没有值，只需把左边赋值给$arr就可以了
        elseif ($i2 > $right) {
            $arr[$curr] = $tmp[$i1++];
        }
        //比较左右两段数组的元素大小，只把两个数组中最小的值赋值$arr
        //这样可以保证$arr的值是升序排序。当递归完成后，$arr也是有序的了
        elseif ($tmp[$i1] < $tmp[$i2]) {
            $arr[$curr] = $tmp[$i1++];
        } else {
            $arr[$curr] = $tmp[$i2++];
        }
    }
}

$arr = array(9, 2, 232, 12, 1, 3, 53, 17, 7);
$tmp = array();
mergeSort($arr, $tmp, 0, count($arr) - 1);
var_dump($arr);