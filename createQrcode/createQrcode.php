<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/8/1
 * Time: 13:30
 */

//调用phpqrcode类库文件
include "phpqrcode/phpqrcode.php";

//二维码的隐藏值
$value = 'www.baidu.com';

//纠正级别
$level = 'H';

//二维码图片大小
$matrixPointSize = 6;

//调用png函数生成二维码
QRcode::png($value, false, $level, $matrixPointSize);