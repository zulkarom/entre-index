<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User';
$this->params['breadcrumbs'][] = $this->title;
?>

  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="customer-index">


  

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
				[
				 'label' => 'Full Name' ,
				 'attribute' => 'fullname',
				 'value' => 'user.fullname'
				 ],
				 
				 
				 [
				 'label' => 'Email' ,
				 'attribute' => 'username',
				 'value' => 'user.username'
				 ],
				 
	
				 
				 [
				 'label' => 'Allow Access' ,
				 'attribute' => 'is_block',
				 'format' => 'html',
				 'value' => function($model){
					 $block = $model->is_block;
					 if($block == 1){
						 return '<span class="label label-danger">NO</span>';
					 }else{
						 return '<span class="label label-success">YES</span>';
					 }
				 }
				 ],
				 
				 [
				 'label' => 'Progress' ,
				 'format' => 'html',
				 'value' => function($model){
					 $page = $model->page->curr_page;
					 if($page >= 16){
						 return '<span class="label label-success">FINISHED</span>';
					 }else{
						 return '<span class="label label-info">PAGE '.$page.'</span>';
					 }
				 }
				 ],
				
			
            ['class' => 'yii\grid\ActionColumn',
				 'contentOptions' => ['style' => 'width: 20.7%'],
				'visible'=> Yii::$app->user->isGuest ? false : true,
				'template' => '{set} {view} {pdf} ',
				'buttons'=>[
					'pdf'=>function ($url, $model) {
						return Html::a(
						'<span class="fa fa-file-pdf-o"></span> PDF',
						['customer/pdf', 'id' => $model->user_id],
						['class' => 'btn btn-danger btn-sm', 'target' => '_blank']);
					},
					'view'=>function ($url, $model) {
						return Html::a(
						'<span class="glyphicon glyphicon-eye-open"></span> View',
						['customer/view', 'id' => $model->id],
						['class' => 'btn btn-primary btn-sm']);
					},
					'set'=>function ($url, $model) {
						return Html::a(
						'<span class="glyphicon glyphicon-cog"></span>',
						['customer/sale', 'id' => $model->id],
						['class' => 'btn btn-default btn-sm']);
					}
				]
			
			],
        ],
    ]); ?>
</div></div>
</div>
