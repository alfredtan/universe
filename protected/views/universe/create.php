
<script type="text/javascript" src="/js/swfobject.js"></script>

<div id="flashContent" style="width:945px; height:806px">
	
</div>

<script>
	function universe_done(msg)
	{
		//alert(msg);
		location.href='<?php echo Yii::app()->createUrl('universe/view'); ?>';

	}
	
	
    swfobject.embedSWF("/swf/inti.swf", "flashContent", "945", "806", "10.0.0");

    
</script>