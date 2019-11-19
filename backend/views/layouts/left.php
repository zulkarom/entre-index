<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/avatar5.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->fullname?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Main Menu', 'options' => ['class' => 'header']],
					//['label' => 'Dashboard', 'icon' => 'dashboard', 'url' => ['/site']],
                    
					['label' => 'Users', 'icon' => 'user', 'url' => ['/customer']],

					
					///customer
					[
                        'label' => 'Question',
                        'icon' => 'user',
                        'url' => '#',
                        'items' => [
                            
							['label' => 'Question Text', 'icon' => 'question', 'url' => ['/question'],],
							
							['label' => 'Sub Dimensions', 'icon' => 'file', 'url' => ['question-cat/index'],],
							
							['label' => 'Dimensions', 'icon' => 'file', 'url' => ['question-main/index'],],
							
							['label' => 'Main Dimensions', 'icon' => 'file', 'url' => ['question-prime/index'],],
							
							['label' => 'Description', 'icon' => 'file', 'url' => ['question-cat/description'],],
							

                        ],
                    ],
					
					['label' => 'Change Password', 'icon' => 'lock', 'url' => ['/user/change-password']],
					
					['label' => 'Log Out', 'icon' => 'arrow-left', 'url' => ['/site/logout'], 'template' => '<a href="{url}" data-method="post">{icon} {label}</a>']
					



					


                ],
            ]
        ) ?>

    </section>

</aside>
