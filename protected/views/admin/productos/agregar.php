<?php $this->layout='admin'; ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'producto-agregar-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos marcados con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre'); ?>
		<?php echo $form->error($model,'Nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Descripcion'); ?>
		<?php echo $form->textField($model,'Descripcion'); ?>
		<?php echo $form->error($model,'Descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Slug'); ?>
		<?php echo $form->textField($model,'Slug'); ?>
		<?php echo $form->error($model,'Slug'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Categoria_Id'); ?>
		<?php echo $form->textField($model,'Categoria_Id'); ?>
		<?php echo $form->error($model,'Categoria_Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Visible'); ?>
		<?php echo $form->textField($model,'Visible'); ?>
		<?php echo $form->error($model,'Visible'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Novedoso'); ?>
		<?php echo $form->textField($model,'Novedoso'); ?>
		<?php echo $form->error($model,'Novedoso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Fecha_Publicacion'); ?>
		<?php echo $form->textField($model,'Fecha_Publicacion'); ?>
		<?php echo $form->error($model,'Fecha_Publicacion'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->