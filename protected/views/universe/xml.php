<items>
	<?php 
		foreach ($data as $k=>$arr)
		{
	?>
	<item>
		<id><![CDATA[<?php echo $arr['id']; ?>]]></id>
		<name><![CDATA[<?php echo $arr['name']; ?>]]></name>
		<image><![CDATA[http://<?php echo $_SERVER['HTTP_HOST'] .  Yii::app()->request->baseUrl . '/images/universe/'. $type . '/' . $arr['id']; ?>-small.png]]></image>
		<headline><![CDATA[<?php echo $arr['headline']; ?>]]></headline>
		<description><![CDATA[<?php echo $arr['tooltip']; ?>]]></description>
		<enabled><![CDATA[<?php echo $arr['enabled']; ?>]]></enabled>
	</item>
	<?php
		}
	?>
</items>