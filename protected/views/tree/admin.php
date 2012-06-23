<?php
$this->breadcrumbs=array(
	'菜单管理'=>array('admin'),
);

$this->menu=array(
	array('label'=>'新建菜单', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('category-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'category-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array(
			'name'=>'id',
			'htmlOptions'=>array(
                'width'=>'60',
				'style'=>'text-align:center',
             ),
        ),
		array(
			'name'=>'title',
			'htmlOptions'=>array(
				'style'=>'text-align:center',
             ),
        ),
		array(
			'header' => '操作',
			'class'=>'CButtonColumn',
			'htmlOptions'=>array(
				'width'=>'100',
				'style'=>'text-align:center',
			),
			'buttons' => array(
				'moveup'=>array(
		    		'label'=>'上移',
		    		'url'=>'array("moveup","id"=>$data->id)',
		   			'imageUrl'=>Yii::app()->request->baseUrl.'/css/up.gif',
				),
				'movedown'=>array(
		    		'label'=>'下移',
		    		'url'=>'array("movedown","id"=>$data->id)',
		   			'imageUrl'=>Yii::app()->request->baseUrl.'/css/down.gif',
				),
 			),
			'template'=>'{moveup} {movedown} {update} {delete}',
		),
	),
)); ?>