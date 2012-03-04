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
				width:100%;
				height:100%
			}
			
			#yt0
			{
				background:url(../images/canvas/button-submit.jpg) no-repeat;
				height:39px;
				width:149px;
				border:none;
				cursor:pointer;
			}
		</style>
	</head>
	<body>
		
		<?php echo $content; ?>
			
		<div id="fb-root"></div>
<script>

	
	/********************* FACEBOOK INIT ************************/
	
	// standard facebook init stuff
  window.fbAsyncInit = function() {
    FB.init(
    	{
    		appId: '<?php echo Yii::app()->params['facebookAppId']; ?>', 
    		status: true, 
    		cookie: true,
    		oauth:  true,
			xfbml: true,
			channelUrl : 'http://<?php echo $_SERVER['HTTP_HOST']; ?>/channel.html', // Channel File
			}
		);
		FB.Canvas.setAutoGrow();
		// add function here to trigger after FB.init completes
  };
	(function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
	
	function fb_share()
	{
		var obj = {
		          method: 'feed',
		          link: '<?php echo Yii::app()->params['fanPageUrl']; ?>',
		          picture: '<?php echo Yii::app()->params['feedIcon']; ?>',
		          name: 'Snap Your Free Rooms from AsiaRooms.com',
		          caption: "Just snap some photos on the virtual instant camera, and snap more when you win 2-night room stays with breakfasts, transfers and/or spa packages. There's a prize every week, for 12 weeks!",
		        };
		    FB.ui(obj,function(){});
	}

</script>

	</body>
</html>