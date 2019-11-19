<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Sale */

$this->title = 'Create Sale';
$this->params['breadcrumbs'][] = ['label' => 'Sales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sale-create">


    <?= $this->render('_form', [
        'model' => $model,
		'customer' => $customer,
    ]) ?>

</div>
