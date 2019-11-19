       <?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\BizTypes;

/* @var $this yii\web\View */
/* @var $customer app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>
	
	   <?= $form->field($user, 'username') ?>
        <?= $form->field($user, 'rawPassword') ?>
        

    <?= $form->field($user, 'fullname')->textInput(['maxlength' => true]) ?>
	<div class="row">
	<div class="col-md-6">
	<?= $form->field($user, 'user_email')->textInput(['maxlength' => true]) ?>
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
