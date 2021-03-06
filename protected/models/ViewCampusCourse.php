<?php

/**
 * This is the model class for table "view_campus_course".
 *
 * The followings are the available columns in table 'view_campus_course':
 * @property integer $campusId
 * @property string $campusName
 * @property string $campusHeadline
 * @property string $campusTooltip
 * @property integer $courseId
 * @property string $courseName
 * @property string $courseHeadline
 * @property string $courseTooltip
 */
class ViewCampusCourse extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ViewCampusCourse the static model class
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
		return 'view_campus_course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('campusId, campusName, campusHeadline, campusTooltip, courseId, courseName, courseHeadline, courseTooltip', 'required'),
			array('campusId, courseId', 'numerical', 'integerOnly'=>true),
			array('campusName, courseName', 'length', 'max'=>150),
			array('campusHeadline, courseHeadline', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('campusId, campusName, campusHeadline, campusTooltip, courseId, courseName, courseHeadline, courseTooltip', 'safe', 'on'=>'search'),
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
			'campusId' => 'Campus',
			'campusName' => 'Campus Name',
			'campusHeadline' => 'Campus Headline',
			'campusTooltip' => 'Campus Tooltip',
			'courseId' => 'Course',
			'courseName' => 'Course Name',
			'courseHeadline' => 'Course Headline',
			'courseTooltip' => 'Course Tooltip',
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

		$criteria->compare('campusId',$this->campusId);
		$criteria->compare('campusName',$this->campusName,true);
		$criteria->compare('campusHeadline',$this->campusHeadline,true);
		$criteria->compare('campusTooltip',$this->campusTooltip,true);
		$criteria->compare('courseId',$this->courseId);
		$criteria->compare('courseName',$this->courseName,true);
		$criteria->compare('courseHeadline',$this->courseHeadline,true);
		$criteria->compare('courseTooltip',$this->courseTooltip,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}