<?php

class FacebookController extends Controller
{
	private $facebook;
	
	public function beforeAction($action)
	{
		header('P3P: CP="HONK"');
		// forces yii to create session first
		Yii::app()->session['time']=time();
		$this->facebook = new FacebookWrapper();
		return true;		
	}
	
	public function actionConnect()
	{
		$this->facebook->connect();
	}
	
	public function actionAuthorize()
	{
		$code = $_GET["code"];
		/*
		if(empty($code)) 
		{
			$_SESSION['state'] = md5(uniqid(rand(), TRUE)); //CSRF protection
			$dialog_url = "http://www.facebook.com/dialog/oauth?client_id=" 
				. Yii::app()->params['facebookAppId'] . "&redirect_uri=" . urlencode(Yii::app()->createAbsoluteUrl('/facebook/authorize')) . "&state="
			. $_SESSION['state'];
		
			echo("<script> top.location.href='" . $dialog_url . "'</script>");
		}
		
		if($_GET['state'] == $_SESSION['state']) 
		{*/
			$token_url = "https://graph.facebook.com/oauth/access_token?"
			. "client_id=" . Yii::app()->params['facebookAppId'] . "&redirect_uri=" . urlencode(Yii::app()->createAbsoluteUrl('/facebook/authorize'))
			. "&client_secret=" . Yii::app()->params['facebookAppSecret'] . "&code=" . $code;
		// echo $token_url . '<BR><BR>';
			$response = @file_get_contents($token_url);
			// echo $response . '<BR><BR>';
			// die($response);
			$params = null;
			parse_str($response, $params);
			
			$this->facebook->setAccessToken($params['access_token']) ;
			
			if($this->facebook->isConnected())
			{
				//$this->redirect('/universe');
				$this->redirect(Yii::app()->params['appUrl']);
			}
			else
			{
				echo 'facebook/authorize not connected';
			}
		/*}
		else 
		{
			//echo("The state does not match. You may be a victim of CSRF.");
		}*/
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}