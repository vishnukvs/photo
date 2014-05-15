<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $pass
 * @property string $first_name
 * @property string $last_name
 * @property integer $create_user
 * @property string $create_time
 * @property integer $update_user
 * @property string $update_time
 * @property string $last_login_time
 */
class User extends PhotoActiveRecord
{
	 public $pass_repeat;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
		public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, username, pass, pass_repeat', 'required'),
			array('email, username, pass', 'length', 'max'=>256),
                        array('email, username', 'unique'),
			array('last_login_time, create_time, update_time', 'safe'),
                        array('pass','compare'),
                        array('pass_repeat','safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, username, password, last_login_time, create_time, create_user_id, update_time, update_user_id', 'safe', 'on'=>'search'),
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
			'email' => 'Email',
			'pass' => 'Pass',
		    'pass_repeat' => 'Password Repeat',   
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'create_user' => 'Create User',
			'create_time' => 'Create Time',
			'update_user' => 'Update User',
			'update_time' => 'Update Time',
			'last_login_time' => 'Last Login Time',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('pass',$this->pass,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('create_user',$this->create_user);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_user',$this->update_user);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('last_login_time',$this->last_login_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */

	  protected function afterValidate()
        {
            parent::afterValidate();
            $this->pass = $this->encrypt($this->pass);
        }
        
        public function encrypt($value)
        {
            return md5($value);
            //return crypt($value);
        }        
	
}
