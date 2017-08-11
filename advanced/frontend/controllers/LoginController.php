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
use yii\captcha\Captcha;
/**
 * index controller
 */
class LoginController extends Controller{
    //链接加载视图
   public $layout = "jobs";
    public $enableCsrfValidation=false;
    //登录
    public function actionLogin(){
        return $this->render('login');
    }

    public function actions()
    {
        return [
             'captcha' => [
                  'class' => 'yii\captcha\CaptchaAction',
                  'maxLength' => 5,
                  'minLength' => 5
             ],
         ];
    }
    //注册
    public function actionSignup(){

        // $model = new LoginForm();
        // return $this->render('reg',['model'=>$model]);
         $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionReg_do(){

        $param = Yii::$app->request->post();
        print_r($param);
    }
}