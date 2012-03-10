<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>

<html>
	<head>
		<title><?php echo CHtml::encode(Yii::app()->name); ?></title>
		<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>-->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.reveal.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/facebook.wrapper.js"></script>
		<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/reveal.css" type="text/css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/default.css" type="text/css" rel="stylesheet">
		<style>
			
			#tncModal
			{
				font-family:Arial, Helvetica, sans-serif;
				font-size:12px;
				color:#545454;
				
				
			}
			
			#tncModal #container
			{
				height:500px;
				overflow:auto;
				margin:10px 0px 10px 0px;
			}
			
			#tncModal p
			{
				line-height:100%;
				margin:0px 0px 15px 0px;
				padding:0px;
			}
			
			#tncModal h3
			{
				margin:0px;
				padding:0px;
				font-size:14px;
				line-height:100%;
			}
			
			#tncModal th,
			#tncModal td
			{
				font-size:12px;
				color:#545454
			}
		</style>
			<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-29749665-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

	function _trackga(pagename)
	{
		_gaq.push(['_trackPageview', pagename]);	
	}
</script>
	</head>
	<body>
		<div class="main">
	<div><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tab_wide/copy.png" width="492" height="307" /></div>
    <div class="cta"><a href="<?php echo Yii::app()->params['appUrl']; ?>" target="_top"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tab_wide/cta.png" alt="Build My Uni-Verse Now!" width="250" height="110" border="0" /></a></div>
