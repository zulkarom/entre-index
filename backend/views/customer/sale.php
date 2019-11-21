<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\Question;
use kartik\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = 'QUESTION SET';
$this->params['breadcrumbs'][] = ['label' => 'Customer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php $form = ActiveForm::begin(); ?>
<div class="row">
<div class="col-md-6">
<div class="box">
<div class="box-header"></div>
<div class="box-body">


<div class="row">
<div class="col-md-6">
<?php

$yesno = [0 => 'YES', 1 => 'NO'];

echo $form->field($model, 'is_block')
->dropDownList($yesno)->label('Allow Access');

echo $form->field($model, 'sale_amt', [
    'addon' => ['prepend' => ['content'=>'RM']]
]);

$model->currpage = $model->page->curr_page;
echo $form->field($model, 'currpage')->label('Current Page');


 ?>
</div>
</div>

        
    
      

</div>
</div>
</div>
<div class="col-md-6">
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
			//'page.curr_page'
			
        ],
    ]) ?>

</div></div>
</div>
</div>



</div>


  <div class="form-group">
            <?= Html::submitButton('Update', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

