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
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/anythingslider.css" />

	<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
	<?php Yii::app()->clientScript->registerScriptFile('js/jquery.easing.1.2.js'); ?>
	<?php Yii::app()->clientScript->registerScriptFile('js/jquery.anythingslider.js'); ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="pagina">

	<header>
	</header>

	<nav>
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/sitio/index')),
				array('label'=>'Productos', 'url'=>array('/sitio/productos')),
				array('label'=>'Blog', 'url'=>array('/sitio/blog')),
				array('label'=>'Acerca de', 'url'=>array('/sitio/pagina', 'view'=>'acerca_de')),
				array('label'=>'Contacto', 'url'=>array('/sitio/contacto')),
				array('label'=>'Login', 'url'=>array('/sitio/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/sitio/logout'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Administración', 'url'=>array('/admin/portal/index'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</nav>
	<div class="clear"/>

	<?php echo $content; ?>

	<div class="clear"></div>

	<footer>
		<div class="derechos">
			&copy;2012 Gelatinas Gelicious. Todos los derechos reservados.
		</div>
	</footer>

</div><!-- page -->

</body>
</html>
