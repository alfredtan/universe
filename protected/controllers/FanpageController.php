<?php

class FanpageController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
    
    public function actionRegister()
    {
        if( Yii::app()->request->isAjaxRequest )
        {
            echo 'yes';
        }
        else
        {
            echo 'no';
        }

        die();
    }
}