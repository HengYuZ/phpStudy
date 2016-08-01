<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/7/28
 * Time: 15:14
 * 遍历文件夹,利用递归实现
 * 以文件树的形式展示遍历的结果。
 * $ceng是表示文件相对于搜索路径的层数，有一个'|'表示一层。
 */

function showfile($filepath, $ceng)
{
    $handle = opendir($filepath);
    while (false !== ($file = readdir($handle))) {
        if ($file !== '.' && $file !== '..') {
            $str = $filepath.'/'.$file;
            //判断该文件是否是文件目录，如果是进入递归遍历
            if(is_dir($str))
            {
                echo "<pre>$ceng--|--$file</pre>";
                showfile($str,$ceng.'--');
            }else {
                //如果不是文件目录，则是文件直接输出
                echo "<pre>$ceng--|--$file</pre>";
            }
        }
    }
}
showfile('/mnt/hgfs/www/test/phpcode','|--');