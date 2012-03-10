var fb_login_status = null;

function doConnect(cb)
{
	FB.login(function(response) 
	{
		//console.log('login status is: ' + response.status)
		if(response.status=="connected")
		{
			fb_login_status="connected";
			$.post( "/facebook/accesstoken", {'access_token': FB.getAccessToken()} );
			$.get( "/universe/registered",  function(data){
				if(data=='true')
				{
					location.href="/universe/create";
				}
				else
				{
					reveal_registration();
				}
			})
			//$.get( "/universe/me", function(d){});
			//$.post(location.href='/universe/?register'
		}
	}, {scope:'publish_stream,user_photos'});
}
			 
function getLoginStatus()
{
	FB.getLoginStatus(function(response) 
	{
		// console.log ('login statuss: ' + response.status);
		fb_login_status=response.status;
		if (response.status=='connected') 
		{
			$.post( "/facebook/accesstoken", {'access_token': FB.getAccessToken()} );
			//$.get("/index.php/fanpage/processrequest")
		} 
		else
		{
			//console.log('disonnecting');
				$.get('/facebook/disconnect');
			//console.log('not connected')
		}
	}, true);
}
