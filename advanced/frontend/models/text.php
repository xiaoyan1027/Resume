<?php

namespace frontend\models;

use yii;
use yii\db\ActiveRecord;
class Text extends ActiveRecord{
    public static function tableName()
    {
        return '{{text}}';
    }
}