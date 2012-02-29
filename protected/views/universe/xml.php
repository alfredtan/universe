<items>
	<?php 
		foreach ($data as $k=>$arr)
		{
	?>
	<item>
		<id><![CDATA[<?php echo $arr['id']; ?>]]></id>
		<name><![CDATA[<?php echo $arr['name']; ?>]]></name>
		<image><![CDATA[http://<?php echo $_SERVER['HTTP_HOST'] .  Yii::app()->request->baseUrl . '/images/universe/'. $type . '/' . $arr['id']; ?>.png]]></image>
		<enabled><![CDATA[<?php echo $arr['enabled']; ?>]]></enabled>
	</item>
	<?php
		}
	?>
</items>