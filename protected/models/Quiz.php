<?php

/**
 * This is the model class for table "quiz".
 *
 * The followings are the available columns in table 'quiz':
 * @property string $fbid
 * @property integer $total
 * @property string $dateQuiz
 */
class Quiz extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Quiz the static model class
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
		return 'quiz';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fbid', 'required'),
			array('total', 'required', 'message'=>'Please select an answer.'),
			array('total', 'numerical', 'integerOnly'=>true),
			array('fbid', 'length', 'max'=>20),
			array('dateQuiz','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fbid, total, dateQuiz', 'safe', 'on'=>'search'),
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
			'total' => 'Total',
			'dateQuiz' => 'Date Quiz',
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
		$criteria->compare('total',$this->total);
		$criteria->compare('dateQuiz',$this->dateQuiz,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}