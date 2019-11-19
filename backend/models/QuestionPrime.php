<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "question_prime".
 *
 * @property int $id
 * @property string $prime_name
 * @property string $prime_name_bi
 */
class QuestionPrime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'question_prime';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prime_name', 'prime_name_bi', 'benchmark'], 'required'],
			
            [['prime_name', 'prime_name_bi'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prime_name' => 'Prime Name',
            'prime_name_bi' => 'Prime Name Bi',
        ];
    }
}
