<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>职位申请 - 2个人履历</title>
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
                            <li class="profile" onclick="BSGlobal.navigate(1);" style="cursor: pointer;"><a href="javascript:void(0);" onclick="BSGlobal.navigate(1);"><span class="dl_grey3">2个人履历</span></a></li>
                            <li class="greyarrow"></li>
                            <li class="greysubmit" onclick="BSGlobal.navigate(4);" style="cursor: pointer;"><a href="javascript:void(0);" onclick="BSGlobal.navigate(4);"><span class="dl_grey2">3预览/提交</span></a></li>
                        </ul> </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div>
            <style type="text/css">
                .redBorder,.form_container li textarea.redBorder,
                .form_part li input.redBorder{border: red 1px solid;}
                .eduinfo .form_container span.preview_text {
                    width:450px;
                }
                .eduinfo .form_container span.start_date {
                    width:80px;
                }
                .eduinfo .form_container span.end_date {
                    width:70px;
                }
            </style>
            <div class="dl_bacwrap dl_new_error_wrap">
                <div class="mainwrap">
                    <h3 class="dl_bigtit"> <span class="dl_postit">个人履历</span> <span class="dl_padl20">请在执行下一步前将必填项填写完毕并保存</span> </h3>
                    <br />
                    <div class="dl_educationwrap mainContainer">
                        <a name="教育背景"></a>
                        <div class="dl_greyline_bg">
                            <span class="dl_menutit "><span style="color:red;">*</span>教育背景</span>
                            <span class="dl_padl20 errmsg new_pop_error" id="errorMsg_7" style="display: none;"></span>
                        </div>
                        <div class="dl_basicborder">
<!--                            表单提示-->
                            <form method="post"  enctype="multipart/form-data" action="?r=resume/two_add" >
                                <div class="eduhistory_drmmbnew pos_realitive">
                                    <div class="dl_delupd blue deletelink_edrmmb pos_absolute dl_right0" style="width: 150px;">
                                        <span class="floatright"><a name="delItem" href="javascript:void(0)">删除</a> <a name="editItem" href="javascript:void(0)" class="dl_mglft10">编辑</a></span>
                                    </div>
                                    <div id="resumeitems" class="eduinfo rightcontent_edrmmb">
                                        <div class="form_container" id="RecruitmentPortal.Education">
                                            <h2 class="form_title"> <strong>教育背景</strong> <span class="tab"></span> </h2>
                                            <div class="form_part">
                                                <div class="form_part_container columnone">
                                                    <ul>
                                                        <li><label class="current">学校名称：</label> <input type="text" name="school_name" value="" /> <span class="desc">请从大学以来的教育经历开始填写.</span></li>
                                                    </ul>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="form_part">
                                                <div class="form_part_container columnone">
<ul>
    <li> <label class="current"> 时间：</label>
        <input type="text" name="year" style="width: 50px;"> <span class="txt">年</span>
        <input type="text" name="month" style="width: 50px;"> <span class="txt">月</span> <input type="text" name="day" style="width: 50px;"><span class="txt">日</span> <span class="txt"></li>
