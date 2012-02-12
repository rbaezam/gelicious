<div>
	<?php echo CHtml::link('Regresar al listado', array('productos')) ?>
	<?php echo CHtml::link('Ver más de ' . $producto->categoria->Nombre) ?>
</div>

<div class="producto">

	<h1><?php echo CHtml::encode($producto->Nombre); ?></h1>

	<p>
		<?php echo CHtml::encode($producto->Descripcion); ?>
	</p>
	
</div>
