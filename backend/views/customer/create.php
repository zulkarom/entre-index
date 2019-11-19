<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\BizTypes;


/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = 'Create Customer';
$this->params['breadcrumbs'][] = ['label' => 'Customer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>




<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            			
			    <?php $form = ActiveForm::begin(); ?>
				<div class="box-body">
	<div class="row">
<div class="col-md-6"><?= $form->field($user, 'username') ?></div>
<div class="col-md-6">  
	<?= $form->field($user, 'fullname')->textInput(['maxlength' => true]) ?></div>
</div>

	<div class="row">
<div class="col-md-6"><?= $form->field($user, 'rawPassword')->passwordInput(['maxlength' => true]) ?></div>
<div class="col-md-6">  
	<?= $form->field($user, 'password_repeat')->passwordInput(['maxlength' => true]) ?></div>
</div>
   
   
    
	<div class="row">
	<div class="col-md-6">
	<?= $form->field($user, 'email')->textInput(['maxlength' => true]) ?>
	</div>
	<div class="col-md-6">
	<?= $form->field($customer, 'phone')->textInput(['maxlength' => true]) ?>
	</div>
	</div>
    

    <div class="row">
	<div class="col-md-6">
	
	<?= $form->field($customer, 'biz_type')->dropDownList(
		ArrayHelper::map(BizTypes::find()->all(),'id', 'biz_type_name'), ['prompt' => 'Select Company' ]
	) ?>
	
	</div>
	</div>

    

    <div class="box-footer">
        <?= Html::submitButton($customer->isNewRecord ? 'Create' : 'Update', ['class' => $customer->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
	</div>
    <?php ActiveForm::end(); ?>
          </div>