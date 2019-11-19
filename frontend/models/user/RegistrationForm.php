<?php
namespace frontend\models\user;

//use dektrium\user\models\User;
use Yii;
use dektrium\user\models\RegistrationForm as BaseRegistrationForm;
use backend\models\Customer;
use backend\models\Result;
use frontend\models\Page;

/**
 * Signup form
 */
class RegistrationForm extends BaseRegistrationForm
{
	public $fullname;
	public $password_repeat;
	
	public function rules()
    {
        $rules = parent::rules();
		
		$rules['password_repeatRequired'] = ['password_repeat', 'required'];
		
		$rules['fullnameRequired'] = ['fullname', 'required'];

		
		$rules['password_repeatCompare'] = ['password_repeat', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ];
		

		//
        return $rules;
    }
	
	/* public function attributeLabels()
    {
		$label = parent::attributeLabels();
		$label['username'] = 'No. Kad Pengenalan';
		$label['password'] = 'Kata Laluan';
		$label['password_repeat'] = 'Ulang Kata Laluan';
        return $label;
    } */
	
	public function register()
    {
        if (!$this->validate()) {
            return false;
        }

        /** @var User $user */
        $user = Yii::createObject(User::className());
        $user->setScenario('register');
        $this->loadAttributes($user);

        if (!$user->register()) {
            return false;
        }
		
		//need to setup random question in page here
		
		
		$customer = new Customer;
		$customer->scenario = "signup";
		$customer->user_id = $user->id;
		$customer->updated_at = time();
		
		if($customer->save()){
			$page = new Page;
			$page->customer_id = $customer->id;
			$page->curr_page = 1;
			
			
			$x = 0;
			for($i=1;$i <=17; $i++){
				$prop = 'p_' . $i;
				$page->{$prop} = $x;
				$x++;
			}
			
			
			if($page->save()){
				$result = new Result;
				$result->customer_id = $customer->id;
				$result->save();
			}else{
				die('page error');
			}
		}
		
		
		
		
		

        Yii::$app->session->setFlash(
            'info',
            Yii::t(
                'user',
                'Your account has been created and a message with further instructions has been sent to your email'
            )
        );

        return true;
    }


}
