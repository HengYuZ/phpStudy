<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/8/29
 * Time: 16:58
 */
namespace File;
class deleteFiles
{
    //遍历删除文件
    public function delete($filePath)
    {
        $handle = opendir($filePath);
        while (false !== ($file = readdir($handle))) {
            if ($file !== '.' && $file !== '..') {
                $str = $filePath . '/' . $file;
                //判断该文件是否是文件目录，如果是进入递归遍历
                if (is_dir($str)) {
                    $this->delete($str);
                } else {
                    //如果不是文件目录，则是文件直接输出
                    unlink($str);
                }
            }
        }
        closedir($handle);
        if (rmdir($filePath)) {
            return true;
        } else {
            return false;
        }
    }
}

$deleteFile = new deleteFiles();
$deleteFile->delete('/mnt/hgfs/www/test/FileOperate/DeleteFolder/test3');