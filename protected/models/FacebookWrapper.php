<?php

require('facebook/facebook.php');


class FacebookWrapper 
{
	private $facebook;


	public function FacebookWrapper()
  {
    	$this->facebook = new Facebook(array(
		  'appId'  => Yii::app()->params['facebookAppId'],
		  'secret' => Yii::app()->params['facebookAppSecret']
		));
		
		$signed_request = $this->facebook->getSignedRequest();

		// use signed_request access token if available
		if(isset($signed_request['oauth_token']))
		{
			$_SESSION['access_token'] = $signed_request['oauth_token'];
			$this->setAccessToken($signed_request['oauth_token']);
		}		
		// if not, check for session access_token
		else if( isset($_SESSION['access_token']))
		{
			$this->setAccessToken($_SESSION['access_token']);
		}
  }
	
	public function getSignedRequest()
	{
		return $this->facebook->getSignedRequest();
	}
	
	public function connect()
	{
		if (!$this->getFbid()) 
		{
			//die('die ' . $this->getLoginURL());
			die('1');
		    echo "<script type='text/javascript'>top.location.href = '" . $this->getLoginURL() . "';</script>";
		    exit;
		}
		else {
		    try 
		    {
	        		$this->fbuser				=   $this->getMe();
					return true;
		
		    } 
		    catch (FacebookApiException $e) 
		    {
		    	die($this->getLoginURL());
		        echo "<script type='text/javascript'>top.location.href = '" . $this->getLoginURL() . "';</script>";
		        exit;
		    }
		}
				
	}
	
	public function getLoginURL()
	{
		return $this->facebook->getLoginUrl(
	        array(
	        'redirect_uri'=> Yii::app()->createAbsoluteUrl('/facebook/authorize'),
	        'scope' => Yii::app()->params['facebookAppScope']
			)
		);
	}
	
	public function setAccessToken($access_token)
	{
		$this->facebook->setAccessToken($access_token);
	}
	
	public function getAccessToken()
	{
		return $this->facebook->getAccessToken();
	}
	
	public function isConnected()
	{
		try 
	    {
	        $this->getMe();
				return true;
	    }
		catch (FacebookApiException $e) 
	    {
	    	//die($e->getMessage());
	        return false;
	    }
	}
	
	
	
	// ----- user objects starts here -------
	public function deleteObjectId($id)
	{
		try 
		{
			return $this->facebook->api("/$id",'DELETE');
    }          
		catch (FacebookApiException $e) 
		{
			//echo "error: ". $e->getMessage();
    }
	}
	 
	public function getFbid()
	{
		// return 552072128;	
		return $this->facebook->getUser();
	}
	
	// get the user data AND profile pic
	public function getMe()
	{
		$res = $this->facebook->api('/me?access_token=' . $this->getAccessToken());
		return $res;
	}
	
	function postToMyWall($params)
	{
		return $this->facebook->api('/me/feed','POST',$params);
	}
	
	public function attributeNames()
    {
            
    }
	
	public function uploadPhoto($params)
	{
		$this->facebook->setFileUploadSupport(true);
		return $this->facebook->api('/me/photos', 'POST', $params );
	}
	
	public function tagPhoto($photoid, $fbid)
	{
		return $this->facebook->api($photoid . '/tags/' . $fbid, 'POST' );
	}
}
