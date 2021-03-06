<?php
/*
 * SELECT c.id as campusId, c.name as campusName, c.headline as campusHeadline, c.tooltip as campusTooltip, s.id as courseId, s.name as courseName, s.headline as courseHeadline, s.tooltip as courseTooltip FROM `campus_course` cc
left join campus c on cc.campusId=c.id 
right join course s on cc.courseId=s.id
 * */
class UniverseController extends Controller
{
	public $layout = '//layouts/app_layout';
	
	private $facebook;
	
	public function beforeAction($action)
	{
		header('P3P: CP="HONK"');
		// forces yii to create session first
		Yii::app()->session['time']=time();
		$this->facebook = new FacebookWrapper();
		return true;
	}
	
	
	public function actionIndex()
	{
		
		// $this->facebook->connect();
		// die($this->facebook->getAccessToken());
		
		// echo $this->facebook->getFbid();
// die();		
		$user = User::model()->findByPk($this->facebook->getFbid());
		$universe = $this->getLatestUniverse();
		if( count($user)==1 )
		{
			if( count($universe) == 0 )
			{
			header('location: /universe/create');				
			}
			else
			{
			header('location: /universe/view');
				
			}
		}
		
		//echo $this->facebook->getFbid();
		$model = new User;
		$register=false;
		if( isset($_GET['register']) )
		{
			$register=true;
		}
		$this->render('index', array('model'=>$model, 'register'=>$register));
	}
	
	public function actionRegistered()
	{
		$user = User::model()->findByPk($this->facebook->getFbid());
		if( count($user)==1 )
		{
			echo 'true';
		}
		else
		{
			echo 'false';
		}
	}
	
	
	public function actionMe()
	{
		try
		{
			$this->facebook->getMe();
		}
		catch (Exception $e)
		{
			
		}
	}
	
	public function actionRegister()
	{
		
		if( Yii::app()->request->isAjaxRequest )
		{
			
			if($this->facebook->getFbid()==0)
			{
				$response = array(
					'status'=>'fail',
					'data'=>array("error"=>array("An error has occured"))
				);
				echo CJSON::encode( $response );
				die();
			}
			
			// check if this user has registered via fbid
			$user = User::model()->findbyPk($this->facebook->getFbid());
			if(count($user)==1)
			{
				$response = array(
					'status'=>'fail',
					'data'=>array("error"=>array("An error has occured"))
				);
				echo CJSON::encode( $response );
				die();
			}
			
			
			// check if user's nric is registered via nric
			$user = User::model()->find('nric=:nric', array(':nric'=>$_POST['User']['nric']));
			if(count($user)==1)
			{
				$response = array(
					'status'=>'fail',
					'data'=>array("error"=>array("Oops. Your NRIC has been registered."))
				);
				echo CJSON::encode( $response );
				die();
			}
			
			
			$model = new User;
			// for User
			$_POST['User']['fbid']=$this->facebook->getFbid();
			$_POST['User']['name'] = ( $_POST['User']['name']=='Name') ? '' : $_POST['User']['name'];
			$_POST['User']['email'] = ( $_POST['User']['email']=='Email') ? '' : $_POST['User']['email'];
			$_POST['User']['nric'] = ( $_POST['User']['nric']=='Nric') ? '' : $_POST['User']['nric'];
			$_POST['User']['mobile'] = ( $_POST['User']['mobile']=='Mobile') ? '' : $_POST['User']['mobile'];
			
			$_POST['User']['campusId'] = $_POST['Campus']['id'];
			$model->attributes = $_POST['User'];
			
			if( $model->validate() && $model->save())
			{
				$response = array(
					'status'=>'success',
					'data'=>''
				);				
			}
			else 
			{
					$response = array(
					'status'=>'fail',
					'data'=> $model->getErrors()
				);
			}
			
			echo CJSON::encode( $response );
		}
	}
	
