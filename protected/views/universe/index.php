
<div style="width:100%;">
	<table width="946" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/canvas/app-page_01.jpg" width="946" height="472" /></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="946" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="471" align="left" valign="top"><table width="471" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/canvas/app-page_02.jpg" width="471" height="38" /></td>
              </tr>
              <tr>
                <td align="left" valign="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/canvas/app-page_07.jpg" width="471" height="62" /></td>
              </tr>
            </table></td>
            <td width="73" align="left" valign="top"><table width="73" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top"><a href="javascript:;"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/canvas/app-page_03.jpg" width="73" height="38" /></a></td>
              </tr>
              <tr>
                <td align="left" valign="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/canvas/app-page_08.jpg" width="73" height="62" /></td>
              </tr>
            </table></td>
            <td width="89" align="left" valign="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/canvas/app-page_04.jpg" width="89" height="100" /></td>
            <td width="214" align="left" valign="top"><a href="javascript:;" onclick="reveal_registration()"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/canvas/app-page_05.jpg" width="214" height="100" /></a></td>
            <td align="left" valign="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/canvas/app-page_06.jpg" width="99" height="100" /></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/canvas/app-page_09.jpg" width="946" height="129" /></td>
      </tr>
      <tr>
        <td align="left" valign="top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/canvas/app-page_10.jpg" width="946" height="397" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
</div>

<div id="myModal" class="reveal-modal large">
			<div><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/canvas/reg-form-header.jpg" width="595" height="95" border="0">
			<div id="form-msg" style="padding:5px; color:#f00; font-size:12px; font-style:italic; font-family:Arial"></div>
            <div>
            	<?php $form=$this->beginWidget('CActiveForm', array(
                    'id'=>'register-form',
                    'enableAjaxValidation'=>true,
                )); ?>
            	<table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="30"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/canvas/reg-field-name.jpg" width="133" height="25" alt="Name" /></td>
                    <td><?php echo $form->textField($model,'name', array('class'=>'', 'value'=>'')); ?></td>
                  </tr>
                  <tr>
                    <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/canvas/reg-field-ic.jpg" width="133" height="25" alt="IC" /></td>
                    <td><?php echo $form->textField($model,'nric', array('class'=>'', 'value'=>'')); ?></td>
                  </tr>
                  <tr>
                    <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/canvas/reg-field-mobile.jpg" width="133" height="25" alt="Mobile" /></td>
                    <td><?php echo $form->textField($model,'mobile', array('class'=>'', 'value'=>'')); ?></td>
                  </tr>
                  <tr>
                    <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/canvas/reg-field-email.jpg" width="133" height="25" alt="Email" /></td>
                    <td><?php echo $form->textField($model,'email', array('class'=>'', 'value'=>'')); ?></td>
                  </tr>
                  <tr>
                    <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/canvas/reg-field-location.jpg" width="133" height="32" alt="Email" /></td>
                    <td><?php
                echo CHtml::activeDropDownList( 
                    Campus::model(),
                    'id', 
                    CHtml::listData( Campus::model()->findAll(), 'id', 'name'), 
                    array('empty'=>'- Select one -', 'class'=>'styled', 'style'=>'')
                    );
                ?></td>
                  </tr>
                  <tr>
                  	<td>&nbsp;</td>
                  	<td  style="font-family: arial; font-size:11px; color: #666666; font-style: italic"><input type="checkbox" id="tnc" value="true" name="tnc"><label for="tnc">I have read and agreed to the Terms and Conditions</label></td>
                  </tr>
                 <tr><td colspan="2">&nbsp;</td></tr>
                 <tr>
                 	<td>&nbsp;</td>
                    <td><?php echo CHtml::ajaxSubmitButton(
						'', 
						CHtml::normalizeUrl(array('universe/register')), 
						array(
							'beforeSend'=> 'js:function()
							{
								if($("#tnc:checked").val()=="true")
								{
									$("#form-msg").html("Please wait...");	
								}
								else
								{
									$("#form-msg").html("Please agree to the Terms &amp; Conditions.");
									return false;
								}
							}',
							'success'=> 'js:function(data){onSuccess(data)}',
							'complete'=> 'js:function(){}'
						) 
				); ?></td>
                </tr>
                </table>
				<?php $this->endWidget(); ?>
			</div>
				<br><br>
				
				
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
			//alert('yay');
			$("#form-msg").html('Successful!');
			location.href='<?php echo Yii::app()->createUrl('universe/create'); ?>';
		}
	}
</script>

 <map name="Map" id="Map">
          <area shape="rect" coords="472,30,545,57" href="#" alt="Share" />
          <area shape="rect" coords="633,27,844,102" href="javascript:;" onclick="reveal_registration()" alt="Uni-verse Here I Come!" />
        </map>