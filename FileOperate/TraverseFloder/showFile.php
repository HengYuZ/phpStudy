<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/8/29
 * Time: 16:34
 */
namespace FIle;

class TraverseFolder
{
    /**
     * @param $filePath   文件路径名
     * @param $level    文件所在的层
     */
    public function showFile($filePath, $level)
    {
        $handle = opendir($filePath);
        while (false !== ($file = readdir($handle))) {
            if ($file !== '.' && $file !== '..') {
                $str = $filePath . '/' . $file;
                //判断该文件是否是文件目录，如果是进入递归遍历
                if (is_dir($str)) {
                    echo "<pre>$level--|--$file</pre>";
                    $this->showFile($str, $level . '--');
                } else {
                    //如果不是文件目录，则是文件直接输出
                    echo "<pre>$level--|--$file</pre>";
                }
            }
        }
    }
}

$traverseFolder = new TraverseFolder();
$traverseFolder->showFile('/mnt/hgfs/www/test/FileOperate', '|--');