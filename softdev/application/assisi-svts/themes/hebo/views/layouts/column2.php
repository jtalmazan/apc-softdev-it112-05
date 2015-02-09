<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<section class="main-body">
  <div class="container">
  <div class="row-fluid">
    <div class="span3">
    <?php
      $this->beginWidget('zii.widgets.CPortlet', array(
        'title'=>'<h3>Menus</h3>',
      ));
      $this->widget('zii.widgets.CMenu', array(
        'items'=>$this->menu,
        'htmlOptions'=>array('class'=>'nav nav-list'),
        'itemCssClass'=>'item-test',
      ));
      $this->endWidget();
      $this->beginWidget('zii.widgets.CPortlet', array(
        'title'=>'<h3>Reports</h3>',
      ));
      $this->widget('zii.widgets.CMenu', array(
        'items'=>$this->report,
        'htmlOptions'=>array('class'=>'nav nav-list'),
        'itemCssClass'=>'item-test',
      ));
      $this->endWidget();
    ?>
    </div>
	
    <div class="span9">        
        <?php echo $content; ?>
	 </div> 
  </div>
</div>
</section>
<?php $this->endContent(); ?>