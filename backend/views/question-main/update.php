<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionMain */

$this->title = 'Update Question Main';
$this->params['breadcrumbs'][] = ['label' => 'Question Mains', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="question-main-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
