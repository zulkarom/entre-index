<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="sale-index">



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
			[
				 'attribute' => 'fullname',
				 'value' => 'customer.user.fullname'
			],
            'amount',
            'sale_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div></div>
</div>
