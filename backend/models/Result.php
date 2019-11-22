<?php

namespace backend\models;

use Yii;
use backend\models\QuestionMain;
use backend\models\QuestionCat;
use backend\models\Question;
use yii\db\Expression;
use stdClass;

/**
 * This is the model class for table "result".
 *
 * @property int $id
 * @property int $customer_id
 * @property int $p_1
 * @property int $p_2
 * @property int $p_3
 * @property int $p_4
 * @property int $p_4_7
 * @property int $p_4_6
 * @property int $p_4_5
 * @property int $p_5
 * @property int $p_5_19
 * @property string $p_5_19_text
 * @property int $p_5_18
 * @property int $p_5_17
 * @property int $p_5_16
 * @property int $p_5_15
 * @property int $p_5_14
 * @property int $p_5_13
 * @property int $p_5_12
 * @property int $p_5_11
 * @property int $p_5_10
 * @property int $p_5_9
 * @property int $p_5_8
 * @property string $p_5_other
 * @property string $p_6_3
 * @property string $p_6_4
 * @property int $p_7
 * @property string $p_7_37_text
 * @property string $p_7_36_text
 * @property int $q_1
 * @property int $q_2
 * @property int $q_3
 * @property int $q_4
 * @property int $q_5
 * @property int $q_6
 * @property int $q_7
 * @property int $q_8
 * @property int $q_9
 * @property int $q_10
 * @property int $q_11
 * @property int $q_12
 * @property int $q_13
 * @property int $q_14
 * @property int $q_15
 * @property int $q_16
 * @property int $q_17
 * @property int $q_18
 * @property int $q_19
 * @property int $q_20
 * @property int $q_21
 * @property int $q_22
 * @property int $q_23
 * @property int $q_24
 * @property int $q_25
 * @property int $q_26
 * @property int $q_27
 * @property int $q_28
 * @property int $q_29
 * @property int $q_30
 * @property int $q_31
 * @property int $q_32
 * @property int $q_33
 * @property int $q_34
 * @property int $q_35
 * @property int $q_36
 * @property int $q_37
 * @property int $q_38
 * @property int $q_39
 * @property int $q_40
 * @property int $q_41
 * @property int $q_42
 * @property int $q_43
 * @property int $q_44
 * @property int $q_45
 * @property int $q_46
 * @property int $q_47
 * @property int $q_48
 * @property int $q_49
 * @property int $q_50
 * @property int $q_51
 * @property int $q_51_1
 * @property int $q_51_2
 * @property int $q_51_3
 * @property int $q_51_4
 * @property int $q_51_5
 * @property int $q_52
 * @property string $q_52_text
 * @property int $q_53
 * @property int $q_53_1
 * @property int $q_53_2
 * @property int $q_53_3
 * @property int $q_53_4
 * @property int $q_53_5
 * @property int $q_54
 * @property int $q_54_1
 * @property int $q_54_2
 * @property int $q_54_3
 * @property int $q_54_4
 * @property int $q_55
 * @property string $q_55_text
 * @property int $q_56
 * @property int $q_57
 * @property string $q_57_text
 * @property int $q_58
 * @property string $q_58_text
 * @property int $q_59
 * @property string $q_59_text
 * @property int $q_60
 * @property string $q_60_text
 */
