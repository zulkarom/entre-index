<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/views/myasset');

$this->title = 'ELI REGISTRATION';
$this->params['breadcrumbs'][] = $this->title;

$fieldOptionsFullname = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fieldOptionsUsername = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>"
];

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>

	<br />


<div class="courses">
		<div class="container">
			<div class="row">
			<div class="col-md-1"></div>
				<div class="col-md-10">
					<h2 class="section_title text-center">REGISTRATION</h2>
				</div>
				
				
				
				
			</div>
			<br>
			
			<br>
			
            <?php $form = ActiveForm::begin([
                    'id' => 'form-signup',
                    'enableAjaxValidation' => true
                ]); ?>
			

<div class="row"><div class="col-md-1"></div>
<div class="col-md-5">
<?= $form
            ->field($model, 'fullname')
            ->label('FULL NAME')
            ->textInput() ?>

</div>

<div class="col-md-5"><?= $form
            ->field($model, 'email')
            ->label('EMAIL')
            ->textInput() ?>
</div>

</div>							

<div class="row"><div class="col-md-1"></div>
<div class="col-md-5">				
<?= $form
				->field($model, 'password')
				->passwordInput()
                ->label('PASSWORD')?></div>

<div class="col-md-5"><?= $form
				->field($model, 'password_repeat')
				->passwordInput()
                ->label('PASSWORD REPEAT') ?>
</div>

</div>

				
<br />

<div class="row"><div class="col-md-1"></div>
<div class="col-md-10">	
<div class="form-group" align="center"><?= Html::submitButton('REGISTER', ['class' => 'btn btn-primary ', 'name' => 'signup-button']) ?></div>
</div>
</div>

 
				
				

            <?php ActiveForm::end(); ?>
			

			
			

	
			
			
		</div>
	</div>
