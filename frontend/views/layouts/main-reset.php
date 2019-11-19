<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

frontend\models\MainAsset::register($this);
$directoryAsset = Yii::$app->assetManager->getPublishedUrl('@frontend/views/myasset');
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
	
	<style>
	.txt-m{
font-weight:bold;
font-size:16px;
}
.toc-m{
font-weight:bold;
}
.txt-en{
font-style:italic;
font-weight:normal;
}
.txt-no{
font-weight:bold;
font-size:16px;
}
.txt-h2{
font-weight:bold;
font-size:25px;	
}

.txt-h3{
font-weight:bold;
font-size:23px;	
}
.txt-h4{
font-weight:bold;
font-size:20px;	
}

.txt-h5{
font-weight:bold;
font-size:18px;	
}

.opttd:hover {
	background-color: yellow;
}
.ticklabel:hover{
	background-color: yellow;
}
.activecell{
	background-color: yellow;
}
	</style>

	
	
</head>
<body>
<?php $this->beginBody() ?>


<div class="super_container">

	<!-- Header -->

	<header class="header">
			
		<!-- Top Bar -->
		

		<!-- Header Content -->
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="logo_container mr-auto">
								<a href="#">
									<div class="logo_text"><img src="<?=$directoryAsset?>/img/rpei.jpg" width="200" /></div>
								</a>
							</div>
				<?php 
				
				function menu($mm = false){
					$lbl_logout = 'LOG OUT';
					if(Yii::$app->user->isGuest){
						$arr = [
							'HOME' => Url::to(['/site/index']),
							'LOGIN' => Url::to(['/user/login']),
							'REGISTER' => Url::to(['/user/register']),
							'ABOUT' => '#'
						];
					}else{
						$arr = [
							'HOME' => Url::to(['/site/index']),
							'QUESTION' => Url::to(['/question/index']),
							'RESULT' => Url::to(['result/index']),
							'PROFILE' => Url::to(['user-setting/change-password']),
							$lbl_logout => Url::to(['site/logout'])
							
						];
					}
					
					$str = '';$cl = '';
					if($mm){
						$cl = ' class="menu_mm"';
					}
					foreach($arr as $label=>$url){
						$str .= '<li'.$cl.'>';
						if($label == $lbl_logout){
							$str .= Html::a($label, $url, ['data-method' => 'POST']);
						}else{
							$str .= '<a href="'.$url.'">'.$label.'</a>';
						}
						
						$str .= '</li>';
					}
					
					return $str;
				}
				
				?>
							<nav class="main_nav_contaner">
								<ul class="main_nav">
									<?=menu()?>
								</ul>
							</nav>
							<div class="header_content_right ml-auto text-right">
								<div class="header_search">
									<div class="search_form_container">
										<form action="#" id="search_form" class="search_form trans_400">
											<input type="search" class="header_search_input trans_400" placeholder="Type for Search" required="required">
											<div class="search_button">
												<i class="fa fa-search" aria-hidden="true"></i>
											</div>
										</form>
									</div>
								</div>

								<!-- Hamburger -->

								<div class="user"><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></div>
								<div class="hamburger menu_mm">
									<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

	</header>

	<!-- Menu -->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>

		<nav class="menu_nav">
			<ul class="menu_mm">
				<?=menu(true)?>
			</ul>
		</nav>

	</div>
	
	<?= Alert::widget() ?>

	<br />
	
	<div class="courses">
		<div class="container" style="width:70%;margin: 0 auto">
	<?=$content?>
	
	</div>
	</div>


	<!-- Footer -->

	<footer class="footer">
		<div class="footer_body">
			<div class="container">
				<div class="row">

					<!-- Newsletter -->
					

					<!-- About -->
					<div class="col-lg-2 offset-lg-3 footer_col">
						<div>
							<div class="footer_title">About Us</div>
							<ul class="footer_list">
								<li><a href="#">Questions</a></li>
								<li><a href="#">Team</a></li>
								<li><a href="#">Brand Guidelines</a></li>

								<li><a href="#">Contact us</a></li>
							</ul>
						</div>
					</div>

					<!-- Help & Support -->
					<div class="col-lg-2 footer_col">
						<div class="footer_title">Help & Support</div>
						<ul class="footer_list">
							<li><a href="#">Discussions</a></li>
							<li><a href="#">Troubleshooting</a></li>

						</ul>
					</div>

					<!-- Privacy -->
					<div class="col-lg-2 footer_col clearfix">
						<div>
							<div class="footer_title">Privacy & Terms</div>
							<ul class="footer_list">
								<li><a href="#">Community Guidelines</a></li>
								<li><a href="#">Terms</a></li>

							</ul>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="copyright_content d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-start">
							<div class="cr">
							
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made by Skyhint Design | Template by <a style="color:#a5a5a5" href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->


</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
