<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="product-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Search Product (JAKIM)', ['search-jakim'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
		'options' => [ 'style' => 'width:100%;' ],
		
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
			'product_name',
            'company',
            'company_id',
            'expired_date',
            //'last_update',

			
			['class' => 'yii\grid\ActionColumn',
				 'contentOptions' => ['style' => 'width: 8.7%'],
				'visible'=> Yii::$app->user->isGuest ? false : true,
				'template' => '{view}'
			
			],
        ],
    ]); ?>
</div></div>
</div>



