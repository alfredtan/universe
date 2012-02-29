<?php

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
		$this->facebook->connect();
		
		$user = User::model()->findByPk($this->facebook->getFbid());
		
		if( count($user)==1 )
		{
			$this->redirect(Yii::app()->createUrl('universe/create'));
		}
		
		//echo $this->facebook->getFbid();
		$model = new User;
		$this->render('index', array('model'=>$model));
	}
	
	public function actionRegister()
	{
		
		if( Yii::app()->request->isAjaxRequest )
		{
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
		    //the image file name   
		    $fileName = 'images/temp/'. $this->facebook->getFbid() . '.jpg';
		
		    // get the binary stream
		    $im = $GLOBALS["HTTP_RAW_POST_DATA"];
		
		    //write it
		    $fp = fopen($fileName, 'wb');
		    fwrite($fp, $im);
		    fclose($fp);
		
		    //echo the fileName;
		    echo $fileName;
		}  
		else 
		    echo 'result=An error occured.';
	}
	
	
	public function actionView()
	{
		$fbid = $this->facebook->getFbid();
		$this->render('view', array('fbid'=>$fbid));
	}
	
	
	
	
	public function actionCampus()
	{
		$campus = Campus::model()->findAll();
		$data = array();
		foreach ($campus as $id=>$arr)
		{
			$data[$id]['id']=$arr['id'];
			$data[$id]['name']=$arr['name'];
			$data[$id]['enabled']='true';
		}
		$this->layout='//layouts/xml_layout';
		$this->render('xml', array('data'=>$data, 'type'=>'campus'));
	}
	
	public function actionCreate()
	{
		$this->render('create');
	}
	
	public function actionCourse()
	{
		$course = Course::model()->findAll();
		foreach ($course as $id=>$arr)
		{
			$data[$id]['id']=$arr['id'];
			$data[$id]['name']=$arr['name'];
			$data[$id]['enabled']='true';
		}
		$this->layout='//layouts/xml_layout';
		$this->render('xml', array('data'=>$data, 'type'=>'course'));
	}
	
	public function actionCourseByCampus($id)
	{
		$courseAll = Course::model()->findAll();
		$course = ViewCampusCourse::model()->findAll('campusId=:campusId', array(':campusId'=>$id));
		$data=array();
		
		foreach ($courseAll as $id=>$arr)
		{
			$found=false;
			
			// temp solution
			// found if this id is 
			foreach($course as $id2=>$arr2)
			{
				if($arr2['courseId']==$arr['id'])
				{
					$found = true;
				}
			}
			
			$data[$id]['id']=$arr['id'];
			$data[$id]['name']=$arr['name'];

			if($found)
			{
				$data[$id]['enabled']='true';
			}
			else
			{
				$data[$id]['enabled']='false';
			}
			
			
		}
		$this->layout='//layouts/xml_layout';
		$this->render('xml', array('data'=>$data, 'type'=>'course'));
	}

	public function actionCampusByCourse($id)
	{
		$campusAll = Campus::model()->findAll();
		$campus = ViewCampusCourse::model()->findAll('courseId=:courseId', array(':courseId'=>$id));
		
		$data=array();
		foreach ($campusAll as $id=>$arr)
		{
			$found=false;
			
			// temp solution
			// found if this id is 
			foreach($campus as $id2=>$arr2)
			{
				if($arr2['campusId']==$arr['id'])
				{
					$found = true;
				}
			}
			
			$data[$id]['id']=$arr['id'];
			$data[$id]['name']=$arr['name'];

			if($found)
			{
				$data[$id]['enabled']='true';
			}
			else
			{
				$data[$id]['enabled']='false';
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