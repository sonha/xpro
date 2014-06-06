<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property integer $catid
 * @property string $title
 * @property string $content
 * @property string $thumb
 * @property string $pub_time
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property Category $cat
 * @property User $user
 */
class News extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('catid', 'required','message'=>'Bạn chưa chọn danh mục cho bài viết'),
			array('user_id', 'required','message'=>'Bạn chưa chọn Tác giả cho bài viết'),
			array('title', 'required','message'=>'Bạn chưa chọn title cho bài viết'),
			array('content', 'required','message'=>'Bạn chưa chọn content cho bài viết'),
			array('pub_time', 'required','message'=>'Bạn chưa chọn pub_time cho bài viết'),
			array('catid, user_id', 'numerical', 'integerOnly'=>true),
			array('title, thumb', 'length', 'max'=>255),
			//array('content, pub_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			//array('id, catid, title, content, thumb, pub_time, user_id', 'safe', 'on'=>'search'),
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
			'cat' => array(self::BELONGS_TO, 'Category', 'catid'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'catid' => 'Catid',
			'title' => 'Title',
			'content' => 'Content',
			'thumb' => 'Thumb',
			'pub_time' => 'Pub Time',
			'user_id' => 'User',
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
		$criteria->compare('catid',$this->catid);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('thumb',$this->thumb,true);
		$criteria->compare('pub_time',$this->pub_time,true);
		$criteria->compare('user_id',$this->user_id);

        $sort = new CSort();
        $sort->defaultOrder = 'id DESC';
        $sort->attributes = array(
            'id' => 'id',
            'catid' => 'catid',
            'title' => 'title',
            'user_id' => 'user_id',
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
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    public static function getAllNewsByCategory($cat_id,$limit){
        $news = new news;
        $newsByCat = $news->findAllBySql('SELECT * FROM news WHERE catid = "'.$cat_id.'" LIMIT '.$limit.'');
        return $newsByCat ;
    }
}
