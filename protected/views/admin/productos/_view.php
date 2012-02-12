<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('Clave')); ?>:</b>
	<?php echo CHtml::encode($data->Clave); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->Nombre), array('view', 'id'=>$data->Id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->Descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Slug')); ?>:</b>
	<?php echo CHtml::encode($data->Slug); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Categoria_Id')); ?>:</b>
	<?php echo CHtml::encode($data->categoria->Nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Visible')); ?>:</b>
	<?php echo CHtml::checkBox('visible', $data->Visible, array('disabled'=>'disabled')); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Novedoso')); ?>:</b>
	<?php echo CHtml::checkBox('novedoso', $data->Novedoso, array('disabled'=>'disabled')); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Fecha_Publicacion')); ?>:</b>
	<?php echo CHtml::encode($data->Fecha_Publicacion); ?>
	<br />

	*/ ?>

</div>