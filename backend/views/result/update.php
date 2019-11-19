<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Result */

$this->title = 'Update Result: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Results', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="result-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
