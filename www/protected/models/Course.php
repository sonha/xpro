<?php

/**
 * This is the model class for table "course".
 *
 * The followings are the available columns in table 'course':
 * @property integer $id
 * @property string $name
 * @property string $start_date
 * @property string $end_date
 * @property string $address
 * @property string $summary
 * @property string $detail
 * @property integer $fee
 * @property string $teacher_id
 * @property integer $discount
 */
class Course extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'course';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fee, discount', 'numerical', 'integerOnly'=>true),
			array('name, address, summary, detail, teacher_id', 'length', 'max'=>255),
			array('start_date, end_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, start_date, end_date, address, summary, detail, fee, teacher_id, discount', 'safe', 'on'=>'search'),
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
			'id' => 'Course',
			'name' => 'Course Name',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'address' => 'Address',
			'summary' => 'Summary',
			'detail' => 'Detail',
			'fee' => 'Fee',
			'teacher_id' => 'Teacher',
			'discount' => 'Discount',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('detail',$this->detail,true);
		$criteria->compare('fee',$this->fee);
		$criteria->compare('teacher_id',$this->teacher_id,true);
		$criteria->compare('discount',$this->discount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Course the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
