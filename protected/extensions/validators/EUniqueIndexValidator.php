<?php

/**
 * EUniqueIndexValidator class file.
 *
 */

/**
 * EUniqueIndexValidator validates that the attribute value is unique in the corresponding database table.
 *
 * When using the {@link message} property to define a custom error message, the message
 * may contain additional placeholders that will be replaced with the actual content. In addition
 * to the "{attribute}" placeholder, recognized by all validators (see {@link CValidator}),
 * EUniqueIndexValidator allows for the following placeholders to be specified:
 * <ul>
 * <li>{value}: replaced with current value of the attribute.</li>
 * </ul>
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @version $Id: EUniqueIndexValidator.php 3515 2011-12-28 12:29:24Z mdomba $
 * @package system.validators
 * @since 1.0
 */
class EUniqueIndexValidator extends CValidator {

  /**
   * @var boolean whether the comparison is case sensitive. Defaults to true.
   * Note, by setting it to false, you are assuming the attribute type is string.
   */
  public $caseSensitive = true;

  /**
   * @var boolean whether the attribute value can be null or empty. Defaults to true,
   * meaning that if the attribute is empty, it is considered valid.
   */
  public $allowEmpty = true;

  /**
   * @var string the ActiveRecord class name that should be used to
   * look for the attribute value being validated. Defaults to null, meaning using
   * the class of the object currently being validated.
   * You may use path alias to reference a class name here.
   * @see attributeName
   */
  public $className;

  /**
   * @var string the ActiveRecord class attribute name that should be
   * used to look for the attribute value being validated. Defaults to null,
   * meaning using the name of the attribute being validated.
   * @see className
   */
  public $attributeName;

  /**
   * @var array additional query criteria. This will be combined with the condition
   * that checks if the attribute value exists in the corresponding table column.
   * This array will be used to instantiate a {@link CDbCriteria} object.
   */
  public $criteria = array();

  /**
   * @var string the user-defined error message. The placeholders "{attribute}" and "{value}"
   * are recognized, which will be replaced with the actual attribute name and value, respectively.
   */
  public $message;

  /**
   * @var boolean whether this validation rule should be skipped if when there is already a validation
   * error for the current attribute. Defaults to true.
   * @since 1.1.1
   */
  public $skipOnError = true;

  /**
   * Validates the attribute of the object.
   * If there is any error, the error message is added to the object.
   * @param CModel $object the object being validated
   * @param string $attribute the attribute being validated
   */
  protected function validateAttribute($object, $attribute) {

    $className = $this->className === null ? get_class($object) : Yii::import($this->className);
    $finder = $object::model($className);
    $table = $finder->getTableSchema();

//    print_r($object->relations());
//    return;

    if ($object->isNewRecord) {
      $sql = sprintf("SHOW INDEX FROM {{%s}} WHERE Non_unique = 0", $table->rawName); // and Key_name <> 'PRIMARY'
    } else {
      $sql = sprintf("SHOW INDEX FROM {{%s}} WHERE Non_unique = 0 and Key_name <> 'PRIMARY'", $table->rawName); // 
    }
    $sqlResult = yii::app()->db->createCommand($sql)->queryAll();

    $criterias = array();
    // Gather indexes and values.
    foreach ($sqlResult as $indexRow) {
      $criterias[$indexRow['Key_name']][$indexRow['Column_name']] = $object->$indexRow['Column_name'];
    }
    // Test indexes.
    foreach ($criterias as $criteria) {
      if (!$object->isNewRecord) {
        $condition = "$table->primaryKey <> :$table->primaryKey and ";
        $params = array(":$table->primaryKey" => $object->primaryKey);
      } else {
        $condition = '';
        $params = array();
      }
      foreach ($criteria as $column => $value) {
        $condition .= "$column = :$column and ";
        $params[":$column"] = $value;
      }
      $condition = substr($condition, 0, strlen($condition) - 5);
      // Test condition
      $dbCriteria = new CDbCriteria(array(
                  'condition' => $condition,
                  'params' => $params,
              ));
      if ($this->criteria !== array())
        $dbCriteria->mergeWith($this->criteria);

      $exists = $finder->exists($dbCriteria);

      if ($exists) {
        $combination = '';
        foreach ($criteria as $column => $value) {
          // If column is a FK, get related table label.
          if ($table->getColumn($column)->isForeignKey) {
            // Get Related table name
            $label = $table->foreignKeys[$column][0];

            // Find the representing column value of the related model.
            // Probably there's a better way to do this.
            $relatedClass = new $label;
            $relatedColumns = $relatedClass->getTableSchema()->getColumnNames();
            $representingColumn = $relatedColumns[1];
            $relatedRecord = $relatedClass->findByPk($value);
            $value = $relatedRecord->getAttribute($representingColumn);
            $combination .= $object->generateAttributeLabel($label) . ": '$value' ";
          } else {
            $label = $object->attributeLabels();
            $combination .= $label[$column] . ": '$value' ";
          }
          $combination .= ' and ';
        }
        $combination = substr($combination, 0, strlen($combination) - 5);
        if (count($criteria) == 1) {
          $this->addError($object, $column, Yii::t('yii',':combination has already been taken.'), array(':combination' => $combination));
        } else {
          $this->addError($object, $table->primaryKey, yii::t('app', 'The combination of :combination must be unique in the current context.'), array(':combination' => $combination));
          foreach ($criteria as $column => $value) {
            $this->addError($object, $column, '');
          }
        }
      }
    }
  }

}

