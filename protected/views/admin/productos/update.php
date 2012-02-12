<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->Nombre=>array('view','id'=>$model->Id),
	'Modificar',
);

$this->menu=array(
	array('label'=>'Listado de productos', 'url'=>array('index')),
	array('label'=>'Agregar producto', 'url'=>array('create')),
	array('label'=>'Ver producto', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Buscar producto', 'url'=>array('admin')),
);
?>

<h1>Modificar Producto: "<?php echo $model->Nombre; ?>"</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'categorias'=>$categorias)); ?>

<?php echo CHtml::link('Agregar presentación', '#', array(
	'onclick'=>'$("#dlg_presentacion").dialog("open"); return false;',
)); ?>

<?php

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id'=>'dlg_presentacion',
	'options'=>array(
		'title'=>'Agregar presentación',
		'autoOpen'=>false,
		'width'=>480
	),
));

?>

<div class="form-presentacion">

	<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'presentacion-form',
	'enableAjaxValidation'=>false,
	'action'=>array('admin/presentaciones/create')
)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($modelPresentacion,'Nombre'); ?>
		<?php echo $form->textField($modelPresentacion,'Nombre',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($modelPresentacion,'Nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelPresentacion,'Precio'); ?>
		<?php echo $form->textField($modelPresentacion,'Precio',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($modelPresentacion,'Precio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($modelPresentacion,'Visible'); ?>
		<?php echo $form->checkBox($modelPresentacion,'Visible'); ?>
		<?php echo $form->error($modelPresentacion,'Visible'); ?>
	</div>

	<hr/>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Agregar'); ?>
		<?php echo CHtml::button('Cancelar', array('onclick'=>'$("#dlg_presentacion").dialog("close");',)); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->

<?php

$this->endWidget('zii.widgets.jui.CJuiDialog');

?>

<script type="text/javascript">

$(function() {
	$("#presentacion-form").submit(function(e) {
		e.preventDefault();
		var forma = $("#presentacion-form");
		$.ajax({
			url:forma.attr('action'),
			type:forma.attr('method'),
			dataType:'json',
			success: function(datos) {
				alert(datos);
			}
		})
	})
});

</script>

