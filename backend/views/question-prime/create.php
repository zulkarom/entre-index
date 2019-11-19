<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\QuestionPrime */

$this->title = 'Create Question Prime';
$this->params['breadcrumbs'][] = ['label' => 'Question Primes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-prime-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
