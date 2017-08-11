<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>后台登录</title>
    <meta name="author" content="DeathGhost" />
    <link rel="stylesheet" type="text/css" href="jobs/css/style.css" />
    <style>
        body{height:100%;background:#16a085;overflow:hidden;}
        canvas{z-index:-1;position:absolute;}
    </style>
    <script src="jobs/js/jquery.js"></script>
    <script src="jobs/js/verificationNumbers.js"></script>
    <script src="jobs/js/Particleground.js"></script>
    <script>
        $(document).ready(function() {
            //粒子背景特效
            $('body').particleground({
                dotColor: '#5cbdaa',
                lineColor: '#5cbdaa'
            });
            //验证码
            createCode();
            //测试提交，对接程序删除即可
            $(".submit_btn").click(function(){
                location.href="index.html";
            });
        });
    </script>
</head>
<body>
<form action="?r=login/login_do" method="post">
    <dl class="admin_login">
        <dt>
            <strong>站点后台管理系统</strong>
            <em>Management System</em>
        </dt>
        <dd class="user_icon">
            <input type="text" placeholder="用户名" class="login_txtbx" name="username"/>
        </dd>
        <dd class="pwd_icon">
            <input type="password" placeholder="密码" class="login_txtbx" name="pwd"/>
        </dd>
        <dd>
            <input type="submit" value="立即登陆" class="submit_btn"/>
            <a href="?r=register/index">没有账号？点击注册</a>
        </dd>
        <dd>
            <p>© 2015-2016 DeathGhost 版权所有</p>
            <p>陕B2-20080224-1</p>
        </dd>
    </dl>
</form>
</body>
</html>
