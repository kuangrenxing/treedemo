<?php
$this->breadcrumbs=array(
	'菜单管理'=>array('admin'),
	'菜单修改',
);

$this->menu=array(
	array('label'=>'新建菜单', 'url'=>array('create')),
	array('label'=>'返回列表', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>