	public function actionFinish()
	{
		if ( isset ( $GLOBALS["HTTP_RAW_POST_DATA"] )) 
		{
			$universe = $this->getLatestUniverse();
			
		    //the image file name   
		    $fileName = 'images/created_universe/'. $this->facebook->getFbid() . '_' . $universe['id'] . '.jpg';
		
		    // get the binary stream
		    $im = $GLOBALS["HTTP_RAW_POST_DATA"];
		
		    //write it
		    $fp = fopen($fileName, 'wb');
		    fwrite($fp, $im);
		    fclose($fp);
		
		    //echo the fileName;
		    //echo $fileName;
		    
		    $this->uploadImageToFacebook();
		}  
		else 
		    echo 'result=An error occured.';
	}
	
	public function getLatestUniverse()
	{
		return Universe::model()->find('fbid=:fbid order by id desc', array(':fbid'=>$this->facebook->getFbid()));
	}
	
	public function actionView()
	{
		$universe = $this->getLatestUniverse();
		$message = $this->getMessage();
		$this->render('view', array('universe'=>$universe, 'message'=>$message));
	}
	
	
	public function actionPhoto($id)
	{
		$img = file_get_contents('https://graph.facebook.com/' . $id . '/picture?type=square');
		echo $img;
	}
	
	public function actionQuiz()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			$quiz = Quiz::model()->findByPk($this->facebook->getFbid());
			if(count($quiz)>0) 
			{
				$response = array(
					'status'=>'success',
					'data'=> ''
				);
			}
			else
			{
				$quiz = new Quiz;
				$_POST['Quiz']['fbid'] = $this->facebook->getFbid();
				$quiz->attributes = $_POST['Quiz'];
				
				if($quiz->validate() && $quiz->save() )
				{
					$response = array(
						'status'=>'success',
						'data'=> ''
					);
				}
				else
				{
					$response = array(
						'status'=>'fail',
						'data'=> $quiz->getErrors()
					);
				}
			}
			
