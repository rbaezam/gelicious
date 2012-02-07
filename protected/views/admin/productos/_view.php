<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Id), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->Descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Slug')); ?>:</b>
	<?php echo CHtml::encode($data->Slug); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Categoria_Id')); ?>:</b>
	<?php echo CHtml::encode($data->Categoria_Id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Visible')); ?>:</b>
	<?php echo CHtml::encode($data->Visible); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Novedoso')); ?>:</b>
	<?php echo CHtml::encode($data->Novedoso); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Publicacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Publicacion); ?>
	<br />

	*/ ?>

</div>