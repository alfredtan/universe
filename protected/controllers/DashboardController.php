<?php

class DashboardController extends Controller
{
	public $layout = '//layouts/dashboard_layout';
	
	
	public function beforeAction($action)
	{
		header('P3P: CP="HONK"');
		// forces yii to create session first
		Yii::app()->session['time']=time();
		return true;
	}
	
	public function actionIndex()
	{
		// if time hasn't expired, redirect to users
		$_SESSION['dashboard_last_activity'] =0;
		
		// if form post
		if( isset($_POST['login']))
		{
			if($_POST['login'] == '!futurelab_nextdigital!')
			{
				$_SESSION['dashboard_last_activity'] = time();
				$this->redirect('dashboard/users');
			}
		}
		$this->render('index');
	}
	
	public function actionUsers()
	{
		// echo time() . '<BR>';
		// echo time() -  $_SESSION['dashboard_last_activity'] . '<BR>';
		// echo  $_SESSION['dashboard_last_activity'];
		// die();
		if( time() - $_SESSION['dashboard_last_activity'] > 900 )
		{
			$this->redirect('/dashboard/index');
		}
		$_SESSION['dashboard_last_activity']=time();
		
		$users = Yii::app()->db->createCommand()
			->select('u.fbid, u.name, u.nric, u.mobile, u.email, (u.dateRegistered + interval 8 hour) as dateRegistered, c.name as campusName')
			->from('user u')
			->join('campus c', 'u.campusId=c.id')
			->where('u.email not in (select email from excludes)')
			->order('dateRegistered asc')
			->queryAll();

		$this->render('users', array('users'=>$users));
	}

	public function actionUniverse()
	{
		if( time() - $_SESSION['dashboard_last_activity'] > 900 )
		{
			$this->redirect('/dashboard/index');
		}
		$_SESSION['dashboard_last_activity']=time();
		// get users who answers correctly
		// and dedup
		// result is users who are eligible to win
		// $users = Yii::app()->db->createCommand()
			// ->select('u.*, q.total')
			// ->from('user u')
			// ->join('quiz q', 'u.fbid=q.fbid')
			// ->where('q.total=6 and u.email not in (select email from excludes)')
			// ->order('u.dateRegistered asc')
			// ->queryAll();
			
		$model = Yii::app()->db->createCommand()
			->select('u.fbid, u.name, u.nric, u.mobile, u.email, (u.dateRegistered + interval 8 hour) as dateRegistered, c.name as campusName')
			->from('user u')
			->join('campus c', 'u.campusId=c.id')
			->join('quiz q', 'u.fbid=q.fbid')
			->where('q.total=6 and u.email not in (select email from excludes)')
			->order('dateRegistered asc')
			->queryAll();

		$user= array();	
		$fbids=array();
		foreach($model as $data)
		{
			$fbids[] = $data['fbid'];
			$uni = Universe::model()->findAll('fbid=:fbid', array(':fbid'=>$data['fbid']));
			$data['return'] =  (count($uni) > 1 ) ? 'true' : 'false';
			$user[$data['fbid']] = $data;
			$user[$data['fbid']] = $data;
		}
		$universe = Yii::app()->db->createCommand()
			->select('u.fbid, u.name, u.nric, u.email, u.mobile , v.id as universeId, campus.name as campusName, course.name as courseName, interest.name as interestName, life.name as lifeName, v.courseId, v.courseId, v.interestId, v.lifeId, v.friend1, v.friend2, v.friend3, (v.dateCreate + interval 8 hour) as dateCreate ')
			->from('universe v')
			->leftJoin('user u', 'u.fbid=v.fbid')
			->leftJoin('campus', 'v.campusId=campus.id')
			->leftJoin('course', 'v.courseId=course.id')
			->leftJoin('interest', 'v.interestId=interest.id')
			->leftJoin('life', 'v.lifeId=life.id')
			->where('u.fbid in (' . implode(',', $fbids ) . ')' )
			->group('u.fbid')
			->order('dateCreate asc')
			->queryAll();
		
		$this->render('universe', array('universe'=>$universe, 'data'=>$user));
		// foreach($universe as $u)
		// {
			// echo $u['universeId'] . ' asd asd as '  . $u['campusName'];
		// }
			// die();
// 			
// 			
		// foreach($users as $user )
		// {
			// echo $user['name'] . ' and ' . $user['total'] . '<BR>';
		// }
		// die();
		// $universe = Universe::model()->findAll('fbid=:fbid', array('fbid'=>$id));
		
//->where('email not in (select email from excludes)')

		// $this->render('users', array('users'=>$users));
	}
	
}