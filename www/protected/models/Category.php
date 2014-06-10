<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $id
 * @property string $title_cat
 * @property string $description
 * @property integer $user_id
 * @property integer $parent_id
 */
class Category extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),
			array('user_id, parent_id', 'numerical', 'integerOnly'=>true),
			array('title_cat, description', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title_cat, description, user_id, parent_id', 'safe', 'on'=>'search'),
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
			'title_cat' => 'Title Cat',
			'description' => 'Description',
			'user_id' => 'User',
			'parent_id' => 'Parent',
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
		$criteria->compare('title_cat',$this->title_cat,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('parent_id',$this->parent_id);

        $sort = new CSort();
        $sort->defaultOrder = 'id DESC';
        $sort->attributes = array(
            'id' => 'id',
            'title_cat' => 'title_cat',
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
	 * @return Category the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public static function getAllSubCat($id){
        $category = new Category();
        $allSubCat = $category->findAllBySql('SELECT * FROM category WHERE parent_id="' . $id . '"');
        return $allSubCat;
    }
}
