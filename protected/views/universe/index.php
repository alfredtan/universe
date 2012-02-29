<?php

?>

<div>
	main content. <a href="javascript:;" onclick="reveal_registration()">register</a>
</div>

<div id="myModal" class="reveal-modal small">
			<div id="form-msg" style="padding:5px; color:#f00; font-size:14px; font-family:Arial"></div>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'register-form',
				'enableAjaxValidation'=>true,
			)); ?>
			Name <?php echo $form->textField($model,'name', array('class'=>'', 'value'=>'')); ?><br><br>
			NRIC <?php echo $form->textField($model,'nric', array('class'=>'', 'value'=>'')); ?><br><br>
			Mobile <?php echo $form->textField($model,'mobile', array('class'=>'', 'value'=>'')); ?><br><br>
			Email <?php echo $form->textField($model,'email', array('class'=>'', 'value'=>'')); ?>
			Campus
			<?php
			echo CHtml::activeDropDownList( 
				Campus::model(),
				'id', 
				CHtml::listData( Campus::model()->findAll(), 'id', 'name'), 
				array('empty'=>'- Select one -', 'class'=>'styled', 'style'=>'')
				);
			?>
				
				<br><br>
				<?php echo CHtml::ajaxSubmitButton(
						'Submit', 
						CHtml::normalizeUrl(array('universe/register')), 
						array(
							'beforeSend'=> 'js:function(){
								$("#form-msg").html("Please wait...");
							}',
							'success'=> 'js:function(data){onSuccess(data)}',
							'complete'=> 'js:function(){}'
						) 
				); ?>
				<?php $this->endWidget(); ?>
			<a class="close-reveal-modal">&#215;</a>
		</div>
		

<script>
	
	function reveal_registration()
	{
			$('#myModal').reveal({
			     animation: 'fade',                   //fade, fadeAndPop, none
			     animationspeed: 300,                       //how fast animtions are
			     closeonbackgroundclick: false,              //if you click background will modal close?
			});
			//Custom.init();
	}
	
	function onSuccess(d)
	{
		var msg = '';
		d= $.parseJSON(d);
		//console.log(d);
		if ( d.status == 'fail')
		{
			for (x in d.data)
			{
					msg = msg + d.data[x][0] + "<br>";
			}
			$("#form-msg").html(msg);
		}
		else if ( d.status =='success')
		{
			alert('yay');
			$("#form-msg").html('Successful!');
			//location.href='<?php echo Yii::app()->request->baseUrl; ?>/index.php/fanpage/snap';
		}
	}
</script>