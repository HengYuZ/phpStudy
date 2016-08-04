<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/8/3
 * Time: 15:13
 * 读取大文件,
 * 1.读取100MB的文本文件是没问题，但是需要耗费几秒
 * 这个跟机器配置和我读取时没有做其他处理有关。
 *
 * 2.当我让程序读取一个1.44GB的文件时，出现了以下问题：
 * Fatal error: Maximum execution time of 30 seconds exceeded in
 * 百度后发现这个是php程序执行超时，程序本身没错，可以在php.ini配置文件进行修改运行时间。但是那只是治标不治本。读取1.44GB的文本文件，读取时没有进行更多的处理，我用得虚拟机配置可能比较低。所以发生了个这个问题，更关键的，我觉是读取文件时没有相关的算法或者其他的处理。
 */

function readLargeFile($filename){
    $handle = fopen($filename, 'r');
    if(!$handle){
        echo 'failed to open the file';
    }
    while(false!==($char=fgetc($handle))){
        yield $char;
    }

}

//要读取的文件名
$filename = './largefile.txt';
foreach(readLargeFile($filename) as $ch){
    echo $ch;
}