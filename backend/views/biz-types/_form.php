<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BizTypes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="biz-types-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'biz_type_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>