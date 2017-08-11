<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>后台管理系统</title>
    <meta name="author" content="DeathGhost" />
    <link rel="stylesheet" type="text/css" href="jobs/css/style.css" />
    <!--[if lt IE 9]>
    <script src="jobs/js/html5.js"></script>
    <![endif]-->
    <script src="jobs/js/jquery.js"></script>
    <script src="jobs/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script>
        (function($){
            $(window).load(function(){

                $("a[rel='load-content']").click(function(e){
                    e.preventDefault();
                    var url=$(this).attr("href");
                    $.get(url,function(data){
                        $(".content .mCSB_container").append(data); //load new content inside .mCSB_container
                        //scroll-to appended content
                        $(".content").mCustomScrollbar("scrollTo","h2:last");
                    });
                });

                $(".content").delegate("a[href='top']","click",function(e){
                    e.preventDefault();
                    $(".content").mCustomScrollbar("scrollTo",$(this).attr("href"));
                });

            });
        })(jQuery);
    </script>
</head>
<body>
<!--header-->
<header>
    <h1><img src="jobs/images/admin_logo.png"/></h1>
    <ul class="rt_nav">
        <li><a href="http://www.baidu.com" target="_blank" class="website_icon">站点首页</a></li>
        <li><a href="#" class="admin_icon">DeathGhost</a></li>
        <li><a href="#" class="set_icon">账号设置</a></li>
        <li><a href="login.php" class="quit_icon">安全退出</a></li>
    </ul>
</header>

<!--aside nav-->
<aside class="lt_aside_nav content mCustomScrollbar">
    <h2><a href="index.php">起始页</a></h2>
    <ul>
        <li>
            <dl>
                <dt>发表招聘职位</dt>
                <dd><a href="?r=index/fabiao" class="active">发表职位</a></dd>
                <dd><a href="?r=index/show">职位列表</a></dd>
            </dl>
        </li>
    </ul>
</aside>

<section class="rt_wrap content mCustomScrollbar">
    <div class="rt_content">
        <!--开始：以下内容则可删除，仅为素材引用参考-->
        <!--点击加载-->
        <script>
            $(document).ready(function(){
                $("#loading").click(function(){
                    $(".loading_area").fadeIn();
                    $(".loading_area").fadeOut(1500);
                });
            });
        </script>
        <section class="loading_area">
            <div class="loading_cont">
                <div class="loading_icon"><i></i><i></i><i></i><i></i><i></i></div>
                <div class="loading_txt"><mark>数据正在加载，请稍后！</mark></div>
            </div>
        </section>
        <!--结束加载-->
        <!--弹出框效果-->
        <script>
            $(document).ready(function(){
                //弹出文本性提示框
                $("#showPopTxt").click(function(){
                    $(".pop_bg").fadeIn();
                });
                //弹出：确认按钮
                $(".trueBtn").click(function(){
                    alert("你点击了确认！");//测试
                    $(".pop_bg").fadeOut();
                });
                //弹出：取消或关闭按钮
                $(".falseBtn").click(function(){
                    alert("你点击了取消/关闭！");//测试
                    $(".pop_bg").fadeOut();
                });
            });
        </script>
        <section class="pop_bg">
            <div class="pop_cont">
                <!--title-->
                <h3>弹出提示标题</h3>
                <!--content-->
                <div class="pop_cont_input">
                    <ul>
                        <li>
                            <span>标题</span>
                            <input type="text" placeholder="定义提示语..." class="textbox"/>
                        </li>
                        <li>
                            <span class="ttl">城市</span>
                            <select class="select">
                                <option>选择省份</option>
                            </select>
                            <select class="select">
                                <option>选择城市</option>
                            </select>
                            <select class="select">
                                <option>选择区/县</option>
                            </select>
                        </li>
                        <li>
                            <span class="ttl">地址</span>
                            <input type="text" placeholder="定义提示语..." class="textbox"/>
                        </li>
                        <li>
                            <span class="ttl">地址</span>
                            <textarea class="textarea" style="height:50px;width:80%;"></textarea>
                        </li>
                    </ul>
                </div>
                <!--以pop_cont_text分界-->
                <div class="pop_cont_text">
                    这里是文字性提示信息！
                </div>
                <!--bottom:operate->button-->
                <div class="btm_btn">
                    <input type="button" value="确认" class="input_btn trueBtn"/>
                    <input type="button" value="关闭" class="input_btn falseBtn"/>
                </div>
            </div>
        </section>
        <!--结束：弹出框效果-->
        <form action="?r=index/update" method="post">
            <section>
                <input type="hidden" name="id"  value="<?php echo $id; ?>"/>
                <h2><strong style="color:grey;">招聘职位添加</strong></h2>
                <ul class="ulColumn2">
                    <li>
                        <span class="item_name" style="width:120px;">职位名称：</span>
                        <input type="text" name="name" value="<?php echo $arr['name'] ?>" class="textbox textbox_295" />
                    </li>
                    <li>
                        <span class="item_name" style="width:120px;">职位类型：</span>
                        <input type="text" name="type" value="<?php echo $arr['type'] ?>" class="textbox textbox_295"/>
                    </li>
                    <li>
                        <span class="item_name" style="width:120px;">工作地址：</span>
                        <input type="text" name="address" value="<?php echo $arr['address'] ?>" class="textbox textbox_295"/>
                    </li>
                    <li>
                        <span class="item_name" style="width:120px;">薪资范围：</span>
                        <input type="text" name="monery" value="<?php echo $arr['monery'] ?>" class="textbox textbox_295" placeholder="请输入工作地址"/>
                    </li>
                    <li>
                        <span class="item_name" style="width:120px;">学历要求：</span>
                        <input type="text" name="xueli" value="<?php echo $arr['xueli'] ?>" class="textbox textbox_295" placeholder="请输入工作地址"/>
                    </li>
                    <li>
                        <span class="item_name" style="width:120px;">福利：</span>
                        <input type="text" name="fuli" value="<?php echo $arr['fuli'] ?>" class="textbox textbox_295" placeholder="请输入福利"/>
                    </li>
                    <li>
                        <span class="item_name" style="width:120px;">公司介绍：</span>
                        <textarea placeholder="公司介绍" name="content" class="textarea" style="width:300px;height:100px;"><?php echo $arr['content'] ?></textarea>
                    </li>
                    <li>
                        <span class="item_name" style="width:120px;"></span>
                        <input type="submit" value="修改" class="link_btn"/>
                    </li>
                </ul>
            </section>
        </form>