<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>我的留言本</title>
    <style type="text/css">

        body {
            font: 12px Verdana, Geneva, sans-serif;
        }

        h1, h2 {
            font-size: 20px;
            font-weight: normal;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            width: 800px;
        }

        h2 {
            margin-top: 100px;
        }

        .txt {
            width: 400px;
        }

        textarea {
            width: 400px;
            height: 100px;
        }

        dl dt {
            line-height: 30px;
        }

        dl dd {
            color: #666;
        }

    </style>
    <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript">
        function sendMsg() {
            var url = 'msgHandle.php';
            var username = $("#username").val();
            var content = $("#content").val();
            var data = {username, content};
            $.post(url, data, function (res) {
                var jsonObj = JSON.parse(res);
                var dl = $("<dl>");
                dl.appendTo($("#commentArea"));
                for (var i = 0; i < jsonObj.length; i++) {
                    if (i % 3 == 0)
                        var dd = $("<dd>" + jsonObj[i] + jsonObj[i + 1] + "</dd>");
                    else if (i % 3 == 2)
                        var dd = $("<dd>" + jsonObj[i] + "</dd>");
                    dd.appendTo(dl);
                }
                $("#commentArea").append("</dl>");
                window.location.reload();
            });
        }
    </script>
</head>

<body>
<script type="text/javascript">
    window.onload=function () {
        var url = 'msgHandle.php';
        var username = '';
        var content = '';
        var data = {username, content};
        $.post(url, data, function (res) {
            var jsonObj = JSON.parse(res);
            var dl = $("<dl>");
            dl.appendTo($("#commentArea"));
            for (var i = 0; i < jsonObj.length; i++) {
                if (i % 3 == 0)
                    var dd = $("<dd>" + jsonObj[i] + jsonObj[i + 1] + "</dd>");
                else if (i % 3 == 2)
                    var dd = $("<dd>" + jsonObj[i] + "</dd>");
                dd.appendTo(dl);
            }
            $("#commentArea").append("</dl>");
        });
    }
</script>
<h1>我的留言本</h1>
<div id="commentArea">

</div>

<h2>我要留言</h2>
<form>
    <table>
        <tbody>
        <tr>
            <th>昵称：</th>
            <td><input class="txt" type="text" id="username" name="username"></td>
        </tr>
        <tr>
            <th>内容：</th>
            <td>
                <textarea type="text" id="content"></textarea>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <button type="button" onclick="sendMsg()">提交</button>
            </td>
        </tr>
        </tbody>
    </table>
</form>

</body>
</html>