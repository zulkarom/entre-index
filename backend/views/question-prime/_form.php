<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionPrime */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="question-prime-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'prime_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prime_name_bi')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'benchmark')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div></div>
</div>