class Result extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'result';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'p_1', 'p_2', 'p_3', 'p_4', 'p_4_7', 'p_4_6', 'p_4_5', 'p_5', 'p_5_19', 'p_5_18', 'p_5_17', 'p_5_16', 'p_5_15', 'p_5_14', 'p_5_13', 'p_5_12', 'p_5_11', 'p_5_10', 'p_5_9', 'p_5_8', 'p_7', 'q_1', 'q_2', 'q_3', 'q_4', 'q_5', 'q_6', 'q_7', 'q_8', 'q_9', 'q_10', 'q_11', 'q_12', 'q_13', 'q_14', 'q_15', 'q_16', 'q_17', 'q_18', 'q_19', 'q_20', 'q_21', 'q_22', 'q_23', 'q_24', 'q_25', 'q_26', 'q_27', 'q_28', 'q_29', 'q_30', 'q_31', 'q_32', 'q_33', 'q_34', 'q_35', 'q_36', 'q_37', 'q_38', 'q_39', 'q_40', 'q_41', 'q_42', 'q_43', 'q_44', 'q_45', 'q_46', 'q_47', 'q_48', 'q_49', 'q_50', 'q_51', 'q_51_1', 'q_51_2', 'q_51_3', 'q_51_4', 'q_51_5', 'q_52', 'q_53', 'q_53_1', 'q_53_2', 'q_53_3', 'q_53_4', 'q_53_5', 'q_54', 'q_54_1', 'q_54_2', 'q_54_3', 'q_54_4', 'q_55', 'q_56', 'q_57', 'q_58', 'q_59', 'q_60'], 'integer'],
            [['p_5_19_text'], 'string'],
			
            [['p_5_other', 'q_52_text', 'q_55_text', 'q_57_text', 'q_58_text', 'q_59_text', 'q_60_text', 'q_53_5_other', 'q_54_4_other', 'q_51_5_other'], 'string', 'max' => 100],
			
            [['p_6_3'], 'string', 'max' => 150],
			
            [['p_6_4', 'p_7_7_text', 'p_7_6_text'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'p_1' => 'P 1',
            'p_2' => 'P 2',
            'p_3' => 'P 3',
            'p_4' => 'P 4',
            'p_4_7' => 'P 4 7',
            'p_4_6' => 'P 4 6',
            'p_4_5' => 'P 4 5',
            'p_5' => 'P 5',
            'p_5_19' => 'P 5 19',
            'p_5_19_text' => 'P 5 19 Text',
            'p_5_18' => 'P 5 18',
            'p_5_17' => 'P 5 17',
            'p_5_16' => 'P 5 16',
            'p_5_15' => 'P 5 15',
            'p_5_14' => 'P 5 14',
            'p_5_13' => 'P 5 13',
            'p_5_12' => 'P 5 12',
            'p_5_11' => 'P 5 11',
            'p_5_10' => 'P 5 10',
            'p_5_9' => 'P 5 9',
            'p_5_8' => 'P 5 8',
            'p_5_other' => 'P 5 Other',
            'p_6_3' => 'P 6 3',
            'p_6_4' => 'P 6 4',
            'p_7' => 'P 7',
            'p_7_37_text' => 'P 7 37 Text',
            'p_7_36_text' => 'P 7 36 Text',
            'q_1' => 'Q 1',
            'q_2' => 'Q 2',
            'q_3' => 'Q 3',
            'q_4' => 'Q 4',
            'q_5' => 'Q 5',
            'q_6' => 'Q 6',
            'q_7' => 'Q 7',
            'q_8' => 'Q 8',
            'q_9' => 'Q 9',
            'q_10' => 'Q 10',
            'q_11' => 'Q 11',
            'q_12' => 'Q 12',
            'q_13' => 'Q 13',
            'q_14' => 'Q 14',
            'q_15' => 'Q 15',
            'q_16' => 'Q 16',
            'q_17' => 'Q 17',
            'q_18' => 'Q 18',
            'q_19' => 'Q 19',
            'q_20' => 'Q 20',
            'q_21' => 'Q 21',
            'q_22' => 'Q 22',
            'q_23' => 'Q 23',
            'q_24' => 'Q 24',
            'q_25' => 'Q 25',
            'q_26' => 'Q 26',
            'q_27' => 'Q 27',
            'q_28' => 'Q 28',
            'q_29' => 'Q 29',
            'q_30' => 'Q 30',
            'q_31' => 'Q 31',
            'q_32' => 'Q 32',
            'q_33' => 'Q 33',
            'q_34' => 'Q 34',
            'q_35' => 'Q 35',
            'q_36' => 'Q 36',
            'q_37' => 'Q 37',
            'q_38' => 'Q 38',
            'q_39' => 'Q 39',
            'q_40' => 'Q 40',
            'q_41' => 'Q 41',
            'q_42' => 'Q 42',
            'q_43' => 'Q 43',
            'q_44' => 'Q 44',
            'q_45' => 'Q 45',
            'q_46' => 'Q 46',
            'q_47' => 'Q 47',
            'q_48' => 'Q 48',
            'q_49' => 'Q 49',
            'q_50' => 'Q 50',
            'q_51' => 'Q 51',
            'q_51_1' => 'Q 51 1',
            'q_51_2' => 'Q 51 2',
            'q_51_3' => 'Q 51 3',
            'q_51_4' => 'Q 51 4',
            'q_51_5' => 'Q 51 5',
            'q_52' => 'Q 52',
            'q_52_text' => 'Q 52 Text',
            'q_53' => 'Q 53',
            'q_53_1' => 'Q 53 1',
            'q_53_2' => 'Q 53 2',
            'q_53_3' => 'Q 53 3',
            'q_53_4' => 'Q 53 4',
            'q_53_5' => 'Q 53 5',
            'q_54' => 'Q 54',
            'q_54_1' => 'Q 54 1',
            'q_54_2' => 'Q 54 2',
            'q_54_3' => 'Q 54 3',
            'q_54_4' => 'Q 54 4',
            'q_55' => 'Q 55',
            'q_55_text' => 'Q 55 Text',
            'q_56' => 'Q 56',
            'q_57' => 'Q 57',
            'q_57_text' => 'Q 57 Text',
            'q_58' => 'Q 58',
            'q_58_text' => 'Q 58 Text',
            'q_59' => 'Q 59',
            'q_59_text' => 'Q 59 Text',
            'q_60' => 'Q 60',
            'q_60_text' => 'Q 60 Text',
        ];
    }
	
	public function getQuestionOption($qid){
		$attr = 'p_' . $qid;
		return QuestionOption::find()->where(['question_id' => $qid, 'option_value' => $this->{$attr}])->one();
	}
	
	public function getQuestionSubOptions($qid, $subid){
		$attr = 'p_' . $qid . '_' . $subid;
		return QuestionSubOption::find()->where(['sub_id' => $subid, 'option_value' => $this->{$attr}])->one();
	}
	
	public function getQuestionSub($qid){
		return QuestionSub::find()->where(['question_id' => $qid])->all();
	}
	
	public function getTickedCheckbox($qid){
		$array = [];
		$result = $this->getQuestionSub($qid);
		if($result){
			foreach($result as $row){
				$attr = 'p_' . $qid . '_' . $row->id;
				if($this->{$attr} == 1){
					$array[$row->id] = $row->sub_text_bi;
				}
			}
		}
		return $array;
	}
	
	public function getCustomer(){
		return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
	}
	
	public function getQuestionPrime(){
		$result = QuestionPrime::find()->all();
		$arr = array();
		foreach($result as $row){
			$arr[] = $row->prime_name;
		}
		return $arr;
	}
	
	public function getQuestionMain(){
		$result = QuestionMain::find()->all();
		$arr = array();
		foreach($result as $row){
			$arr[] = $row->main_name;
		}
		return $arr;
	}
	
	public function getPrimeResult(){
		$list = QuestionPrime::find()->all();
		$array = array();
		foreach($list as $row){
			$obj = new stdClass();
			foreach($row as $key=>$val){
				$obj->{$key} = $val;
			}
			$obj->result = $this->getResultByPrime($row->id);
			$obj->main_result = $this->getMainResult($row->id);
			$array[] = $obj;
		}
		return $array;
	}
	
	public function getMainResult($prime){
		$list = QuestionMain::find()->where(['prime_id' => $prime])->all();
		$array = array();
		foreach($list as $row){
			$obj = new stdClass();
			foreach($row as $key=>$val){
				$obj->{$key} = $val;
			}
			$obj->result = $this->getResultByMain($row->id);
			$obj->cat = $this->getCatResult($row->id);
			//$obj->main_result = 'list of dimension by prime';
			$array[] = $obj;
		}
		return $array;
	}
	
	public function getCatResult($main){
		$list = QuestionCat::find()->where(['main_id' => $main])->all();
		$array = array();
		foreach($list as $row){
			$obj = new stdClass();
			foreach($row as $key=>$val){
				$obj->{$key} = $val;
			}
			$result = $this->getResultByCat($row->id);
			$obj->result = $result;
			$obj->description = $row->getDescription($result);
			//$obj->main_result = 'list of dimension by prime';
			$array[] = $obj;
		}
		return $array;
	}
	
	public function setMainResult(){
		$result = QuestionMain::find()->all();
		$arr_name = array();
		$arr_val = array();
		foreach($result as $row){
			$arr_name[] = $row->main_name;
			$arr_val[] = $this->getResultByMain($row->id);
		}
		$this->arr_main_name = $arr_name;
		$this->arr_main_value = $arr_val;
	}
	
	public function getResultByPrime($id){
		$col = $this->getColumListByPrime($id);
		$kira = count($col);
		$result = self::find()
		->select($col)
		->where(['id' => $this->id])
		->one();
		
		$sum = 0;
		foreach($result as $row){
			$sum += $row;
		}
		//avarage
		return round($sum / $kira, 4);
	}
	
	
	
	public function getResultByMain($id){
		$col = $this->getColumListByMain($id);
		$kira = count($col);
		$result = self::find()
		->select($col)
		->where(['id' => $this->id])
		->one();
		
		$sum = 0;
		foreach($result as $row){
			$sum += $row;
		}
		return round($sum / $kira, 4);
	}
	
	public function getColumListByPrime($id){
		$result = $this->getQuestionByPrime($id);
		$col = array();
		$arr = array();
		foreach($result as $row){
			$arr[] = "q_" . $row->id;
		}
		
		return $arr;
	}
	
	public function getColumListByMain($id){
		$result = $this->getQuestionByMain($id);
		$col = array();
		$arr = array();
		foreach($result as $row){
			$arr[] = "q_" . $row->id;
		}
		
		return $arr;
	}
	
	public function getQuestionByMain($id){
		return Question::find()
		->innerJoin('question_cat', 'question_cat.id = question.cat_id')
		->where(['question_cat.main_id' => $id])
		->all();
		
	}
	
	public function getQuestionByPrime($id){
		return Question::find()
		->innerJoin('question_cat', 'question_cat.id = question.cat_id')
		->innerJoin('question_main', 'question_main.id = question_cat.main_id')
		->where(['question_main.prime_id' => $id])
		->all();
		
	}
	
	public function getResultByCat($id){
		$col = $this->getColumListByCat($id);
		$kira = count($col);
		$result = self::find()
		->select($col)
		->where(['id' => $this->id])
		->one();
		
		$sum = 0;
		foreach($result as $row){
			$sum += $row;
		}
		return round($sum / $kira, 4);
	}
	
	public function getColumListByCat($id){
		$result = $this->getQuestionByCat($id);
		$col = array();
		$arr = array();
		foreach($result as $row){
			$arr[] = "q_" . $row->id;
		}
		
		return $arr;
	}
	
	public function getQuestionByCat($id){
		return Question::find()
		->where(['cat_id' => $id])
		->all();
		
	}
}
