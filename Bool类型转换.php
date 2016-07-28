<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/7/25
 * Time: 11:14
 * bool类型的转换
 * 以下的值会被转换为false
 * 1. 布尔值 FALSE 本身
 * 2. 整形值 0
 * 3.浮点型的值 0.0
 * 4. 空字符串
 * 5. 不包含任何元素的数组
 * 6. 不包含任何成员变量的对象(仅PHP4.0适用)
 * 7. 特许类型NULL（包括未赋值的变量）
 * 8. 空标记生成SimpleXml对象
 *
 * var_dump输出类型跟值
 *
 */
//
$flag1 = false;
var_dump($flag1);
$flag2 = (boolean)0;
var_dump($flag2);
$flag3 = (boolean)0.0;
var_dump($flag3);
$flag4 = (boolean)'';
var_dump($flag4);
$flag5 = (boolean)array();
var_dump($flag5);

class foo
{

}

$flag6 = (boolean)new foo();
var_dump($flag6);
$flag7 = (boolean)NULL;
var_dump($flag7);
$flag7;
var_dump($flag7);


