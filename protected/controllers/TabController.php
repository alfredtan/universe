<?php

class TabController extends Controller
{
	public $layout = '//layouts/tab_layout';
	
	
	public function beforeAction($action)
	{
		header('P3P: CP="HONK"');
		// forces yii to create session first
		Yii::app()->session['time']=time();
		return true;
	}
	
	public function actionIndex()
	{
		$this->render('tab');
	}
}