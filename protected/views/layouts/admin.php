<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/principal.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="pagina">

	<header>
	</header>

	<nav>
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/admin/index')),
				array('label'=>'Productos', 'url'=>array('/admin/productos')),
				array('label'=>'Artículos', 'url'=>array('/admin/articulos')),
				array('label'=>'Clientes', 'url'=>array('/admin/clientes')),
				array('label'=>'Encargos', 'url'=>array('/admin/encargos')),
				array('label'=>'Sitio público', 'url'=>array('/sitio/index')),
				array('label'=>'Salir', 'url'=>array('/sitio/logout')),
			),
		)); ?>
	</nav>
	<div class="clear"/>
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<div id="content">
		<?php echo $content; ?>
	</div>

	<div class="clear"></div>

	<footer>
		<div class="derechos">
			&copy;2012 Gelatinas Gelicious. Todos los derechos reservados.
		</div>
	</footer>

</div><!-- page -->

</body>
</html>
