<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "question_profile".
 *
 * @property int $id
 * @property string $question_text
 * @property string $question_text_bi
 * @property int $question_type 1=text, 2 = multiple choice
 */
class QuestionProfile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_text', 'question_text_bi', 'question_type'], 'required'],
            [['question_type'], 'integer'],
            [['question_text', 'question_text_bi'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'question_text' => 'Question Text',
            'question_text_bi' => 'Question Text Bi',
            'question_type' => 'Question Type',
        ];
    }
	
	public function getQuestionSubs(){
		return $this->hasMany(QuestionSub::className(), ['question_id' => 'id']);
	}
	
	public function getQuestionOptions(){
		return $this->hasMany(QuestionOption::className(), ['question_id' => 'id'])->orderBy('option_order ASC');
	}
}
