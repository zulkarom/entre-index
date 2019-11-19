<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\BizTypes;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = 'Update Customer: ' . $customer->id;
$this->params['breadcrumbs'][] = ['label' => 'Customer', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $customer->id, 'url' => ['view', 'id' => $customer->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="customer-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>
	
	   <?= $form->field($user, 'username')->textInput(['maxlength' => true])  ?>
        
    <?= $form->field($user, 'fullname')->textInput(['maxlength' => true]) ?>
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

    

    <div class="form-group">
        <?= Html::submitButton($customer->isNewRecord ? 'Create' : 'Update', ['class' => $customer->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div></div>
</div>
