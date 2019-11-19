<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sub Dimension';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="question-cat-index">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			'cat_text_bi',
			'benchmark',

            ['class' => 'yii\grid\ActionColumn',
				 'contentOptions' => ['style' => 'width: 8.7%'],
				'template' => '{request} {desc}',
				'buttons'=>[
					'request'=>function ($url, $model) {
						return '<a href="'.Url::to(['/question-cat/update', 'id' => $model->id]).'" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span> UPDATE</a>';
					},
					'desc'=>function ($url, $model) {
						return '<a href="'.Url::to(['/question-cat/update-desc', 'id' => $model->id]).'" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-pencil"></span> DESC</a>';
					}
				],
			
			],
        ],
    ]); ?>
</div></div>
</div>
