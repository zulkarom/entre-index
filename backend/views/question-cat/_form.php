<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionCat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="question-cat-form">

    <?php $form = ActiveForm::begin(); ?>
	

<?= $form->field($model, 'cat_text')->textInput(['maxlength' => true]) ?><?= $form->field($model, 'cat_text_bi')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'para_quest')->textarea() ?>

    <?= $form->field($model, 'para_quest_bi')->textarea() ?>
	
	<?= $form->field($model, 'benchmark')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>