<script type="text/javascript">
	$(function() {
		$("#slider").anythingSlider({
			width: 800,
			easing: 'easeInOutExpo',
			autoPlay:true,
			startText:'Iniciar',
			stopText:'Detener'
		});
	});
</script>

<h1>Bienvenidos a Gelatinas Gelicious</h1>

<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec bibendum, odio ut varius hendrerit, nulla tortor fringilla est, ut tincidunt quam felis vitae arcu. Donec porttitor turpis vitae magna eleifend sollicitudin. Proin adipiscing volutpat orci, a rutrum felis interdum sed. Nulla vestibulum congue fermentum. In elementum porta sodales. Nullam non sem et urna posuere facilisis non a nunc. Sed ante purus, semper a pretium et, tristique ut sem. Maecenas et dolor sed lacus convallis rutrum. Donec gravida convallis ipsum. Curabitur tortor ipsum, porta et placerat a, mollis nec risus. Curabitur fermentum dolor non diam commodo a feugiat lectus auctor. Etiam nunc augue, tincidunt ac euismod sed, ultrices sit amet sem. Pellentesque vehicula, erat non mattis commodo, lorem tellus hendrerit nisi, vel ullamcorper massa dolor non massa. Mauris facilisis metus sodales justo elementum luctus. Morbi eget ipsum vel mauris vulputate fringilla. Pellentesque vitae lectus massa.
</p>

<p>
Aliquam quam odio, ultricies vel hendrerit bibendum, pharetra ut nisl. Ut varius, risus vitae aliquet ullamcorper, velit justo sollicitudin tortor, id bibendum est tortor non diam. Suspendisse hendrerit, tortor eget lacinia tristique, diam mi rhoncus quam, quis adipiscing arcu odio vitae orci. Ut eget dolor dui. Sed consequat rhoncus rutrum. Morbi at eros tellus. Nunc ac felis ut lorem interdum laoreet eget interdum erat. Nunc faucibus molestie tristique. Nulla commodo convallis sollicitudin. Integer justo magna, euismod ut ullamcorper sed, feugiat eget dui. Cras vulputate malesuada tellus ac tincidunt. Donec vitae nulla sit amet elit venenatis facilisis. Donec posuere auctor cursus. Etiam pretium suscipit ultricies. Mauris luctus, massa at dictum euismod, quam leo accumsan purus, ultricies malesuada erat ipsum quis enim.
</p>

<ul id="slider">
	<li>
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/gelicious1.jpg" title="imagen1"/>
	</li>
	<li>
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/gelicious2.jpg" title="imagen2"/>
	</li>
	<li>
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/gelicious3.jpg" title="imagen3"/>
	</li>
	<li>
		<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/gelicious4.jpg" title="imagen4"/>
	</li>
</ul>

<div class="clear"></div>