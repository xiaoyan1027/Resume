<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link type="text/css" rel="stylesheet" href="jobs/css/frontmodule.css" />
    <link type="text/css" rel="stylesheet" href="jobs/css/5_themes_default_style.css?v=0.0.0.9" front="css" />
    <link type="text/css" rel="stylesheet" href="jobs/css/5_themes_default_flexslider.css?v=0.0.0.9" front="css" />
    <link type="text/css" rel="stylesheet" href="jobs/css/5_themes_default_jqueryuicore.css?v=0.0.0.9" front="css" />
    <link type="text/css" rel="stylesheet" href="jobs/css/5_themes_default_jqueryuiselectmenu.css?v=0.0.0.9" front="css" />
    <link type="text/css" rel="stylesheet" href="jobs/css/5_themes_default_jqueryuitheme.css?v=0.0.0.9" front="css" />
    <script type="text/javascript">
        window.PERF_START=new Date;
        function _splash(page, uid, tid, pid){
            uid =  uid || 0;  // 这里是用户ID
            tid =  tid || 0;   // 这里是租户ID
            pid =  pid || 'unknown';  // 这里是项目标识
            var now = new Date;
            var start = window.PERF_START || now;
            var diff = now - start;
            var rand = Math.round(Math.random()*1000000);
            var url= document.location.protocol+'//opsapi.beisen.com/opsapi/AddLog?appName='+pid+'&label=%5Bsplash%5D%20'+page+'&uid='+uid+'&tid='+tid+'&time='+diff+'&type=1&sid='+rand+'&step=0';
            var img = new Image;
            img.src = url;
        }
    </script>
    <script type="text/javascript" src="jobs/js/5_themes_default_jquery191.js?v=0.0.0.9"></script>
    <script type="text/javascript" src="jobs/js/5_themes_default_jqueryflexslidermin.js?v=0.0.0.9"></script>
    <script type="text/javascript" src="jobs/js/5_themes_default_jqueryuicore1.js?v=0.0.0.9"></script>
    <script type="text/javascript" src="jobs/js/5_themes_default_jqueryuiposition.js?v=0.0.0.9"></script>
    <script type="text/javascript" src="jobs/js/5_themes_default_jqueryuiwidget.js?v=0.0.0.9"></script>
    <script type="text/javascript" src="jobs/js/5_themes_default_jqueryuiselectmenu1.js?v=0.0.0.9"></script>
    <script type="text/javascript" src="jobs/js/5_themes_default_demo.js?v=0.0.0.9"></script>
    <script type="text/javascript">var $bs_vars={'st':'http://stnew.beisen.com/','version':'2015.09.17.001','constSite':'http://const.tms.beisen.com'};function vstr(str) {
            if (typeof ($bs_vars) == 'undefine')
                return str;
            var result = str;
            for (var v in $bs_vars) {
                var regex = new RegExp('\\$\\{' + v.toString() + '\\}|\\{' + v.toString() + '\\}', 'igm');
                result = result.replace(regex, $bs_vars[v]);
            }
            return result;
        };</script>
    <!--引用静态文件:requirejs-->
    <script type="text/javascript" src="jobs/js/require.js"></script>
    <title>首页</title>
</head>
<body>
<div class="header">
    <div class="headercontain">
        <div class="logo">
            <img src="jobs/images/104003_medias_20141215_20141215logo.jpg?v=635542641034400000" />
        </div>
        <!--module:login begin-->
        <div class="bs-module">
            <div class="login-link ">
                <div class="login-hearder">
                    <?php
                          if(!Yii::$app->user->isGuest){
                    ?>
                    <ul class="header-login" >
                        <li class="welcome"><span><span class="userName" ></span>，欢迎您！</span></li>
                        <li class="PortalIndex"><a href="member_apply.html"><span>个人中心</span></a></li>
                        <li class="LogoutUrl"><a href="/User/Account/LogOut"><span>退出</span></a></li>
                    </ul>
                    <?php }else{ ?>
                    <ul class="header-unLogin">
                        <li><a class="loginlink" href="?r=login/login"> <span>登录</span> </a></li>
                        <li><a class="reglink" href="?r=site/signup"><span> 注册</span></a></li>
                    </ul>
                    <?php } ?>
                </div>
                <script type="text/javascript">
                    $.post("ajax.php", {type:"1"}, function(data) {
                        var loginView = $(".login-hearder .header-login");
                        var unLoginView = $(".login-hearder .header-unLogin");
                        if (data.name != '') {
                            loginView.find('.userName').text(data.name);
                            loginView.show()
                        }
                        else {
                            unLoginView.show()
                        }
                    }, "json")
                </script>
            </div>
        </div>
        <!--module:login end-->
        <!--module:internalrecommend begin-->
        <div class="bs-module">
            <div class="internalrecommend-default ">
                <div class="internaldiv">
                    <a class="internal" href="http://neitui.zhiye.com/51talk" target="_blank">内部推荐专区</a>
                </div>
            </div>
        </div>
        <!--module:internalrecommend end-->
    </div>
</div>
<div class="nav">
    <!--module:menu begin-->
    <div class="bs-module">
        <div class="menu-simple ">
            <ul id="portalmenu">
                <li><a target="_self" href="?r=index/index" class="current">首页</a> </li>
                <li><a target="_self" href="?r=jobs/index" class="">全部职位</a> </li>
                <li><a target="_self" href="?r=contact/index" class="">社会招聘</a> </li>
                <li><a target="_self" href="?r=contact/index" class="">校园招聘</a> </li>
                <li><a target="_self" href="?r=contact/index" class="">实习生招聘</a> </li>
                <li><a target="_self" href="?r=about/index" class="">公司介绍</a> </li>
                <li><a target="_self" href="?r=contact/index" class="">联系我们</a> </li>
            </ul>
        </div>
    </div>
    <!--module:menu end-->
</div>
<?= $content ?>
<div class="footer">
    <span> &copy;2015&nbsp;&nbsp;51talk&nbsp;&nbsp;京ICP备05051632号 京公网安备110108002767号 &nbsp;Powered by&nbsp;<a href="http://www.beisen.com" class="footerlogo" target="_blank"></a> </span>
</div>
<script type="text/javascript">
    require([
        vstr('${st}/${version}/cmsportal/skin/js/baiduStatistics.js')

    ]);
</script>
<script type="text/javascript">
    $(function(){
        _splash('zhiye_home',0,104003,'new.zhiye.com');
    });
</script>
</body>
</html>