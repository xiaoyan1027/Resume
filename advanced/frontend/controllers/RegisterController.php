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
class RegisterController extends Controller{
	public $enableCsrfValidation=false;
    //public $layout="layout";
    public function actionIndex(){

    	
        return $this->renderPartial('index');
    }


    public function actionAdd(){

    	
		$param = Yii::$app->request->post();
		$db = new user();
		$db->email = $param['email'];
		$db->password = $param['password'];
		$db->creatime = time();
		$db->type = $param['type'];
		$add = $db->save();
	}

	public function actionShow(){
		echo 123;
	}
}

