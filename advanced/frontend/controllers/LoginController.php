<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\user;

/**
 * index controller
 */
class LoginController extends Controller{
    //链接加载视图
   public $layout = "jobs";
    //登录
    public function actionLogin(){
        $login = new user();
        $data = Yii::$app->request->post();
        $res = $login->find("username=".$data['username'])->asArray()->all();
        print_r($res);
        return $this->render('login',['user'=>$login]);
    }
    //注册
    public function actionReg(){
        return $this->render('reg');
    }
    public function actionCheck(){
        $post = Yii::$app->request->post();
        print_r($post);
    }
}