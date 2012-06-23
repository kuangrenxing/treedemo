<?php
$this->breadcrumbs=array(
	'菜单管理'=>array('admin'),
	'新建菜单',
);

$this->menu=array(
	array('label'=>'返回列表', 'url'=>array('admin')),
);
?>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>