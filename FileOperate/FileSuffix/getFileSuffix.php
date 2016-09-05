<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/8/29
 * Time: 15:49
 */
namespace FileSuffix;

class File
{
    private $filename;

    //获取文件名
    public function setFileName($filename)
    {
        $this->filename = $filename;
    }

    //获取文件后缀名方法一
    public function getFileSuffix()
    {
        $position = strrpos($this->filename, ".");
        if ($position)
            $suffix = substr($this->filename, $position + 1);
        if ($suffix != "")
            return $suffix;
        return false;
    }

    //获取文件后缀名方法二
    public function getFileType()
    {
        $suffix = pathinfo($this->filename);
        $suffix = strtolower($suffix["extension"]);
        if (is_string($suffix))
            return $suffix;
        return false;
    }

    //获取文件后缀名方法三
    public function getFileExtensions()
    {
        $suffix = explode('.', $this->filename);
        $count = count($suffix) - 1;
        if (is_string($suffix[$count]))
            return $suffix[$count];
        return false;
    }
}

$file = new File();
$file->setFileName('hello.jpg');
echo $file->getFileSuffix() . "<br/>";
echo $file->getFileType() . "<br/>";
echo $file->getFileExtensions() . "<br/>";
