<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = $model->user->email;
$this->params['breadcrumbs'][] = ['label' => 'Customer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
<div class="box-header"></div>
<div class="box-body"><div class="customer-view">

    <p>
        <?= Html::a('Back to List', ['index'], ['class' => 'btn btn-warning']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
			'user.email',
			'user.created_at:datetime',
			
        ],
    ]) ?>

</div></div>
</div>
