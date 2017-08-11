<!-- <!-- <!-- <!-- <?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>注册</title>

    <!--引用静态文件:skin_default-->
    <link href="jobs/css/common.css" rel="stylesheet" type="text/css" />
    <link href="jobs/css/templateform.css" rel="stylesheet" type="text/css" />
    <link href="jobs/css/controls.css" rel="stylesheet" type="text/css" />
    <link href="jobs/css/default.css" rel="stylesheet" type="text/css" />
    <link href="jobs/css/school-select-v2.css" rel="stylesheet" type="text/css" />
    <!--引用静态文件:skin_new_css-->
    <link href="jobs/css/main.css" rel="stylesheet" type="text/css" />

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
</head>
<body>
<div class="bs_deliver">
    <div class="dl_header_border">
        <div class="dl_header clearfix">
            <div class="dl_logo">
                <img id="logoImg" class="header-logo-img" src="jobs/images/104003_medias_20141215_20141215logo.jpg?v=635542641034400000" style="width: 300px;height:80px;display: none;" />
            </div>
            <div class="dl_rightit">
                <div class="isApplyDetail" style="display:none">
                    <div class="isLogin" style="display:none">
                        <span id="topUserEmail" class="pad3" title=""><span class="userShortName"></span>，欢迎您！</span>
                        <span class="pad3"><a href="index.html">招聘首页</a></span>
                        <em class="dl_header_line dl_padtb05">|</em>
                        <span class="isUserCenter" style="display:none"> <span class="pad3"><a href="member_apply.html">个人中心</a></span> <em class="dl_header_line dl_padtb05">|</em> </span>
                        <span class="pad3"><a href="/Portal/Account/Logout">退出</a></span>
                    </div>
                    <div class="unLogin" style="display:none">
                        <span class="pad3"><a href="index.html">招聘首页</a></span>
                        <em class="dl_header_line dl_padtb05">|</em>
                        <span class="pad3"><a href="/Portal/Account/Login">登录</a></span>
                        <em class="dl_header_line dl_padtb05">|</em>
                        <span class="pad3"><a href="/Portal/Account/Register">注册</a></span>
                    </div>
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
        <div class="dl_content">
            <div class="map">
                <div class="dl_lit-wrap dl_padr30 width553 clearfix">
<!--                    <form id="registForm" method="post" action="/User/Account/Register">-->
<!--                        <input type="hidden" id="returnurl" name="returnurl" value="" />-->
<!--                        <div class="dl_loginleft dl_padr0">-->
<!--                            <h3 class="dl_tit_green">注册</h3>-->
<!--                            <ul class="dl_error_wrap15">-->
<!--                                <li class="clearfix"> <span class="dl_form_left">用户</span> <span class="dl_form_right"> <input type="text" class="logoninput" defaultvalue="请输入电子邮箱" value="请输入电子邮箱" name="UserName" id="UserName" data-val-length="您输入的邮箱长度超过100位" data-val-length-max="100" data-val-regex-pattern="^[a-zA-Z0-9][a-zA-Z0-9\.\-_]*@[a-zA-Z0-9\-_]+(\.[a-zA-Z]+){1,3}$" data-val-regex="邮箱格式不正确" data-val="true" data-val-required="必填" /> <span class="validate" style="display: none;font-size: 12px;margin-left:15px;">邮箱已存在</span> <a href="/Portal/Account/GetPwd" class="validate" style="display: none;font-size: 12px;"><span>&nbsp;找回密码？</span></a> <span class="field-validation-valid bs_pop_alert " data-valmsg-for="UserName" data-valmsg-replace="true"></span> </span> </li>-->
                                <li class="clearfix"> <span class="dl_form_left">密码</span> <span class="dl_form_right"> <input type="password" class="dl_textinp" name="Password" id="Password" info="密码长度6-30，允许英文、数字、特殊字符，区分大小写" data-val-length="您输入的邮箱长度超过30位" data-val-length-max="30" data-val-regex-pattern="^[0-9a-zA-Z`=\[\];,\./~!@#\$%\^&amp;\*\(\)_\+|\{\}:\?]{6,30}$" data-val-regex="您输入的密码不符合规范" data-val="true" data-val-required="必填" /> <span class="field-validation-valid bs_pop_alert " data-valmsg-for="Password" data-valmsg-replace="true"></span> </span> </li>
