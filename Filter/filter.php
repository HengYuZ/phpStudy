<?php

/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/8/4
 * Time: 9:55
 * 过滤器
 * 这里实现了电话，邮箱，IP地址的验证，
 * 对一些低俗恶劣的词进行了简单的过滤。
 */
class Filter
{

    //用于储存过滤的值
    private $arr = array();

    //邮箱验证
    public function checkEmail($str)
    {
        if (filter_var($str, FILTER_VALIDATE_EMAIL))
            echo "the email: $str is valid" . '<br/>';
        else
            echo "the email: $str is invalid" . '<br/>';
    }

    //IP地址验证
    public function checkIP($str)
    {

        if (filter_var($str, FILTER_VALIDATE_IP))
            echo "the IP: $str is valid" . '<br/>';
        else
            echo "the IP: $str is invalid" . '<br/>';
    }

    //电话验证，此处是用正则表达式实现验证的
    public function checkPhoneNum($str)
    {
        $str = trim($str);
        $reg = "/^1[34578]\d{9}$/";
        if (preg_match($reg, $str))
            echo "phone num :$str is valid";
        else echo "phone num：$str is invalid";
    }

    //获取要过滤的词
    public function setFilterWord(array $arr){
        return $this->arr = $arr;
    }

    //自定义的过滤敏感低俗的字词
    public function filterDirtyWord($str){
        if($str == NULL)
            return 0;
        for($i = 0; $i<count($this->arr); $i++){
            $str = str_replace($this->arr[$i], '**', $str);
        }
        echo $str.'<br/>';
        return $str;
    }
}

//自定义要过滤的词
$arr = array(
    '人渣',
    '流氓',
    '白痴',
    '傻子'
);
//测试样例
$emailStr = '123@@1223';
$ipStr = '127.0.0.1';
$phoneNum = '11219551621';
$str = "你是个大人渣,死流氓，一个白痴,大傻子";

//实例化类
$filterWord = new Filter();

$filterWord->setFilterWord($arr);
$filterWord->filterDirtyWord($str);
$filterWord->checkEmail($emailStr);
$filterWord->checkIP($ipStr);
$filterWord->checkPhoneNum($phoneNum);
