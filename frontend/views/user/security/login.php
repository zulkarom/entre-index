<?php

/*
 * This file is part of the Dektrium project.
 *
 * (c) Dektrium project <http://github.com/dektrium>
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

use dektrium\user\widgets\Connect;
use dektrium\user\models\LoginForm;
use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/views/myasset');

/**
 * @var yii\web\View $this
 * @var dektrium\user\models\LoginForm $model
 * @var dektrium\user\Module $module
 */

$this->title = 'ELI - LOGIN PAGE';
$this->params['breadcrumbs'][] = $this->title;



?>

<?= $this->render('/_alert', ['module' => Yii::$app->getModule('user')]) ?>

	<br />
<div class="row">
<div class="col-md-4"></div>

<div class="col-md-4">

<div class="courses">
		<div class="container">
			<div class="row">
				<div class="col">
					<h2 class="section_title text-center">LOGIN</h2>
				</div>
				
				
				
				
			</div>
			<br>

			<br>

	            <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                    'validateOnBlur' => false,
                    'validateOnType' => false,
                    'validateOnChange' => false,
                ]) ?>
				
				<?=$form->field($model, 'login')
						->label('EMAIL')
            ->textInput()
                    ;
                    ?>
				

				
                    <?= $form->field(
                        $model,
                        'password'
                     )
                        ->passwordInput()
                         ->label('PASSWORD')
                           
                         ?>

                <?php /// $form->field($model, 'rememberMe')->checkbox(['tabindex' => '3']) ?>

                                

                                <?= Html::submitButton(
                    Yii::t('user', 'LOG IN'),
                    ['class' => 'btn btn-primary']
                ) ?>
	
	


                <?php ActiveForm::end(); ?>
				<br />
        
        <?php if ($module->enableRegistration): ?>
            <p class="text-center">
                <?= Html::a('REGISTER', ['/user/registration/register'], ['class' => 'field-label text-muted mb10']) ?>
            </p>
        <?php endif ?>
		
		<?php if ($module->enablePasswordRecovery): ?>
            <p class="text-center">
                <?= Html::a('FORGOT PASSWORD',
                           ['/user/recovery/request'],['class' => 'field-label text-muted mb10', 'tabindex' => '5']
                                ) ?>
            </p>
        <?php endif ?>
		
		<?php if ($module->enableConfirmation): ?>
            <p class="text-center">
                <?= Html::a('RESEND EMAIL CONFIRMATION', ['/user/registration/resend'],['class' => 'field-label text-muted mb10', 'tabindex' => '6']) ?>
            </p>
        <?php endif ?>
		
		
		
		
		
        <?= Connect::widget([
            'baseAuthUrl' => ['/user/security/auth'],
        ]) ?>
			
			
		</div>
	</div>
</div>

</div>

    

