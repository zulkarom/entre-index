<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

 
    <?php $form = ActiveForm::begin(); ?>
	
	<div class="row">
	<div class="col-md-4"></div>
<div class="col-md-4"><?= $form->field($model, 'password_old')->passwordInput() ?></div>
</div>
	
	<div class="row">
	<div class="col-md-4"></div>
<div class="col-md-4"><?= $form->field($model, 'password')->passwordInput() ?></div>
</div>

	<div class="row">
	<div class="col-md-4"></div>
<div class="col-md-4"><?= $form->field($model, 'confirm_password')->passwordInput() ?></div>
</div>
 
        
        
 
        <div class="form-group">
            <?= Html::submitButton('Change Password', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>



