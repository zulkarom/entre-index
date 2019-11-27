<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "question_main".
 *
 * @property int $id
 * @property string $main_name
 */
class QuestionMain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_main';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['main_name', 'benchmark'], 'required'],
            [['main_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'main_name' => 'Dimensi',
			'main_name_bi' => 'Dimension',
        ];
    }
	
	public function getQuestionCat()
    {
        return $this->hasMany(QuestionCat::className(), ['main_id' => 'id']);
    }
	
	public function getQuestionPrime()
    {
        return $this->hasOne(QuestionPrime::className(), ['id' => 'prime_id']);
    }
	
	
	
	public function getResultByUniversity(){
		$cat = $this->questionCat;
		$str = '';
		$i = 1;
		foreach($cat as $c){
			$comma = $i == 1 ? '' : ',';
			$str .= $comma.$c->strSelect(true);
			
		$i++;
		}
		
		
		$rows = (new \yii\db\Query())
		->select('result.p_6_3, COUNT(result.p_6_3) as kira, ' . $str)
		->from('result')
		->innerJoin('page', 'page.customer_id = result.customer_id')
		->andWhere(['>=', 'page.curr_page', 16])
		->groupBy('result.p_6_3')
		->orderBy('result.p_6_3 ASC')
		->all();
		
		return $rows;
		
	}
	
	

}
