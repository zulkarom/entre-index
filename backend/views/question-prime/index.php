<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Question Primes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="question-prime-index">


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'prime_name_bi',
			'benchmark',

            ['class' => 'yii\grid\ActionColumn',
                 'contentOptions' => ['style' => 'width: 8.7%'],
                'template' => '{view}',
                //'visible' => false,
                'buttons'=>[
                    'view'=>function ($url, $model) {
						return Html::a('<span class="glyphicon glyphicon-pencil"></span> UPDATE',['question-prime/update/', 'id' => $model->id],['class'=>'btn btn-warning btn-sm']);
                    }
                ],
            
            ],

        ],
    ]); ?>
</div>
</div>
</div>