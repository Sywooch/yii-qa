<?php
namespace app\models;

use app\components\db\ActiveRecord;

class TagItem extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%tag_item}}';
    }

    public function rules()
    {
        return [
            [['tid', 'target_id', 'target_type'], 'required']
        ];
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'created_at',
                ],
            ],
        ];
    }

    public function getTag()
    {
        return $this->hasOne(Tag::className(), ['tid' => 'id']);
    }
}