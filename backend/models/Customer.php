<?php

namespace backend\models;

use Yii;
use common\models\User;
use frontend\models\Page;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $customer_name
 * @property string $email
 * @property string $phone
 * @property integer $biz_type
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }
	

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'updated_at'], 'required', 'on' => 'signup'],
			
			[['updated_at'], 'required', 'on' => 'progress'],
			
			[['sale_amt', 'is_block', 'sale_at', 'updated_at'], 'required', 'on' => 'sale'],
			
            [['user_id', 'biz_type', 'is_block', 'updated_at'], 'integer'],
			
			[['sale_amt'], 'number'],
			
            [['phone'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'phone' => 'Phone',
            'biz_type' => 'Business Type',
        ];
    }
	
	public function getPage(){
		return $this->hasOne(Page::className(), ['customer_id' => 'id']);
	}
	

	/**
	 * Returns the details of related user information
	 *
	 * @return Information about related user
	 * @throws Exception if the event is not defined
	 */
	public function getUser(){
		return $this->hasOne(User::className(), ['id' => 'user_id']);
	}
	
	public function getBizTypes(){
		return $this->hasOne(BizTypes::className(), ['id' => 'biz_type']);
	}

}
