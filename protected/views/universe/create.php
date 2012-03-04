
<script type="text/javascript" src="/js/swfobject.js"></script>

<div id="universe_create" style="width:945px; height:806px"></div>

<!-- -->

<div id="myModal" class="reveal-modal large">
			<div><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/canvas/pop-quiz-header.jpg" width="300" height="60" border="0">
			<div id="form-msg" style="padding:5px; color:#f00; font-size:12px; font-style:italic; font-family:Arial"></div>
            <div>
            	<?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'register-form',
                    'enableAjaxValidation'=>true,
                )); ?>
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/canvas/how-many-campuses.jpg" width="242" height="21" /></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr>
                  	<td><select id="Quiz[total]" name="Quiz[total]">
                  	  <option value="" selected="selected">Select one</option>
                  	  <option value="1">1</option>
                  	  <option value="2">2</option>
                  	  <option value="3">3</option>
                  	  <option value="4">4</option>
                  	  <option value="5">5</option>
                  	  <option value="6">6</option>
                  	  <option value="7">7</option>
                  	  <option value="8">8</option>
                    </select></td>
                  	<td  style="font-family: arial; font-size:11px; color: #666666; font-style: italic">&nbsp;</td>
                  </tr>
                 <tr><td>&nbsp;</td>
                   <td>&nbsp;</td>
                 </tr>
                 <tr>
                 	<td><?php echo CHtml::ajaxSubmitButton(
						'', 
						CHtml::normalizeUrl(array('universe/quiz')), 
						array(
							'beforeSend'=> 'js:function()
							{
								
								$("#form-msg").html("Please wait...");	
							}',
							'success'=> 'js:function(data){onSuccess(data)}',
							'complete'=> 'js:function(){}'
						) 
				); ?></td>
                    <td>&nbsp;</td>
                </tr>
                </table>
				<?php $this->endWidget(); ?>
			</div>
				<br><br>
				
				
			<a class="close-reveal-modal">&#215;</a>
		</div>

<!-- -->

<script>
	var flashvars = {fbid:<?php echo $data['fbid']; ?>, name:'<?php echo $data['name']; ?>'};
	var params = {allowScriptAccess:'always', wmode:'transparent'};
	var attributes = {id:'universe_create', name:'universe_create'};

    swfobject.embedSWF("/swf/inti.swf", "universe_create", "945", "806", "10.0.0", "/swf/expressInstall.swf", flashvars, params, attributes);
    
	
	function quiz()
	{
			$('#myModal').reveal({
			     animation: 'none',                   //fade, fadeAndPop, none
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
			
			// send to flash
			$('#myModal').trigger('reveal:close');
			var movie = document.getElementById("universe_create");
			// var t = {0:'name', 1:'two', 3:'twtwtw'}
			movie.quizComplete();
			//$("#form-msg").html('Successful!');
			
		}
	}
	
	function universe_done(msg)
	{
		//alert(msg);
		location.href='<?php echo Yii::app()->createUrl('universe/view'); ?>';

	}
	
	function invite_friends()
	{
		var max_recipient_count = 3;
				
				
				FB.ui({method: 'apprequests', display:'popup',
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