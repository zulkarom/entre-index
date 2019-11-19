<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ResultSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="result-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


<div class="box">
<div class="box-header"></div>
<div class="box-body">    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'customer.user.email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?></div>
</div>
</div>
