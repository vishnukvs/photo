<?php

/**
 * This is the model class for table "document".
 *
 * The followings are the available columns in table 'document':
 * @property integer $id
 * @property string $doc_name
 * @property string $doc_file
 * @property string $doc_type
 * @property string $doc_size
 * @property string $summary
 * @property string $up_dated
 */
class Document extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'document';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('doc_name', 'required'),
            array('doc_name', 'length', 'max' => 255),
            array('doc_file', 'file', 'types' => 'jpg, gif, png, pdf, doc, docx, odt, txt, xlsx, xls, csv, zip', 'allowEmpty' => true, 'maxSize' => 1024 * 1024 * 50, 'tooLarge' => 'The file was larger than 50MB. Please upload a smaller file.'),
            array('doc_type, doc_size', 'length', 'max' => 50),
            array('summary, up_dated, doc_file', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, doc_name, doc_type, doc_size, summary, up_dated, doc_file', 'safe', 'on' => 'search'),
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
			'doc_name' => 'Doc Name',
			'doc_file' => 'Doc File',
			'doc_type' => 'Doc Type',
			'doc_size' => 'Doc Size',
			'summary' => 'Summary',
			'up_dated' => 'Up Dated',
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
		$criteria->compare('doc_name',$this->doc_name,true);
		$criteria->compare('doc_file',$this->doc_file,true);
		$criteria->compare('doc_type',$this->doc_type,true);
		$criteria->compare('doc_size',$this->doc_size,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('up_dated',$this->up_dated,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Document the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
