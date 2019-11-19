<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "question_sub".
 *
 * @property int $id
 * @property int $question_id
 * @property string $sub_text
 * @property string $sub_text_bi
 */
class QuestionSub extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_sub';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_id'], 'required'],
            [['question_id'], 'integer'],
            [['sub_text', 'sub_text_bi'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question_id' => 'Question ID',
            'sub_text' => 'Sub Text',
            'sub_text_bi' => 'Sub Text Bi',
        ];
    }
	
	public function getSubOptions()
    {
        return $this->hasMany(QuestionSubOption::className(), ['sub_id' => 'id']);
    }

}
