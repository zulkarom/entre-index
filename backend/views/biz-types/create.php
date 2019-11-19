<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BizTypes */

$this->title = 'Create Biz Types';
$this->params['breadcrumbs'][] = ['label' => 'Biz Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="biz-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div></div>
</div>
