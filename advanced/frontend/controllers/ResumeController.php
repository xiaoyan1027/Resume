<?php
namespace frontend\controllers;

use frontend\models\Resume_two;
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
use frontend\models\Retwo;

/**
 * index controller
 */
class ResumeController extends Controller{
    //链接加载视图
    public $enableCsrfValidation = false;//    public $layout = "jobs";
    //简历第一个页面
    public function actionIndex(){
        $this->layout=false;
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
    //添加第二步
    public function actionTwo_add(){
        $db = new Retwo();
        //创建时间
        $createtime = time();
        //上一层简历id = 1；
        $j_id =1;
        $request = Yii::$app->request->post();
        $db->j_id = $j_id;
        $db->school_name = $request['school_name'];
        $db->year = $request['year'];
        $db->month = $request['month'];
        $db->day = $request['day'];
        $db->major_name = $request['major_name'];
        $db->xueli = $request['xueli'];
        $db->degree = $request['degree'];
        $db->unit_name = $request['unit_name'];
        $db->position_name = $request['position_name'];
        $db->class_time = $request['class_time'];
        $db->duty = $request['duty'];
        $db->langage = $request['langage'];
        $db->master = $request['master'];
        $db->createtime = $createtime;
        $res = $db->save();
        if($res){
            $this->redirect(['resume/three',"j_id"=>$j_id]);
        }else{
            Yii::$app->getSession()->setFlash('error', '一项都不能为空');
            $this->redirect(['resume/two']);
        }

    }
}