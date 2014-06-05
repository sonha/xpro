<?php

/**
 * This is the model class for table "type".
 *
 * The followings are the available columns in table 'type':
 * @property integer $id
 * @property string $type_name
 */
class Type extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Type the static model class
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
		return 'type';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_name', 'length', 'max'=>5),
//			array('type_name', 'numeric'),
			array('type_name', 'required',"message"=>"Trường loại phim không được để trống"),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type_name', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
//	public function relations()
//	{
//		// NOTE: you may need to adjust the relation name and the related
//		// class name for the relations automatically generated below.
//		return array(
//		);
//	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
//	public function attributeLabels()
//	{
//		return array(
//			'id' => 'ID',
//			'type_name' => 'Type Name',
//		);
//	}

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
        $criteria->compare('type_name',$this->type_name,true);

        $sort = new CSort();
        $sort->defaultOrder = 'id DESC';
        $sort->attributes = array(
            'id' => 'id',
            'type_name' => 'type_name',
        );
        $sort->applyOrder($criteria);
        // them thuoc tinh de thuc hien Paging
        $pagination = new CPagination();
        $pagination->pageSize = 5;
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => $sort,
            'pagination' => $pagination,
        ));
    }


    public static function search_sql($model,$paginate){
        $sql="select id,type_name from type where 1=1 ";
        if(isset($model->id)&&$model->id!==""){
            $sql.="and id=:id ";
        }
        if(isset($model->type_name)&&$model->type_name!==""){
            $sql.="and type_name=:type_name ";
        }

        $sql.= " limit ".$paginate['start'].",".$paginate['offset'];
        $query= Yii::app()->db->createCommand($sql);
        if(isset($model->id)&&$model->id!==""){
            $query->bindValue(':id',isset($model->id)?$model->id:null);
        }
        if(isset($model->type_name)&&$model->type_name!==""){
            $query->bindValue(':type_name',isset($model->type_name)?$model->type_name:null);
        }
        return $query->queryAll();
    }
    public static function count_sql($model){
        $sql="select count(*) as total from type where 1=1 ";
        if(isset($model->id)&&$model->id!==""){
            $sql.="and id=:id ";
        }
        if(isset($model->type_name)&&$model->type_name!==""){
            $sql.="and type_name=:type_name ";
        }

        $query= Yii::app()->db->createCommand($sql);
        if(isset($model->id)&&$model->id!==""){
            $query->bindValue(':id',isset($model->id)?$model->id:null);
        }
        if(isset($model->type_name)&&$model->type_name!==""){
            $query->bindValue(':type_name',isset($model->type_name)?$model->type_name:null);
        }
        $result=$query->queryAll();
//        echo "<pre>";
//        var_dump($result);
//        echo "</pre>";exit;
        return $result[0]['total'];
    }
}