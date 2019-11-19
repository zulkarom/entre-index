<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\QuestionCat */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Question Cats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="question-cat-view">

    <p>
	<?= Html::a('Back to list', ['index'], ['class' => 'btn btn-warning']) ?>
	
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <div class="box">
<div class="box-header"></div>
<div class="box-body"><?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cat_text',
            'pre_quest',
        ],
    ]) ?></div>
</div>

</div>
