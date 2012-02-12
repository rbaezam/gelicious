<?php

/**
 * This is the model class for table "producto_imagen".
 *
 * The followings are the available columns in table 'producto_imagen':
 * @property integer $Id
 * @property string $Nombre
 * @property string $Archivo
 * @property integer $Producto_Id
 *
 * The followings are the available model relations:
 * @property Producto $producto
 */
class ProductoImagen extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProductoImagen the static model class
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
		return 'producto_imagen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Archivo', 'required'),
			array('Producto_Id', 'numerical', 'integerOnly'=>true),
			array('Nombre', 'length', 'max'=>20),
			array('Archivo', 'length', 'max'=>200),
			array('Archivo', 'file', 'types'=>'jpg,png,gif'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Nombre, Archivo, Producto_Id', 'safe', 'on'=>'search'),
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
			'producto' => array(self::BELONGS_TO, 'Producto', 'Producto_Id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Nombre' => 'Nombre',
			'Archivo' => 'Archivo',
			'Producto_Id' => 'Producto',
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
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('Archivo',$this->Archivo,true);
		$criteria->compare('Producto_Id',$this->Producto_Id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}