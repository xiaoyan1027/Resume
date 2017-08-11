<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
?>
<!DOCTYPE html>
<head>
    <script id="allmobilize" charset="utf-8" src="./style/js/allmobilize.min.js"></script>
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="alternate" media="handheld"  />

    <meta charset = "<?= Yii::$app->charset ?>">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta property="qc:admins" content="23635710066417756375" />
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="baidu-site-verification" content="QIQ6KC1oZ6" />
    <script type="text/javascript">
        var ctx = "h";
        console.log(1);
    </script>

    <meta name = "viewport" content = "width = device-width, initial-scale = 1">
    <link rel="Shortcut Icon" href="h/images/favicon.ico">

    <title>拉勾网-最专业的互联网招聘平台</title>
    <link rel="stylesheet" type="text/css" href="./style/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="./style/css/external.min.css"/>
    <link rel="stylesheet" type="text/css" href="./style/css/popup.css"/>

    <script src="style/js/jquery.1.10.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="style/js/jquery.lib.min.js"></script>
    <script src="style/js/ajaxfileupload.js" type="text/javascript"></script>
    <script type="text/javascript" src="style/js/additional-methods.js"></script>
    <!--[if lte IE 8]>
    <script type="text/javascript" src="style/js/excanvas.js"></script>
    <![endif]-->
    <script type="text/javascript">
        var youdao_conv_id = 271546;
    </script>
    <script type="text/javascript" src="style/js/conv.js"></script>
</head>

<body>
<div id="body">
    <div id="header">
        <div class="wrapper">
            <a href="index.html" class="logo">
                <img src="./style/images/logo.png" width="229" height="43" alt="拉勾招聘-专注互联网招聘" />
            </a>
            <ul class="reset" id="navheader">
                <li class="current"><a href="?r=welcome/index">首页</a></li>
                <li ><a href="?r=companylist/index" >公司</a></li>
                <li ><a href="#" target="_blank">论坛</a></li>
                <li ><a href="?r=resume/index" rel="nofollow">我的简历</a></li>
                <li ><a href="create.html" rel="nofollow">发布职位</a></li>
            </ul>
            <ul class="loginTop">
                <li><a href="?r=login/index" rel="nofollow">登录</a></li>
                <li>|</li>
                <li><a href="?r=register/index" rel="nofollow">注册</a></li>
            </ul>
        </div>
    </div>
    <!-- end #header -->

    <div class = "wrapp">
        <div class = "containerr">
            <?= $content ?>
        </div>
    </div>



    <div id="footer">
        <div class="wrapper">
            <a href="h/about.html" target="_blank" rel="nofollow">联系我们</a>
            <a href="h/af/zhaopin.html" target="_blank">互联网公司导航</a>
            <a href="http://e.weibo.com/lagou720

" target="_blank" rel="nofollow">拉勾微博</a>
            <a class="footer_qr" href="javascript:void(0)" rel="nofollow">拉勾微信<i></i></a>
            <div class="copyright">&copy;2013-2014 Lagou <a target="_blank" href="http://www.miitbeian.gov.cn/state/outPortal/loginPortal.action

">京ICP备14023790号-2</a></div>
        </div>
    </div>
    <script type="text/javascript" src="./style/js/core.min.js"></script>
    <script type="text/javascript" src="./style/js/popup.min.js"></script>
</body>

</html>