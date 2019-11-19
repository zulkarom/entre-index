<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="users-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
	
	
	
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            //'authKey',
            // 'accessToken',
            'fullname',
            'email:email',
            // 'user_active',
            // 'user_deleted',
            // 'user_account_type',
            // 'user_has_avatar',
            // 'user_remember_me_token',
            // 'created_at',
            // 'user_last_login',
            // 'user_failed_logins',
            // 'user_last_failed_login',
            // 'user_activation_hash',
            // 'user_password_reset_hash',
            // 'password_reset_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
	
	
	
	
	
</div></div>
</div>
