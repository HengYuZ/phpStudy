<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/7/25
 * Time: 14:38
 */

//Int 类型的的强制转换
$flag = false;
$a = (int)$flag;
var_dump($a);                   // int 0

//Int类型溢出会转换为float,可以使用round()函数四舍五入
$b = round(25 / 6);              //4
var_dump($b);

$b = round(17 / 6);             //3
var_dump($b);

/*明确把一个值转换为整型，可以使用intval()函数;
*float数值强制转换为int型，会出现向下取整。这个问题是基于PHP内部所使用的
*二进制制度表示决定的，因此不能直接比较两个浮点数是否相等
*/

$c = (0.1 + 0.7) * 10;
var_dump($c);               //8

$c = (int)((0.1 + 0.7) * 10);
var_dump($c);               //7

/**
 * NaN代表一个浮点数在运算中未定义或者不可描述的值，跟其他值比较都是flase;
 * 可以使用is_nan()函数来检测一个值是否为NaN
 */