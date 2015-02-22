<section id="navigation-main">  
<div class="navbar">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
  
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
						array(
                            'label'=>'Home', 
                            'url'=>array('/site/index'),
                            'linkOptions'=>array(
                                "data-description"=>"our home page"
                            )
                        ),
                        array(
                            'label'=>'About', 
                            'url'=>array('/site/page', 'view'=>'about'),
                            'linkOptions'=>array(
                                "data-description"=>"what we are about"
                            )
                        ),
                        array(
                            'label'=>'Contact', 
                            'url'=>array('/site/contact'),
                            'visible'=>Yii::app()->user->isGuest, 
                            'linkOptions'=>array(
                                "data-description"=>"inquiry suggestions"
                            )
                        ),
                        array(
                            'label'=>'Operations', 
                            'url'=>array('/site/dashboard'),
                            'visible'=>Yii::app()->user->checkAccess('Coordinator'), 
                            'linkOptions'=>array(
                                "data-description"=>"view menus"
                            )
                        ),
                       /* array(
                            'label'=>'Coordinator\'s Operations', 
                            'url'=>array('/grades/admin'),
                            'visible'=>Yii::app()->user->checkAccess('Coordinator'),
                            'linkOptions'=>array(
                                "data-description"=>"add grades"
                            )
                        ),*/
                       /* array(
                            'label'=>'Scholars', 
                            'url'=>array('/profile/admin','type'=>'Student'),
                            'visible'=>Yii::app()->user->checkAccess('profile/admin'), 
                            'linkOptions'=>array(
                                "data-description"=>"view scholars"
                            )
                        ),
                        array(
                            'label'=>'Coordinator', 
                            'url'=>array('/profile/admin','type'=>'Coordinator'),
                            'visible'=>Yii::app()->user->checkAccess('profile/admin'),
                            'linkOptions'=>array(
                                "data-description"=>"view coordinators"
                            )
                        ),
                        array(
                            'label'=>'School', 
                            'url'=>array('/school/admin'),
                            'visible'=>Yii::app()->user->checkAccess('school/admin'),
                            'linkOptions'=>array(
                                "data-description"=>"view schools"
                            )
                        ),
                         array(
                            'label'=>'Sponsor', 
                            'url'=>array('/sponsor/admin'),
                            'visible'=>Yii::app()->user->checkAccess('sponsor/admin'),
                            'linkOptions'=>array(
                                "data-description"=>"view sponsors"
                            )
                        ),
						array(
                            'label'=>'Coordinator\'s Operations', 
                            'url'=>array('/grades/admin'),
                            'visible'=>Yii::app()->user->checkAccess('Coordinator'),
                            'linkOptions'=>array(
                                "data-description"=>"add grades"
                            )
                        ),*/
                        array(
                            'label'=>'Login', 
                            'url'=>array('/site/login'), 
                            'visible'=>Yii::app()->user->isGuest,
                            'linkOptions'=>array(
                                "data-description"=>"member area",
                                'class'=>'login-link'
                            )
                        ),
                        array(
                            'label'=>Yii::app()->session['Fullname'], 
                            'url'=>array('#'),
                            'visible'=>!Yii::app()->user->isGuest,
                            'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),
                            'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown","data-description"=>"member area"),
                            'items'=>array(
                                array(
                                   'label'=>'Edit Profile',
                                   'url'=>array('/profile/personalView', 'id'=>Yii::app()->session['profileId']), 
                                   ),
                                array(
                                   'label'=>'Change Password',
                                   'url'=>array('/password/change', 'id'=>Yii::app()->session['profileId']), 
                                   ),
                                array(
                                    'label'=>'Logout',
                                    'url'=>array('/site/logout'),
                                    ),
                                ),
                           
                        ),
                    ),
                )); ?>
    	</div>
    </div>
	</div>
</div>
</section><!-- /#navigation-main -->