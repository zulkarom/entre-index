<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "question_option".
 *
 * @property int $id
 * @property int $question_id
 * @property string $option_text
 * @property string $option_text_bi
 * @property int $option_order
 */
class QuestionOption extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_option';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['question_id', 'option_text', 'option_text_bi', 'option_order'], 'required'],
            [['question_id', 'option_order'], 'integer'],
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
            'question_id' => 'Question ID',
            'option_text' => 'Option Text',
            'option_text_bi' => 'Option Text Bi',
            'option_order' => 'Option Order',
        ];
    }
}
