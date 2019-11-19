<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Question */

$this->title = 'Create Question';
$this->params['breadcrumbs'][] = ['label' => 'Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="question-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div></div>
</div>