</ul>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="form_part">
                                                <div class="form_part_container columnone">
                    <ul>
                        <li><label class="current label_required">专业名称：</label> <input  name="major_name"  value="" /> </li>
                        <li><label class="current label_required">学历：</label>
                            <select name="xueli"  class="mul_select">
                                <option value="0">请选择</option>
                                <option value="高中及以下">高中及以下</option>
                                <option value="中技（中专/技校/职高）">中技（中专/技校/职高）</option>
                                <option value="大专">大专</option>
                                <option value="本科">本科</option>
                                <option value="硕士研究生">硕士研究生</option>
                                <option value="MBA">MBA</option>
                                <option value="博士研究生">博士研究生</option>
                             </select>
                        </li>
                        <li><label class="current label_required">学位：</label>
                        <select name="degree" class="mul_select">
                            <option value="0">请选择</option>
                            <option value="学士">学士</option>
                            <option value="双学士">双学士</option>
                            <option value="硕士">硕士</option>
                            <option value="MBA">MBA</option>
                            <option value="博士">博士</option>
                        </select>
                        </li>
                    </ul>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dl_borderdashed"></div>
                        </div>
                        <input type="hidden" class="viewName" value="0" />

                    </div>
                    <div class="dl_educationwrap mainContainer">
                        <a name="工作经验"></a>
                        <div class="dl_greyline_bg">
                            <span class="dl_menutit "><span style="color:red;">*</span>工作经验</span>
                            <span class="dl_padl20 errmsg new_pop_error" id="errorMsg_6" style="display: none;"></span>
                        </div>
                        <div class="dl_basicborder" >
                                <div class="eduhistory_drmmbnew pos_realitive">
                                    <div id="resumeitems" class="eduinfo rightcontent_edrmmb">
                                        <div class="form_container" id="RecruitmentPortal.Experience">
                                            <h2 class="form_title"> <strong>工作经验</strong> <span class="tab"></span> </h2>
                                            <div class="form_part">
                                                <div class="form_part_container columnone">
                                                    <ul>
                                                        <li>
                                                            <label class="current label_required">单位名称：</label>
                                                            <input name="unit_name" value="" />
                                                        </li>
                                                        <li>
                                                            <label class="current label_required">职位名称：</label>
                                                            <input  name="position_name"  value="" /> </li>
                                                    </ul>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="form_part">
                                                <div class="form_part_container columnone">
                                                    <ul>
                                                        <li> <label class="current"> 工作时间：</label>
                                                            <input type="text" name="class_time" style="width: 50px;">
                                                            <span class="txt">年</span><span class="txt">(工作时间)</span>
                                                            <span class="txt"></li>
                                                    </ul>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <div class="form_part">
                                                <div class="form_part_container columnone">
                                                    <ul>
                                                        <li><label class="current label_required">工作职责：</label>
                                                            <textarea class="textarea mul_textarea" rows="6" name="duty" cols="60"></textarea>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dl_borderdashed"></div>
                        </div>
                        <input type="hidden" class="viewName" value="0" />
                    </div>
                    <div class="dl_educationwrap mainContainer">
                        <a name="语言能力"></a>
                        <div class="dl_greyline_bg">
                            <span class="dl_menutit ">语言能力</span>
                            <span class="dl_padl20 errmsg new_pop_error" id="errorMsg_4" style="display: none;"></span>
                        </div>

                                                <div class="form_part_container columnone">
                                                    <ul>
                                                        <li>
                                                            <label>语言类型：</label>
                                                            <select name="langage" class="dropdownlist mul_select">
                                                                <option value="">请选择</option>
                                                                <option value="1" title="英语">英语</option>
                                                                <option value="2" title="日语">日语</option>
                                                                <option value="3" title="韩语">韩语</option>
                                                                <option value="4" title="法语">法语</option>
                                                                <option value="5" title="德语">德语</option>
                                                                <option value="6" title="西班牙语">西班牙语</option>
                                                                <option value="7" title="意大利语">意大利语</option>
                                                                <option value="8" title="阿拉伯语">阿拉伯语</option>
                                                                <option value="9" title="俄语">俄语</option>
                                                                <option value="0" title="其他">其他</option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label>掌握程度：</label>
                                                            <select name="master" class="dropdownlist mul_select">
                                                                <option value="">请选择</option>
                                                                <option value="1" title="入门">入门</option>
                                                                <option value="2" title="熟练">熟练</option>
                                                                <option value="3" title="精通">精通</option>
                                                                <option value="4" title="母语">母语</option>
                                                            </select>
                                                        </li>
                                                    </ul>
                                                </div>
                        <div class="dl_cen_txt dl_htline32 dl_padt15">
                            <span class="dl_btn_lev dl_ft14_grey dl_padr10"><a name="btnPre" href="?r=resume/index"><b>上一步</b></a></span>
                             <span  class="dl_btn_grey1"><input type="submit" value="保存并下一步"></span>
                        </div>
                            </form>
                        </div>

                    </div>
                    <div class="dl_bd_btm"></div>

                    <div class="error_show" style="text-align: center; padding-top: 10px; display: none">
                        <span class="new_pop_error" style="width: auto; font-weight: bold">部分内容未填写完整，请完善。</span>
                    </div>
                </div>
            </div>
            <script type="text/javascript">$(function(){var currentFunName=null,funContext={};BSGlobal.pt=function(pro,data){this.pro=pro||"beisen";this.data=data||{};this.init=function(){this.initPage()};this.init.apply(this,arguments)};BSGlobal.pt.prototype={initPage:function(){this.initControls();this.btnBindEvent();this.dataBtnBindEvent()},initControls:function(currForm){var that=this;function SaveOtherLangValue(){var currOtherValue="";$("li > select[name='Part0OtherLang1']").each(function(i,e){var lang=$(e).val();if(lang!=""){var lev=$(e).parent().next("li").find("select[name='Part0Level1']").val();currOtherValue+=lang+":"+lev+";"}});$("#otherLang").val(currOtherValue.substring(0,currOtherValue.length-1));return $("#otherLang").val()}function changeValue(elem,json,fn){if(elem.get(0).tagName.toLowerCase()=="input"){var idValue=elem.next().val();if(idValue)idValue=$.trim(idValue);if(idValue=="0"){elem.val("");return false}var newJson=json,LocName=BasSelect_getTextsByCodes(newJson,idValue);LocName!=null&&elem.val(LocName)}else if(elem.get(0).tagName.toLowerCase()=="select"){for(var i=0;i<json.length;i++)$("<option value='"+json[i][0]+"'>"+json[i][1]+"</option>").appendTo(elem);var otherLangHid=$("form").find("input[type='hidden'][id='otherLang']");if(otherLangHid.length==1){var otherLangRequired=otherLangHid.attr("isRequire").toLowerCase()=="true";if(otherLangRequired&&BSGlobal.data.langConstCount>=4)fn();else!otherLangRequired&&BSGlobal.data.langConstCount>=2&&fn()}}}function AddConstHandler(o,fn){var modelId=o.attr("id")+Math.random().toString().replace(/^0\./,"");o.attr("id",modelId+"_txt");o.next().attr("id",modelId);var funName="set"+modelId+"Json",constname=o.attr("constname"),displayName=o.attr("displayname"),constName=o.attr("constname");funContext[funName]={textModelId:modelId+"_txt",modelId:modelId,constName:constname,displayName:displayName};window[funName]=function(data){if(BSGlobal.data.langConstCount==undefined)BSGlobal.data.langConstCount=1;changeValue(o,data,fn);BSGlobal.data.langConstCount+=1;var context=funContext[currentFunName];if(context.constName.toLowerCase()=="areas")$("#"+context.textModelId).basSelect({valHost:"#"+context.modelId,type:"radio",data:"NewAjson",title:context.displayName,map:{text:"v",id:"k",children:"c"}});else BasSelect(context.textModelId,context.modelId,"A","radio",window[context.constName],context.displayName,"",20,10,0,1,"","","")};if(o.get(0).tagName.toLowerCase()=="input")addHandler(modelId+"_txt","click",function(){currentFunName=funName;if(window[constname])window[setFunName](window[constname]);else{var constJs=document.createElement("script");constJs.type="text/javascript";constJs.src="http://const.tms.beisen.com/ConstData.svc/Const/"+constName+"?callback="+setFunName;constJs.id=funName;constJs.name=funName;var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(constJs,s)}});else o.get(0).tagName.toLowerCase()=="select";var setFunName="set"+constname;if(!window[setFunName])window[setFunName]=function(data){if(!window[constname])window[constname]=data;window[currentFunName](data)}}function InitConstData(currForm){currForm.find("input").each(function(){var constname=$(this).attr("constname");constname&&AddConstHandler($(this))})}if(currForm)InitConstData(currForm);else $("form").each(function(){InitConstData($(this))});function getSaveBtn(){return'<a name="btnSave" class="dl_btn_grey3" href="javascript:void(0)"><span>保存</span></a>'}function getBtnContainer(){return'<span class="floatright"></span>'}function getOperateArea(){return'<div class="dl_delupd blue deletelink_edrmmb pos_absolute dl_right0" style="width:150px"></div>'}function getEditBtn(){return'<a name="editItem" href="javascript:void(0)" class="dl_mglft10">编辑</a>'}function getDelBtn(){return'<a name="delItem" href="javascript:void(0)">删除</a>'}function getCancelBtn(){return'<a name="cancelItem" class="dl_btn_grey3" href="javascript:void(0)"><span>取消</span></a>'}function BuildOperateBtnsOptional(form,addEdit,addDel,addSave,addCancel){form.find(".deletelink_edrmmb").remove();var operateDiv=$(getOperateArea()),btnContainer=$(getBtnContainer());operateDiv.insertBefore(form.find("div[id='resumeitems']"));operateDiv.append(btnContainer);if(addDel){var delBtn=getDelBtn();btnContainer.append(delBtn)}if(addEdit){var editBtn=getEditBtn();btnContainer.append(editBtn)}addCancel&&btnContainer.append($(getCancelBtn()));addSave&&btnContainer.append($(getSaveBtn()))}$('a[name="btnSave"]').unbind();$('a[name="btnSave"]').click(function(){var saveBtn=$(this).parent(),form=$(this).parentsUntil("form").parent();if(!isFormValid(form)){that.scrollFormError(form);return}var metaName=form.find("div[class='form_container']").attr("id"),main=$(this).parents(".mainContainer"),viewName=main.find("input[class='viewName']").val();metaName.toLowerCase()==BSGlobal.data.langObjName.toLowerCase()&&SaveOtherLangValue();var pdata=GetFormData(form);if(pdata.length==0){window.location.reload();return}$.ajaxSetup({async:false});$.post(BSGlobal.data.saveUrl,pdata,function(data){if(data.result!="success")return;var items=form.find("div[id='resumeitems']"),mId=items.find("input[name='mId'][type='hidden']").val(),oId=data.OId;items.find("input[name='oId']").val(oId);var saveResult=data;$.post(BSGlobal.data.editUrl,{mId:mId,viewName:viewName,oId:oId,isShowControl:false},function(data){if(data.result=="success"){initForm(form,data.newId);var toRender=$(data.render),resumeItems=form.find("div[id='resumeitems']"),objItem=resumeItems.find("div[class='form_container']"),showDel=metaName.toLowerCase()==BSGlobal.data.langObjName.toLowerCase()?false:true;BuildOperateBtnsOptional(form,true,showDel,false);toRender.insertAfter(objItem);objItem.remove();var toDeleteObj=resumeItems.find("input[name='_objectDataID'],input[name='_metaObjName'],input[name='_viewName'],input[name='_metaObjID'],input[name='_version']");toDeleteObj.remove();that.initControls(form);window.valuechanged=false;main.find("span[class*='errmsg']").html("").hide()}})})});$('a[name="addItem"]').unbind();$('a[name="addItem"]').click(function(){var main=$(this).parents(".mainContainer");if(main.find("form").length>=20){alert("已达最大个数，不允许继续添加");return}var addLinkPart=$(this).parent(),firstForm=main.find("form").first();firstForm.find("span[class='new_pop_error']").remove();var form=$("<form>"+firstForm.html()+"</form>");form.attr("method",firstForm.attr("method"));form.attr("enctype",firstForm.attr("enctype"));form.find("div[class='righttitle_edrmmb']").remove();form.find(".deletelink_edrmmb").remove();var resumeItems=form.find("div[id='resumeitems']");resumeItems.find("input[name='objectDataID'],input[name='metaObjName'],input[name='viewName'],input[name='metaObjID']").remove();resumeItems.find("input[name='oId']").val("");var mId=form.find("input[name='mId']").val(),oId="",token=String(mId)+String(main.find("form").length+1),viewName=main.find("input[class='viewName']").val();$.post(BSGlobal.data.editUrl,{mId:mId,viewName:viewName,oId:oId,isShowControl:true,token:token},function(data){if(data.result=="success"){initForm(form,data.newId);var toRender=$(data.render),resumeItems=form.find("div[id='resumeitems']"),objItem=resumeItems.find("div[class='form_container']");toRender.insertAfter(objItem);objItem.remove();BuildOperateBtnsOptional(form,false,false,true,true);form.insertBefore(addLinkPart);appendScript(data.script,form);that.initControls(form);main.find("span[class*='errmsg']").html("").hide();main.find("a[name='cancelItem']").attr("isAdd","1");that.addFormErrBorder(form)}})});$("a[name='editItem']").unbind();$("a[name='editItem']").click(function(){var form=$(this).parentsUntil("form").parent(),main=$(this).parents(".mainContainer"),oId=form.find("input[name='oId']").val(),viewName=main.find("input[class='viewName']").val(),items=form.find("div[id='resumeitems']"),mId=items.find("input[name='mId'][type='hidden']").val(),metaName=form.find("div[class='form_container']").attr("id"),editUrl=BSGlobal.data.editUrl;$.post(editUrl,{mId:mId,viewName:viewName,oId:oId,isShowControl:true},function(data){if(data.result=="success"){initForm(form,data.newId);var toRender=$(data.render),objItem=form.find("div[id='resumeitems']").find("div[class='form_container']");toRender.insertAfter(objItem);objItem.remove();var showDelBtn=metaName.toLowerCase()==BSGlobal.data.langObjName.toLowerCase()?false:true;BuildOperateBtnsOptional(form,false,false,true,true);appendScript(data.script,form);that.initControls(form);that.addFormErrBorder(form)}})});$("a[name='cancelItem']").unbind();$("a[name='cancelItem']").click(function(){var form=$(this).parentsUntil("form").parent(),items=form.find("div[id='resumeitems']"),mId=items.find("input[name='mId'][type='hidden']").val(),oId=form.find("input[name='oId']").val();items.find("input[name='oId']").val(oId);var main=$(this).parents(".mainContainer"),viewName=main.find("input[class='viewName']").val(),metaName=form.find("div[class='form_container']").attr("id"),removeForm=function(){var title=form.find("div[class='righttitle_edrmmb']").clone();title.length!=0&&form.nextAll("form").first().prepend(title.get(0));form.detach()};if(main.find("a[name='cancelItem']").attr("isAdd")=="1")removeForm();else $.post(BSGlobal.data.editUrl,{mId:mId,viewName:viewName,oId:oId,isShowControl:false},function(data){if(data.result=="success"){initForm(form,data.newId);var toRender=$(data.render),resumeItems=form.find("div[id='resumeitems']"),objItem=resumeItems.find("div[class='form_container']"),showDel=metaName.toLowerCase()==BSGlobal.data.langObjName.toLowerCase()?false:true;BuildOperateBtnsOptional(form,true,showDel,false);toRender.insertAfter(objItem);objItem.remove();var toDeleteObj=resumeItems.find("input[name='_objectDataID'],input[name='_metaObjName'],input[name='_viewName'],input[name='_metaObjID'],input[name='_version']");toDeleteObj.remove();that.initControls(form);main.find("span[class*='errmsg']").html("").hide();window.valuechanged=false}})});$("a[name='delItem']").unbind();$("a[name='delItem']").click(function(){var sourceEle=this,opt={message:"您确定删除这条信息吗？操作将不可恢复",okFn:function(){var form=$(sourceEle).parentsUntil("form").parent(),oId=form.find("input[name='oId']").val(),items=form.find("div[id='resumeitems']"),mId=items.find("input[name='mId'][type='hidden']").val(),main=$(sourceEle).parents(".mainContainer");main.find("span[class*='errmsg']").html("").hide();var removeForm=function(){var title=form.find("div[class='righttitle_edrmmb']").clone();title.length!=0&&form.nextAll("form").first().prepend(title.get(0));form.detach()};if(oId!="")$.post(BSGlobal.data.delUrl,{mId:mId,oId:oId,jId:BSGlobal.data.jId,formCount:$("form").length},function(data){if(data.result=="success"){removeForm();$.modal.close();$("form").length==0&&location.reload()}});else{removeForm();$.modal.close();$("form").length==0&&location.reload()}}};that.showDialog(opt)});$('a[name="btnNext"]').unbind();$('a[name="btnNext"]').click(function(){var formIsValidate=true;$(".mainContainer").each(function(){var forms=$(this).find("form"),count=forms.length;forms.each(function(){var formName=$(this).attr("name");if(count==1&&formName.indexOf("emptyFrom")!=-1){if(!isFormValid($(this))){formIsValidate=false;$(this).parents(".mainContainer").find("span[class*='errmsg']").html("必填项未完善").show()}}else if(count>1&&formName.indexOf("emptyFrom")==-1)if($(this).find("input[name='_metaObjID']").length>0){$(this).parents(".mainContainer").find("span[class*='errmsg']").html("请先保存").show();formIsValidate=false}})});if(!formIsValidate){that.scrollModelError();$(".error_show").show();return}var url=BSGlobal.data.redirectUrl+"?stepId="+BSGlobal.data.nextStep+"&jId="+BSGlobal.data.jId;if(BSGlobal.data.sId&&BSGlobal.data.sId!="")url+="&sId="+BSGlobal.data.sId;if(BSGlobal.data.source&&BSGlobal.data.source!="")url+="&source="+BSGlobal.data.source;if(BSGlobal.data.pageId&&BSGlobal.data.pageId!="")url+="&pId="+BSGlobal.data.pageId;if(BSGlobal.data.isImport&&BSGlobal.data.isImport!="")url+="&isImport="+BSGlobal.data.isImport;if(BSGlobal.data.idType&&BSGlobal.data.idType!="")url+="&idType="+BSGlobal.data.idType;if(BSGlobal.data.personId&&BSGlobal.data.personId!="")url+="&personId="+BSGlobal.data.personId;if(BSGlobal.data.storeDbId&&BSGlobal.data.storeDbId!="")url+="&storeDbId="+BSGlobal.data.storeDbId;if(BSGlobal.data.formId&&BSGlobal.data.formId!="")url+="&formId="+BSGlobal.data.formId;if(BSGlobal.data.r&&BSGlobal.data.r!="")url+="&r="+BSGlobal.data.r;if(BSGlobal.detaildata.IsApplyEdit)url+="&isApplyEdit="+BSGlobal.data.IsApplyEdit;location.href=url});$('a[name="btnPre"]').unbind();$('a[name="btnPre"]').click(function(){var url=BSGlobal.data.redirectUrl+"?stepId="+BSGlobal.data.preStep+"&jId="+BSGlobal.data.jId;if(BSGlobal.data.sId&&BSGlobal.data.sId!="")url+="&sId="+BSGlobal.data.sId;if(BSGlobal.data.source&&BSGlobal.data.source!="")url+="&source="+BSGlobal.data.source;if(BSGlobal.data.pageId&&BSGlobal.data.pageId!="")url+="&pId="+BSGlobal.data.pageId;if(BSGlobal.data.isImport&&BSGlobal.data.isImport!="")url+="&isImport="+BSGlobal.data.isImport;if(BSGlobal.data.idType&&BSGlobal.data.idType!="")url+="&idType="+BSGlobal.data.idType;if(BSGlobal.data.personId&&BSGlobal.data.personId!="")url+="&personId="+BSGlobal.data.personId;if(BSGlobal.data.storeDbId&&BSGlobal.data.storeDbId!="")url+="&storeDbId="+BSGlobal.data.storeDbId;if(BSGlobal.data.formId&&BSGlobal.data.formId!="")url+="&formId="+BSGlobal.data.formId;if(BSGlobal.data.r&&BSGlobal.data.r!="")url+="&r="+BSGlobal.data.r;if(BSGlobal.detaildata.IsApplyEdit)url+="&isApplyEdit="+BSGlobal.data.IsApplyEdit;location.href=url});function initForm(form,newId){form.attr("id",newId);form.attr("name",newId)}function isFormValid(form){for(var cancelFields=[["RecruitmentPortalEducation_HasAward","AwardTime"],["RecruitmentPortalEducation_HasSocialPractice","PracticeDateTime"],["RecruitmentPortalEducation_IsStudentCadre","CadreDateTime"]],els=[],i=0;i<cancelFields.length;i++){var isAreaShowEl=form.find("input[type='radio'][name='"+cancelFields[i][0]+"']");if($(isAreaShowEl[1]).prop("checked")){var currLi=isAreaShowEl.parentsUntil("ul"),toDetach=currLi.nextAll().detach();els.push({li:currLi,toDetach:toDetach})}}var validator=form.validate();validator.settings.errorPlacement=function(error,element){if($(element).nextAll().length>0)$(error).insertAfter($(element).nextAll().last());else $(error).insertAfter($(element))};var result=validator.form();if(!result)for(var j=0;j<els.length;j++){var li=els[j].li,toDetach=els[j].toDetach;toDetach.insertAfter(li)}return result}function appendScript(script){if(script==undefined||script=="")return;script=script.replace('<script type="text/javascript">',"").replace("<\/script>","");eval(script)}function GetFormData(jqueryForm){var pdata=jqueryForm.serializeArray();try{if(pdata.length<=0){var form=jqueryForm.get(0),els=form.getElementsByTagName("*");pdata=[];for(var i=0;i<els.length;i++){var element=els[i],tagName=element.tagName.toLowerCase(),elType=element.getAttribute("type"),elName=element.getAttribute("name");if(elName!=""&&(tagName=="input"||tagName=="textarea"||tagName=="select"))(elType!="radio"||elType=="radio"&&element.checked)&&pdata.push({name:element.getAttribute("name"),value:element.value})}}}catch(e){}return pdata}},btnBindEvent:function(){var that=this;$(window).scroll(function(){var topPx=$(window).scrollTop()+"px";$("#menubar").animate({top:topPx},{duration:0,queue:false})});$(".tab").each(function(){$(this).addClass("toclose");$(this).click(function(){var state=$(this).attr("class");if(state.indexOf("toclose")>0){$(this).parent().nextAll().hide("normal");$(this).removeClass("toclose");$(this).addClass("toopen")}else if(state.indexOf("toopen")){$(this).parent().nextAll().show("normal");$(this).removeClass("toopen");$(this).addClass("toclose")}})});$("#menubar a").click(function(){$("#menubar a").removeClass("current");$(this).addClass("current")});$(".applyResume").click(function(){if(BSGlobal.data.myJobApplyCount>0)$.dialog({id:"repeatpost",title:"提示",content:'<div class="alertcontent importalert">您已经申请过此职位，是否继续申请？</div><div class="buttonline_drmmb"><a class="smallcmdbutton" onclick="myApplyResume()"><span>确定</span></a><a class="smallcmdbutton" onclick="$.dialog.get(\'repeatpost\').close()"><span>取消</span></a></div>',lock:true,width:450,height:100});else myApplyResume()});uploadFiles("IDPhoto");uploadFiles("Photo");uploadFiles("Resume");function getDelLink(fieldName){return"<a name='del"+fieldName+"' class='deletefile'>删除</a>"}function bintDelLink(fieldName,delLink){delLink.click(function(){delLink.parent().html("");$("#"+fieldName).val("")})}function uploadFiles(fieldName){if($("#"+fieldName).length>0){var uploadName="photo";if(fieldName=="Resume")uploadName="attachFile";else if(fieldName=="IDPhoto")uploadName="IDPhoto";if($("span[name='"+fieldName+"_Info']").find("a").html()!=""){var delLink=getDelLink(fieldName);$("span[name='"+fieldName+"_Info']").append(delLink);bintDelLink(fieldName,$("span[name='"+fieldName+"_Info']").find("a[name='del"+fieldName+"']"))}var fileUpload=new AjaxUpload("#upload"+fieldName,{action:BSGlobal.data.uploadUrl,name:uploadName,responseType:"json",autoSubmit:true,onComplete:function(file,data){$("span[name='"+fieldName+"_Error']").html("");if(data.result=="success"){$("#"+fieldName).val(data.upAddress);var delLink=getDelLink(fieldName),fileLink="<a target='_blank' href='"+data.link+"'>"+data.fileName+"</a>"+delLink;$("span[name='"+fieldName+"_Info']").html(fileLink);bintDelLink(fieldName,$("span[name='"+fieldName+"_Info']").find("a[name='del"+fieldName+"']"));$("span[name='"+fieldName+"_Error']").hide();$("span[name='"+fieldName+"_Error']").parent("li").find("span[class*='desc']").show()}else{var errorMsg="";if(data.isSizeAllowed.toString()=="false")errorMsg+="格式错误";if(data.isTypeAllowed.toString()=="false")errorMsg+="格式错误";var errorSpan=$("span[name='"+fieldName+"_Error']");errorSpan.html(errorMsg);errorSpan.show();errorSpan.parent("li").find("span[class*='desc']").hide()}},onChange:function(){},onSubmit:function(file,ext){if(!(ext&&/^(jpg|jpeg|gif|bmp|png)$/gi.test(ext)&&fieldName!="Resume"))if(!(ext&&/^(docx|html|htm|txt|doc|pdf)$/gi.test(ext))){var errorSpan=$("span[name='"+fieldName+"_Error']");errorSpan.show();errorSpan.html("格式错误");errorSpan.parent("li").find("span[class*='desc']").hide();return false}}})}}window.cancelApply=function(){$.dialog.get("applyDialogPop").close()};that.bindChangedEvent()},showDialog:function(options){var msg=options.message,okBtnText=options.okText?options.okText:"确定",closeBtnText=options.closeText?options.closeText:"取消",showOkBtn=options.showOk?options.showOk:true,showCloseBtn=options.showClose?options.showClose:true,html=['<div class="dl_dialog1">','\t<div class="dl_dialog_wrap">','       <div class="dl_dialog_icoqa"><span>'+msg+"</span></div>",'\t<div class="dl_dialog_btn">',showOkBtn?' <a href="javascript:void(0);" class="dl_btn_grey1" id="btnOk" ><span>'+okBtnText+"</span></a>":"",showCloseBtn?'\t<a href="javascript:void(0);" class="dl_btn_grey1 dl_mglft10 simplemodal-close"  id="btnClse"><span>'+closeBtnText+"</span></a>":"","\t\t<div>","\t</div>","</div>"].join(""),option={containerCss:{backgroundColor:"transparent",borderColor:"transparent",padding:0},onShow:function(){$("#btnOk").unbind();$("#btnOk").click(function(){options.okFn&&options.okFn.apply(this)});options.closeFn&&$("#btnClse").click(function(){options.closeFn&&options.closeFn.apply(this)})}};$.modal(html,option)},bindChangedEvent:function(){},dataBtnBindEvent:function(){},scrollModelError:function(){var errSpanArr=[],index=0;$("span.errmsg:visible").each(function(){var errspan=$(this);if(errspan.html()!=undefined&&errspan.html()!=""&&errspan.html()!=null){if(index==0)if(errspan.length>0){var reltop=errspan[0].getBoundingClientRect().top,scrollTop=Math.max(document.documentElement.scrollTop,document.body.scrollTop);document.body.scrollTop=scrollTop+reltop-100;document.documentElement.scrollTop=scrollTop+reltop-100}index++}})},addFormErrBorder:function(form){$(form).find("input,textarea,select").focus(function(){$(this).hasClass("redBorder")&&$(this).removeClass("redBorder");$(this).removeClass("new_pop_error")}).blur(function(){$(this).parent().find("span.new_pop_error:visible").length>0&&$(this).addClass("redBorder")})},scrollFormError:function(form){var self=this,index=0;$(form).find("span.new_pop_error").each(function(){var sele=$(this);if(sele.is(":visible")){if(index==0)if(sele&&sele.length>0){var reltop=sele[0].getBoundingClientRect().top,scrollTop=Math.max(document.documentElement.scrollTop,document.body.scrollTop);document.body.scrollTop=scrollTop+reltop-100;document.documentElement.scrollTop=scrollTop+reltop-100}index++}self.setBorder(sele.parent().children(),sele)})},setBorder:function(targets,errorSpan){targets&&targets.length>0&&targets.each(function(){var target=$(this);if(target.is("input")&&target.attr("type")!="checkbox"&&target.attr("type")!="radio"||target.is("select")||target.is("textarea"))if(errorSpan.is(":visible"))target.addClass("redBorder");else{target.removeClass("redBorder");target.removeClass("new_pop_error")}})}}})</script>
            <script type="text/javascript">
                $(function () {
                    BSGlobal.data = {
                        r: 'detail.html?620025245',
                        jId: '620025245',
                        sId: '0',
                        source: '',
                        myJobApplyCount: '0',
                        viewName: 'ResumeExperience',
                        redirectUrl: '/Portal/Resume/ResumeItem',
                        editUrl: '/Portal/Resume/RenderSingleItem',
                        saveUrl: '/Portal/Resume/SaveResumeItem',
                        uploadUrl: '/Portal/Resume/UploadAttach',
                        saveLangUrl: '/Portal/Resume/SaveOhterLang',
                        delUrl: '/Portal/Resume/DelResumeItem',
                        delAttachUrl: '/Portal/Resume/DeleteUploadFile',
                        pageId: '',
                        idType: '0',
                        personId: '',
                        storeDbId: '',
                        formId: '',
                        isImport: '1',
                        langObjName: 'Lang',
                        nextStep: '4',
                        preStep: '0',
                        IsApplyEdit: false
                    };
                    BSGlobal.page = new BSGlobal.pt("CmsPortal", BSGlobal.data);
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
<script type="text/javascript">(function(){var formName='emptyFrom_7';var formIndexID='71011';$.validator.setDefaults({ignore:''});$.validator.messages.maxlength=$.validator.format("长度不能超过{0}");$("#emptyFrom_7").validate({rules:{'RecruitmentPortalEducation_SchoolName':{required:true,'RecruitmentPortalEducation_SchoolName_CmsResumeLength100_1386761665':true},'RecruitmentPortalEducation_StartDate':{required:true},'RecruitmentPortalEducation_EndDate':{required:true},'RecruitmentPortalEducation_MajorName':{required:true,'RecruitmentPortalEducation_MajorName_CmsLengthMix30_1386761665':true},'RecruitmentPortalEducation_EducationLevel':{required:true},'RecruitmentPortalEducation_Degree':{required:true}}});$("#308aced9-d820-4c82-9a5d-4d0637ad2c387101171011").schoolSelector({data:window.schoolData,limit:1,position:"middle",imageUrl:"http://stnew.beisen.com/2013.08.26.002/cmsportal/skin/images/sp_btn_2.png"});$("#"+formName+" input[name=RecruitmentPortalEducation_EndDate]").rules("remove");new dateControl(formName,"RecruitmentPortalEducation_StartDate","RecruitmentPortalEducation_EndDate","RecruitmentPortalEducation_EndDate").init();$("#"+formName+" input[name=RecruitmentPortalEducation_EndDate]").rules("add",{"RecruitmentPortalEducation_EndDate_dtVal":true});jQuery.validator.addMethod("RecruitmentPortalEducation_SchoolName_CmsResumeLength100_1386761665",function(v,e){return (v.length<=100)},"限100个字符");jQuery.validator.addMethod("RecruitmentPortalEducation_MajorName_CmsLengthMix30_1386761665",function(v,e){return (v.length<=30)},"限30个字符");})();</script>
<script type="text/javascript">(function(){var formName='emptyFrom_6';var formIndexID='61011';$.validator.setDefaults({ignore:''});$.validator.messages.maxlength=$.validator.format("长度不能超过{0}");$("#emptyFrom_6").validate({rules:{'RecruitmentPortalExperience_CompanyName':{required:true,'RecruitmentPortalExperience_CompanyName_CmsResumeLength100_333543967':true},'RecruitmentPortalExperience_JobTitle':{required:true,'RecruitmentPortalExperience_JobTitle_CmsResumeLength100_333543967':true},'RecruitmentPortalExperience_StartDate':{required:true},'RecruitmentPortalExperience_EndDate':{required:true},'RecruitmentPortalExperience_JobDuty':{required:true,'RecruitmentPortalExperience_JobDuty_CmsLength4000_333543967':true}}});$("#"+formName+" input[name=RecruitmentPortalExperience_EndDate]").rules("remove");new dateControl(formName,"RecruitmentPortalExperience_StartDate","RecruitmentPortalExperience_EndDate","RecruitmentPortalExperience_EndDate").init();$("#"+formName+" input[name=RecruitmentPortalExperience_EndDate]").rules("add",{"RecruitmentPortalExperience_EndDate_dtVal":true});jQuery.validator.addMethod("RecruitmentPortalExperience_CompanyName_CmsResumeLength100_333543967",function(v,e){return (v.length<=100)},"限100个字符");jQuery.validator.addMethod("RecruitmentPortalExperience_JobTitle_CmsResumeLength100_333543967",function(v,e){return (v.length<=100)},"限100个字符");jQuery.validator.addMethod("RecruitmentPortalExperience_JobDuty_CmsLength4000_333543967",function(v,e){return (v.length<=4000)},"限4000个字符");})();</script>
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