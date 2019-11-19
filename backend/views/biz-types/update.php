<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BizTypes */

$this->title = 'Update Biz Types: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Biz Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="biz-types-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div></div>
</div>
