<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\search;
use yii\data\Pagination;
/**
 * Site controller
 */
class IndexController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex(){
        $this->layout=false;
       return $this->render('index');
    }
    //招聘职位
    public function actionFabiao(){
        $this->layout=false;
        return $this->render('fabiao');
    }
    //职位添加
    public function actionFabiao_add(){
        $post = Yii::$app->request->post();
        $time = date('Y-m-d H:i:s',time());
        $db= new search();
        $db->name = $post['name'];
        $db->type = $post['type'];
        $db->time = $time;
        $db->monery = $post['monery'];
        $db->xueli = $post['xueli'];
        $db->fuli = $post['fuli'];
        $db->content = $post['content'];
        $res=$db->save();
        if($res){
            $this->redirect(['index/show']);
        }else{
            Yii::$app->getSession()->setFlash('error', '一项都不能为空');
            $this->redirect(['index/fabiao']);
        }
    }
    //展示页面
    public function actionShow(){
        $name =  Yii::$app->request->post('name');
        $this->layout=false;
        $db = new search();
        $query = $db->find()->where(['like','name',"$name"]);
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count,'pageSize'=>4]);
        $articles = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        return $this->render('show',['res'=>$articles,'pagination'=>$pagination,'name'=>$name]);
    }
    //详情
    public function actionShow_x(){
        $id = Yii::$app->request->get('id');
        $this->layout=false;
        $db = new search();
        $query = $db->find()->where(['id' => "$id"])->asArray()->one();
        return $this->render('show_x',['query'=>$query]);
    }
    //删除
    public function actionDel(){
        $id =  Yii::$app->request->get('id');
        $db = new search();
        $del  = $db->deleteAll(['id' => $id]);
        if($del){
            $this->redirect(['index/show']);
        }else{
            Yii::$app->getSession()->setFlash('error', '删除不正确');
            $this->redirect(['index/show']);
        }
    }
    //修改查询
    public function actionUp(){
        $this->layout=false;
        $id =  Yii::$app->request->get('id');
        $db = new search();
        $arr = $db->find("id=$id")->asArray()->one();
        return $this->render('up',array('arr'=>$arr,'id'=>$id));
    }
    public function actionUpdate(){
        $data =  Yii::$app->request->post();
        $db = new search();
        $arr = $db->find("id=".$data['id'])->one();
        $arr->name=$data['name'];
        $arr->type=$data['type'];
        $arr->address=$data['address'];
        $res = $arr->save();
        if($res){
            $this->redirect(['index/show']);
        }else{
            Yii::$app->getSession()->setFlash('error', '修改不正确');
            $this->redirect(['index/show']);
        }
    }
}