<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\jui\DatePicker;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Sale */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sale-form">

<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= Html::encode($this->title) ?> for <?= $customer->user->fullname;?></h3>
            </div>
	
    <?php $form = ActiveForm::begin(); ?>

	<div class="box-body">

	<?= $form->field($model, 'customer_id')->hiddenInput(['value'=>$customer->id])->label(false); ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?php //= $form->field($model, 'sale_date')->textInput() ?>
	<?=$form->field($model, 'sale_date')->widget(
                    DatePicker::className(), [
                    'options' => ['placeholder' => 'Start Date ...', 'id' => 'startdate1'],
                     'inline' => false,
                    'clientOptions' => [
                        'autoclose' => true,
                        'todayHighlight' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                    ]); 
				
	
	/* = $form->field($model, 'sale_date')->widget(\yii\jui\DatePicker::classname(), [
	'clientOptions' => ['defaultDate' => date('Y-m-d')],
    'dateFormat' => 'yyyy-MM-dd',
	])  */ ?>


    <div class="box-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

	</div>
    <?php ActiveForm::end(); ?>
	</div>

</div>
