<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property string $fbid
 * @property integer $campusId
 * @property string $name
 * @property string $nric
 * @property string $mobile
 * @property string $email
 * @property string $dateRegistered
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fbid','required'),
			array( 'name','required', 'message'=>'Please enter your name'),
			array( 'email', 'required', 'message'=>'Please enter a valid email' ),
			array( 'nric', 'required', 'message'=>'Please enter a your NRIC without dashes'), 
			array( 'mobile', 'required', 'message'=>'Please enter your mobile'), 
			array( 'campusId', 'required', 'message'=>'Please select a campus'), 
			array('fbid', 'length', 'max'=>20),
			array('name, email', 'length', 'max'=>150, ),
			array('nric', 'match', 'pattern'=>'/^[0-9]{12}$/'),
			array('email','email'),
			array('mobile', 'match', 'pattern'=>'/^01[0-9]{8}$/' ),
			array('campusId', 'numerical', 'integerOnly'=>true),
			array('campusId', 'numerical', 'min'=>1, 'max'=>6),
			array('dateRegistered', 'safe'),
			array('dateRegistered','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fbid, campusId, name, nric, mobile, email, dateRegistered', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'fbid' => 'Fbid',
			'campusId' => 'Campus',
			'name' => 'Name',
			'nric' => 'Nric',
			'mobile' => 'Mobile',
			'email' => 'Email',
			'dateRegistered' => 'Date Registered',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('fbid',$this->fbid,true);
		$criteria->compare('campusId',$this->campusId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('nric',$this->nric,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('dateRegistered',$this->dateRegistered,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}