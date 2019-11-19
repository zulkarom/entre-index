<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "question".
 *
 * @property int $id
 * @property int $cat_id
 * @property string $question_text
 */
class Question extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
		
			[['question_text', 'question_text_bi'], 'string'],
			
            [['benchmark'], 'required'],
			
            [['cat_id'], 'integer'],
			
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_id' => 'Cat ID',
            'question_text' => 'Question Text',
        ];
    }
	
	public function getQuestionCat(){
		return $this->hasOne(QuestionCat::className(), ['id' => 'cat_id']);
	}
	
	public function getQuestionOptions(){
		return $this->hasMany(QuestionOption::className(), ['question_id' => 'id']);
	}
	
	public function getQuestionSub(){
		return $this->hasOne(QuestionSub::className(), ['question_id' => 'id']);
	}
	
	public static function getQuestionData($id){
		return self::findOne($id);
	}
	
	public function getQuestionAnswer($customer)
    {
		$col = 'q_'.$this->id;
        return Result::find()->select($col)->where(['customer_id' => $customer])->one()->$col;
		
		;
    }
	

}
