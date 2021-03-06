<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>职位申请 - 预览</title>
    <script type="text/javascript">
        try {
            top.location.hostname;
            if (top.location.hostname != window.location.hostname) {
                top.location.href = window.location.href;
            }
        }
        catch (e) {
            top.location.href = window.location.href;
        }
    </script>
    <!--通用样式Css和脚本-->
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
    <script type="text/javascript" src="js/require.js"></script>
    <!--引用静态文件:skin_default-->
    <link href="jobs/css/common.css" rel="stylesheet" type="text/css" />
    <link href="jobs/css/templateform.css" rel="stylesheet" type="text/css" />
    <link href="jobs/css/controls.css" rel="stylesheet" type="text/css" />
    <link href="jobs/css/default.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="jobs/js/base_new.js"></script>
    <script type="text/javascript" src="jobs/js/widgetnew.js?v=3"></script>
    <script type="text/javascript" src="jobs/js/common.js"></script>
    <script type="text/javascript" src="jobs/js/bsdialog.js"></script>
    <script type="text/javascript" src="jobs/js/common.js"></script>
    <script type="text/javascript" src="jobs/js/controls.js"></script>
    <script type="text/javascript" src="jobs/js/underscore.js"></script>
    <script type="text/javascript" src="jobs/js/school-select-v2.js?v=6"></script>
    <link href="jobs/css/school-select-v2.css" rel="stylesheet" type="text/css" />
    <!--引用静态文件:skin_new_css-->
    <link href="jobs/css/main.css" rel="stylesheet" type="text/css" />
    <!--引用静态文件:new_dialog_js-->
    <script type="text/javascript" src="jobs/js/dialog_js.js"></script>
    <!--产品头部CSS和脚本-->
    <script src="jobs/js/WdatePicker.js"></script>
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
    <!--引用静态文件:front_css-->
    <link href="css/front.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
        .checkbox_list {float: left;width: 450px;}
        .form_container ul li span.start_date {width: 80px;}
        .form_container ul li span.end_date {width: 70px;}
        .dl_logo img {
            width: auto!important;
            height: 40px!important;
            margin: 16px 0 0 30px!important;
        }
    </style>
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
    <script type="text/javascript" id="user-info-header">




        $(document).ready(function () {
            var isApplyDetail = "False".toLowerCase() == 'true' ? true : false;
            //先获取用户的基本信息，这里的ajax是同步等待
            if (!isApplyDetail) {
                var userInfo = window.userInfo;
                var detailView = $(".dl_rightit .isApplyDetail");
                var loginView = $(".dl_rightit .isLogin");
                var unLoginView = $(".dl_rightit .unLogin");
                detailView.show();
                //头部对外公开的口，可以修改用户名
                window.loginHeaderView = {
                    userNameText: function (text) {
                        var shortText = text && text.length > 20 ? text.substring(0, 20) : text;
                        loginView.find('.userShortName').text(shortText);
                        loginView.find('#topUserEmail').attr('title', text);
                    }
                };
                if (userInfo.isLogin) {
                    loginView.show();
                    loginView.find('.userShortName').text(userInfo.shortName);
                    loginView.find('#topUserEmail').attr('title', userInfo.name);
                }
                else {
                    unLoginView.show();
                }
            }
        })

        var UserPrompt = function (options) {
            this.paramMap = {
                targetSelector: 'targetSelector'
                , promptText: 'promptText'
            }
            this.floater = {
                tag: options[this.paramMap.targetSelector]
                , position: {}
                , size: {}
            };
            this.promptText = '您尚未设置密码，请点这里修改吧！';//options[this.paramMap.promptText] || '';
            this.ui = {
                close: ".user-prompt-closeBtn"
            };
            this.initialize();
        };
        UserPrompt.prototype = {
            initialize: function () {
                var self = this;
                if ($(self.floater.tag).length < 1) return;

                self.getFloater();
                self.makeView();
                self.attachCss()
                self.aliveUi();
                self.bindEvents();
            }
            , render: function () {
                var self = this;
                self.$el.appendTo($('body'));
            }
            , show: function () {
                var self = this;
                if ($(self.floater.tag).length < 1) return;
                //控制所有子页面的show，如果用户第一次登陆才可以show
                //这里没有在子页面去判断是否show是因为单价太高，一共有3个子页面，不好维护
                if (window.userInfo.firstLogin) self.render();
            }
            , hide: function () {
                var self = this;
                $el.remove();
            }
            , getFloater: function () {
                var self = this;
                self.floater.tag = $(self.floater.tag) || $('body');
                self.floater.position = self.floater.tag.position();
                self.floater.size = {
                    'height': self.floater.tag.height()
                    , 'width': self.floater.tag.width()
                }
            }
            , makeView: function () {
                var self = this;
                self.$el = $("<div class='user-prompt-user-firstIn'>" +
                    "<div class='user-prompt-action-container'>" +
                    "<span class='user-prompt-closeBtn' title='close'></span>" +
                    "</div>" +
                    "<div class='user-prompt-content'>" + self.promptText + "</div>" +
                    "</div>");
            }
            , attachCss: function () {
                var self = this;
                //这里的0.9和4是写死的数，为了调整位置
                self.$el.css({
                    'top': (self.floater.position.top + self.floater.size.height) + 'px' // + 15
                    , 'left': (self.floater.position.left - self.floater.size.width / 4) + 'px'//+ self.floater.size.width / 2
                });
            }
            , aliveUi: function () {
                var self = this;
                var aliveUi = {};
                $.each(self.ui, function (key, value) {
                    aliveUi[key] = self.$el.find(value) || null;
                });
                self.ui = aliveUi;
            }
            , bindEvents: function () {
                var self = this;
                self.ui.close.bind('click', function () {
                    self.$el.remove()
                })
            }
        };


    </script>
