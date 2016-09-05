<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/8/29
 * Time: 17:42
 */
namespace File;

class uploadFile
{
    //存储文件上传类型
    private $allowType = array();
    //上传文件的保存路径
    private $path;
    //上传文件大小
    private $fileSize;
    //保存的文件名
    public $saveFileName;

    //设置上传规则
    public function setUploadRules($allowType, $path, $fileSize)
    {
        foreach ($allowType as $type)
            $this->allowType[] = $type;
        $this->path = $path;
        $this->fileSize = $fileSize;
    }

    //上传错误信息反馈方法
    public function uploadErrorMsg($errorCode)
    {
        echo "上传错误,";
        switch ($errorCode) {
            case 1:
                echo '上传文件大小超出了PHP设置文件的约定值';
                break;
            case 2:
                echo '上传文件大小超出了表单中的约定值';
                break;
            case 3:
                echo '文件只有部分上传了';
                break;
            case 4:
                echo '上传文件大小超出了表单中的约定值';
                break;
            default:
                echo '未知错误';
        }
    }

    //获取文件的后缀名
    public function getSuffix($file)
    {
        $fileInfoArray = pathinfo($file);
        $suffix = strtolower($fileInfoArray["extension"]);
        if (is_string($suffix))
            return $suffix;
        else return false;
    }

    //上传处理操作
    public function uploadHandle($file, $index)
    {
        if ($file['name'][$index] == null) {
            return false;
        } else {
            $errorCode = $file['error'][$index];
            if ($errorCode > 0) {
                $this->uploadErrorMsg($errorCode);
                return false;
            } elseif ($errorCode == 0) {
                $suffix = $this->getSuffix($file['name'][$index]);
                if (!in_array($suffix, $this->allowType)) {
                    echo '后缀为' . "$suffix" . '是不允许上传的文件类型';
                    return false;
                }
                if ($file['size'][$index] > $this->fileSize) {
                    echo '文件大小超过' . "$this->fileSize" . '了';
                    return false;
                }
                //防止上传文件被同名覆盖掉
                $this->saveFileName = date("Y") . date("m") . date("d") . date("H") . date("i") . date("s") . rand(100, 999) . "." . $suffix;
                //判断是否是上传文件
                if (is_uploaded_file($file['tmp_name'][$index])) {
                    if (!move_uploaded_file($file['tmp_name'][$index], $this->path . '/' . $this->saveFileName))
                        echo '问题：' . $file['name'][$index] . '不能移动到指定上传目录';
                } else
                    return false;
                return true;
            }
            return false;
        }
    }

    //上传结果
    public function uploadResult()
    {
        //存储文件上传的情况
        $uploadStatus = array();

        foreach ($_FILES['file']['name'] as $key => $file) {
            $result = $this->uploadHandle($_FILES['file'], $key);
            if ($_FILES['file']['name'][$key] == NULL)
                $this->saveFileName = '';
            $uploadStatus[] = array(
                'filename' => $_FILES['file']['name'][$key],
                'saveFileName' => $this->saveFileName,
                'result' => $result
            );
        }
        $this->uploadSuccessMsg($uploadStatus);
    }

    //返回上传状态信息
    public function uploadSuccessMsg($uploadStatus)
    {
        $count = 0;
        foreach ($uploadStatus as $v) {
            if ($v['filename'] != NULL)
                $count++;
        }
        echo '上传了' . $count . '个文件<br/>';
        foreach ($uploadStatus as $key => $status) {
            if ($status['filename'] && $status['result'])
                echo $status['filename'] . ' 文件保存路径: ' . $this->path . '，保存文件名为:' . $status['saveFileName'] . '   上传状态：成功<br/>';
            elseif ($status['filename'] != NULL && $status['result'] == false)
                echo $status['filename'] . '上传状态：失败<br/>';
        }
    }
}

date_default_timezone_set('UTC');
$uploadFileObj = new uploadFile();

//允许上传的文件格式
$arr = array("gif", "png", "jpg", "txt");

//上传文件设定保存在当前的目录下的upload文件夹下，上传文件最大为2M
$uploadFileObj->setUploadRules($arr, './upload', 2000000);

$uploadFileObj->uploadResult();

