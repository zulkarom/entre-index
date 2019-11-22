<?php

namespace frontend\models\user; 

use backend\models\Customer;

class User extends \dektrium\user\models\User
{
	const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
	

    public function rules()
    {
        $rules = parent::rules();
		$rules['fullnameRequired'] = ['fullname', 'required'];
        
        return $rules;
    }
	
	public function getCustomer(){
        return $this->hasOne(Customer::className(), ['user_id' => 'id']);
    }
	

	
	public function register(){
		$this->status = self::STATUS_ACTIVE;
		return parent::register();
	}
}

?>