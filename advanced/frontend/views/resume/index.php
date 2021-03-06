<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>职位申请 - 基本信息</title>
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
    <script type="text/javascript" src="jobs/js/require.js"></script>
    <!--引用静态文jobs/件:skin_default-->
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
    <link href="jobs/css/front.css" rel="stylesheet" type="text/css" />
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
    <script type="text/javascript" id="user-info-header">


        var makeUserInfo = function (resp) {
            var self = this;
            var userInfoKey = 'userInfo';
            self[userInfoKey] = {};
            self[userInfoKey].name = resp.Model.Email;
            self[userInfoKey].shortName = (self[userInfoKey].name && self[userInfoKey].name.length > 20) ? self[userInfoKey].name.substring(0, 20) : self[userInfoKey].name;
            self[userInfoKey].isLogin = resp.Success;
            self[userInfoKey].firstLogin = resp.Model.ThFirstLogin;
            return self[userInfoKey]
        }

        $.ajax({
            url: 'ajax.php?v=' + Math.random()
            , data: {}
            , async: false
            , type: 'post'
            , success: function (resp) {
                //配置用户基本信息
                makeUserInfo.apply(window, [resp]);
            }//success
            , error: function () {
                throw new Error('ERROR: get user info')
            }
        });//ajax

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
                <img id="logoImg" class="header-logo-img" src="jobs/images/104003_medias_20141215_20141215logo.jpg?v=635542641034400000" style="width: 300px;height:80px;display: none;" />
            </div>
            <div class="dl_rightit">
                <?php
                if(!Yii::$app->user->isGuest) {
                ?>
                <div class="isApplyDetail" >
                    <div class="isLogin" >
                        <span id="topUserEmail" class="pad3" title=""><span class="userShortName"></span>，欢迎您！</span>
                        <span class="pad3"><a href="index.html">招聘首页</a></span>
                        <em class="dl_header_line dl_padtb05">|</em>
                        <span class="isUserCenter" style="display:none"> <span class="pad3"><a href="member_apply.html">个人中心</a></span> <em class="dl_header_line dl_padtb05">|</em> </span>
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
                            <li class="basic" onclick="BSGlobal.navigate(0);" style="cursor: pointer;"><a href="javascript:void(0);" onclick="BSGlobal.navigate(0);"><span class="dl_grey3">1基本信息</span></a></li>
                            <li class="greyarrow"></li>
                            <li class="greyprofile" onclick="BSGlobal.navigate(1);" style="cursor: pointer;"><a href="javascript:void(0);" onclick="BSGlobal.navigate(1);"><span class="dl_grey2">2个人履历</span></a></li>
                            <li class="greyarrow"></li>
                            <li class="greysubmit" onclick="BSGlobal.navigate(4);" style="cursor: pointer;"><a href="javascript:void(0);" onclick="BSGlobal.navigate(4);"><span class="dl_grey2">3预览/提交</span></a></li>
                        </ul> </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div>
            <style type="text/css">
                *html .dl_myleftform .form_container{ width: 490px;overflow: hidden}
                *html .dl_myleftform .form_container .form_part .columntwo ul{ width: 360px;overflow: hidden;}
                *html .dl_myleftform .form_container ul li{ width: 360px;overflow: hidden}
                /* .dl_myleftform .form_container li label{width: 100px}*/
                *html .dl_myleftform .form_container ul li span.preview_text{ width: 220px;overflow: hidden;}
                *html .dl_myleftform .form_container ul li textarea.textarea{ width: 200px;}
                *html .form_container li span.desc
                {

                    margin-right:-3px;
                    position:relative;
                }
                .redBorder,.form_container li textarea.redBorder,
                .form_part li input.redBorder{border: red 1px solid;}

            </style>
            <div class="dl_bacwrap dl_new_error_wrap">
                <div class="mainwrap">
                    <br />
                    <h3 class="dl_bigtit"> <span class="dl_postit">基本信息</span> <span class="dl_padl20"></span> </h3>
                    <br />
                    <a name="个人信息"></a>
                    <div class="dl_greyline_bg">
                        <span class="dl_menutit">个人信息</span>
                    </div>
                    <form method="post" id="2f52aafc-b9fa-4bdb-bb6b-c987c18e1775" name="2f52aafc-b9fa-4bdb-bb6b-c987c18e1775" class="formPart" enctype="multipart/form-data" action="/Portal/Resume/ResumeItem">
                        <div class="clearfix">
                            <div class="dl_myleftform">
                                <input type="hidden" name="oId" id="Hidden1" value="" />
                                <input type="hidden" name="jId" id="Hidden4" value="620025245" />
                                <input type="hidden" name="mId" id="Hidden5" value="0" />
                                <input type="hidden" name="stepId" id="Hidden2" value="1" />
                                <input type="hidden" name="_metaObjID" value="NDc0NjFhMzktMTg2My00YzM3LTlmOTgtY2ZkN2UyOTFlNmQ0LDhiYzYzYjNlLWQ2M2QtNDE2Yi04YzFmLTk5MDcyMjgyZWUzZg==" />
                                <input type="hidden" name="_objectDataID" value="NDc0NjFhMzktMTg2My00YzM3LTlmOTgtY2ZkN2UyOTFlNmQ0JCw4YmM2M2IzZS1kNjNkLTQxNmItOGMxZi05OTA3MjI4MmVlM2Yk" />
                                <input name="_viewName" type="hidden" value="UGVyc29uUHJvZmlsZVZpZXc=" />
                                <input name="_version" type="hidden" value="MA==" />
                                <input name="_formIndex" type="hidden" value="1" />
                                <div class="form_container" id="RecruitmentPortal.PersonProfile">
                                    <h2 class="form_title"> <strong>个人信息</strong> <span class="tab"></span> </h2>
                                    <div class="form_part">
                                        <div class="form_part_container columnone">
                                            <ul>
                                                <li><label class="current label_required">姓名：</label> <input class="{required:true,messages:&quot;请填写姓名&quot;} mul_input" name="RecruitmentPortalPersonProfile_Name" id="4c037148-140a-4c2b-b87a-b97609215d7011" value="" /> <span class="desc"></span> </li>
                                                <li><label class="current label_required">性别：</label>
                                                    <div class="radio_list">
                                                        <input type="radio" name="RecruitmentPortalPersonProfile_gender" value="0" />
                                                        <label class="radio_label">男</label>
                                                        <input type="radio" name="RecruitmentPortalPersonProfile_gender" value="1" />
                                                        <label class="radio_label">女</label>
                                                    </div> </li>
                                                <li><label class="current label_required">出生日期：</label> <input class="mul_input Wdate" name="RecruitmentPortalPersonProfile_Birthday" id="436ab7a4-67a1-4819-a238-d5d34eb0717611" value="" /> <span class="desc"></span> </li>
                                                <li><label class="current label_required">邮箱：</label> <input class="{required:true,messages:&quot;请填写邮箱&quot;} mul_input" name="RecruitmentPortalPersonProfile_email" id="67a5c587-4f90-4ae7-819f-eb3dba9ea39911" value="" /> <span class="desc"></span> </li>
                                                <li><label class="current label_required">手机号：</label> <input class="{required:true,messages:'请填写手机号'} mul_input " name="RecruitmentPortalPersonProfile_Mobile" id="acb9b67f-9643-41fb-a7fe-5ff8d742ccdf11" value="" /> </li>
                                            </ul>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="form_part">
                                        <div class="form_part_container columnone">
                                            <ul>
                                                <li><label class="current label_required">工作年限：</label> <select name="RecruitmentPortalPersonProfile_YearsOfWork" id="RecruitmentPortalPersonProfile_YearsOfWork" class="mul_select"> <option value="">请选择</option> <option value="99">在读学生</option> <option value="98">应届毕业生</option> <option value="1">1年</option> <option value="2">2年</option> <option value="3">3年</option> <option value="4">4年</option> <option value="5">5年</option> <option value="6">6年</option> <option value="7">7年</option> <option value="8">8年</option> <option value="9">9年</option> <option value="10">10年及以上</option> </select> </li>
                                                <li><label>证件照：</label> <input type="hidden" name="RecruitmentPortalPersonProfile_IDPhoto" id="c71310e0-0bef-4173-9826-21a572d4943d11" value="" /> <span><a class="uploadfile" id="c71310e0-0bef-4173-9826-21a572d4943d11_btn">上传</a></span> <span class="desc uploaddesc">推荐1寸照片尺寸，70x100象素。支持jpg，jpeg, gif，bmp或png格式，大小不超过512k</span>
                                                    <ul id="c71310e0-0bef-4173-9826-21a572d4943d11_info" class="uploadfilescontainer" style="margin-left:70px;">
                                                    </ul> </li>
                                            </ul>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <div id="imgContainer" class="dl_myrightfile" style="display: none;">
                                <img id="idPhoto" style="width:120px;height:140px;" src="jobs/images/upfile.jpg" />
                                <br />
                                <a class="blue" id="idPhotoUploadBtn" href="###">上传照片</a>
                                <span id="idPhotoerrinfo" class="new_pop_error" style="display:none;"></span>
                                <ul id="idPhotowarninfo" class="warninfo">
                                </ul>
                            </div>
                        </div>
                    </form>
                    <a name="求职意向"></a>
                    <div class="dl_greyline_bg">
                        <span class="dl_menutit">求职意向</span>
                    </div>
                    <form method="post" id="0738c88a-d372-4401-a39d-782141723d86" name="0738c88a-d372-4401-a39d-782141723d86" class="formPart" enctype="multipart/form-data" action="/Portal/Resume/ResumeItem">
                        <div class="clearfix">
                            <div class="dl_myleftform">
                                <input type="hidden" name="oId" id="Hidden1" value="" />
                                <input type="hidden" name="jId" id="Hidden4" value="620025245" />
                                <input type="hidden" name="mId" id="Hidden5" value="1" />
                                <input type="hidden" name="stepId" id="Hidden2" value="1" />
                                <input name="_viewName" type="hidden" value="T2JqZWN0aXZlVmlldw==" />
                                <input name="_version" type="hidden" value="MA==" />
                                <input name="_formIndex" type="hidden" value="12" />
                                <div class="form_container" id="RecruitmentPortal.Objective">
                                    <h2 class="form_title"> <strong>求职意向</strong> <span class="tab"></span> </h2>
                                    <div class="form_part">
                                        <div class="form_part_container columnone">
                                            <ul>
                                                <li><label>现从事行业：</label> <input class="mul_input industry" name="RecruitmentPortalObjective_EngagedIndustry_txt" value="" /> <input type="hidden" value="" id="ef3f9faf-97c6-432b-9c6b-0b0b66c5c4271212" name="RecruitmentPortalObjective_EngagedIndustry" /> </li>
                                                <li><label>现从事职业：</label> <input class="mul_input industry" name="RecruitmentPortalObjective_EngagedIndustry_txt" value="" /> <input type="hidden" value="" id="ef3f9faf-97c6-432b-9c6b-0b0b66c5c4271212" name="RecruitmentPortalObjective_EngagedIndustry" /> </li>
                                                <li><label>现工作城市：</label> <input class="mul_input industry" name="RecruitmentPortalObjective_EngagedIndustry_txt" value="" /> <input type="hidden" value="" id="ef3f9faf-97c6-432b-9c6b-0b0b66c5c4271212" name="RecruitmentPortalObjective_EngagedIndustry" /> </li>
                                                <li><label>现月薪(税前)：</label> <select name="RecruitmentPortalObjective_CurrSalary" id="RecruitmentPortalObjective_CurrSalary" class="mul_select"> <option value="">请选择</option> <option value="1">1000以下</option> <option value="2">1000～2000</option> <option value="3">2001～4000</option> <option value="4">4001～6000</option> <option value="5">6001～8000</option> <option value="6">8001～10000</option> <option value="7">10001～15000</option> <option value="8">15001～25000</option> <option value="9">25000以上</option> <option value="10">面议</option> </select> </li>
                                                <li><label>期望从事行业：</label> <input class="mul_input industry" name="RecruitmentPortalObjective_EngagedIndustry_txt" value="" /> <input type="hidden" value="" id="ef3f9faf-97c6-432b-9c6b-0b0b66c5c4271212" name="RecruitmentPortalObjective_EngagedIndustry" /> </li>
                                                <li><label>期望从事职业：</label> <input class="mul_input industry" name="RecruitmentPortalObjective_EngagedIndustry_txt" value="" /> <input type="hidden" value="" id="ef3f9faf-97c6-432b-9c6b-0b0b66c5c4271212" name="RecruitmentPortalObjective_EngagedIndustry" /> </li>
                                                <li><label>期望工作城市：</label> <input class="mul_input industry" name="RecruitmentPortalObjective_EngagedIndustry_txt" value="" /> <input type="hidden" value="" id="ef3f9faf-97c6-432b-9c6b-0b0b66c5c4271212" name="RecruitmentPortalObjective_EngagedIndustry" /> </li>
                                                <li><label>期望月薪(税前)：</label> <select name="RecruitmentPortalObjective_ExpectSalary" id="RecruitmentPortalObjective_ExpectSalary" class="mul_select"> <option value="">请选择</option> <option value="1">1000以下</option> <option value="2">1000～2000</option> <option value="3">2001～4000</option> <option value="4">4001～6000</option> <option value="5">6001～8000</option> <option value="6">8001～10000</option> <option value="7">10001～15000</option> <option value="8">15001～25000</option> <option value="9">25000以上</option> <option value="10">面议</option> </select> </li>
                                                <li><label>到岗时间：</label> <select name="RecruitmentPortalObjective_EntrantDate" id="RecruitmentPortalObjective_EntrantDate" class="mul_select"> <option value="">请选择</option> <option value="1">一周内</option> <option value="2">一个月内</option> <option value="3">三个月内</option> <option value="4">三个月以上</option> <option value="5">面议</option> </select> </li>
                                            </ul>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="dl_bd_btm"></div>
                    <div class="dl_subbtn dl_htline32">
                        <span class="dl_btn_lev dl_ft14_grey dl_padr10"><a name="btnCancel" href="#this"><b>取消</b></a></span>
                        <a name="btnSave" href="?r=resume/two" class="dl_btn_grey1"><span>保存并下一步</span></a>
                    </div>
                    <div class="error_show" style="text-align:center;padding-top:10px;display:none">
                        <span class="new_pop_error" style="width:auto;font-weight:bold">部分内容未填写完整，请完善。</span>
                    </div>
                </div>
            </div>
            <script type="text/javascript">$(function(){var idPhotoId="c71310e0-0bef-4173-9826-21a572d4943d11",currentFunName=null,funContext={};BSGlobal.pt=function(pro,data){this.pro=pro||"beisen";this.data=data||{};this.init=function(){this.initPage()};this.init.apply(this,arguments)};BSGlobal.pt.prototype={initPage:function(){this.setUserEmail();this.moveIdPhoto();this.initControls();this.btnBindEvent();this.dataBtnBindEvent();this.addFormErrBorder();this.disableInputWhenEdit()},disableInputWhenEdit:function(){BSGlobal.data.IsApplyEdit&&$("input[name='RecruitmentPortalPersonProfile_Name'],input[name='RecruitmentPortalPersonProfile_email'],input[name='RecruitmentPortalPersonProfile_Mobile']").prop("disabled","disabled")},setUserEmail:function(){var email=$("#topUserEmail").attr("title"),reg=/^([0-9a-zA-Z]([-\.\w]*[0-9a-zA-Z]))*@[A-Za-z0-9_\.-]+[A-Za-z0-9_][A-Za-z0-9_]$/;if(reg.test(email))if($("input[name='RecruitmentPortalPersonProfile_email']").length>0){var emailInput=$("input[name='RecruitmentPortalPersonProfile_email']");(!emailInput.val()||emailInput.val()=="")&&$("input[name='RecruitmentPortalPersonProfile_email']").val(email)}},moveIdPhoto:function(){var idPhotoField=$("#"+idPhotoId);if(idPhotoField.length>0){$("#imgContainer").is(":hidden")&&$("#imgContainer").show();var that=this;idPhotoField.parents("li").hide();that.setIdPhoto();setInterval(function(){try{that.setIdPhoto()}catch(e){}},1e3);var info=$(".uploaddesc").html();info&&$("#idPhotowarninfo").html(info)}else $("#imgContainer").hide()},setIdPhoto:function(){try{var that=this,img=$("#"+idPhotoId+"_info");if(img.length>0)if(img.find(".fileuploadname a").length>0){$("#idPhotoerrinfo").html("").hide();var imgUrl=$(".fileuploadname a").attr("href");if(imgUrl){imgUrl=$("#"+idPhotoId).val();imgUrl=that.data.fileUrl+"?dfsPath="+imgUrl.replace(":","%3A").replace("/","%2F");var imgSrc=$("#idPhoto").attr("src");imgUrl!=imgSrc&&$("#idPhoto").attr("src",imgUrl)}}else if($("span[for='"+idPhotoId+"']").length>0)$("#idPhotoerrinfo").html($("span[for='"+idPhotoId+"']").html()).show();else img.html()!=null&&$.trim(img.html())!=""&&$("#idPhotoerrinfo").html(img.html()).show()}catch(e){}},initControls:function(currForm){var that=this;function changeValue(elem,json,fn){if(elem.get(0).tagName.toLowerCase()=="input"){var idValue=elem.next().val();if(idValue)idValue=$.trim(idValue);if(idValue=="0"){elem.val("");return false}var newJson=json,LocName=BasSelect_getTextsByCodes(newJson,idValue);LocName!=null&&elem.val(LocName)}else if(elem.get(0).tagName.toLowerCase()=="select"){for(var i=0;i<json.length;i++)$("<option value='"+json[i][0]+"'>"+json[i][1]+"</option>").appendTo(elem);var otherLangHid=$("form").find("input[type='hidden'][id='otherLang']");if(otherLangHid.length==1){var otherLangRequired=otherLangHid.attr("isRequire").toLowerCase()=="true";if(otherLangRequired&&BSGlobal.data.langConstCount>=4)fn();else!otherLangRequired&&BSGlobal.data.langConstCount>=2&&fn()}}}function AddConstHandler(o,fn){var modelId=o.attr("id")+Math.random().toString().replace(/^0\./,"");o.attr("id",modelId+"_txt");o.next().attr("id",modelId);var funName="set"+modelId+"Json",constname=o.attr("constname"),displayName=o.attr("displayname"),constName=o.attr("constname");funContext[funName]={textModelId:modelId+"_txt",modelId:modelId,constName:constname,displayName:displayName};window[funName]=function(data){if(BSGlobal.data.langConstCount==undefined)BSGlobal.data.langConstCount=1;changeValue(o,data,fn);BSGlobal.data.langConstCount+=1;var context=funContext[currentFunName];if(context.constName.toLowerCase()=="areas")$("#"+context.textModelId).basSelect({valHost:"#"+context.modelId,type:"radio",data:"NewAjson",title:context.displayName,map:{text:"v",id:"k",children:"c"}});else BasSelect(context.textModelId,context.modelId,"A","radio",window[context.constName],context.displayName,"",20,10,0,1,"","","")};if(o.get(0).tagName.toLowerCase()=="input")addHandler(modelId+"_txt","click",function(){currentFunName=funName;if(window[constname])window[setFunName](window[constname]);else{var constJs=document.createElement("script");constJs.type="text/javascript";constJs.src="http://const.tms.beisen.com/ConstData.svc/Const/"+constName+"?callback="+setFunName;constJs.id=funName;constJs.name=funName;var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(constJs,s)}});else o.get(0).tagName.toLowerCase()=="select";var setFunName="set"+constname;if(!window[setFunName])window[setFunName]=function(data){if(!window[constname])window[constname]=data;window[currentFunName](data)}}function InitConstData(currForm){currForm.find("input").each(function(){var constname=$(this).attr("constname");constname&&AddConstHandler($(this))});currForm.find("select[name='WorkState']").find("option[value='3']").remove()}if(currForm)InitConstData(currForm);else $("form").each(function(){InitConstData($(this))});$('a[name="btnSave"]').unbind();$('a[name="btnSave"]').click(function(){var formIsValidate=true,formCount=0;$("form").each(function(){formCount++;if(!isFormValid($(this)))formIsValidate=false});if(!formIsValidate){$(".error_show").show();that.scrollByError();if($("#stationId").val()==""){$("#stationId").addClass("redBorder");$(".stationError").show();$(".error_show").show();return}return}else if($("#stationId").val()==""){$("#stationId").addClass("redBorder");$(".stationError").show();$(".error_show").show();return}$("#stationId").length!=0&&$.post("/Portal/Apply/ChangeStation",{stationId:$("#stationId option:selected").val(),stationName:$("#stationId option:selected").text(),jobAdId:BSGlobal.data.jId},function(){console.log("ChangeStationOK")});var postData=[];$("form").each(function(i,e){for(var form=$(e),pdata=GetFormData(form),k=0;k<pdata.length;k++)postData.push(pdata[k])});if(postData.length==0){window.location.reload();return}$.ajaxSetup({async:false});function goNext(){$.post(BSGlobal.data.saveUrl,postData,function(data){if(data.result!="success")return;var url=BSGlobal.data.redirectUrl+"?stepId="+BSGlobal.data.nextStep+"&jId="+BSGlobal.data.jId;if(BSGlobal.data.sId&&BSGlobal.data.sId!="")url+="&sId="+BSGlobal.data.sId;if(BSGlobal.data.source&&BSGlobal.data.source!="")url+="&source="+BSGlobal.data.source;if(BSGlobal.data.pageId&&BSGlobal.data.pageId!="")url+="&pId="+BSGlobal.data.pageId;if(BSGlobal.data.isImport&&BSGlobal.data.isImport!="")url+="&isImport="+BSGlobal.data.isImport;if(BSGlobal.data.idType&&BSGlobal.data.idType!="")url+="&idType="+BSGlobal.data.idType;if(BSGlobal.data.personId&&BSGlobal.data.personId!="")url+="&personId="+BSGlobal.data.personId;if(BSGlobal.data.storeDbId&&BSGlobal.data.storeDbId!="")url+="&storeDbId="+BSGlobal.data.storeDbId;if(BSGlobal.data.formId&&BSGlobal.data.formId!="")url+="&formId="+BSGlobal.data.formId;if(BSGlobal.data.r&&BSGlobal.data.r!="")url+="&r="+BSGlobal.data.r;if(BSGlobal.detaildata.IsApplyEdit)url+="&isApplyEdit="+BSGlobal.data.IsApplyEdit;location.href=url})}var selectVal=$("#RecruitmentPortalPersonProfile_CertificateType").val(),numObj=$("input[name=RecruitmentPortalPersonProfile_CertificateNumber]");if(selectVal==1&&numObj.val()){num=numObj.val().replace(/\s/g,"");num.length>0&&$.ajax({type:"post",url:"/Portal/Resume/CheckIdentityCardNumber",data:{icn:num},success:function(resp){numObj.parent().find(".new_pop_error").remove();if(resp.result=="failure"){numObj.parent().append("<span for='7612c66c-a23a-40ed-a9dc-46b86036f03f11' class='new_pop_error' style='width:auto;'>"+resp.message+"</span>");return false}else goNext()},error:function(){}})}else goNext()});window[""+idPhotoId+"_upload"]=new AjaxUpload($("#idPhotoUploadBtn"),{action:"/Multitenant/Handler/FileUploadHandler",name:"myfile",responseType:"json",isJsonpRequest:true,onSubmit:function(file,ext){if(!ext){alert("文件不能为空");return false}var flag=true,msg="文件格式不正确";if(!/^$|^(.*?\.)?(jpg|png|jpeg|gif|bmp)$/i.test(ext)){flag=false;msg="仅限512K以内jpg、png、jpeg、gif、bmp格式图片"}if(flag){this.disable();this.setData({domain:document.domain,callback:"window['"+idPhotoId+"_upload']._settings.onJsonpCallBack",size:"512"});return true}else{alert(msg);return false}},onJsonpCallBack:function(r){window[""+idPhotoId+"_upload"].enable();if(r.Status){$("#"+idPhotoId).val(r.Path);$("#"+idPhotoId+"_info").html('<span class="fileuploadname"><a href="'+r.ClientUrl+'" target="_blank">'+r.Name+'</a></span><a href="javascript:;" onclick="window[\''+idPhotoId+"_upload']._settings.del('"+r.Path+"')\">删除</a>")}else $("#"+idPhotoId+"_info").html(r.Msg)},del:function(){$("#"+idPhotoId).val("");$("#"+idPhotoId+"_info").html("")}});$('a[name="btnCancel"]').unbind();$('a[name="btnCancel"]').click(function(){if(BSGlobal.data.pageId&&BSGlobal.data.pageId!=""){if(BSGlobal.data.pageId=="2")location.href=BSGlobal.data.myCollectUrl;else if(BSGlobal.data.pageId=="1")location.href=BSGlobal.data.myApplyUrl}else if(BSGlobal.data.r&&BSGlobal.data.r!="")location.href=BSGlobal.data.r;else location.href=BSGlobal.data.zpDetailUrl});function isFormValid(form){for(var cancelFields=[["RecruitmentPortalEducation_HasAward","AwardTime"],["RecruitmentPortalEducation_HasSocialPractice","PracticeDateTime"],["RecruitmentPortalEducation_IsStudentCadre","CadreDateTime"]],els=[],i=0;i<cancelFields.length;i++){var isAreaShowEl=form.find("input[type='radio'][name='"+cancelFields[i][0]+"']");if($(isAreaShowEl[1]).prop("checked")){var currLi=isAreaShowEl.parentsUntil("ul"),toDetach=currLi.nextAll().detach();els.push({li:currLi,toDetach:toDetach})}}var validator=form.validate();validator.settings.errorPlacement=function(error,element){if($(element).nextAll().length>0)$(error).insertAfter($(element).nextAll().last());else $(error).insertAfter($(element))};var result=validator.form();if(!result)for(var j=0;j<els.length;j++){var li=els[j].li,toDetach=els[j].toDetach;toDetach.insertAfter(li)}return result}function GetFormData(jqueryForm){var pdata=jqueryForm.serializeArray();try{if(pdata.length<=0){var form=jqueryForm.get(0),els=form.getElementsByTagName("*");pdata=[];for(var i=0;i<els.length;i++){var element=els[i],tagName=element.tagName.toLowerCase(),elType=element.getAttribute("type"),elName=element.getAttribute("name");if(elName!=""&&(tagName=="input"||tagName=="textarea"||tagName=="select"))(elType!="radio"||elType=="radio"&&element.checked)&&pdata.push({name:element.getAttribute("name"),value:element.value})}}}catch(e){}return pdata}},btnBindEvent:function(){var that=this;that.bindChangedEvent();uploadFiles("IDPhoto");function getDelLink(fieldName){return"<a name='del"+fieldName+"' class='deletefile'>删除</a>"}function bintDelLink(fieldName,delLink){delLink.click(function(){delLink.parent().html("");$("#"+fieldName).val("")})}function uploadFiles(fieldName){if($("#"+fieldName).length>0){var uploadName="photo";if(fieldName=="Resume")uploadName="attachFile";else if(fieldName=="IDPhoto")uploadName="IDPhoto";if($("span[name='"+fieldName+"_Info']").find("a").html()!=""){var delLink=getDelLink(fieldName);$("span[name='"+fieldName+"_Info']").append(delLink);bintDelLink(fieldName,$("span[name='"+fieldName+"_Info']").find("a[name='del"+fieldName+"']"))}var fileUpload=new AjaxUpload("#upload"+fieldName,{action:BSGlobal.data.uploadUrl,name:uploadName,responseType:"json",autoSubmit:true,onComplete:function(file,data){$("span[name='"+fieldName+"_Error']").html("");if(data.result=="success"){$("#"+fieldName).val(data.upAddress);var delLink=getDelLink(fieldName),fileLink="<a target='_blank' href='"+data.link+"'>"+data.fileName+"</a>"+delLink;$("span[name='"+fieldName+"_Info']").html(fileLink);bintDelLink(fieldName,$("span[name='"+fieldName+"_Info']").find("a[name='del"+fieldName+"']"));$("span[name='"+fieldName+"_Error']").hide();$("span[name='"+fieldName+"_Error']").parent("li").find("span[class*='desc']").show()}else{var errorMsg="";if(data.isSizeAllowed.toString()=="false")errorMsg+="格式错误";if(data.isTypeAllowed.toString()=="false")errorMsg+="格式错误";var errorSpan=$("span[name='"+fieldName+"_Error']");errorSpan.html(errorMsg);errorSpan.show();errorSpan.parent("li").find("span[class*='desc']").hide()}},onChange:function(){},onSubmit:function(file,ext){if(!(ext&&/^(jpg|jpeg|gif|bmp|png)$/gi.test(ext)&&fieldName!="Resume"))if(!(ext&&/^(docx|html|htm|txt|doc|pdf)$/gi.test(ext))){var errorSpan=$("span[name='"+fieldName+"_Error']");errorSpan.show();errorSpan.html("格式错误");errorSpan.parent("li").find("span[class*='desc']").hide();return false}}})}}window.cancelApply=function(){$.dialog.get("applyDialogPop").close()};window.confirmApply=function(){$.post(BSGlobal.data.applyUrl,{jId:BSGlobal.data.jId,sId:BSGlobal.data.sId,source:BSGlobal.data.source},function(data){$.dialog.parent.postSuccess(data.result,data.isAutoInviteTest)},"json")}},bindChangedEvent:function(){},dataBtnBindEvent:function(){},addFormErrBorder:function(){$("form input,form textarea,form select").focus(function(){$(this).hasClass("redBorder")&&$(this).removeClass("redBorder");$(this).removeClass("new_pop_error")}).blur(function(){$(this).parent().find("span.new_pop_error:visible").length>0&&$(this).addClass("redBorder")})},scrollByError:function(){var self=this;self.setIdPhoto();var index=0;$("form span.new_pop_error").each(function(){var sele=$(this);if(sele.is(":visible")){if(index==0)if(sele&&sele.length>0){var reltop=sele[0].getBoundingClientRect().top,scrollTop=Math.max(document.documentElement.scrollTop,document.body.scrollTop);document.body.scrollTop=scrollTop+reltop-100;document.documentElement.scrollTop=scrollTop+reltop-100}index++}sele.parent().children()&&self.setBorder(sele.parent().children(),sele)})},setBorder:function(targets,errorSpan){targets&&targets.length>0&&targets.each(function(){var target=$(this);if(target.is("input")&&target.attr("type")!="checkbox"&&target.attr("type")!="radio"||target.is("select")||target.is("textarea"))if(errorSpan.is(":visible"))target.addClass("redBorder");else{target.removeClass("redBorder");target.removeClass("new_pop_error")}})}}})</script>
            <script type="text/javascript">
                $(function () {
                    BSGlobal.data = {
                        r: 'detail.html?620025245',
                        jId: '620025245',
                        sId: '0',
                        source: '',
                        myJobApplyCount: '0',
                        viewName: 'ResumePersonProfile',
                        redirectUrl: '/Portal/Resume/ResumeItem',
                        saveUrl: '/Portal/Resume/SaveResumeItems',
                        uploadUrl: '/Portal/Resume/UploadAttach',
                        zpDetailUrl: 'detail.html?620025245',
                        myCollectUrl: 'member_collect.html',
                        myApplyUrl: 'member_apply.html',
                        fileUrl: '/Portal/Resume/ResumePhoto',
                        pageId: '',
                        idType: '0',
                        personId: '',
                        storeDbId: '',
                        formId: '',
                        isImport: '1',
                        nextStep: '1',
                        preStep: '0',
                        IsApplyEdit: false

                    };
                    BSGlobal.page = new BSGlobal.pt("CmsPortal", BSGlobal.data);
                    $("#stationId").change(function() {
                        if ($(this).val() != '') {
                            $("#stationId").removeClass('redBorder');
                            $(".stationError").hide();
                        }
                    });
                });
            </script>
            <!--引用静态文件:dataInitFunc,HangYe,AreaJson,NewAreaJson-->
            <script type="text/javascript"> function setAJson(data){ window.Ajson=data; } function setNewAJson(data){ window.NewAjson=data; } function setMJson(data){ window.Mjson=data; } </script>
            <script type="text/javascript" src="http://const.tms.beisen.com/ConstData.svc/Const/hangye?callback=setMJson"></script>
            <script type="text/javascript" src="http://const.tms.beisen.com/ConstData.svc/Const/Areas?callback=setAJson"></script>
            <script type="text/javascript" src="http://const.tms.beisen.com/Api/Defination/AreaFormat?callback=setNewAJson"></script>
        </div>
        <!--简历内容 e-->
    </div>
    <div class="dl_footer">
        <p>&copy;2015&nbsp;北京大生知行科技有限公司51talk&nbsp;&nbsp;京ICP备05051632号 京公网安备110108002767号 &nbsp;&nbsp;帮助热线：4006506886</p>
    </div>
</div>
<script type="text/javascript">(function(){var formName='2f52aafc-b9fa-4bdb-bb6b-c987c18e1775';var formIndexID='1';$.validator.setDefaults({ignore:''});$.validator.messages.maxlength=$.validator.format("长度不能超过{0}");$("#2f52aafc-b9fa-4bdb-bb6b-c987c18e1775").validate({rules:{'RecruitmentPortalPersonProfile_Name':{required:true,'RecruitmentPortalPersonProfile_Name_CmsLengthMix30_223528458':true},'RecruitmentPortalPersonProfile_gender':{required:true,'RecruitmentPortalPersonProfile_gender_NotEmpty_223528458':true},'RecruitmentPortalPersonProfile_Birthday':{required:true,'RecruitmentPortalPersonProfile_Birthday_DateTimeValidator_223528458':true},'RecruitmentPortalPersonProfile_email':{required:true,'RecruitmentPortalPersonProfile_email_CmsResumeEmail_223528458':true},'RecruitmentPortalPersonProfile_Mobile':{required:true,'RecruitmentPortalPersonProfile_Mobile_CmsResumeCellPhone_223528458':true},'RecruitmentPortalPersonProfile_YearsOfWork':{required:true},'RecruitmentPortalPersonProfile_IDPhoto':{'RecruitmentPortalPersonProfile_IDPhoto_Image_223528458':true}}});jQuery("#436ab7a4-67a1-4819-a238-d5d34eb0717611").click(function(){WdatePicker({dateFmt:"yyyy/MM/dd"})});window['c71310e0-0bef-4173-9826-21a572d4943d11_upload']=new AjaxUpload($('#c71310e0-0bef-4173-9826-21a572d4943d11'+'_btn'),{action:'/Multitenant/Handler/FileUploadHandler',name:'myfile',responseType:'json',isJsonpRequest:true,onSubmit:function(file,ext){if(!ext){alert('文件不能为空');return false}var flag=true,msg='文件格式不正确';if(!/^$|^(.*?\.)?(jpg|png|jpeg|gif|bmp)$/i.test(ext)){flag=false;msg='仅限512K以内jpg、png、jpeg、gif、bmp格式图片'} if(flag){this.disable();this.setData({domain:document.domain,callback:"window['c71310e0-0bef-4173-9826-21a572d4943d11_upload']._settings.onJsonpCallBack",size:'512'});return true}else{alert(msg);return false}},onJsonpCallBack:function(r){window['c71310e0-0bef-4173-9826-21a572d4943d11_upload'].enable();if(r.Status){$('#c71310e0-0bef-4173-9826-21a572d4943d11').val(r.Path);$('#c71310e0-0bef-4173-9826-21a572d4943d11'+'_info').html('<span class="fileuploadname"><a href="'+r.ClientUrl+'" target="_blank">'+r.Name+'</a></span><a href="javascript:;" onclick="window[\'c71310e0-0bef-4173-9826-21a572d4943d11_upload\']._settings.del(\''+r.Path+'\')">删除</a>')}else{$('#c71310e0-0bef-4173-9826-21a572d4943d11'+'_info').html(r.Msg)}},del:function(p){$('#c71310e0-0bef-4173-9826-21a572d4943d11').val('');$('#c71310e0-0bef-4173-9826-21a572d4943d11'+'_info').html('')}});jQuery.validator.addMethod("RecruitmentPortalPersonProfile_Name_CmsLengthMix30_223528458",function(v,e){return (v.length<=30)},"限30个字符");jQuery.validator.addMethod("RecruitmentPortalPersonProfile_gender_NotEmpty_223528458",function(v,e){return v!=''},"输入不允许为空");jQuery.validator.addMethod("RecruitmentPortalPersonProfile_Birthday_DateTimeValidator_223528458",function(v,e){return (/^$|^\d{4}\/\d{1,2}\/\d{1,2}$/gi).test(v)},"日期格式不正确");jQuery.validator.addMethod("RecruitmentPortalPersonProfile_email_CmsResumeEmail_223528458",function(v,e){return (/^$|^([a-zA-Z0-9][_\.\-]*)+\@([A-Za-z0-9])+((\.|-|_)[A-Za-z0-9]+)*((\.[A-Za-z0-9]{2,4}){1,2})$/.test(v)&&v.length<=60)},"格式有误");jQuery.validator.addMethod("RecruitmentPortalPersonProfile_Mobile_CmsResumeCellPhone_223528458",function(v,e){return /^$|^\d{1,13}$/g.test(v.replace(/(^\s*)|(\s*$)/g,""))},"格式有误");jQuery.validator.addMethod("RecruitmentPortalPersonProfile_IDPhoto_Image_223528458",function(v,e){return (/^$|^(.*?\.)?(jpg|png|jpeg|gif|bmp)$/i).test(v)},"仅限512K以内jpg、png、jpeg、gif、bmp格式图片");})();</script>
<script type="text/javascript">(function(){var formName='0738c88a-d372-4401-a39d-782141723d86';var formIndexID='12';$.validator.setDefaults({ignore:''});$.validator.messages.maxlength=$.validator.format("长度不能超过{0}");$("#0738c88a-d372-4401-a39d-782141723d86").validate({rules:{'RecruitmentPortalObjective_ExpectIndustry':{required:true},'RecruitmentPortalObjective_ExpectJobCategory':{required:true},'RecruitmentPortalObjective_ExpectWorkCity':{required:true}}});jQuery("#ef3f9faf-97c6-432b-9c6b-0b0b66c5c4271212"+"_txt").click(function(){BasSelect("ef3f9faf-97c6-432b-9c6b-0b0b66c5c4271212"+"_txt","ef3f9faf-97c6-432b-9c6b-0b0b66c5c4271212","A","radio",window.Mjson,"选择行业","",20,5,0,1,"","","")});jQuery("#e5688d4a-bad3-48fb-842e-0ae7df7036d51212"+"_txt").click(function(){BasSelect("e5688d4a-bad3-48fb-842e-0ae7df7036d51212"+"_txt","e5688d4a-bad3-48fb-842e-0ae7df7036d51212","A","checkbox",window.Mjson,"选择行业","",20,5,0,1,"","","")});$("#bdb0be18-1b30-4001-817e-34807ab4d94b1212"+'_txt').click(function(){
        $(this).basSelect({
            valHost:"#bdb0be18-1b30-4001-817e-34807ab4d94b1212", //this是用来显示的地方，valHost是用来存选中的ID的地方
            type: 'checkbox',
            data: 'NewAjson',
            title: '选择地区',
            max: 10,
            map: {
                text: 'v',
                id: 'k',
                children: 'c'
            }
        });
    });         })();</script>
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