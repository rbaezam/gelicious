<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Buscar',
);

$this->menu=array(
	array('label'=>'Listado de productos', 'url'=>array('index')),
	array('label'=>'Agregar producto', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('producto-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Buscar productos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'producto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'Clave',
		'Nombre',
		'Descripcion',
		'Slug',
		'Categoria_Id',
		'Visible',
		/*
		'Novedoso',
		'Fecha_Publicacion',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
