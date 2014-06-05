<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $mobile
 * @property string $email
 * @property string $facebook
 * @property string $twitter
 * @property string $skype
 * @property string $address
 * @property integer $gender
 * @property integer $is_admin
 * @property string $password
 * @property string $first_name
 * @property string $last_name
 * @property string $created_at
 */
class User extends CActiveRecord
{
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
			array('username, email', 'required'),
			array('id, gender, is_admin', 'numerical', 'integerOnly'=>true),
			array('username, mobile, email, facebook, twitter, skype, address, password, first_name, last_name', 'length', 'max'=>255),
			array('created_at', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, mobile, email, facebook, twitter, skype, address, gender, is_admin, password, first_name, last_name, created_at', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'mobile' => 'Mobile',
			'email' => 'Email',
			'facebook' => 'Facebook',
			'twitter' => 'Twitter',
			'skype' => 'Skype',
			'address' => 'Address',
			'gender' => 'Gender',
			'is_admin' => 'Is Admin',
			'password' => 'Password',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'created_at' => 'Created At',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('twitter',$this->twitter,true);
		$criteria->compare('skype',$this->skype,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('is_admin',$this->is_admin);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('created_at',$this->created_at,true);

        $sort = new CSort();
        $sort->defaultOrder = 'id DESC';
        $sort->attributes = array(
            'id' => 'id',
            'username' => 'username',
            'email' => 'email',
        );
        $sort->applyOrder($criteria);
        // them thuoc tinh de thuc hien Paging
        $pagination = new CPagination();
        $pagination->pageSize = 10;
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => $sort,
//            'pagination' => $pagination,
            'pagination'=>array(
                'pageSize'=> Yii::app()->user->getState('pageSize',Yii::app()->params['defaultPageSize']),
            ),
        ));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public static function count_sql($model){
        $sql="select count(*) as total from user where 1=1 ";
        if(isset($model->id)&&$model->id!==""){
            $sql.="and id=:id ";
        }
        if(isset($model->username)&&$model->username!==""){
            $sql.="and username=:username ";
        }

        $query= Yii::app()->db->createCommand($sql);
        if(isset($model->id)&&$model->id!==""){
            $query->bindValue(':id',isset($model->id)?$model->id:null);
        }
        if(isset($model->username)&&$model->username!==""){
            $query->bindValue(':username',isset($model->username)?$model->username:null);
        }
        $result=$query->queryAll();
//        echo "<pre>";
//        var_dump($result);
//        echo "</pre>";exit;
        return $result[0]['total'];
    }

    public static function search_sql($model,$paginate){
        $sql="select * from user where 1=1 ";
        if(isset($model->id)&&$model->id!==""){
            $sql.="and id=:id ";
        }
        if(isset($model->username)&&$model->username!==""){
            $sql.="and username=:username ";
        }

        $sql.= " limit ".$paginate['start'].",".$paginate['offset'];
        $query= Yii::app()->db->createCommand($sql);
        if(isset($model->id)&&$model->id!==""){
            $query->bindValue(':id',isset($model->id)?$model->id:null);
        }
        if(isset($model->username)&&$model->username!==""){
            $query->bindValue(':username',isset($model->username)?$model->username:null);
        }
        return $query->queryAll();
    }
}
