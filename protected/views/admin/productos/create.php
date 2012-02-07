<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Agregar',
);

$this->menu=array(
	array('label'=>'Lista de productos', 'url'=>array('index')),
	array('label'=>'Buscar producto', 'url'=>array('admin')),
);
?>

<h1>Agregar Producto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'categorias'=>$categorias)); ?>