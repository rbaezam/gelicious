<h1>Productos</h1>

<ul class="lista_productos">
<?php foreach ($productos as $producto) { ?>
	<li>
		<div class="producto">
			<h3><?php echo CHtml::link(CHtml::encode($producto->Nombre), array('verProducto', 'id'=>$producto->Id)); ?></h3>
		</div>
	</li>
<?php } ?>
</ul>