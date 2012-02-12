<?php

/**
 * This is the model class for table "articulo".
 *
 * The followings are the available columns in table 'articulo':
 * @property integer $Id
 * @property string $Titulo
 * @property string $Texto
 * @property string $Fecha_Publicacion
 * @property integer $Usuario_Id
 * @property integer $Visible
 * @property string $Slug
 *
 * The followings are the available model relations:
 * @property Usuario $usuario
 * @property ArticuloEtiqueta[] $articuloEtiquetas
 */
class Articulo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Articulo the static model class
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
		return 'articulo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Titulo', 'required'),
			array('Usuario_Id, Visible', 'numerical', 'integerOnly'=>true),
			array('Titulo, Slug', 'length', 'max'=>100),
			array('Texto, Fecha_Publicacion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Titulo, Texto, Fecha_Publicacion, Usuario_Id, Visible, Slug', 'safe', 'on'=>'search'),
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
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'Usuario_Id'),
			'articuloEtiquetas' => array(self::HAS_MANY, 'ArticuloEtiqueta', 'Articulo_Id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Titulo' => 'Titulo',
			'Texto' => 'Texto',
			'Fecha_Publicacion' => 'Fecha Publicacion',
			'Usuario_Id' => 'Usuario',
			'Visible' => 'Visible',
			'Slug' => 'Slug',
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
		$criteria->compare('Titulo',$this->Titulo,true);
		$criteria->compare('Texto',$this->Texto,true);
		$criteria->compare('Fecha_Publicacion',$this->Fecha_Publicacion,true);
		$criteria->compare('Usuario_Id',$this->Usuario_Id);
		$criteria->compare('Visible',$this->Visible);
		$criteria->compare('Slug',$this->Slug,true);

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