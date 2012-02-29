<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

<html>
	<head>
		<title><?php echo CHtml::encode(Yii::app()->name); ?></title>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.reveal.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/facebook.wrapper.js"></script>
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/reveal.css" type="text/css" rel="stylesheet">
		<style>
			body
			{
				margin:0px;
				padding:0px;
				width:497px;
			}
		</style>
	</head>
	<body>
		<div id="wrapper">
			<div><a target="_top" href="https://apps.facebook.com/localdevapp/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tab/tab-01.jpg" width="497" height="250" border="0"></a></div>
			<div><a target="_top" href="https://apps.facebook.com/localdevapp/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tab/tab-02.jpg" width="497" height="250" border="0"></a></div>
			<div><a target="_top" href="https://apps.facebook.com/localdevapp/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tab/tab-03.jpg" width="497" height="260" border="0"></a></div>
		</div>
		<?php echo $content; ?>
	</body>
</html>