
<script type="text/javascript" src="/js/swfobject.js"></script>

<div id="universe_create" style="width:945px; height:806px">
	
</div>

<script>
	var flashvars = {fbid:<?php echo $data['fbid']; ?>, name:'<?php echo $data['name']; ?>'};
	var params = {allowScriptAccess:'always'};
	var attributes = {id:'universe_create', name:'universe_create'};

    swfobject.embedSWF("/swf/inti.swf", "universe_create", "945", "806", "10.0.0", "/swf/expressInstall.swf", flashvars, params, attributes);
    
    
	function universe_done(msg)
	{
		//alert(msg);
		location.href='<?php echo Yii::app()->createUrl('universe/view'); ?>';

	}
	
	function invite_friends()
	{
		var max_recipient_count = 3;
				
				
				FB.ui({method: 'apprequests',
	          message: "message goes here",
	          max_recipients:max_recipient_count,
	        }, requestCallback);
	}
	
	function requestCallback(data)
	{
		if(!data)
		{
			//console.log('no data');
			return;
		}
		else
		{
			var movie = document.getElementById("universe_create");
			// var t = {0:'name', 1:'two', 3:'twtwtw'}
			movie.invitedFriends(data['to']);
		}
	}
	
	
	

    
</script>