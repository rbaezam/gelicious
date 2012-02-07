<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Producto', 'url'=>array('index')),
	array('label'=>'Create Producto', 'url'=>array('create')),
	array('label'=>'View Producto', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Producto', 'url'=>array('admin')),
);
?>

<h1>Update Producto <?php echo $model->Id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>