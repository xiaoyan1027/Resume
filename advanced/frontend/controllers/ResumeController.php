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

/**
 * index controller
 */
class ResumeController extends Controller{
    //链接加载视图
    // public $layout = "jobs";
    //简历第一个页面
    public function actionIndex(){
        return $this->render('index');
    }
    //简历第二个页面
    public function actionTwo(){
        return $this->render('two');
    }
    //简历第三个页面
    public function actionThree(){
        return $this->render('three');
    }
}