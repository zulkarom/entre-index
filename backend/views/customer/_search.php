<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ClaimSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>
    
<div class="row">
<div class="col-md-6"></div>
<div class="col-md-6"><?= $form->field($model, 'box_search', ['addon' => ['prepend' => ['content'=>'<span class="glyphicon glyphicon-search"></span> Search']]])->label(false)->textInput(['placeholder' => "Type name or email and press enter ..."]) ?></div>
</div>

<?php ActiveForm::end(); ?>
