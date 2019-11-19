<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\models\QuestionCat */

$this->title = 'Description for ' . $model->cat_text_bi;
$this->params['breadcrumbs'][] = ['label' => 'Question Cats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = $this->title ;
?>
<div class="question-cat-update">


<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="question-cat-form">

    <?php $form = ActiveForm::begin(); ?>
	


    <?= $form->field($model, 'desc_low')->textarea(['rows' => 10]) ?>

    <?= $form->field($model, 'desc_medium')->textarea(['rows' => 10]) ?>
	
	<?= $form->field($model, 'desc_high')->textarea(['rows' => 10]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
</div>

</div>
