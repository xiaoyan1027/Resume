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
use frontend\models\search;
use frontend\models\ContactForm;
use yii\data\pagination;
// use frontend\models\Text;

/**
 * index controller
 */
class JobsController extends Controller{
	public $enableCsrfValidation = false;
    //链接加载视图
    public $layout = "jobs";
    // public function actionIndex(){



    // 	$db = new search();
    // 	$res = $db->find()->all();
        
    	
    	
    //     return $this->render('index',['res'=>$res]);
    // }

    public function actionIndex(){


    	$db = new search();
    	$address = Yii::$app->request->post('address');
        echo $address;
    	// // $types = Yii::$app->request->post('types');
    	// // $times = Yii::$app->request->post('times');
    	// $type = Yii::$app->request->post('type');
    	$name = Yii::$app->request->post('names');
       
    	// if($address == 0){
    	// 	$where = "name like '%$name%' and type like '%$type%'";
    	// }else if(empty($name)){
    	// 	$where = "address like '%$address%' and type like '%$type%'";
    	// }else if($type == 0){
    	// 	$where = "address like '%$address%' and name like '%$name%'";
    	// }else if(empty($name)&&$type == 0&&$address == 0){
    	// 	$where = "";
    	// }else if($type == 0&&$address == 0){
    	// 	$where = "name like '%$name%'";
    	// }else if($type == 0&&empty($name)){
    	// 	$where = "address like '%$address%'";
    	// }else if($address == 0&&empty($name)){
    	// 	$where = "type like '%$type%'";
    	// }
        

    	if(empty($name)&&$address==0){
            $where = "1=1";
        }else if($address==0){
            $where = "name like '%$name%'";
        }else if(empty($name)){
            $where = "address like '%$address%'";
        }else if(!empty($name) && !empty($address)){
            $where = "address like '%$address%' && name like '%$name%'";
        }
    	$res = $db->find()->where($where);
        
        $all = $res->count();
        $pagination = new pagination(['totalCount'=>$all,'pageSize'=>'5']);
        $arr = $res->offset($pagination->offset)->limit($pagination->limit)->all(); 
        
    	if($arr){

           return  $this->render('index',['arr'=>$arr,'name'=>$name,'pagination'=>$pagination]);
        }
    }


}