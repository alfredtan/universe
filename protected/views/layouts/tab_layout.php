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
				<table width="494" border="0" cellspacing="0" cellpadding="0">
			  <tr>
			    <td align="left" valign="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tab/tab-page_01.png" width="494" height="281" /></td>
			  </tr>
			  <tr>
			    <td align="left" valign="top"><table width="494" border="0" cellspacing="0" cellpadding="0">
			      <tr>
			        <td width="62" align="left" valign="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tab/tab-page_02.png" width="62" height="55" /></td>
			        <td width="152" align="left" valign="top"><a target="_top" href="https://apps.facebook.com/localdevapp/"><img border="0" src="<?php echo Yii::app()->request->baseUrl; ?>/images/tab/tab-page_03.png" width="152" height="55" /></a></td>
			        <td align="left" valign="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tab/tab-page_04.png" width="280" height="55" /></td>
			      </tr>
			    </table></td>
			  </tr>
			  <tr>
			    <td align="left" valign="top"><table width="494" border="0" cellspacing="0" cellpadding="0">
			      <tr>
			        <td width="62" align="left" valign="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tab/tab-page_05.png" width="62" height="21" /></td>
			        <td width="152" align="left" valign="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tab/tab-page_06.png" width="152" height="21" /></td>
			        <td align="left" valign="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tab/tab-page_07.png" width="280" height="21" /></td>
			      </tr>
			    </table></td>
			  </tr>
			  <tr>
			    <td align="left" valign="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tab/tab-page_08.jpg" width="494" height="402" /></td>
			  </tr>
			  <tr>
			    <td height="20" align="center" valign="middle" bgcolor="#000000"><span style="font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#999999;">© Copyright 2012 INTI International University & Colleges. All Rights Reserved.  <a href="#" style="color:#999999;">Terms & Conditions</a></span></td>
			  </tr>
			</table>
		</div>
		
		<?php echo $content; ?>
	</body>
</html>