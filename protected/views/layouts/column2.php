<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-5 last">
		<div id="sidebar">
        <?php $this->widget('CTreeView',array('persist'=>'cookie','data'=>Tree::model()->getTreeList(),'animated'=>'fast','htmlOptions'=>array('id'=>'treeview')));?>
		</div><!-- sidebar -->
	</div>
	<div class="span-19">
		<div id="content">
			<div id="position">
				<?php $this->widget('zii.widgets.CBreadcrumbs', array(
					'homeLink'=>CHtml::link('网站管理',Yii::app()->homeUrl),
					'links'=>$this->breadcrumbs,
				)); ?><!-- breadcrumbs -->
				<?php $this->widget('zii.widgets.CMenu', array(
					'items'=>$this->menu,
					'htmlOptions'=>array('class'=>'operations'),
				)); ?>
			</div>
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
</div>
<?php $this->endContent(); ?>