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
use frontend\models\Resume;
/**
 * index controller
 */
class ResumeController extends Controller{
    //链接加载视图
//    public $layout = "jobs";
    //简历第一个页面
    public $enableCsrfValidation = false;

    public function actionIndex(){
        return $this->render('index');
    }
    public function actionAdd(){
        $data=Yii::$app->request->post();

//      var_dump($data);die;
        $user=new Resume();
        $user->User_name=$data['User_name'];
        $user->User_sex=$data['User_sex'];
        $user->User_born=$data['User_born'];
        $user->User_email=$data['User_email'];
        $user->User_phone=$data['User_phone'];
//      $user->User_img=$data['User_img'];
        $user->Industry_now=$data['Industry_now'];
        $user->Occupation_now=$data['Occupation_now'];
        $user->City_now=$data['City_now'];
        $user->Money_now=$data['Money_now'];
        $user->Industry_hope=$data['Industry_hope'];
        $user->Occupation_hope=$data['Occupation_hope'];
        $user->City_hope=$data['City_hope'];
        $user->Money_hope=$data['Money_hope'];
        $res=$user->save();
        $id = $user->attributes['id'];
//        var_dump($id);die;

        return $this->render('two',['j_id'=>$id]);
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