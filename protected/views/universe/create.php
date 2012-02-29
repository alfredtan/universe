<div id="flashContent" style="width:945px; height:806px">
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="945" height="806" id="Untitled-1" align="middle">
		<param name="movie" value=""<?php echo Yii::app()->request->baseUrl; ?>/swf/inti.swf" />
		<param name="quality" value="high" />
		<param name="bgcolor" value="#ffffff" />
		<param name="play" value="true" />
		<param name="loop" value="true" />
		<param name="wmode" value="transparent" />
		<param name="scale" value="showall" />
		<param name="menu" value="true" />
		<param name="devicefont" value="false" />
		<param name="salign" value="" />
		<param name="allowScriptAccess" value="sameDomain" />
		<!--[if !IE]>-->
		<object type="application/x-shockwave-flash" data=""<?php echo Yii::app()->request->baseUrl; ?>/swf/inti.swf" width="945" height="806">
			<param name="movie" value="<?php echo Yii::app()->request->baseUrl; ?>/swf/inti.swf" />
			<param name="quality" value="high" />
			<param name="bgcolor" value="#ffffff" />
			<param name="play" value="true" />
			<param name="loop" value="true" />
			<param name="wmode" value="transparent" />
			<param name="scale" value="showall" />
			<param name="menu" value="true" />
			<param name="devicefont" value="false" />
			<param name="salign" value="" />
			<param name="allowScriptAccess" value="sameDomain" />
		<!--<![endif]-->
			<a href="http://www.adobe.com/go/getflash">
				<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
			</a>
		<!--[if !IE]>-->
		</object>
		<!--<![endif]-->
	</object>
</div>

<script>
	function universe_done(msg)
	{
		//alert(msg);
		location.href='<?php echo Yii::app()->createUrl('universe/view'); ?>';

	}
	
</script>