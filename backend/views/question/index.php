<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\QuestionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Questions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="question-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


	<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			'questionCat.cat_text_bi',
			
			[
				'attribute' => 'question_text_bi',
				'contentOptions' => [
					'style' => [
					   'max-width' => '600px',
					   'white-space' => 'normal',
				   ],
					
				]  
			]
            ,
			'benchmark',
            ['class' => 'yii\grid\ActionColumn',
				 'contentOptions' => ['style' => 'width: 8.7%'],
				'template' => '{request}',
				'buttons'=>[
					'request'=>function ($url, $model) {
						return '<a href="'.Url::to(['/question/update', 'id' => $model->id]).'" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-pencil"></span> UPDATE</a>';
					}
				],
			
			],

        ],
    ]); ?>
	
	</div>
</div>
</div>
</div>