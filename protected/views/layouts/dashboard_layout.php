<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

<html>
	<head>
		<title><?php echo CHtml::encode(Yii::app()->name); ?></title>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.reveal.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/facebook.wrapper.js"></script>
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/reveal.css" type="text/css" rel="stylesheet">
		<style>
			body,
			table
			{
				font-family:Arial;
				font-size:12px;
				color:#333333;
			}
			
			th.left
			{
				text-align:left;
			}
			
			.nav
			{
				font-size:16px;
				font-weight:bold;
			}
		</style>
			
	</head>
	<body>
		<?php echo $content; ?>
	</body>
</html>