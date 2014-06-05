<?php

/**
 * This is the model class for table "category".
 *
 * The followings are the available columns in table 'category':
 * @property integer $in
 * @property string $title_cat
 * @property string $Des_cat
 * @property integer $user_id
 * @property integer $parent_id
 *
 * The followings are the available model relations:
 * @property Category $parent
 * @property Category[] $categories
 * @property User $user
 * @property News[] $news
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
			array('title_cat, Des_cat', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('in, title_cat, Des_cat, user_id, parent_id', 'safe', 'on'=>'search'),
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
			'parent' => array(self::BELONGS_TO, 'Category', 'parent_id'),
			'categories' => array(self::HAS_MANY, 'Category', 'parent_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'news' => array(self::HAS_MANY, 'News', 'catID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'in' => 'In',
			'title_cat' => 'Title Cat',
			'Des_cat' => 'Des Cat',
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

		$criteria->compare('in',$this->in);
		$criteria->compare('title_cat',$this->title_cat,true);
		$criteria->compare('Des_cat',$this->Des_cat,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('parent_id',$this->parent_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
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
