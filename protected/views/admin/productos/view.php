<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->Nombre,
);

$this->menu=array(
	array('label'=>'Listado de productos', 'url'=>array('index')),
	array('label'=>'Agregar producto', 'url'=>array('create')),
	array('label'=>'Modificar producto', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Buscar producto', 'url'=>array('admin')),
	array('label'=>'Eliminar producto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'¿Seguro que desea eliminar el producto seleccionado?')),
);
?>

<h1>Ver Producto: "<?php echo $model->Nombre; ?>"</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Clave',
		'Nombre',
		'Descripcion',
		'Slug',
		array(
			'label'=>'Categoría',
			'value'=>$model->categoria->Nombre,
		),
		array(
			'label'=>'Visible?',
			'type'=>'raw',
			'value'=>CHtml::checkBox('Visible', $model->Visible, array('disabled'=>'disabled'))
		),
		array(
			'label'=>'Novedoso?',
			'type'=>'raw',
			'value'=>CHtml::checkBox('Novedoso', $model->Novedoso, array('disabled'=>'disabled'))
		),
		array(
			'label'=>'Publicado',
			'type'=>'raw',
			'value'=>date('d/m/y', strtotime($model->Fecha_Publicacion))
		)
	),
)); ?>
