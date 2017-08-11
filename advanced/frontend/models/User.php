<?php
namespace frontend\models;
use yii\db\ActiveRecord;
class User extends ActiveRecord{
    public function rules(){
        return [
            [['username','pwd','creatime'],'required']
        ];
    }
}