<?php

/**
 * This is the model class for table "photos".
 *
 * The followings are the available columns in table 'photos':
 * @property integer $id
 * @property string $date_time
 * @property string $photo_id
 * @property integer $user_id
 * @property string $description
 *
 * The followings are the available model relations:
 * @property User $id0
 */
class Photos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'photos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id, user_id', 'numerical', 'integerOnly'=>true),
			array('date_time, photo_id, description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date_time, photo_id, user_id, description', 'safe', 'on'=>'search'),
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
			'id0' => array(self::BELONGS_TO, 'User', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date_time' => 'Date Time',
			'photo_id' => 'Photo',
			'user_id' => 'User',
			'description' => 'Description',
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
		$criteria->compare('date_time',$this->date_time,true);
		$criteria->compare('photo_id',$this->photo_id,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Photos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
public function getThumbnail(){
         // here i return the image
            if (!empty($this->filename) && $this->filename!='')
             return CHtml::image($this->getPath(),$this->alt_text,array('width'=>options::model()->getOption('PhotoThumb').'px','max-height'=>options::model()->getOption('PhotoThumb').'px'
         ));
        }
  public function getPath($all=true){
            if (is_null($this->_PhotoPath)) {
                 // I hold the image path and system directory separator in the config/main.php
                 // this is because I develop on a windows server and normally deploy on Linux
                 $this->_PhotoPath=Yii::app()->params['imagePATH'];
                 $this->_PathSep=Yii::app()->params['pathSep'];
            }
            $path=$this->_PhotoPath.$this->_PathSep;
            if ($all) $path.=$this->filename;
            return $path;
        }
}
