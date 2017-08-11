<?php
namespace backend\controllers;

use backend\models\Admin_user;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class LoginController extends Controller
{
    public $enableCsrfValidation=false;

    public function actionIndex(){
        $this->layout=false;
        return $this->render('index');
    }
    public function actionLogin_do(){
        $db=new Admin_user();
        $username=$_POST['username'];
        $pwd=$_POST['pwd'];
        $res=$db::find()->where(['username'=>"$username"])->one();
//        var_dump($res);
        if(!$res){
            echo "<script>alert('用户名错误');location.href='?r=login/index'</script>";
        }
        if($pwd!=$res['pwd']){
            echo "<script>alert('密码错误');location.href='?r=login/index'</script>";
        }
        echo "<script>alert('登录成功');location.href='?r=index/fabiao'</script>";
        session_start( );
        $_SESSION['name'] = $res['username'];
    }
    //
//    public function actionDel_session(){
//        session_start();
//        $res = $_SESSION['name'];
//       print_r($res);
////        if($arr){
////            echo "<script>alert('退出中');location.href='?r=login/index'</script>";
////        }
//
//    }
}