<?php

/**
 * This is the model class for table "producto".
 *
 * The followings are the available columns in table 'producto':
 * @property integer $Id
 * @property string $Nombre
 * @property string $Descripcion
 * @property string $Slug
 * @property integer $Categoria_Id
 * @property integer $Visible
 * @property integer $Novedoso
 * @property string $Fecha_Publicacion
 *
 * The followings are the available model relations:
 * @property Categoria $categoria
 */
class Producto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Producto the static model class
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
		return 'producto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Nombre, Descripcion, Slug, Categoria_Id, Visible, Novedoso', 'required'),
			array('Categoria_Id, Visible, Novedoso', 'numerical', 'integerOnly'=>true),
			array('Nombre, Slug', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Nombre, Descripcion, Slug, Categoria_Id, Visible, Novedoso, Fecha_Publicacion', 'safe', 'on'=>'search'),
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
			'categoria' => array(self::BELONGS_TO, 'Categoria', 'Categoria_Id'),
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
			'Descripcion' => 'Descripción',
			'Slug' => 'Slug',
			'Categoria_Id' => 'Categoría',
			'Visible' => 'Visible',
			'Novedoso' => 'Novedoso',
			'Fecha_Publicacion' => 'Fecha de publicación',
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
		$criteria->compare('Descripcion',$this->Descripcion,true);
		$criteria->compare('Slug',$this->Slug,true);
		$criteria->compare('Categoria_Id',$this->Categoria_Id);
		$criteria->compare('Visible',$this->Visible);
		$criteria->compare('Novedoso',$this->Novedoso);
		$criteria->compare('Fecha_Publicacion',$this->Fecha_Publicacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function beforeSave()
	{
		if($this->isNewRecord)
			$this->Fecha_Publicacion = new CDbExpression('NOW()');
		return parent::beforeSave();
	}
}