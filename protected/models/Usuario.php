<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $Id
 * @property string $Login
 * @property string $Password
 * @property string $Nombre
 * @property integer $Es_Admin
 * @property integer $Activo
 *
 * The followings are the available model relations:
 * @property Articulo[] $articulos
 */
class Usuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuario the static model class
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
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Login, Password', 'required'),
			array('Es_Admin, Activo', 'numerical', 'integerOnly'=>true),
			array('Login', 'length', 'max'=>15),
			array('Password', 'length', 'max'=>50),
			array('Nombre', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Login, Password, Nombre, Es_Admin, Activo', 'safe', 'on'=>'search'),
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
			'articulos' => array(self::HAS_MANY, 'Articulo', 'Usuario_Id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Login' => 'Login',
			'Password' => 'Password',
			'Nombre' => 'Nombre',
			'Es_Admin' => 'Es Admin',
			'Activo' => 'Activo',
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

		$criteria->compare('Id',$this->Id);
		$criteria->compare('Login',$this->Login,true);
		$criteria->compare('Password',$this->Password,true);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('Es_Admin',$this->Es_Admin);
		$criteria->compare('Activo',$this->Activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}