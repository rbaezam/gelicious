<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'producto-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Clave'); ?>
		<?php echo $form->textField($model,'Clave',array('size'=>10,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'Clave'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'Nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Descripcion'); ?>
		<?php echo $form->textArea($model,'Descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Categoria_Id'); ?>
		<?php echo $form->dropDownList($model, 'Categoria_Id', $categorias, array('empty'=>'--Seleccione un valor--')); ?>
		<?php echo $form->error($model,'Categoria_Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Visible'); ?>
		<?php echo $form->checkBox($model,'Visible'); ?>
		<?php echo $form->error($model,'Visible'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Novedoso'); ?>
		<?php echo $form->checkBox($model,'Novedoso'); ?>
		<?php echo $form->error($model,'Novedoso'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Modificar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->