<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Id'); ?>
		<?php echo $form->textField($model,'Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Descripcion'); ?>
		<?php echo $form->textArea($model,'Descripcion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Slug'); ?>
		<?php echo $form->textField($model,'Slug',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Categoria_Id'); ?>
		<?php echo $form->textField($model,'Categoria_Id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Visible'); ?>
		<?php echo $form->textField($model,'Visible'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Novedoso'); ?>
		<?php echo $form->textField($model,'Novedoso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Fecha_Publicacion'); ?>
		<?php echo $form->textField($model,'Fecha_Publicacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->