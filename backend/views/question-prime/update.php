<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionPrime */

$this->title = 'Update Question Prime';
$this->params['breadcrumbs'][] = ['label' => 'Question Primes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="question-prime-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