</div>
<div><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/tab_wide/tnc.jpg" width="810" height="33" border="0" usemap="#Map" /></div>
		<div id="tncModal" class="reveal-modal large">
          	<div id="container">
            	<p>This "Uni-Verse" ("Contest") is organized by INTI International University & Colleges (""INTI"). INTI is also the administrator for the Contest. By registering to take part in this Contest, the person doing so shall be taken to have fully and unconditionally agreed to be bound by the terms and conditions stated hereinafter:</p>
            <h3>Eligibility</h3>
            <p>No purchase or payment is required to participate in this Contest. The Contest is open to all SPM, STPM & UEC 2011 exam leavers whom are registered participants at fb.com/inti.edu ("Participant") other than the employees of INTI and their immediate families, INTI's associated agencies (advertising and promotion agents), and their immediate families. The Participant must be citizens or permanent residents of Malaysia above the age of eighteen (18) years with a valid National Registration Identification Card (“NRIC”) number (12-digit) at the time of participation of the Contest. Participant under the age of eighteen (18) must seek parental and/or guardian approval to participate.</p>
            
              <h3>Contest Period</h3>
				<p>The Contest will commence on 5 March 2012 and end on 15 April 2012, 11.59pm ("Contest Period"). INTI reserves the absolute right to vary or amend the duration of the Contest Period if it is deemed necessary. All entries received prior or subsequent to the Contest Period will not be entertained.</p>
            
            <h3>Prizes</h3>
			<p>INTI will give away 500 pairs of Movie Tickets, 30 Polaroid cameras and 3 iPad 2 16GB WiFi to the respective winners throughout the Contest Period as per stated.</p> 
              <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <th width="150" align="left">Prize Unit</th>
                <th align="left">No. of Winners</th>
              </tr>
              <tr>
                <td>500 pairs of Movie Tickets</td>
                <td>Every 10th participant</td>
              </tr>
              <tr>
                <td>30 Polaroid Cameras</td>
                <td>Every 100th participant</td>
              </tr>
              <tr>
                <td>3 iPad 2 16GB WiFi</td>
                <td>Every 1,000th participant</td>
              </tr>
            </table>
              	<br>&nbsp;
              <p>Each Participant shall be entitled to win only one (1) prize during the Contest Period. Selection of winners will be based on correctly answered question, time based and will be on a first come first served basis.</p>
              <p>The selected Participant will be contacted by the representative of INTI via phone on the 15th (or any other date as determined by INTI) of the following month to answer verify the Participant’s details and for the said Participant to collect the prizes from INTI’s campus that the Participant has selected. If the selected Participant fails to verify the details entered via the contest form correctly and to collect the prize from INTI’s campus, the said Participant will be automatically disqualified to participate further in the said month and INTI will select the next Participant to become a winner.</p>
              <p>Prizes are not exchangeable for cash or items in kind, and are not transferrable. INTI reserves the right to change the prize(s) at its discretion to another prize(s) or a cash prize of similar or lesser value without any prior notice. The prizes are subject to any other terms and conditions as may be imposed by INTI from time to time.</p>
              
             <h3> Liability and Responsibility</h3>
              <p>INTI shall not be liable for any defects (physical or operational) to the prizes nor to the merchantable quality of the same. INTI gives no representation or warranty with respect to the condition of the prizes, which shall be given on “as is basis”. INTI shall further hold no responsibility to replace any prize that is lost, stolen or defective (whether due to physical or operational defects, under warranty or otherwise). Participants are to deal directly with the manufacturer of the prizes for any matters/issues concerning any applicable warranty of the prizes.</p>
              <p>Unless expressly specified otherwise by INTI, the prizes will be provided as a “stand-alone” product and shall not include any miscellaneous accessories or services made available in the market for such prizes regardless of any of the aforesaid accessories are displayed in any promotional materials of the Contest which shall include but not limited to posters or leaflets the illustration of which is meant for illustrative purposes only. All charges, costs and expenses (which shall include but not limited to postal charges), which may be incurred in connection to the delivery of the prizes shall be solely borne by the recipients.</p>
              <p>The Participants shall not be entitled to claim for any compensation from INTI for any loss and damage suffered or incurred by the Participants due to any amendments, alterations or modifications of the Terms and Conditions and cancellation, termination or suspension of the Contest. INTI shall not be liable for any representations, injuries, loss or damages incurred directly or indirectly by the Participants due to the former’s participation in the Contest and/or action or omission of INTI.</p>
              
              <h3>General Terms and Conditions</h3>
              <p>The laws of Malaysia shall govern this Contest. This Contest is void where prohibited or restricted by any local, national, state, or any governmental laws. This Contest is also subject to these Terms and Conditions.</p>
              <p>INTI reserves the exclusive right to amend, alter or modify the Terms and Conditions of this Contest wholly or in part at any time it deems necessary and reserves the right to terminate or cancel the Contest at its absolute discretion. Any amendments, alterations or modifications of the Terms and Conditions shall be effective when posted on the Facebook page. Participants are advised to check the page from time to time for any such notifications/announcements. </p>
              <p>INTI may in its discretion refuse to award any prize to any participants who fail to comply with these Terms and Conditions.  All relevant instructions on the website (if any) form part of these Terms and Conditions.</p>
              <p>INTI reserves the right to request winner(s) to provide proof of identity, proof of residency, proof of age in order to claim a prize. Proof of identification, residency, age and entry considered suitable for verification is at the discretion of INTI. In the event that a winner cannot provide suitable proof, the winner will forfeit the prize in whole and no substitute will be offered.</p>
              <p>INTI's decision on any and/or all matters relating to the Contest including the selection of the names of the winners, the terms and conditions herein or any amendments to the same shall be final, binding and conclusive and no correspondence will be entertained.</p>
              <p>Participants whom have participated in other contests organized by INTI prior to Uni-Verse is not eligible to participate and win prizes.</p>
              <p>Participants whom are participating in others contests organized by INTI with third party sites is not eligible to participate and win prizes.</p>

              <h3>Data Protection</h3>
              <p>This campaign is in no way sponsored, endorsed or administered by, or associated with Facebook. All participants’ information and details will be submitted to INTI and not to Facebook.</p>
              <p>The information you provide to the INTI International University & Colleges (INTI) will be processed in accordance with the provisions of the Personal Data Protection Act (1998) and any other relevant legislation.</p>
              <p>This data may be used to provide you with further information about relevant services. It may be held on a mailing list or database for this purpose, unless you object (by notifying the University in writing); this data may also be used by INTI for publicity, promotional and marketing purpose and it may also be passed on to a third party (a ‘data processor’) with whom the University has formally contracted to process your data for this purpose, subject to the safeguards concerning privacy and security of data set out in the Act.</p>
            </div>
              <a class="close-reveal-modal">&#215;</a>
        </div>
		<?php echo $content; ?>
        <script>
		function showtnc()
	{
			$('#tncModal').reveal({
			     animation: 'none',                   //fade, fadeAndPop, none
			     animationspeed: 300,                       //how fast animtions are
			     closeonbackgroundclick: false              //if you click background will modal close?
			});
			//Custom.init();
	}
	</script>
	</body>
      <map name="Map" id="Map">
    <area shape="rect" coords="702,6,803,28" href="javascript:;" onClick="showtnc()" alt="Terms &amp; Conditions" />
  </map>
</html>