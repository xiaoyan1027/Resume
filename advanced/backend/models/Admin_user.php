<?php
namespace backend\models;
use Yii;
use yii\db\ActiveRecord;
class Admin_user extends ActiveRecord{
    public function rules(){
return [
            [
                ['username','pwd','email'],'required'
            ],
        ];
    }
}
?>