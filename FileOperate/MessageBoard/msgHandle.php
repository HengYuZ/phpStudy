<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/8/30
 * Time: 14:11
 */
namespace Message;
class MessageBoard
{
    private $username;
    private $content;
    private $msgTimestamp;

    //初始化留言
    public function getContent($username, $content)
    {
        $this->username = htmlspecialchars($username);
        $this->content = htmlspecialchars($content);
        $this->msgTimestamp = date('Y-m-d H:i:s', time());
    }

    //把留言写入文件
    public function writeHandle()
    {
        $filePoint = fopen('msgContent.txt', 'a');
        fwrite($filePoint, $this->msgTimestamp . "\r\n");
        fwrite($filePoint, $this->username . "\r\n");
        fwrite($filePoint, $this->content . "\r\n");
        fclose($filePoint);
    }

    //把留言读出来
    public function ReadHandle()
    {
        $tmpArr = array();
        $filePoint = fopen('msgContent.txt', 'r');
        if ($filePoint) {
            while (($buffer = fgets($filePoint, 4096)) !== false) {
                $tmpArr[] = $buffer;
            }
        }
        fclose($filePoint);
        $jsonStr = json_encode($tmpArr);
        echo $jsonStr;
    }
}

date_default_timezone_set('UTC');
$messageBoardObj = new MessageBoard();
//判空处理
if (!empty($_POST["username"]) && !empty($_POST["content"])) {
    $messageBoardObj->getContent($_POST["username"], $_POST["content"]);
    $messageBoardObj->writeHandle();
}
$messageBoardObj->ReadHandle();