<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Question */

$this->title = 'Update Question';
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="question-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div></div>
</div>