</head>
<body>
<div class="bs_deliver">
    <div class="dl_header_border">
        <div class="dl_header clearfix">
            <div class="dl_logo">
                <img id="logoImg" class="header-logo-img" src="images/104003_medias_20141215_20141215logo.jpg?v=635542641034400000" style="width: 300px;height:80px;display: none;" />
            </div>
            <div class="dl_rightit">
                <div class="isApplyDetail">
                    <?php
                    if(!Yii::$app->user->isGuest) {
                    ?>
                    <div class="isLogin" >
                        <span id="topUserEmail" class="pad3" title=""><span class="userShortName"></span>，欢迎您！</span>
                        <span class="pad3"><a href="index.html">招聘首页</a></span>
                        <em class="dl_header_line dl_padtb05">|</em>
                        <span class="isUserCenter"> <span class="pad3"><a href="member_apply.html">个人中心</a></span> <em class="dl_header_line dl_padtb05">|</em> </span>
                        <span class="pad3"><a href="/Portal/Account/Logout">退出</a></span>
                    </div>
                        <?php
                    }else{
                    ?>
                    <div class="unLogin">
                        <span class="pad3"><a href="index.html">招聘首页</a></span>
                        <em class="dl_header_line dl_padtb05">|</em>
                        <span class="pad3"><a href="/Portal/Account/Login">登录</a></span>
                        <em class="dl_header_line dl_padtb05">|</em>
                        <span class="pad3"><a href="/Portal/Account/Register">注册</a></span>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="dl_content dl_gray_bg">
        <!---->
        <!--申请职位 s-->
        <!--申请职位 e-->
        <!--我的简历 s-->
        <!--简历内容 s-->
        <style type="text/css">
            .code
            {
                clear: both;
                padding-left: 80px;
            }

            .code .code_add
            {
                text-decoration: none;
                margin-left: 0;
            }

            .code a.code_add:hover
            {
                text-decoration: underline;
            }

            .form_container .form_part ul.code_list
            {
                padding-left: 0;
            }

            .form_container li a.code_del
            {
                text-decoration: none;
                padding-left: 40px;
            }

            .form_container li a.code_del:hover
            {
                text-decoration: underline;
            }

            .code_type
            {
                width: 180px;
            }

            .code_dialog
            {
                padding: 30px 40px;
            }

            div.code_dialog_btn
            {
                margin-top: 0;
                height: 32px;
            }

            span.code_error_pop
            {
                margin-top: 5px;
                width: auto;
                height: 20px;
                visibility: hidden;
            }

            .code_dialog #btnClse
            {
                margin-left: 50px;
            }

            .code_dialog .dl_dialog_btn
            {
                padding-top: 20px;
                margin-top: 10px;
            }

            .code_type_outer
            {
                text-align: center;
            }

            .code_dialog a.dl_btn_grey1 span
            {
                padding: 0 16px 0 0;
            }

            .code_dialog a.dl_btn_grey1
            {
                padding-left: 16px;
            }

            .code_title
            {
                margin-bottom: 10px;
                color: #333;
            }
        </style>
        <div class="dl_liucheng dl_top_table">
            <h3 class="applypos"> <span>申请职位：</span><span class="dl_positionname"><strong style="font-weight: bold;">PTD 助教总监</strong> </span> </h3>
            <table align="center" class="dl_top_ico">
                <tbody>
                <tr>
                    <td align="center">
                        <ul class="dl_picliu">
                            <li class="bluebasic" onclick="BSGlobal.navigate(0);" style="cursor: pointer;"><a href="javascript:void(0);" onclick="BSGlobal.navigate(0);"><span class="dl_grey2">1基本信息</span></a></li>
                            <li class="bluearrow"></li>
                            <li class="blueprofile" onclick="BSGlobal.navigate(1);" style="cursor: pointer;"><a href="javascript:void(0);" onclick="BSGlobal.navigate(1);"><span class="dl_grey2">2个人履历</span></a></li>
                            <li class="bluearrow"></li>
                            <li class="submit" onclick="BSGlobal.navigate(4);" style="cursor: pointer;"><a href="javascript:void(0);" onclick="BSGlobal.navigate(4);"><span class="dl_grey3">3预览/提交</span></a></li>
                        </ul> </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div>
            <style type="text/css">
                *html .rsmcnt_rlrw ul li pre
                {
                    width: 250px;
                    overflow: hidden;
                    word-wrap: normal;
                    float: none;
                    margin-left: 100px;
                }
                li a span.dl_grey3{ font-size: 14px;}

                .s_info
                {
                    padding-top: 22px;
                }
            </style>
            <div class="dl_bacwrap">
                <div class="mainwrap">
                    <h3 class="dl_bigtit"> <span class="dl_postit">预览提交</span> <span class="dl_padl10"> 您的简历已经符合投递要求，请确认是否投递 </span> </h3>
                    <div class="litwrap s_info">
                        <div class="dl_educationwrap">
                            <div class="rsm_wrap clearfix">
                                <style type="text/css">
                                    /*left*/
                                    .clearfix{zoom:1}
                                    .clearfix::after {
                                        display: block;clear: both;content:'\20'
                                    }
                                    .rsminfo_lrw {
                                        position: relative;
                                        padding-top: 8px;
                                        color: #666666;
                                    }

                                    .rsminfo_lrw label {
                                        float: left;
                                        display: inline-block;
                                        width: 100px;
                                        padding-right: 10px;
                                        text-align: right;
                                        line-height:24px;
                                    }

                                    .rsminfotlt_rlrw {
                                        font-size: 14px;
                                        font-weight: bold;
                                        display: inline-block;
                                        border-bottom: 1px solid #3787bd;
                                        height: 36px;
                                        line-height: 36px;

                                    }

                                    .rsminfocnt_rlrw {
                                        border-top: 1px solid #d4dae2;
                                    }

                                    .rsminfocnt_rlrw ul.rsmtop{
                                        padding:10px;
                                    }

                                    .rsminfocnt_rlrw ul li {
                                        overflow: hidden;
                                        float: none;
                                    }

                                    .baselft_rrlrw {
                                        float: left;
                                    }

                                    .baselft_rrlrw ul li span {
                                        width: 135px;
                                        display: inline-block;
                                        float: left;
                                        overflow: hidden;
                                        white-space: normal;
                                        word-wrap: break-word;
                                    }
                                    .baselft_rrlrw ul li pre {
                                        width: 390px;
                                        float: left;
                                        /*white-space: normal;*/
                                        word-wrap: break-word;
                                        line-height: 25px;

                                    }
                                    .rsminfocnt_rlrw .rsmcnt_rlrw pre {
                                        white-space: pre-wrap;
                                    }

                                    .infophoto_rrlrw {
                                        width: 120px;
                                        height: 140px;
                                        float: right;
                                    }

                                    .infophoto {
                                        float: right;
                                    }
                                    .infor_wrap{ width: 500px;display:block}
                                    .infor_wrap_tit{ width: 500px;display:block}
                                    .rsmcnt_rlrw ul li pre {
                                        float: left;
                                        width: 460px;
                                        line-height: 25px;
                                        /*white-space: normal;*/
                                        word-wrap: break-word;
                                    }

                                    .rsmcnt_rlrw {
                                        padding-left: 20px;
                                        padding-right: 20px;
                                        padding-top: 10px;
                                    }

                                    .infotop_rlrw span {
                                        font-weight: bold;
                                        padding-right: 10px;
                                        width: 180px;
                                        display: inline-block;
                                        white-space: normal;
                                        word-wrap: break-word;
                                        vertical-align: top;
                                    }
                                    .infotop_rlrw span.datespan {
                                        width: 140px;

                                    }

                                    .infotop_rlrw span.deptspan {
                                        width: 110px;
                                    }

                                    .infotop_rlrw span.lastspan {
                                        width: 110px;
                                    }

                                    .info_tit span {
                                        width: 145px;display: block;float: left;padding-right: 5px;
                                    }

                                    .rsminfo_family .rsmcnt_rlrw{
                                        float: left;
                                        display: inline;
                                    }

                                    .rsminfo_family .rsmcnt_rlrw ul li pre{
                                        width: 200px;
                                    }
                                    .bodastop {
                                        border-top: 1px dashed #ccc;
                                        margin-top: 10px;
                                        padding-top: 15px;
                                    }

                                    .padtop10 {
                                        padding-top: 10px;
                                    }

                                    .padbttom10 {
                                        padding-bottom: 10px;
                                    }

                                    .floatleft {
                                        float: left;
                                    }

                                    .floatright {
                                        float: right;
                                    }

                                    .color9a {
                                        color: #9a9a9a;
                                    }

                                    /*rigth*/
                                    .rgtrsmct_rw {
                                        float: left;
                                        width: 300px;
                                    }
                                    .rsminfo_family ul li{
                                        width: 350px;
                                        float: left;
                                        display: inline;
                                    }
                                    .clearfix1{zoom:1}
                                    .profilewidth{width:530px;}
                                    .clearfix1:after{display:block;clear:both;content:'\20'}
                                </style>
                                <style type="text/css" media="print">
                                    body{color: #000; font-family: "\5B8B\4F53", "\5FAE\8F6F\96C5\9ED1", "\9ED1\4F53",  Arial ;font-size: 16px;line-height: 1.65;}
                                    .sexagedegree_indidt{line-height:20px;}
                                    .rsminfotlt_rlrw {
                                        font-size: 18px;
                                    }

                                    .rsmcnt_rlrw{
                                        padding-left: 10px;
                                        padding-right: 10px;
                                    }
                                    /*.baselft_rrlrw {*/
                                    /*width: 600px;*/
                                    /*}*/
                                    .rsminfo_lrw label {
                                        width: 120px;

                                    }
                                    .baselft_rrlrw ul li span{
                                        width: 150px;
                                    }

                                    .infotop_rlrw span.datespan{
                                        width: 200px;
                                    }
                                    .info_tit span{
                                        width: 140px;
                                    }

                                    .info_tit span.edulevel{
                                        width: 205px;
                                    }

                                    .info_tit span.datespan{
                                        width: 205px;;
                                    }

                                    .rsminfo_family .rsmcnt_rlrw{
                                        float: left;
                                        display: inline;
                                    }

                                    .rsminfo_family ul li{
                                        width: 350px;
                                        float: left;
                                        display: inline;
                                    }

                                    .rsminfo_family .rsmcnt_rlrw ul li pre{
                                        width: 200px;
                                    }
                                    /*.rsminfo_lrw label{*/
                                    /*width: 180px;*/
                                    /*}*/
                                    .profilewidth{width:600px;}
                                </style>
                                <div id="resumeBody" class="lftrsmct_rw ">
                                </div>
                                <script type="text/template" id="personinfo">
                                    <%
                                    var items=Items[0].Items;
                                    var dict={}; var c1= [];var c2= [];
                                    var except = "IDPhoto";
                                    for(var i=0;i<items.length;i++){
                                    dict[items[i].Name]=items[i];
                                    if(IsExceptField(except,items[i].Name))
                                    continue;

                                    if(items[i].ControlType == "2")
                                    c1.push(items[i]);
                                    else
                                    c2.push(items[i]);

                                    // if(IsDoubleColumn(items[i])){
                                    //     c2.push(items[i]);
                                    //  }
                                    //  else{
                                    //      c1.push(items[i]);
                                    //  }
                                    }
                                    %>
                                    <!--个人信息-->
                                    <div class="rsminfo_lrw" id="CVItemlist_1">
                <span class="rsminfotlt_rlrw"><%=Label%>
                </span>
                                        <div class="rsminfocnt_rlrw clearfix">
                                            <div class="baselft_rrlrw padtop10 profilewidth">
                                                <ul>
                                                    <%
                                                    for(var i=0;i<c2.length;i=i+2){
                                                    if(i<c2.length){
                                                    var mObj = c2[i];
                                                    var mObj2 = ((i+1)<c2.length) ? c2[i+1] : null;
                                                    %>
                                                    <li class="clearfix1">
                                                        <label><%=mObj.Label%>：</label>
                                                        <span style="line-height:24px;"><%=mObj.Value%></span>
                                                        <%if(mObj2){%><label><%= mObj2 ? mObj2.Label : ""%>：</label>
                                                        <span style="line-height:24px;"><%= mObj2 ? mObj2.Value : ""%></span><%}%>
                                                    </li>
                                                    <%}}%>
                                                    <%for(var j=0;j<c1.length;j++){
                                                    var sObj = c1[j];
                                                    %>
                                                    <li class="clearfix1">
                                                        <label><%=sObj.Label%>：</label>
                                                        <pre style="line-height:24px;"><%=sObj.Value%></pre>
                                                    </li>
                                                    <%}%>
                                                </ul>
                                                <!--   <a href="javascript:void(0)" class="floatright">编辑个人信息
                                                   </a>-->
                                            </div>
                                            <%if(dict.IDPhoto){%>
                                            <img  src="<%=dict.IDPhoto.Value%>"  class="infophoto_rrlrw padtop10" />
                                            <%}%>

                                        </div>
                                    </div>
                                </script>
                                <script type="text/template" id="education">
                                    <div class="rsminfo_lrw">
	<span class="rsminfotlt_rlrw">
		<%=Label%>
	</span>
                                        <div class="rsminfocnt_rlrw">
                                            <div class="rsmcnt_rlrw">
                                                <%for(var i=0;i<Items.length;i++){%>
                                                <%
                                                var model = Items[i];
                                                if(model.IsAllText){
                                                %>
                                                <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div><pre><%= model.BlockText%></pre>
                                                <%
                                                }
                                                else
                                                {

                                                var items=model.Items;

                                                var dict={}; var c1= [];var c2= [];
                                                var except = "SchoolName,EducationLevel,MajorName,StartDate,EndDate";
                                                for(var j=0;j<items.length;j++){
                                                dict[items[j].Name]=items[j];

                                                if(IsExceptField(except,items[j].Name))
                                                continue;

                                                c1.push(items[j]);
                                                }
                                                var isShowItem = (dict.StartDate && dict.EndDate) || dict.SchoolName || dict.MajorName || dict.EducationLevel;
                                                %>
                                                <%if(isShowItem){ %>
                                                <div class="info_tit clearfix infotop_rlrw <%if(i != 0){%>bodastop<%}%>">
                                                    <% if(dict.StartDate && dict.EndDate){%><span class="datespan"><%=getShortDate(dict.StartDate.Value)%>—<%=getShortDate(dict.EndDate.Value)%></span><%}%>
                                                    <%if(dict.SchoolName){%><span><%=dict.SchoolName.Value%></span><%}%>
                                                    <%if(dict.MajorName){%><span><%=dict.MajorName.Value%> </span><%}%>
                                                    <%if(dict.EducationLevel){%><span class="edulevel"><%=dict.EducationLevel.Value%></span><%}%>
                                                </div>
                                                <%}%>
                                                <ul>
                                                    <%for(var j=0;j<c1.length;j++){
                                                    var sObj = c1[j];
                                                    %>
                                                    <li>
                                                        <label><%=sObj.Label%>：</label>
                                                        <pre><%=sObj.Value%></pre>
                                                    </li>
                                                    <%}%>
                                                </ul>

                                                <%}}%>
                                            </div>
                                        </div>

                                </script>
                                <!--培训经历-->
                                <script type="text/template" id="train">
                                    <div class="rsminfo_lrw">
	<span class="rsminfotlt_rlrw">
		<%=Label%>
	</span>
                                        <div class="rsminfocnt_rlrw">
                                            <div class="rsmcnt_rlrw">
                                                <%for(var i=0;i<Items.length;i++){%>
                                                <%
                                                var model = Items[i];
                                                if(model.IsAllText){
                                                %>
                                                <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div><pre><%= model.BlockText%></pre>
                                                <%
                                                }
                                                else
                                                {

                                                var items=model.Items;

                                                var dict={}; var c1= [];var c2= [];
                                                var except = "TrainStartDate,TrainEndDate,OrgName,CourseName";
                                                for(var j=0;j<items.length;j++){
                                                dict[items[j].Name]=items[j];
                                                if(IsExceptField(except,items[j].Name))
                                                continue;

                                                c1.push(items[j]);
                                                }
                                                %>
                                                <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>">
                                                    <% if(dict.TrainStartDate && dict.TrainEndDate){%><span class="datespan"><%=getShortDate(dict.TrainStartDate.Value)%>—<%=getShortDate(dict.TrainEndDate.Value)%></span><%}%>
                                                    <%if(dict.OrgName){%><span><%=dict.OrgName.Value%></span><%}%>
                                                    <%if(dict.CourseName){%><span><%=dict.CourseName.Value%> </span><%}%>
                                                </div>
                                                <ul>
                                                    <%for(var j=0;j<c1.length;j++){
                                                    var sObj = c1[j];
                                                    %>
                                                    <li>
                                                        <label><%=sObj.Label%>：</label>
                                                        <pre><%=sObj.Value%></pre>
                                                    </li>
                                                    <%}%>
                                                </ul>
                                                <%}}%>
                                            </div>
                                        </div>
                                </script>
                                <!-- 在校实践 schoolPractice-->
                                <script type="text/template" id="schoolPractice">
                                    <div class="rsminfo_lrw">
	<span class="rsminfotlt_rlrw">
		<%=Label%>
	</span>
                                        <div class="rsminfocnt_rlrw">
                                            <div class="rsmcnt_rlrw">
                                                <%for(var i=0;i<Items.length;i++){%>
                                                <%
                                                var model = Items[i];
                                                if(model.IsAllText){
                                                %>
                                                <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div><pre><%= model.BlockText%></pre>
                                                <%
                                                }
                                                else
                                                {

                                                var items=model.Items;

                                                var dict={}; var c1= [];var c2= [];
                                                var except = "PracticeStartDateTime,PracticeEndDateTime,PracticeName";
                                                for(var j=0;j<items.length;j++){
                                                dict[items[j].Name]=items[j];
                                                if(IsExceptField(except,items[j].Name))
                                                continue;

                                                c1.push(items[j]);
                                                }
                                                %>
                                                <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>">
                                                    <% if(dict.PracticeStartDateTime && dict.PracticeEndDateTime){%><span class="datespan"><%=getShortDate(dict.PracticeStartDateTime.Value)%>—<%=getShortDate(dict.PracticeEndDateTime.Value)%></span><%}%>
                                                    <%if(dict.PracticeName){%><span><%=dict.PracticeName.Value%></span><%}%>
                                                </div>
                                                <ul>
                                                    <%for(var j=0;j<c1.length;j++){
                                                    var sObj = c1[j];
                                                    %>
                                                    <li>
                                                        <label><%=sObj.Label%>：</label>
                                                        <pre><%=sObj.Value%></pre>
                                                    </li>
                                                    <%}%>
                                                </ul>
                                                <%}}%>
                                            </div>
                                        </div>
                                </script>
                                <!-- 在校职务 SchoolCadre -->
                                <script type="text/template" id="schoolCadre">
                                    <div class="rsminfo_lrw">
	<span class="rsminfotlt_rlrw">
		<%=Label%>
	</span>
                                        <div class="rsminfocnt_rlrw">
                                            <div class="rsmcnt_rlrw">
                                                <%for(var i=0;i<Items.length;i++){%>
                                                <%
                                                var model = Items[i];
                                                if(model.IsAllText){
                                                %>
                                                <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div><pre><%= model.BlockText%></pre>
                                                <%
                                                }
                                                else
                                                {

                                                var items=model.Items;

                                                var dict={}; var c1= [];var c2= [];
                                                var except = "CadreStartDateTime,CadreEndDateTime,CadreName";
                                                for(var j=0;j<items.length;j++){
                                                dict[items[j].Name]=items[j];
                                                if(IsExceptField(except,items[j].Name))
                                                continue;

                                                c1.push(items[j]);
                                                }
                                                %>
                                                <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>">
                                                    <% if(dict.CadreStartDateTime && dict.CadreEndDateTime){%><span class="datespan"><%=getShortDate(dict.CadreStartDateTime.Value)%>—<%=getShortDate(dict.CadreEndDateTime.Value)%></span><%}%>
                                                    <%if(dict.CadreName){%><span><%=dict.CadreName.Value%></span><%}%>
                                                </div>
                                                <ul>
                                                    <%for(var j=0;j<c1.length;j++){
                                                    var sObj = c1[j];
                                                    %>
                                                    <li>
                                                        <label><%=sObj.Label%>：</label>
                                                        <pre><%=sObj.Value%></pre>
                                                    </li>
                                                    <%}%>
                                                </ul>
                                                <%}}%>
                                            </div>
                                        </div>
                                    </div>
                                </script>
                                <!-- 有子对象单行 -->
                                <script type="text/template" id="commontpl">
                                    <div class="rsminfo_lrw" >
                <span class="rsminfotlt_rlrw"><%=Label%>
                </span>
                                        <div class="rsminfocnt_rlrw clearfix">
                                            <% for(var i=0;i<Items.length;i++){%>
                                            <%
                                            var model = Items[i];
                                            var items=model.Items;
                                            if(model.IsAllText){
                                            %>
                                            <div class="rsmcnt_rlrw"><div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div><pre><%= model.BlockText%></pre></div>
                                            <%
                                            }
                                            else{

                                            var dict={}; var c1= [];var c2= [];
                                            var except = "";
                                            for(var j=0;j<items.length;j++){
                                            dict[items[j].Name]=items[j];
                                            if(IsExceptField(except,items[j].Name))
                                            continue;

                                            c1.push(items[j]);
                                            }
                                            %>
                                            <div class="rsmcnt_rlrw"><div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div>
                                                <ul>
                                                    <%
                                                    for(var k=0;k<c1.length;k++){
                                                    var mObj = c1[k];
                                                    %>
                                                    <li>
                                                        <label><%=mObj.Label%>：</label>
                                                        <pre><%=mObj.Value%></pre>
                                                    </li>
                                                    <%}%>
                                                </ul>
                                            </div>
                                            <%}}%>
                                        </div>
                                    </div>
                                </script>
                                <script type="text/template" id="lang">
                                    <div class="rsminfo_lrw">
				<span class="rsminfotlt_rlrw">
					<%=Label%>
				</span>
                                        <div class="rsminfocnt_rlrw  clearfix">
                                            <div class="baselft_rrlrw padtop10">
                                                <ul>
                                                    <%for(var i=0;i<Items.length;i++){
                                                    if(Items[i].IsAllText){
                                                    %>
                                                    <pre><%= Items[i].BlockText%></pre>
                                                    <%
                                                    }
                                                    else{
                                                    var items=Items[i].Items;
                                                    var dict={}; var c1= [];var c2= [];
                                                    var except = "OtherLanguage";
                                                    //var except = "";
                                                    for(var j=0;j<items.length;j++){
                                                    dict[items[j].Name]=items[j];

                                                    if(IsExceptField(except,items[j].Name))
                                                    continue;

                                                    if(IsDoubleColumn(items[j])){
                                                    c2.push(items[j]);
                                                    }
                                                    else{
                                                    c1.push(items[j]);
                                                    }
                                                    }
                                                    %>

                                                    <%for(var k=0;k<c2.length;k=k+2){

                                                    if(k<c2.length){
                                                    var sObj = c2[k];

                                                    var sObj2 = ((k+1)<c2.length) ? c2[k+1] : null;

                                                    %>
                                                    <li>
                                                        <label><%=sObj.Label%>：</label><span><%=sObj.Value%></span>
                                                        <%if(sObj2){%><label><%= sObj2 ? sObj2.Label : ""%>：</label>
                                                        <span><%= sObj2 ? sObj2.Value : ""%></span><%}%>
                                                    </li>
                                                    <%}}%>
                                                    <%for(var k=0;k<c1.length;k++){
                                                    var sObj = c1[k];
                                                    %>
                                                    <li>
                                                        <label><%=sObj.Label%>：</label>
                                                        <span><%=sObj.Value%></span>
                                                    </li>
                                                    <%}%>

                                                    <%}}%>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </script>
                                <!--工作经验-->
                                <script type="text/template" id="experience">
                                    <div class="rsminfo_lrw">
	<span class="rsminfotlt_rlrw">
		<%=Label%>
	</span>
                                        <div class="rsminfocnt_rlrw">
                                            <div class="rsmcnt_rlrw">
                                                <%for(var i=0;i<Items.length;i++){%>
                                                <%
                                                var model = Items[i];
                                                if(model.IsAllText){
                                                %>
                                                <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div><pre><%= model.BlockText%></pre>
                                                <%
                                                }
                                                else
                                                {
                                                var items=Items[i].Items;
                                                var dict={}; var c1= [];var c2= [];
                                                var except = "CompanyName,JobTitle,StartDate,EndDate,department";
                                                for(var j=0;j<items.length;j++){
                                                dict[items[j].Name]=items[j];
                                                if(IsExceptField(except,items[j].Name))
                                                continue;

                                                c1.push(items[j]);
                                                }
                                                %>
                                                <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>">
                                                    <% if(dict.StartDate && dict.EndDate){%><span class="datespan"><%=getShortDate(dict.StartDate.Value)%>—<%=getShortDate(dict.EndDate.Value)%></span><%}%>
                                                    <%if(dict.CompanyName){%><span><%=dict.CompanyName.Value%></span><%}%>
                                                    <%if(dict.department){%><span class="deptspan"><%=dict.department.Value%> </span><%}%>
                                                    <%if(dict.JobTitle){%><span class="lastspan"><%=dict.JobTitle.Value%></span><%}%>
                                                </div>
                                                <ul>
                                                    <%for(var j=0;j<c1.length;j++){
                                                    var sObj = c1[j];
                                                    %>
                                                    <li>
                                                        <label><%=sObj.Label%>：</label>
                                                        <pre><%=sObj.Value%></pre>
                                                    </li>
                                                    <%}%>
                                                </ul>
                                                <%}}%>
                                            </div>
                                        </div>
                                </script>
                                <!--实习经验-->
                                <script type="text/template" id="practiceExp">
                                    <div class="rsminfo_lrw">
	<span class="rsminfotlt_rlrw">
		<%=Label%>
	</span>
                                        <div class="rsminfocnt_rlrw">
                                            <div class="rsmcnt_rlrw">
                                                <%for(var i=0;i<Items.length;i++){%>
                                                <%
                                                var model = Items[i];
                                                if(model.IsAllText){
                                                %>
                                                <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div><pre><%= model.BlockText%></pre>
                                                <%
                                                }
                                                else
                                                {
                                                var items=Items[i].Items;
                                                var dict={}; var c1= [];var c2= [];
                                                var except = "PracticeStartDate,PracticeEndDate,PracticeCompanyName";
                                                for(var j=0;j<items.length;j++){
                                                dict[items[j].Name]=items[j];
                                                if(IsExceptField(except,items[j].Name))
                                                continue;

                                                c1.push(items[j]);
                                                }
                                                %>
                                                <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>">
                                                    <% if(dict.PracticeStartDate && dict.PracticeEndDate){%><span class="datespan"><%=getShortDate(dict.PracticeStartDate.Value)%>—<%=getShortDate(dict.PracticeEndDate.Value)%></span><%}%>
                                                    <%if(dict.PracticeCompanyName){%><span><%=dict.PracticeCompanyName.Value%></span><%}%>
                                                </div>
                                                <ul>
                                                    <%for(var j=0;j<c1.length;j++){
                                                    var sObj = c1[j];
                                                    %>
                                                    <li>
                                                        <label><%=sObj.Label%>：</label>
                                                        <pre><%=sObj.Value%></pre>
                                                    </li>
                                                    <%}%>
                                                </ul>
                                                <%}}%>
                                            </div>
                                        </div>
                                </script>
                                <!-- 无子对象单行 -->
                                <script type="text/template" id="commontpl2">
                                    <div class="rsminfo_lrw">
			<span class="rsminfotlt_rlrw">
				<%=Label%>
			</span>
                                        <div class="rsminfocnt_rlrw">
                                            <div class="rsmcnt_rlrw">
                                                <ul>
                                                    <%var fObj = Items[0];%>
                                                    <%for(var j=0;j<fObj.Items.length;j++){%>
                                                    <%var sObj = fObj.Items[j];%>
                                                    <li>
                                                        <label><%=sObj.Label%>：</label>
                                                        <pre><%=sObj.Value%></pre>
                                                    </li>
                                                    <%}%>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </script>
                                <!-- 家庭情况模板 -->
                                <script type="text/template" id="Family">
                                    <div class="rsminfo_lrw rsminfo_family clearfix1" >
                <span class="rsminfotlt_rlrw"><%=Label%>
                </span>
                                        <div class="rsminfocnt_rlrw clearfix">
                                            <% for(var i=0;i<Items.length;i++){%>
                                            <%
                                            var model = Items[i];
                                            var items=model.Items;
                                            if(model.IsAllText){
                                            %>
                                            <div class="rsmcnt_rlrw"><div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div><pre><%= model.BlockText%></pre></div>
                                            <%
                                            }
                                            else{

                                            var dict={}; var c1= [];var c2= [];
                                            var except = "";
                                            for(var j=0;j<items.length;j++){
                                            dict[items[j].Name]=items[j];
                                            if(IsExceptField(except,items[j].Name))
                                            continue;

                                            c1.push(items[j]);
                                            }
                                            %>
                                            <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div>
                                            <ul class="<%if(i == 0){%>rsmtop<%}%> clearfix">
                                                <%
                                                for(var k=0;k<c1.length;k++){
                                                var mObj = c1[k];
                                                %>
                                                <li>
                                                    <label><%=mObj.Label%>：</label>
                                                    <pre><%=mObj.Value%></pre>
                                                </li>
                                                <%}%>
                                            </ul>

                                            <%}}%>
                                        </div>
                                    </div>
                                </script>
                                <script type="text/template" id="question">
                                    <div class="rsminfo_lrw">
			<span class="rsminfotlt_rlrw">
				<%=Label%>
			</span>
                                        <div class="rsminfocnt_rlrw">
                                            <%var fObj = Items[0];%>
                                            <%for(var j=0;j<fObj.Items.length;j++){
                                            var sObj = fObj.Items[j];%>

                                            <div class="rsmcnt_rlrw">
                                                <div class="infor_wrap infotop_rlrw <%if(j != 0){%>bodastop<%}%>">
                                                    <%=(j + 1)%>.<%=sObj.Label%>
                                                </div>
                                                <ul class="infor_wrap_tit">
                                                    <%=sObj.Value%>
                                                </ul>
                                            </div>
                                            <%}%>
                                        </div>
                                    </div>
                                </script>
                                <script type="text/template" id="project">
                                    <div class="rsminfo_lrw">
	<span class="rsminfotlt_rlrw">
		<%=Label%>
	</span>
                                        <div class="rsminfocnt_rlrw">
                                            <div class="rsmcnt_rlrw">
                                                <%for(var i=0;i<Items.length;i++){%>
                                                <%
                                                var model = Items[i];
                                                if(model.IsAllText){
                                                %>
                                                <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div><pre><%= model.BlockText%></pre>
                                                <%
                                                }
                                                else
                                                {
                                                var items=Items[i].Items;
                                                var dict={}; var c1= [];var c2= [];
                                                var except = "ProjectName,StartDate,EndDatE,EndDate";
                                                for(var j=0;j<items.length;j++){
                                                dict[items[j].Name]=items[j];
                                                if(IsExceptField(except,items[j].Name))
                                                continue;

                                                c1.push(items[j]);
                                                }
                                                %>
                                                <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>">
                                                    <%if(dict.StartDate && dict.EndDate){%><span class="datespan"><%=getShortDate(dict.StartDate.Value)%>—<%=getShortDate(dict.EndDate.Value)%></span><%}%>
                                                    <%if(dict.ProjectName){%><span><%=dict.ProjectName.Value%></span><%}%>
                                                </div>
                                                <ul>
                                                    <%for(var j=0;j<c1.length;j++){
                                                    var sObj = c1[j];
                                                    %>
                                                    <li>
                                                        <label><%=sObj.Label%>：</label>
                                                        <pre><%=sObj.Value%></pre>
                                                    </li>
                                                    <%}%>
                                                </ul>
                                                <%}}%>
                                            </div>
                                        </div>
                                </script>
                                <script type="text/template" id="teammanager">
                                    <div class="rsminfo_lrw">
	<span class="rsminfotlt_rlrw">
		<%=Label%>
	</span>
                                        <div class="rsminfocnt_rlrw">
                                            <div class="rsmcnt_rlrw">
                                                <%for(var i=0;i<Items.length;i++){%>
                                                <%
                                                var model = Items[i];
                                                if(model.IsAllText){
                                                %>
                                                <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>"></div><pre><%= model.BlockText%></pre>
                                                <%
                                                }
                                                else
                                                {
                                                var items=Items[i].Items;
                                                var dict={}; var c1= [];var c2= [];
                                                //var except = "CompanyName,DirectUnderlingCount,ReportToCN";
                                                var except = "CompanyName";
                                                for(var j=0;j<items.length;j++){
                                                dict[items[j].Name]=items[j];
                                                if(IsExceptField(except,items[j].Name))
                                                continue;

                                                c1.push(items[j]);
                                                }
                                                %>
                                                <div class="infotop_rlrw <%if(i != 0){%>bodastop<%}%>">
                                                    <span><%=dict.CompanyName.Value%></span>
                                                    <!--    <%if(dict.DirectUnderlingCount){%><span><%=dict.DirectUnderlingCount.Value%>人</span><%}%>
                                                        <%if(dict.ReportToCN){%><span><%=dict.ReportToCN.Value%></span><%}%>-->
                                                </div>
                                                <ul>
                                                    <%for(var j=0;j<c1.length;j++){
                                                    var sObj = c1[j];
                                                    %>
                                                    <li>
                                                        <label><%=sObj.Label%>：</label>
                                                        <pre><%=sObj.Value%></pre>
                                                    </li>
                                                    <%}%>
                                                </ul>
                                                <%}}%>
                                            </div>
                                        </div>
                                </script>
                                <script type="text/template" id="attachments">
                                    <div class="rsminfo_lrw">
			<span class="rsminfotlt_rlrw">
				<%=Label%>
			</span>
                                        <div class="rsminfocnt_rlrw">
                                            <div class="rsmcnt_rlrw">
                                                <ul>
                                                    <%var fObj = Items[0];%>
                                                    <%for(var j=0;j<fObj.Items.length;j++){
                                                    var sObj = fObj.Items[j];
                                                    %>
                                                    <li>
                                                        <label><%=sObj.Label%>：</label>
                                                        <pre><%=sObj.Value%></pre>
                                                    </li>
                                                    <%}%>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </script>
                                <script type="text/javascript" src="js/underscore.js"> </script>
                                <script type="text/javascript">
                                    var Models = [{"Name":"RecruitmentPortal.PersonProfile","Label":"个人信息","Date":"2015-12-15T00:00:00+08:00","Items":[{"Items":[{"Name":"Name","Label":"姓名","Value":"zhange","ControlName":"ResumeInputCtl2","ControlType":"1"},{"Name":"gender","Label":"性别","Value":"男","ControlName":"GenderCtl","ControlType":"5"},{"Name":"Birthday","Label":"出生日期","Value":"2003-12-15","ControlName":"ResumeDateTimeCtlNoDescTips","ControlType":"0"},{"Name":"email","Label":"邮箱","Value":"416148489@qq.com","ControlName":"ResumeInputCtl2","ControlType":"1"},{"Name":"Mobile","Label":"手机号","Value":"13851435593","ControlName":"ResumeInputCtl","ControlType":"1"},{"Name":"YearsOfWork","Label":"工作年限","Value":"2年","ControlName":"DropDownListCtl","ControlType":"3"}]}]},{"Name":"RecruitmentPortal.Objective","Label":"求职意向","Date":"2015-12-15T00:00:00+08:00","Items":[{"Items":[{"Name":"ExpectIndustry","Label":"期望从事行业","Value":"物流/运输,教育/培训/科研/院校","ControlName":"IndustryMultiSelect","ControlType":"6"},{"Name":"ExpectJobCategory","Label":"期望从事职业","Value":"美术&#183;设计&#183;创意类","ControlName":"SelectPanel","ControlType":"6"},{"Name":"ExpectWorkCity","Label":"期望工作城市","Value":"重庆市","ControlName":"NewAreaCtlMultiWithTips","ControlType":"6"}]}]},{"Name":"RecruitmentPortal.Education","Label":"教育背景","Date":"2015-12-15T00:00:00+08:00","HasSubObject":true,"Items":[{"Items":[{"Name":"SchoolName","Label":"学校名称","Value":"中国人民大学","ControlName":"RecruitmentPortal.SchoolSelector","ControlType":"1"},{"Name":"StartDate","Label":"开始时间","Value":"1973-07-01","ControlName":"StartDateTime","ControlType":"0"},{"Name":"EndDate","Label":"结束时间","Value":"至今","ControlName":"EndDateTime","ControlType":"0"},{"Name":"MajorName","Label":"专业名称","Value":"qqqq","ControlName":"ResumeInputCtl","ControlType":"1"},{"Name":"EducationLevel","Label":"学历","Value":"硕士研究生","ControlName":"DropDownListCtl","ControlType":"3"},{"Name":"Degree","Label":"学位","Value":"MBA","ControlName":"DropDownListCtl","ControlType":"3"}]},{"Items":[{"Name":"SchoolName","Label":"学校名称","Value":"北京化工大学","ControlName":"RecruitmentPortal.SchoolSelector","ControlType":"1"},{"Name":"StartDate","Label":"开始时间","Value":"1972-05-01","ControlName":"StartDateTime","ControlType":"0"},{"Name":"EndDate","Label":"结束时间","Value":"至今","ControlName":"EndDateTime","ControlType":"0"},{"Name":"MajorName","Label":"专业名称","Value":"qqq","ControlName":"ResumeInputCtl","ControlType":"1"},{"Name":"EducationLevel","Label":"学历","Value":"硕士研究生","ControlName":"DropDownListCtl","ControlType":"3"},{"Name":"Degree","Label":"学位","Value":"学士","ControlName":"DropDownListCtl","ControlType":"3"}]}]},{"Name":"RecruitmentPortal.Experience","Label":"工作经验","Date":"2015-12-15T00:00:00+08:00","HasSubObject":true,"Items":[{"Items":[{"Name":"CompanyName","Label":"单位名称","Value":"qqq","ControlName":"ResumeInputCtl","ControlType":"1"},{"Name":"JobTitle","Label":"职位名称","Value":"wqwq","ControlName":"ResumeInputCtl","ControlType":"1"},{"Name":"StartDate","Label":"开始时间","Value":"1972-03-01","ControlName":"StartDateTime","ControlType":"0"},{"Name":"EndDate","Label":"结束时间","Value":"至今","ControlName":"EndDateTime","ControlType":"0"},{"Name":"JobDuty","Label":"工作职责","Value":"wqqqqqq","ControlName":"TextAreaInputNoDescTips","ControlType":"2"}]}]}];
                                </script>
                                <script type="text/javascript">
                                    function GetJsonDate(date) {
                                        return new Date(parseInt(date.replace("/Date(", "").replace(")/", ""), 10));
                                    }
                                    function GetDate(date) {
                                        var year = date.getFullYear();
                                        var month = date.getMonth() + 1;
                                        var day = date.getDate();
                                        return year + "-" + month + "-" + day;
                                    }

                                    function GetFullDate(date) {
                                        var year = date.getFullYear();
                                        var month = date.getMonth() + 1;
                                        var day = date.getDate();
                                        var hh = date.getHours();
                                        var mm = date.getMinutes();
                                        var ss = date.getSeconds();
                                        return year + "-" + month + "-" + day + " " + hh + ":" + mm + ":" + ss;
                                    }



                                    function GetAge(serverDate, bDate) {
                                        var birthday = new Date(bDate.replace(/-/g, "\/"));
                                        var d = GetJsonDate(serverDate);
                                        var age = d.getFullYear() - birthday.getFullYear();
                                        return isNaN(age) ? "0" : (age <= 0 ? "0" : age);
                                    }

                                    function ProcessOthersLanguage(languages) {
                                        var result = new Array();
                                        var lanArray = languages.split(":");
                                        for (var i = 0; i < lanArray.length; i++) {
                                            var m = lanArray[i].split(",");
                                            if (m.length == 2)
                                                result.push(m);
                                        }
                                        return result;
                                    }

                                    function IsExceptField(fields, name) {
                                        var except = "," + fields + ",";
                                        return except.indexOf(name + ",") >= 0;
                                    }
                                    function ProcessFullDate(date) {
                                        return date.replace("9999/12/31", "至今");
                                    }

                                    function IsDoubleColumn(obj) {
                                        //if (GetLength(obj.Label + "：") + GetLength(obj.Value) > 30) {
                                        if (GetLength(obj.Value) > 19) {
                                            return false;
                                        }
                                        else if (GetLength(obj.Label + "：") > 14) {
                                            return false;
                                        }
                                        return true;
                                    }

                                    function GetLength(str) {
                                        var len = str.length;
                                        var reLen = 0;
                                        for (var i = 0; i < len; i++) {
                                            if (str.charCodeAt(i) < 27 || str.charCodeAt(i) > 126) {
                                                // 全角
                                                reLen += 2;
                                            } else {
                                                reLen++;
                                            }
                                        }
                                        return reLen;
                                    }

                                    function getShortDate(dateStr) {
                                        if (dateStr && dateStr.indexOf("-") > -1) {
                                            return dateStr.substring(0, dateStr.lastIndexOf("-")).replace("-", ".");
                                        }
                                        return dateStr;
                                    }

                                    function getPersonProfile(models) {
                                        if (!models || models.length == 0)
                                            return null;
                                        var model = null;
                                        for (var i = 0; i < models.length; i++) {
                                            var item = models[i];
                                            if (item.Name == "RecruitmentPortal.PersonProfile")
                                                model = item;
                                        }
                                        return model;
                                    }

                                    (function () {
                                        if (!Models || Models.length == 0)
                                            return;

                                        var personInfo = getPersonProfile(Models);

                                        var content = "";
                                        if (personInfo)
                                            content = _.template($("#personinfo").html(), personInfo);

                                        var templeScript = "commontpl";
                                        for (var i = 0; i < Models.length; i++) {
                                            var item = Models[i];
                                            if (item.Name == "RecruitmentPortal.PersonProfile")
                                                continue;
                                            if (item.Name == "RecruitmentPortal.Education") {
                                                templeScript = "education";
                                            } else if (item.Name == "RecruitmentPortal.Lang") {
                                                templeScript = "lang";
                                            } else if (item.Name == "RecruitmentPortal.Question") {
                                                templeScript = "question";
                                            } else if (item.Name == "RecruitmentPortal.Experience") {
                                                templeScript = "experience";
                                            }
                                            //else if (item.Name == "RecruitmentPortal.TeamManager") {
                                            //    templeScript = "teammanager";
                                            //}
                                            else if (item.Name == "RecruitmentPortal.Project") {
                                                templeScript = "project";
                                            } else if (item.Name == "RecruitmentPortal.Attachments") {
                                                templeScript = "attachments";
                                            } else if (item.Name == "RecruitmentPortal.PracticeExp") {
                                                templeScript = "practiceExp";
                                            } else if (item.Name == "RecruitmentPortal.Train") {
                                                templeScript = "train";
                                            } else if (item.Name == "RecruitmentPortal.SchoolCadre") {
                                                templeScript = "schoolCadre";
                                            } else if (item.Name == "RecruitmentPortal.SchoolPractice") {
                                                templeScript = "schoolPractice";
                                            } else if (item.Name == "RecruitmentPortal.PersonalStatement") {
                                                templeScript = "commontpl2";
                                            } else if (item.Name == "RecruitmentPortal.AdditionalInfo") {
                                                templeScript = "commontpl2";
                                            } else if (item.Name == "RecruitmentPortal.Family"){        //新增家庭情况模板
                                                templeScript = "Family";
                                            } else {
                                                templeScript = "commontpl";
                                            }

                                            //RecruitmentPortal.SchoolPractice
                                            content += _.template($("#" + templeScript).html(), item);
                                        }

                                        content = $("#resumeBody").html() + content;
                                        $("#resumeBody").html(content);
                                    })();
                                </script>
                            </div>
                            <script type="text/javascript">

                                $(document).ready(function () {

                                    var name = getPersonName(Models);

                                    if (name) {
                                        $("#personName").html(name + "的简历");
                                    }
                                });

                                function getPersonName(model) {

                                    if (model && model[0] && model[0].Items) {

                                        for (var i = 0; i < model[0].Items[0].Items.length; i++) {
                                            var item = model[0].Items[0].Items[i];
                                            if (item.Name == "Name") {

                                                return item.Value;

                                            }
                                        }
                                    }
                                    return "";
                                }
                            </script>
                        </div>
                        <div class="dl_bd_btm"></div>
                        <div class="dl_cen_txt dl_htline32 dl_padt15">
                            <span class="dl_btn_lev dl_ft14_grey dl_padr10" style=""><a name="btnPre" href="?r=resume/two"><b>上一步</b></a></span>
                            <a name="btnSave" href="javascript:void(0);" class="dl_btn_blue1"> <span>提交申请</span> </a>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">$(function(){BSGlobal.pt=function(pro,data){this.pro=pro||"beisen";this.data=data||{};this.isSubmit=false;this.init=function(){this.initPage()};this.init.apply(this,arguments)};BSGlobal.pt.prototype={initPage:function(){this.initControls();this.initPin()},initPin:function(){var labels=$("#resumeBody label");$.each(labels,function(key,item){if($(item).text()=="证件类型：")$(item).next().text()=="身份证"&&$.each(labels,function(key,item){if($(item).text()=="证件号码："){var num=$(item).next().text();$.ajax({type:"post",url:"/Portal/Resume/CheckIdentityCardNumber",data:{icn:num},success:function(resp){if(resp.result=="failure"){BSGlobal.data.allowSubmit=false;var title=$(".dl_bigtit").find("span.dl_padl10"),str="";if(title.find("a").length>0){var url="?jid="+BSGlobal.data.jId+"&stepId=0&sId="+BSGlobal.data.sId;str+="<a href='"+url+"' ><span class='dl_blue1'><b>个人信息</b></span>&nbsp;</a>";title.find("a:first-child").before(str)}else{title.empty();var url="?jid="+BSGlobal.data.jId+"&stepId=0&sId="+BSGlobal.data.sId;str+="您的&nbsp;<a href='"+url+"' ><span class='dl_blue1'><b>个人信息</b></span></a>&nbsp;还未填写完整，无法提交申请";title.append(str)}}},error:function(){}})}})})},initControls:function(){var that=this;$(".rsminfotlt_rlrw").each(function(){var text=$.trim($(this).html()),url=BSGlobal.data.redirectUrl+"?jid="+BSGlobal.data.jId;if(BSGlobal.data.sId&&BSGlobal.data.sId!="")url+="&sId="+BSGlobal.data.sId;if(BSGlobal.data.source&&BSGlobal.data.source!="")url+="&source="+BSGlobal.data.source;if(BSGlobal.data.pageId&&BSGlobal.data.pageId!="")url+="&pId="+BSGlobal.data.pageId;if(BSGlobal.data.isImport&&BSGlobal.data.isImport!="")url+="&isImport="+BSGlobal.data.isImport;if(BSGlobal.data.idType&&BSGlobal.data.idType!="")url+="&idType="+BSGlobal.data.idType;if(BSGlobal.data.personId&&BSGlobal.data.personId!="")url+="&personId="+BSGlobal.data.personId;if(BSGlobal.data.storeDbId&&BSGlobal.data.storeDbId!="")url+="&storeDbId="+BSGlobal.data.storeDbId;if(BSGlobal.data.formId&&BSGlobal.data.formId!="")url+="&formId="+BSGlobal.data.formId;if(BSGlobal.data.r&&BSGlobal.data.r!="")url+="&r="+BSGlobal.data.r;var stepId=BSGlobal.data.objectLabels[text];url+="&stepId="+stepId;if(BSGlobal.data.IsApplyEdit)url+="&isApplyEdit="+BSGlobal.data.IsApplyEdit;url+="#"+text;var html="<a href="+url+' style="position: absolute;left: 650px;">编辑>></a>';$(html).insertAfter($(this))});$('a[name="btnPre"]').unbind();$('a[name="btnPre"]').click(function(){var url=BSGlobal.data.redirectUrl+"?stepId="+BSGlobal.data.preStep+"&jId="+BSGlobal.data.jId;if(BSGlobal.data.sId&&BSGlobal.data.sId!="")url+="&sId="+BSGlobal.data.sId;if(BSGlobal.data.source&&BSGlobal.data.source!="")url+="&source="+BSGlobal.data.source;if(BSGlobal.data.pageId&&BSGlobal.data.pageId!="")url+="&pId="+BSGlobal.data.pageId;if(BSGlobal.data.isImport&&BSGlobal.data.isImport!="")url+="&isImport="+BSGlobal.data.isImport;if(BSGlobal.data.idType&&BSGlobal.data.idType!="")url+="&idType="+BSGlobal.data.idType;if(BSGlobal.data.personId&&BSGlobal.data.personId!="")url+="&personId="+BSGlobal.data.personId;if(BSGlobal.data.storeDbId&&BSGlobal.data.storeDbId!="")url+="&storeDbId="+BSGlobal.data.storeDbId;if(BSGlobal.data.formId&&BSGlobal.data.formId!="")url+="&formId="+BSGlobal.data.formId;if(BSGlobal.data.IsApplyEdit)url+="&isApplyEdit="+BSGlobal.data.IsApplyEdit;location.href=url});that.bindSubmitEvent();$("#cbxApplyInfo").unbind();$("#cbxApplyInfo").click(function(){var cbx=$("#cbxApplyInfo"),ischecked=cbx.is(":checked");if(ischecked)that.enableSaveBtn();else that.disableSaveBtn()});var re=BSGlobal.data.regextTextImg;$.each($(".infophoto_rrlrw"),function(){var src=$(this).attr("src");src.match(re)&&$(this).attr("src",src.replace(re,"/Portal/Resume/ResumePhoto?dfsPath=dfs%3A%2F%2FResume%2F$2%2F$3.$4"))})},disableSaveBtn:function(){$('a[name="btnSave"]').hide();$("#disableSaveBtn").show()},enableSaveBtn:function(){$("#disableSaveBtn").hide();$('a[name="btnSave"]').show()},checkCin:function(){var that=this},bindSubmitEvent:function(){var that=this;$('a[name="btnSave"]').unbind();$('a[name="btnSave"]').click(function(){var submitBtn=this;try{var station=$("#stationId"),stationId=station&&station.length?station.val():true;if(!stationId||stationId=="0"){that.showMsgDialog("请在基本信息中选择面试地点。");return}if(that.isSubmit==true)return;that.isSubmit=true;if(!BSGlobal.data.allowSubmit){that.showMsgDialog("您还有部分内容未填写完整，无法提交申请");that.isSubmit=false;return}if(BSGlobal.data.jId==""){that.submitApply(submitBtn);return}if(BSGlobal.data.myJobApplyCount>0){if(BSGlobal.data.IsApplyEdit){that.submitApply(submitBtn);that.isSubmit=false;return}if(!BSGlobal.data.isAllowReApply){that.showMsgDialog("您之前已经成功申请过该职位，请不要重复申请！");that.isSubmit=false;return}if($("#stationId").val()==""){that.showMsgDialog("请在基本信息中选择面试地点。");that.isSubmit=false;return}else if(BSGlobal.data.isAllowReApply){var opt={message:"您已经申请过此职位，是否继续申请？",okFn:function(){$.modal.close();that.submitApply(submitBtn)}};that.showDialog(opt);that.isSubmit=false}}else{if(BSGlobal.data.alowApplyCount<1&&!BSGlobal.data.IsApplyEdit){that.isSubmit=false;that.showMsgDialog("您已经达到最大的职位申请数量");return}that.submitApply(submitBtn)}}catch(e){that.isSubmit=false}})},submitApply:function(){var that=this,stationId=$("#stationId").val(),stationName=$("#stationName").val();$.post(BSGlobal.data.applyUrl,{jId:BSGlobal.data.jId,sId:BSGlobal.data.sId,source:BSGlobal.data.source,idType:BSGlobal.data.idType,personId:BSGlobal.data.personId,storeDbId:BSGlobal.data.storeDbId,isApplyEdit:BSGlobal.data.IsApplyEdit,stationId:stationId,stationName:stationName,formId:BSGlobal.data.formId},function(data){$.modal.close();if(data.result=="false"){if(data.errCode==-1)that.showMsgDialog("您已经达到最大的职位申请数量");else data.errCode==-2&&that.showMsgDialog("您之前已经成功申请过该职位，请不要重复申请！");that.isSubmit=false;return}if(data.data.Success)if(!data.data.IsSendInviteTest){var htmlAutoTest=['<div class="dl_dialog1">','     <div class="dl_dialog_wrap">','       <div class="dl_tocenter">','<span class="dl_dialog_icook dl_ft14_grey2"><b>投递成功!</b>',"</span>","</div>",'     <div class="dl_dialog_btn">',' <span class="dl_green1">自动测评信息读取中....请耐心等待</span>',"              <div>","     </div>","</div>"].join("");if(BSGlobal.data.IsApplyEdit)htmlAutoTest=htmlAutoTest.replace("投递成功","修改成功");$.modal(htmlAutoTest,{containerCss:{backgroundColor:"transparent",borderColor:"transparent",padding:0},onShow:function(){$("div[class='dl_dialog1']").css("padding","15px")}});that.readCookieInterval=window.setInterval(function(){$.post(BSGlobal.data.checkAutoTestComplateUrl,{applyId:data.data.ApplyId},function(res){if(!res.personId&&res.personId!=0)return;if(res.personId==0){clearInterval(that.readCookieInterval);that.isSubmit=false;if(BSGlobal.data.isUseNewWish)location.href=BSGlobal.data.setWishUrl;else location.href=BSGlobal.data.myApplyUrl;return}$.post(BSGlobal.data.checkAutoTestUrl,{jobId:data.data.JobId,personId:res.personId},function(testlist){if(testlist.Value&&testlist.Value.length>0){$.modal.close();var autoTestList='<div class="dl_dialog1" style="width: 300px;padding-left: 50px;padding-right: 50px"><div class="dl_dialog_wrap"><div class="dl_tocenter" style="margin-bottom: 15px;"><span class="dl_dialog_icook dl_ft14_grey2"><b>投递成功!</b></span></div> <div><span style="color:#aaa;line-height:30px">您的测评邀请已经发送到您的个人信息中填写的邮箱，也可以通过邮箱的链接进行测评</span></div><div><ul style="margin-top: 20px">';$.each(testlist.Value,function(i,value){autoTestList=autoTestList+'<li class="clearfix"><span style="float: right;line-height:30px;">';if((value.State==1||value.State==2)&&value.TestUrl!="")autoTestList=autoTestList+'<a href="'+value.TestUrl+'">'+value.StateStr+"</a>";autoTestList=autoTestList+"</span><span>"+value.AvtivityName+"</span></li>"});autoTestList=autoTestList+'</ul></div><div class="dl_dialog_btn"><a href="member_apply.html" class="dl_btn_grey1 dl_mglft10"><span>稍后进行测评</span></a></div></div></div>';$.modal(autoTestList,{containerCss:{backgroundColor:"transparent",borderColor:"transparent",padding:0},onShow:function(){$("div[class='dl_dialog1']").css("padding","15px")}});that.readCookieInterval&&clearInterval(that.readCookieInterval);that.isSubmit=false}else{that.readCookieInterval&&clearInterval(that.readCookieInterval);that.isSubmit=false;if(BSGlobal.data.isUseNewWish)location.href=BSGlobal.data.setWishUrl;else location.href=BSGlobal.data.myApplyUrl}},"json")},"json")},3e3)}else{var html1=['<div class="dl_dialog1">','     <div class="dl_dialog_wrap">','       <div class="dl_tocenter">','<span class="dl_dialog_icook dl_ft14_grey2"><b>投递成功!</b>',"</span>","</div>",'     <div class="dl_dialog_btn">',' <span class="dl_green1">即将跳转入个人中心的申请列表</span>',"              <div>","     </div>","</div>"].join("");if(BSGlobal.data.IsApplyEdit)html1=html1.replace("投递成功","修改成功");$.modal(html1,{containerCss:{backgroundColor:"transparent",borderColor:"transparent",padding:0},onShow:function(){$("div[class='dl_dialog1']").css("padding","15px")}});function a(){$.modal.close();if(BSGlobal.data.isUseNewWish)location.href=BSGlobal.data.setWishUrl;else location.href=BSGlobal.data.myApplyUrl}that.readCookieInterval&&clearInterval(that.readCookieInterval);setTimeout(a,2e3)}},"json")},showMsgDialog:function(msg){var html1=['<div class="dl_dialog1">','\t<div class="dl_dialog_wrap">','   <div class="dl_tocenter">','<span class="dl_dialog_icowarn dl_ft14_grey2"><b>'+msg+"</b>","</span>","</div>","\t</div>","</div>"].join("");$.modal(html1,{containerCss:{backgroundColor:"transparent",borderColor:"transparent",padding:0},onShow:function(){$("div[class='dl_dialog1']").css("padding","15px")}});function a(){$.modal.close()}setTimeout(a,2e3)},showDialog:function(options){var msg=options.message,okBtnText=options.okText?options.okText:"确定",closeBtnText=options.closeText?options.closeText:"取消",showOkBtn=options.showOk?options.showOk:true,showCloseBtn=options.showClose?options.showClose:true,html=['<div class="dl_dialog1">','\t<div class="dl_dialog_wrap">','       <div class="dl_dialog_icoqa"><span>'+msg+"</span></div>",'\t<div class="dl_dialog_btn">',showOkBtn?' <a href="javascript:void(0);" class="dl_btn_grey1" id="btnOk" ><span>'+okBtnText+"</span></a>":"",showCloseBtn?'\t<a href="javascript:void(0);" class="dl_btn_grey1 dl_mglft10 simplemodal-close"  id="btnClse"><span>'+closeBtnText+"</span></a>":"","\t\t<div>","\t</div>","</div>"].join(""),option={containerCss:{backgroundColor:"transparent",borderColor:"transparent",padding:0},onShow:function(){$("#btnOk").unbind();$("#btnOk").click(function(){options.okFn&&options.okFn.apply(this)});options.closeFn&&$("#btnClse").click(function(){options.closeFn&&options.closeFn.apply(this)});$("div[class='dl_dialog1']").css("padding","15px")}};$.modal(html,option)},showWaitDialage:function(msg){var html=['<div class="dl_dialog1">','\t<div class="dl_dialog_wrap">','   <div class="dl_tocenter">','<span class=" dl_ft14_grey2"><b>'+msg+"</b>","</span>","</div>","\t</div>","</div>"].join("");$.modal(html,{containerCss:{backgroundColor:"transparent",borderColor:"transparent",padding:0},onShow:function(){$("div[class='dl_dialog1']").css("padding","15px")}})}}})</script>
            <script type="text/javascript">

                $(function () {
                    BSGlobal.data = {
                        r: 'detail.html?620025245',
                        jId: '620025245',
                        sId: '0',
                        idType: '0',
                        personId: '',
                        storeDbId: '',
                        formId: '',
                        source: '',
                        myJobApplyCount: '0',
                        viewName: 'ResumeSubmit',
                        redirectUrl: '/Portal/Resume/ResumeItem',
                        saveUrl: '/Portal/Resume/SaveResumeItem',
                        uploadUrl: '/Portal/Resume/UploadAttach',
                        hasUserDatasUrl: '/Portal/Resume/HasResumeDatas',
                        objectLabels : {'个人信息':'0','求职意向':'0','培训经历':'1','项目经验':'1','语言能力':'1','家庭情况':'1','工作经验':'1','教育背景':'1','证书':'1','团队管理经验':'1','技能':'1','自我评价':'1','附件':'2','附加信息':'0','附加问题':'3','实习经验':'1','获奖情况':'1','在校职务':'1','在校实践':'1','论文/专著':'1','简历附件':'2'},
                        nextStep: '4',
                        preStep: '1',
                        pageId: '',
                        isImport: '1',
                        applyUrl: '/Portal/Resume/ApplyResume',
                        allowSubmit:true,
                        isAllowReApply:true,
                        isApplied:false,
                        alowApplyCount:3,
                        isApplicantStatement : false,
                        myApplyUrl: 'member_apply.html',
                        checkAutoTestComplateUrl: '/Portal/Apply/GetPersonId',
                        checkAutoTestUrl: '/Portal/Apply/GetAutoTestList',
                        IsApplyEdit : false,
                        setWishUrl: '/Portal/Apply/ChangeWish',
                        isUseNewWish:false,

                        regextTextImg : /http:\/\/dfiles\.tms\.beisen\.com\/(\w+)\/(\w+)\/(\w+)\.(\w+)\?{0,}(.*)/i
                    };
                    BSGlobal.page = new BSGlobal.pt("CmsPortal", BSGlobal.data);
                });
                function getSelectedValue(name){
                    var obj=document.getElementByIdx(name);
                    return obj.value;      //如此简单，直接用其对象的value属性便可获取到
                }
            </script>
        </div>
        <!--简历内容 e-->
    </div>
    <div class="dl_footer">
        <p>&copy;2015&nbsp;北京大生知行科技有限公司51talk&nbsp;&nbsp;京ICP备05051632号 京公网安备110108002767号 &nbsp;&nbsp;帮助热线：4006506886</p>
    </div>
</div>
<script type="text/javascript">_splash('zhiye_resumeitem',0,104003,'new.zhiye.com');</script>
<script type="text/javascript">
    function navigate(jId, step) {
        location.href = "/Portal/Resume/ResumeItem?jid=" + jId + "&stepId=" + step;
    }
</script>
<script type="text/javascript">$(function(){BSGlobal.resumeDetailPage=function(pro,data){this.pro=pro||"beisen";this.data=data||{};this.init=function(){this.initPage()};this.init.apply(this,arguments)};BSGlobal.showDialog=function(options){var msg=options.message,okBtnText=options.okText?options.okText:"确定",closeBtnText=options.closeText?options.closeText:"取消",showOkBtn=options.showOk?options.showOk:true,showCloseBtn=options.showClose?options.showClose:true,html=['<div class="dl_dialog1">','\t<div class="dl_dialog_wrap">','       <div class="dl_dialog_icoqa"><span>'+msg+"</span></div>",'\t<div class="dl_dialog_btn">',showOkBtn?' <a href="javascript:void(0);" class="dl_btn_grey1" id="btnOk" ><span>'+okBtnText+"</span></a>":"",showCloseBtn?'\t<a href="javascript:void(0);" class="dl_btn_grey1 dl_mglft10 simplemodal-close"  id="btnClse"><span>'+closeBtnText+"</span></a>":"","\t\t<div>","\t</div>","</div>"].join(""),option={containerCss:{backgroundColor:"transparent",borderColor:"transparent",padding:0},onShow:function(){$("#btnOk").unbind();$("#btnOk").click(function(){options.okFn&&options.okFn.apply(this)});options.closeFn&&$("#btnClse").click(function(){options.closeFn&&options.closeFn.apply(this)})}};$.modal(html,option)};BSGlobal.doNavigate=function(step){var url=BSGlobal.detaildata.navigateUrl+"?jid="+BSGlobal.detaildata.jId+"&stepId="+step;if(BSGlobal.detaildata.sId&&BSGlobal.detaildata.sId!="")url+="&sId="+BSGlobal.detaildata.sId;if(BSGlobal.detaildata.source&&BSGlobal.detaildata.source!="")url+="&source="+BSGlobal.detaildata.source;if(BSGlobal.detaildata.pageId&&BSGlobal.detaildata.pageId!="")url+="&pId="+BSGlobal.detaildata.pageId;if(BSGlobal.detaildata.isImport&&BSGlobal.detaildata.isImport!="")url+="&isImport="+BSGlobal.detaildata.isImport;if(BSGlobal.detaildata.idType&&BSGlobal.detaildata.idType!="")url+="&idType="+BSGlobal.detaildata.idType;if(BSGlobal.detaildata.personId&&BSGlobal.detaildata.personId!="")url+="&personId="+BSGlobal.detaildata.personId;if(BSGlobal.detaildata.storeDbId&&BSGlobal.detaildata.storeDbId!="")url+="&storeDbId="+BSGlobal.detaildata.storeDbId;if(BSGlobal.data.formId&&BSGlobal.data.formId!="")url+="&formId="+BSGlobal.data.formId;if(BSGlobal.detaildata.r&&BSGlobal.data.r!="")url+="&r="+BSGlobal.data.r;if(BSGlobal.detaildata.IsApplyEdit)url+="&isApplyEdit="+BSGlobal.data.IsApplyEdit;location.href=url};BSGlobal.navigate=function(step){if(window.valuechanged){var opt={message:"您确定删除这条信息吗？操作将不可恢复",okText:"继续填写",closeText:"不保存",okFn:function(){$.modal.close()},closeFn:function(){$.modal.close();BSGlobal.doNavigate(step)}};BSGlobal.showDialog(opt)}else BSGlobal.doNavigate(step)};BSGlobal.resumeDetailPage.prototype={initPage:function(){function checkNum(){var selectVal=$("#RecruitmentPortalPersonProfile_CertificateType").val(),that=$("input[name=RecruitmentPortalPersonProfile_CertificateNumber]");if(that.val()){num=that.val().replace(/\s/g,"");selectVal==1&&num.length>0&&$.ajax({type:"post",url:"/Portal/Resume/CheckIdentityCardNumber",data:{icn:num},success:function(resp){that.parent().find(".new_pop_error").remove();resp.result=="failure"&&that.parent().append("<span for='7612c66c-a23a-40ed-a9dc-46b86036f03f11' class='new_pop_error' style='width:auto;'>"+resp.message+"</span>")},error:function(){}})}}$("input[name=RecruitmentPortalPersonProfile_CertificateNumber]").blur(checkNum);$("#RecruitmentPortalPersonProfile_CertificateType").change(function(){var num=$("input[name=RecruitmentPortalPersonProfile_CertificateNumber]");num.val()&&num.val("");num.parent().find("span.new_pop_error").hide()});this.activityCode();this.phoneNumExtraValid()},activityCode:function(){var hideInput=$("input[name=RecruitmentPortalAttachments_ActivityCode]");hideInput.parent().find("label").css("width","auto");hideInput.hide();var codelist="<div class='code'><a href='javascript:void(0);' class='code_add'>添加</a><ul class='code_list'></ul></div>";hideInput.parent().append(codelist);if(hideInput.val()){var codes=hideInput.val().split(",");$.each(codes,function(key,item){var str="<li><span id='"+item+"'>"+item+"</span><a  href='javascript:void(0);' class='code_del'>删除</a></li>";$(".code_list").append(str)})}$(".code_del").live("click",function(){var code=$(this).prev().attr("id"),codes=hideInput.val().split(",");$(this).parent().remove();codes.splice($.inArray(code,codes),1);hideInput.val(codes.join(","))});$(".code_add").live("click",function(){var msg="123",okBtnText="确定",closeBtnText="取消",showOkBtn=true,showCloseBtn=true,title=$("input[name=RecruitmentPortalAttachments_ActivityCode]").prev().text();title=title.substring(0,title.length-1);var html=['<div class="dl_dialog1 code_dialog">','\t<div class="dl_dialog_wrap">','<div class="code_title">添加'+title+'</div>       <div class="code_type_outer"><input type="text" class="code_type" placeholder="请输入'+title+'"/></div>','<span class="new_pop_error code_error_pop" ></span>','\t<div class="dl_dialog_btn code_dialog_btn">',showOkBtn?' <a href="javascript:void(0);" class="dl_btn_grey1" id="btnOk" ><span>'+okBtnText+"</span></a>":"",showCloseBtn?'\t<a href="javascript:void(0);" class="dl_btn_grey1 dl_mglft10 simplemodal-close"  id="btnClse"><span>'+closeBtnText+"</span></a>":"","\t\t<div>","\t</div>","</div>"].join(""),option={containerCss:{backgroundColor:"transparent",borderColor:"transparent",padding:0},onShow:function(){$("#btnOk").unbind();$("#btnOk").click(function(){var num=$(".code_type").val().replace(/\s/g,""),node=$("span.code_error_pop");node.css("visibility","hidden");if(num.length>0){if(/\s/.test($.trim($(".code_type").val()))){node.css("visibility","inherit");node.text(title+"格式不正确");return}$.ajax({type:"get",url:"/Portal/Resume/CheckActivityCode",data:{newcode:num,allcodes:hideInput.val()},success:function(resp){if(resp.result=="failure"){node.css("visibility","inherit");if(resp.errorcode==1)node.text("输入"+title+"错误");else node.text(title+"已存在")}else{$.modal.close();var str="<li><span id='"+num+"'>"+num+"</span><a  href='javascript:void(0);' class='code_del'>删除</a></li>";$(".code_list").append(str);var codes=hideInput.val();if(hideInput.val().replace(/\s/g,"").length>0)codes=codes.split(",");else codes=[];codes.push(num);hideInput.val(codes.join(","))}},error:function(){}})}else{node.css("visibility","inherit");node.text(title+"不能为空")}});$("#btnClse").click(function(){})}};$.modal(html,option);$(".code_dialog ").parents("#simplemodal-container").css("width","auto")})},phoneNumExtraValid:function(){var phoneInput=$("input[name=RecruitmentPortalPersonProfile_Mobile]"),sel='<select id="phoneTypeSel"><option value="chn">大陆手机号</option><option value="global">非大陆手机号</option></select>';if(!parseInt(phoneInput.val())||!/\d{0,13}/.test(parseInt(phoneInput.val())))if(phoneInput.val()=="")sel='<select id="phoneTypeSel"><option value="chn">大陆手机号</option><option value="global">非大陆手机号</option></select>';else sel='<select id="phoneTypeSel"><option value="chn">大陆手机号</option><option value="global" selected>非大陆手机号</option></select>';var defaultRule=phoneInput.rules();phoneInput.before(sel);if(phoneInput.val()!=""&&!parseInt(phoneInput.val())||!/\d{0,13}/.test(parseInt(phoneInput.val())))phoneInput.rules("remove");else{phoneInput.rules("remove");phoneInput.rules("add",defaultRule)}var paramMap={},param=location.search.substring(1).split("&");for(i=0;i<param.length;i++){var temp=param[i].split("="),key=temp[0],val=temp[1];paramMap[key]=val}if(paramMap.IsApplyEdit=="True")$("#phoneTypeSel").prop("disabled",true).css("background","#EBEBE4");else $("#phoneTypeSel").change(function(){var val=$(this).val();phoneInput.val("");if(val=="global")phoneInput.rules("remove");else if(val=="chn"){phoneInput.rules("remove");phoneInput.rules("add",defaultRule)}})}}})</script>
<script type="text/javascript">
    $(function () {
        BSGlobal.detaildata = {
            r: 'detail.html?620025245',
            jId: '620025245',
            sId: '0',
            pageId: '',
            source: '',
            pageId: '',
            isImport: '1',
            idType: '0',
            personId: '',
            storeDbId: '',
            formId: '',
            navigateUrl: '/Portal/Resume/ResumeItem',
            IsApplyEdit: false
        };
        BSGlobal.resumeDetai = new BSGlobal.resumeDetailPage("CmsPortal", BSGlobal.detaildata);

        if (BSGlobal.detaildata.idType > 0)
        //                $("input[name=RecruitmentPortalPersonProfile_email]").attr("disabled", "disabled");
            $("input[name=RecruitmentPortalPersonProfile_email]").prop('readonly', true).css('background-color', '#ebebe4');
        $("input[name=RecruitmentPortalPersonProfile_email]").attr("value", $("input[name=RecruitmentPortalPersonProfile_email]").val());
    });
</script>
<script type="text/javascript">

    $(document).ready(function(){


        if( window.location.host.toLowerCase() == 'pecc.zhiye.com' ){

            var certificateType = $("#RecruitmentPortalPersonProfile_CertificateType");
            if( certificateType.length ){
                //先选择option是为了使用所选option的验证规则
                certificateType.val('1');
                $.each(certificateType.find('option'), function( state, child ){

                    if( $(child).val() != "1" ) $(child).remove()
                });
            }

            var phone = $("#phoneTypeSel");
            if( phone.length ){
                phone.val("chn");
                $.each( phone.find('option'), function( state, child ){

                    if( $(child).val() != "chn" ) $(child).remove()
                });
            }
        }
    });

</script>
<script language="javascript" type="text/javascript">

    function SetCss() {
        var win = window.location.href;
        if (win.indexOf("Apply") != -1) {
            $("#myapply a").addClass("current");
        }
        else if (win.indexOf("ResumeItem") != -1) {
            $("#myresume a").addClass("current");
        }
        else if (win.indexOf("EditPwd") != -1) {
            $("#changepwd a").addClass("current");
        }
    }
    SetCss();

    $(function () {

        setInterval(function () {
            try {
                DrawImage($("#logoImg"), '350', '80');
            } catch (e) {
            }
        }, 100);
    });

    function DrawImage(ImgD, FitWidth, FitHeight) {
        var image = new Image();

        image.src = $(ImgD).attr("src");

        if (image.width > 0 && image.height > 0) {
            if (image.width / image.height >= FitWidth / FitHeight) {
                if (image.width > FitWidth) {
                    $(ImgD).css("width", FitWidth);
                    $(ImgD).css("height", (image.height * FitWidth) / image.width);
                } else {
                    $(ImgD).css("width", image.width);
                    $(ImgD).css("height", image.height);
                }
            } else {
                if (image.height > FitHeight) {
                    $(ImgD).css("height", FitHeight);
                    $(ImgD).css("width", (image.width * FitHeight) / image.height);
                } else {
                    $(ImgD).css("width", image.width);
                    $(ImgD).css("height", image.height);
                }
            }
            $(ImgD).show();
        }
    }
</script>
</body>
</html>