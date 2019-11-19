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
					 if($page == 18){
						 return '<span class="label label-success">FINISHED</span>';
					 }else{
						 return '<span class="label label-info">PAGE '.$page.'</span>';
					 }
				 }
				 ],
				
			
            ['class' => 'yii\grid\ActionColumn',
				 'contentOptions' => ['style' => 'width: 20.7%'],
				'visible'=> Yii::$app->user->isGuest ? false : true,
				'template' => '{update} {login}',
				'buttons'=>[
					'login'=>function ($url, $model) {
						return Html::a(
						'<span class="glyphicon glyphicon-user"></span> User Page',
						['customer/login-as', 'id' => $model->user_id],
						['class' => 'btn btn-primary btn-sm', 'target' => '_blank']);
					},
					'update'=>function ($url, $model) {
						return Html::a(
						'<span class="glyphicon glyphicon-cog"></span> Update',
						['customer/sale', 'id' => $model->id],
						['class' => 'btn btn-warning btn-sm', 'data-method' => 'post']);
					}
				]
			
			],
        ],
    ]); ?>
</div></div>
</div>
