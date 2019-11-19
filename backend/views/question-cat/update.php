<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionCat */

$this->title = 'Update Dimension';
$this->params['breadcrumbs'][] = ['label' => 'Question Cats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="question-cat-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
