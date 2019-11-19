<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->product_name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="product-view">

<p>
        <?= Html::a('Update Expired Date', ['update-jakim', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'product_name',
            'company',
            'company_id',
            'expired_date',
            'last_update',
        ],
    ]) ?>

</div></div>
</div>
