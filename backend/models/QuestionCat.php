<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "question_cat".
 *
 * @property int $id
 * @property int $main_id
 * @property string $cat_text
 * @property string $cat_text_bi
 * @property string $para_quest
 * @property string $para_quest_bi
 * @property int $question_type 1=likert, 2 = yesno
 */
class QuestionCat extends \yii\db\ActiveRecord
{
	
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_cat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
		
			 [['benchmark'], 'required'],
			
			 [['main_id', 'question_type'], 'integer'],
			 
			
			[['para_quest', 'para_quest_bi', 'desc_low', 'desc_medium', 'desc_high'], 'string'],
			
            [['cat_text', 'cat_text_bi'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'main_id' => 'Main ID',
            'cat_text' => 'Sub Dimension',
            'cat_text_bi' => 'Sub Dimension Bi',
            'para_quest' => 'Instruction',
            'para_quest_bi' => 'Instruction Bi',
            'question_type' => 'Question Type',
			'desc_low' => 'Description - Low Score',
			'desc_medium' => 'Description - Medium Score',
			'desc_high' => 'Description - High Score',
        ];
    }
	
	public function getQuestionMain(){
		return $this->hasOne(QuestionMain::className(), ['id' => 'main_id']);
	}
	
	public function getQuestion()
    {
        return $this->hasMany(Question::className(), ['cat_id' => 'id']);
    }
	
	public function getDescription($result){
		if($this->question_type == 1){
			$total = 5;
			$low = $total / 3;
			$medium = $low * 2;
			if($result <= $low){
				return [$this->desc_low, 'danger'];
			}else if($result <= $medium){
				return [$this->desc_medium, 'warning'];
			}else{
				return [$this->desc_high, 'success'];
			}
		}else{
			$total = 1;
			$low = $total / 2;
			if($result <= $low){
				return [$this->desc_low, 'danger'];
			}else{
				return [$this->desc_high, 'success'];
			}
		}
		
		
	}
	
	public function question_no(){
		$result = $this->question;
		$array = [];
		foreach($result as $row){
			$array[] = $row->id;
		}
		return $array;
	}
	
	public function strSelect($name = false){
		if(!$name){
			$name = 'avgval';
		}else{
			$name = $this->sql_col;
		}
		$q = $this->question_no();
		$kira = count($q);
		$str = 'AVG((';
		$i = 1;
		foreach($q as $v){
			$plus = $i == 1 ? '' : '+';
			$str .= $plus . 'q_' . $v;
		$i++;
		}
		
		$str .= ')/'.$kira.') as ' . $name . ' ';
		return $str;
	}
	
	
	public function getAverage(){
		return Result::find()
		->select($this->strSelect())
		->innerJoin('page', 'page.customer_id = result.customer_id')
		->where(['>=', 'page.curr_page', 16])
		->one()->avgval;
		
	}
	
	
}
