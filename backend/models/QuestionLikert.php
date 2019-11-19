<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "question_likert".
 *
 * @property int $id
 * @property string $likert_text
 * @property string $likert_text_bi
 * @property int $likert_value
 */
class QuestionLikert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_likert';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['likert_text', 'likert_text_bi', 'likert_value'], 'required'],
            [['likert_value'], 'integer'],
            [['likert_text', 'likert_text_bi'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'likert_text' => 'Likert Text',
            'likert_text_bi' => 'Likert Text Bi',
            'likert_value' => 'Likert Value',
        ];
    }
}
