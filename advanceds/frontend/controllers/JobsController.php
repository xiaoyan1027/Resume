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
class JobsController extends Controller{
    //链接加载视图
    public $layout = "jobs";
    public $enableCsrfValidation = false;
    public function actionIndex(){
        return $this->render('jobs');
    }
}