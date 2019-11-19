<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionMain */

$this->title = $model->main_name;
$this->params['breadcrumbs'][] = ['label' => 'Question Mains', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-main-view">


    <p>
	<?= Html::a('Back', ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

   <div class="box">
<div class="box-header"></div>
<div class="box-body"> <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'main_name',
        ],
    ]) ?></div>
</div>

</div>
