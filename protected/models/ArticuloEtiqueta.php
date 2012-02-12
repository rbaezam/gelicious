<?php

/**
 * This is the model class for table "articulo_etiqueta".
 *
 * The followings are the available columns in table 'articulo_etiqueta':
 * @property integer $Id
 * @property integer $Articulo_Id
 * @property integer $Etiqueta_Id
 *
 * The followings are the available model relations:
 * @property Articulo $articulo
 * @property Etiqueta $etiqueta
 */
class ArticuloEtiqueta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ArticuloEtiqueta the static model class
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
		return 'articulo_etiqueta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Articulo_Id, Etiqueta_Id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, Articulo_Id, Etiqueta_Id', 'safe', 'on'=>'search'),
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
			'articulo' => array(self::BELONGS_TO, 'Articulo', 'Articulo_Id'),
			'etiqueta' => array(self::BELONGS_TO, 'Etiqueta', 'Etiqueta_Id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id' => 'ID',
			'Articulo_Id' => 'Articulo',
			'Etiqueta_Id' => 'Etiqueta',
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
		$criteria->compare('Articulo_Id',$this->Articulo_Id);
		$criteria->compare('Etiqueta_Id',$this->Etiqueta_Id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}