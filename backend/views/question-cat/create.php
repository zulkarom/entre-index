<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\QuestionCat */

$this->title = 'Create Question Cat';
$this->params['breadcrumbs'][] = ['label' => 'Question Cats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-cat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
