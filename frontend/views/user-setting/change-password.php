<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ChangePasswordForm */
/* @var $form ActiveForm */
 
$this->title = 'Change Password';
?>


<div class="block-content">

		<div class="container">
			<div class="row  text-center">
				<div class="col">
					<h2 class="section_title">Profile</h2>
					<div><?=Yii::$app->user->identity->email?></div>
				</div>

			</div>
			
			
			</div>
			</div>

<div>

		<div class="container text-center">
			<div class="row ">
				<div class="col">
					<h3 class="section_title "><?=$this->title?></h3>
				</div>

			</div>
	
					
	<div class="user-changePassword">
 
   
	
	 <?php
	 if($good == 1){
		 echo '<p>Your password has been successfully changed.</p>';
	 }else{
		 echo $this->render('_form_pass', [
			'model' => $model
		]);
	 }
	 
    ?>
 
</div>
			
			
		</div>
	</div>

<br /><br /><br /><br />