<!--                                <li class="clearfix"> <span class="dl_form_left">确认密码</span> <span class="dl_form_right"> <input class="dl_textinp" id="ConfirmPassword" name="ConfirmPassword" info="请确保和密码输入一致" type="password" data-val="true" data-val-equalto="两次输入的密码不一致" data-val-equalto-other="*.Password" /> <span class="field-validation-valid bs_pop_alert " data-valmsg-for="ConfirmPassword" data-valmsg-replace="true"></span> </span> </li>-->
<!--                                <li class="clearfix"> <span class="dl_form_left">验证码</span>-->
<!--                                    <div class="validate_content validatecode_info" style="display: inline-block; margin-left: 0px;">-->
<!--                                        <span class="validate_bac" style="display: inline-block;"> <input type="text" class="dl_textinp" name="verifyCode" id="verifyCode" style="width:80px;" data-val-required="必填" data-val="true" data-val-regex-pattern="^[a-zA-Z0-9]{4}$" data-val-regex="验证码格式不正确." /> </span>-->
<!--                                        <img id="imgcode" class="validate_pic" src="" width="90" height="27" style=" vertical-align: top;" />-->
<!--                                        <a class="change_validate" style="font-size: 12px; cursor: pointer">更换</a>-->
<!--                                        <span class="field-validation-valid bs_pop_alert " data-valmsg-for="verifyCode" data-valmsg-replace="true"></span>-->
<!--                                    </div> </li>-->
<!--                            </ul>-->
<!--                            <span class="tishi" style="display:none">请输入正确的用户名和密码</span>-->
<!--                            <input id="proId" type="hidden" newid="False" />-->
<!--                            <div class="next">-->
<!--                                <div class="dl_padl40">-->
<!--                                    <a href="javascript:void(0);" class="dl_btn_green1" id="submitbutton"><span>注册</span></a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </form>-->
                    <div class="site-signup">
                        <h1><?= Html::encode($this->title) ?></h1>

                        <div class="row">
                            <div class="col-lg-5">
                                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('用户名') ?>

                                <?= $form->field($model, 'email')->label('邮箱') ?>

                                <?= $form->field($model, 'password')->passwordInput()->label('密码') ?>

                                <?= $form->field($model,'aaa')->textInput()->label('验证码') ?>
                                <?=Captcha::widget(['name'=>'catptchaimg','captchaAction'=>'site/captcha',
                                    'imageOptions'=>['id'=>'captchaimg',
                                    'style'=>'cursor:pointer:margin-left:25px;'],
                                    'template'=>'{image}']);?>

                                <div class="form-group">
                                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                                </div>

                                <?php ActiveForm::end(); ?>
                            </div>
                            <div class="dl_loginright width170">
                                <div class="dl_register">
                                    <span class="noaccount">已有账号？</span>
                                    <a href="/Portal/Account/Login">点击登录</a>
                                </div>
                                <h3 class="dl_otherchoice">使用其他账号登录：</h3>
                                <div class="dl_logos">
                                    <a class="dl_sinalogo dl_grey1 sina" href="javascript:void(0)" url="/User/OAuth/OAuthIndex?snstype=sina_connect_v2&amp;returnurl=http%3a%2f%2f51talk.zhiye.com%2fPortal%2fAccount%2fRegister&amp;host=51talk.zhiye.com&amp;portalid=104003">微博</a>
                                    <a class="dl_qqlogo dl_grey1 qq" href="javascript:void(0)" url="/User/OAuth/OAuthIndex?snstype=qzone_login&amp;returnurl=http%3a%2f%2f51talk.zhiye.com%2fPortal%2fAccount%2fRegister&amp;host=51talk.zhiye.com&amp;portalid=104003">QQ</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!--简历内容 e-->
    </div>
    <div class="dl_footer">
        <p>&copy;2015&nbsp;北京大生知行科技有限公司51talk&nbsp;&nbsp;京ICP备05051632号 京公网安备110108002767号 &nbsp;&nbsp;帮助热线：4006506886</p>
    </div>
</div>
</body>
</html>
 --> --> --> -->