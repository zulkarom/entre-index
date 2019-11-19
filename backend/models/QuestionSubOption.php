<?php

namespace backend\models;

use Yii;
use common\models\QFormat;

/**
 * This is the model class for table "question_sub_option".
 *
 * @property int $id
 * @property int $sub_id
 * @property string $option_text
 * @property string $option_text_bi
 * @property int $option_value
 */
class QuestionSubOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_sub_option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sub_id', 'option_text', 'option_text_bi', 'option_value'], 'required'],
            [['sub_id', 'option_value'], 'integer'],
            [['option_text', 'option_text_bi'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sub_id' => 'Sub ID',
            'option_text' => 'Option Text',
            'option_text_bi' => 'Option Text Bi',
            'option_value' => 'Option Value',
        ];
    }
	
	public function getOptionText(){
		return QFormat::qplain($this->option_text, $this->option_text_bi);
	}
}
