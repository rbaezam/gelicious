<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'Listado de productos', 'url'=>array('index')),
	array('label'=>'Agregar producto', 'url'=>array('create')),
	array('label'=>'Modificar producto', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Buscar producto', 'url'=>array('admin')),
	array('label'=>'Eliminar producto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'¿Seguro que desea eliminar el producto seleccionado?')),
);
?>

<h1>View Producto #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'Nombre',
		'Descripcion',
		'Slug',
		array(
			'label'=>'Categoría',
			'value'=>$model->categoria->Nombre,
		),
		'Visible',
		'Novedoso',
		'Fecha_Publicacion',
	),
)); ?>