			echo CJSON::encode( $response );
		}
	}

	public function actionUp()
	{
		try{
			// $this->facebook->connect();
			$universe = $this->getLatestUniverse();
			if( count($universe)==0 ) return;
			
			$file= 'images/created_universe/' . $this->facebook->getFbid() . '_' . $universe['id'] . '.jpg';
			
			$args = array(
			        'message' => $this->getMessage() . '

			        Find out how you can create your own Uni-verse here and stand a chance to win an iPad 2 and other great prizes!
			        ' . Yii::app()->params['appUrl'],
			        'source' => '@' . realpath($file)
			        );
	
			$resp = $this->facebook->uploadPhoto($args);
		}
		catch( Exception $e)
		{
			// if there's an error, most probably it is permsision issue. ignore it
			echo $e->getMessage();
			die();
		}
	}

	//In your Uni-verse,you are a World traveling Entrepreneur who enjoys badminton at the beach on the weekends with your chess crew, friends
	public function uploadImageToFacebook()
	{
		try{
			$this->facebook->connect();
			$universe = $this->getLatestUniverse();
			if( count($universe)==0 ) return;
			
			$file= 'images/created_universe/' . $this->facebook->getFbid() . '_' . $universe['id'] . '.jpg';
			
			$tags = array();
			if( $universe['friend1']>0 ) $tags[]['tag_uid'] = $universe['friend1'];
			if( $universe['friend2']>0 ) $tags[]['tag_uid'] = $universe['friend2'];
			if( $universe['friend3']>0 ) $tags[]['tag_uid'] = $universe['friend3'];
			
			$args = array(
			        'message' => $this->getMessage() . '
			        
					Stand a chance to win an iPad 2, a Fujifilm Instax Mini 7s Polaroid Camera or tickets to your favourite movies while creating your dream campus here: http://apps.facebook.com/intiuniverse',
			        'source' => '@' . realpath($file)
			        );
	
			$resp = $this->facebook->uploadPhoto($args);
			foreach($tags as $id=>$arr)
			{
				$this->facebook->tagPhoto( $resp['id'], $arr['tag_uid']);
			}
		}
		catch( Exception $e)
		{
			// if there's an error, most probably it is permsision issue. ignore it
			//echo $e->getMessage();
			//die();
		}
	}
	
	public function getMessage()
	{
		$words = Yii::app()->db->createCommand()
			->select('campus.word as campusWord, course.word as courseWord, interest.word as interestWord, life.word as lifeWord')
			->from('universe, campus, course, interest, life')
			->where('universe.campusId = campus.id and
					universe.courseId = course.id and
					universe.interestId = interest.id and
					universe.lifeId = life.id and
					universe.fbid=:fbid', array(':fbid'=>$this->facebook->getFbid())
					)
			->order('universe.id desc')
			->queryRow();
			
		//In your Uni-verse,you are a World traveling Entrepreneur who enjoys badminton at the beach on the weekends with your chess crew, friends;
		return "In your Uni-verse, you are a " . $words['lifeWord'] . " " . $words['courseWord'] . " who enjoys " . $words['interestWord'] . " "  . $words['campusWord'];

		// SELECT campus.word as campusWord, course.word as courseWord, interest.word as interestWord, life.word as lifeWord 
		// FROM universe, campus, course, interest, life 
		// where 
		// universe.campusId = campus.id and
		// universe.courseId = course.id and
		// universe.interestId = interest.id and
		// universe.lifeId = life.id and
		// universe.id=4;
				
	}
	
	public function actionSave()
	{
		$_POST['fbid'] = $this->facebook->getFbid();
		$universe = new Universe;
		$universe->attributes = $_POST;
		$_SESSION['test'] = '';
		$_SESSION['error'] = '';
		if( $universe->validate() && $universe->save() )
		{
			
			//echo ' done';
		}
		else
		{
			$_SESSION['error'] = $universe->getErrors();
			//echo 'error';
		}
		
		$_SESSION['test'] = $_POST;
		
	}
	
	// public function actionTest()
	// {
		// print_r($_SESSION);
		// echo $this->facebook->getFbid();
	// }
	
	public function actionCreate()
	{
		// if(! $this->facebook->isConnected())
		// {
			// $this->facebook->connect();
		// }
		$this->facebook->connect();
		$data['fbid']=$this->facebook->getFbid();
		$user = User::model()->findByPk($data['fbid']);
		$data['name'] = $user['name'];
		$data['gender'] = $this->facebook->fbuser['gender'];
		
		$this->render('create', array('data'=>$data));
	}
	
	public function actionLatest()
	{
		//$this->facebook->connect();
		$fbid=$this->facebook->getFbid();
		$uni = $this->getLatestUniverse();
		$message = $this->getMessage();
		$user = User::model()->findByPk($fbid);
		
		$this->layout='//layouts/xml_layout';
		$this->render('xml_uni', array(
			'fbid'=>$fbid,
			'uni_id'=>$uni['id'],
			'name'=>$user['name'],
			'message'=>$message
		));
	}
	
	/****************************************************************************************/
	
	
	public function actionCampus()
	{
		$campus = Campus::model()->findAll();
		$data = array();
		foreach ($campus as $id=>$arr)
		{
			$data[$id]['id']=$arr['id'];
			$data[$id]['name']=$arr['name'];
			$data[$id]['enabled']='true';
			$data[$id]['headline']=$arr['headline'];
			$data[$id]['tooltip']=$arr['tooltip'];
		}
		$this->layout='//layouts/xml_layout';
		$this->render('xml', array('data'=>$data, 'type'=>'campus'));
	}
	
	
	
	public function actionCourse()
	{
		$course = Course::model()->findAll();
		foreach ($course as $id=>$arr)
		{
			$data[$id]['id']=$arr['id'];
			$data[$id]['name']=$arr['name'];
			$data[$id]['enabled']='true';
			$data[$id]['headline']=$arr['headline'];
			$data[$id]['tooltip']=$arr['tooltip'];
		}
		$this->layout='//layouts/xml_layout';
		$this->render('xml', array('data'=>$data, 'type'=>'course'));
	}
	
	public function actionInterest()
	{
		$campus = Interest::model()->findAll();
		$data = array();
		foreach ($campus as $id=>$arr)
		{
			$data[$id]['id']=$arr['id'];
			$data[$id]['name']=$arr['name'];
			$data[$id]['enabled']='true';
			$data[$id]['headline']=$arr['headline'];
			$data[$id]['tooltip']=$arr['tooltip'];
		}
		$this->layout='//layouts/xml_layout';
		$this->render('xml', array('data'=>$data, 'type'=>'interest'));
	}
	
	public function actionLife()
	{
		$campus = Life::model()->findAll();
		$data = array();
		foreach ($campus as $id=>$arr)
		{
			$data[$id]['id']=$arr['id'];
			$data[$id]['name']=$arr['name'];
			$data[$id]['enabled']='true';
			$data[$id]['headline']=$arr['headline'];
			$data[$id]['tooltip']=$arr['tooltip'];
		}
		$this->layout='//layouts/xml_layout';
		$this->render('xml', array('data'=>$data, 'type'=>'life'));
	}
	
	public function actionCourseByCampus($id)
	{
		$courseAll = Course::model()->findAll();
		$course = ViewCampusCourse::model()->findAll('campusId=:campusId', array(':campusId'=>$id));
		$data=array();
		$found = array();
		$i=0;
		foreach($course as $id=>$arr)
		{
			$data[$i]['id']=$arr['courseId'];
			$data[$i]['name']=$arr['courseName'];
			$data[$i]['headline']=$arr['courseHeadline'];
			$data[$i]['tooltip']=$arr['courseTooltip'];
			$data[$i]['enabled']='true';
			
			$found[] = $arr['courseId'];
			//echo $arr['courseId'] . '<BR>';
			$i++;
		}

		foreach ($courseAll as $id=>$arr)
		{
				// echo $arr['id'] . '<BR>';
			if( ! in_array($arr['id'], $found))
			{
				$data[$i]['id']=$arr['id'];
				$data[$i]['name']=$arr['name'];
				$data[$i]['headline']=$arr['headline'];
				$data[$i]['tooltip']=$arr['tooltip'];
				$data[$i]['enabled']='false';
				$found[] = $arr['id'];
				
				$i++;
			}
			//print_r($found);
		}
		//print_r($found);
		$this->layout='//layouts/xml_layout';
		$this->render('xml', array('data'=>$data, 'type'=>'course'));
	}

	public function actionCampusByCourse($id)
	{
		$campusAll = Campus::model()->findAll();
		$campus = ViewCampusCourse::model()->findAll('courseId=:courseId', array(':courseId'=>$id));
		
		$data=array();
		$found = array();
		$i=0;
		foreach($campus as $id=>$arr)
		{
			$data[$i]['id']=$arr['campusId'];
			$data[$i]['name']=$arr['campusName'];
			$data[$i]['headline']=$arr['campusHeadline'];
			$data[$i]['tooltip']=$arr['campusTooltip'];
			$data[$i]['enabled']='true';
			
			$found[] = $arr['campusId'];
			$i++;
		}

		foreach ($campusAll as $id=>$arr)
		{
			if( ! in_array($id, $found))
			{
				$data[$i]['id']=$arr['id'];
				$data[$i]['name']=$arr['name'];
				$data[$i]['headline']=$arr['headline'];
				$data[$i]['tooltip']=$arr['tooltip'];
				$data[$i]['enabled']='false';
				$found[] = $arr['id'];
				$i++;
			}
		}
		$this->layout='//layouts/xml_layout';
		$this->render('xml', array('data'=>$data, 'type'=>'campus'));
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