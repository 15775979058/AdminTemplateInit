<?php

/**
 * This is the model base class for the table "client_template".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "ClientTemplate".
 *
 * Columns in table "client_template" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $Details
 *
 */
abstract class BaseClientTemplate extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'client_template';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'ClientTemplate|ClientTemplates', $n);
	}

	public static function representingColumn() {
		return 'name';
	}

	public function rules() {
		return array(
			array('name, description', 'required'),
			array('name', 'length', 'max'=>45),
			array('description', 'length', 'max'=>200),
			array('Details', 'length', 'max'=>500),
			array('Details', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, name, description, Details', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'name' => Yii::t('app', 'Name'),
			'description' => Yii::t('app', 'Description'),
			'Details' => Yii::t('app', 'Details'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('name', $this->name, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('Details', $this->Details, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}