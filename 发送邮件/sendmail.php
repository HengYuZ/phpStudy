<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
 * Date: 2016/7/29
 * Time: 15:37
 * 使用PHP发送邮件
 * 根据PHP官方文档，以及阅读下面的博客
 *   1.http://www.178linux.com/7049
 * 了解到了邮件发送的相关原理。
 * 1.如果是本地发送，那么需要调用一个客户端的软件。而在Linux中有sendmail
 *   这个程序可以帮忙发送邮件。
 *
 * 【关键】PHP官方文档中提示是在php.ini中配置好sendmail程序的路径，那么PHP的mail
 * 函数被调用时，就会去找sendmail进行发送邮件。如果不配置sendmail_path,它
 * 会尝试去/usr/sbin/sendmail或者/usr/lib/sendmail。当然，我可以直接
 * 配置好php.ini中sendmail_path的路径（如果configure没有找到sendmail，那就更加需要配置sendmail的路径）。
 *
 * 由于我的系统是centos，是使用sendmail，如果你的系统不是使用sendmail
 * 的话，可能你系统会使用其他程序比如qmail代替sendmail。
 *
 * 补充：第二种方式，是可以使用一个邮箱给另一个邮箱发邮件。比如可以用新浪邮箱给QQ邮箱发送邮件。
 *       这个留后补充实现，敬请关注!   :)
 */


$toUser = '18819451621@sina.cn';
$subject = '我是邮件主题，这个是测试';
$content = '您好，我是邮件内容，我是测试3。如果你收到了也不用给我回复';
$success = mail($toUser, $subject, $content);
if ($success) {
    echo "发送成功";
} else {
    echo "发送失败";
}