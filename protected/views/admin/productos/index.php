<?php
$this->breadcrumbs = array ('Productos' );

$this->menu = array (array ('label' => 'Agregar Producto', 'url' => array ('create' ) ), array ('label' => 'Buscar un Producto', 'url' => array ('admin' ) ) );
?>

<h1>Productos</h1>

<?php

$this->widget ( 'zii.widgets.CListView', 
		array ('dataProvider' => $dataProvider, 
				'itemView' => '_view', 
				'emptyText' => 'No hay productos registrados.',
				'summaryText' => 'Mostrando {start}-{end} de {count} registros' )

 );
?>
