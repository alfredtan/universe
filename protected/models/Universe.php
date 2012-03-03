<?php

/**
 * This is the model class for table "universe".
 *
 * The followings are the available columns in table 'universe':
 * @property integer $id
 * @property string $fbid
 * @property integer $campusId
 * @property integer $courseId
 * @property integer $interestId
 * @property integer $lifeId
 * @property string $friend1
 * @property string $friend2
 * @property string $friend3
 * @property string $dateCreate
 */
class Universe extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Universe the static model class
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
		return 'universe';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fbid, campusId, courseId, interestId, lifeId, friend1, friend2, friend3', 'required'),
			array('campusId, courseId, interestId, lifeId', 'numerical', 'integerOnly'=>true),
			array('fbid, friend1, friend2, friend3', 'length', 'max'=>20),
			array('dateCreate','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, fbid, campusId, courseId, interestId, lifeId, friend1, friend2, friend3, dateCreate', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'fbid' => 'Fbid',
			'campusId' => 'Campus',
			'courseId' => 'Course',
			'interestId' => 'Interest',
			'lifeId' => 'Life',
			'friend1' => 'Friend1',
			'friend2' => 'Friend2',
			'friend3' => 'Friend3',
			'dateCreate' => 'Date Create',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('fbid',$this->fbid,true);
		$criteria->compare('campusId',$this->campusId);
		$criteria->compare('courseId',$this->courseId);
		$criteria->compare('interestId',$this->interestId);
		$criteria->compare('lifeId',$this->lifeId);
		$criteria->compare('friend1',$this->friend1,true);
		$criteria->compare('friend2',$this->friend2,true);
		$criteria->compare('friend3',$this->friend3,true);
		$criteria->compare('dateCreate',$this->dateCreate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}