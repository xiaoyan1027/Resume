<?php
namespace frontend\models;
use yii\db\ActiveRecord;
class Retwo extends ActiveRecord{
    public function rules(){
        return [
            [['school_name','year','month','day','major_name','xueli','degree','unit_name','position_name','class_time','duty','langage','master','createtime'],'required']
        ];
    }
}