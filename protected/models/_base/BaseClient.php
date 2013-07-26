<?php

/**
 * This is the model base class for the table "client".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Client".
 *
 * Columns in table "client" available as properties of the model,
 * followed by relations of table "client" available as properties of the model.
 *
 * @property integer $id
 * @property string $host_name
 * @property string $IP
 * @property string $last_update_time
 * @property integer $last_update_user_id
 * @property integer $client_type_id
 *
 * @property AlarmConfig[] $alarmConfigs
 * @property User $lastUpdateUser
 * @property ClientType $clientType
 */
abstract class BaseClient extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'client';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Client|Clients', $n);
	}

	public static function representingColumn() {
		return 'host_name';
	}

	public function rules() {
		return array(
			array('host_name, last_update_time, last_update_user_id, client_type_id', 'required'),
			array('last_update_user_id, client_type_id', 'numerical', 'integerOnly'=>true),
			array('host_name, IP', 'length', 'max'=>45),
			array('IP', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, host_name, IP, last_update_time, last_update_user_id, client_type_id', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'alarmConfigs' => array(self::HAS_MANY, 'AlarmConfig', 'client_id'),
			'lastUpdateUser' => array(self::BELONGS_TO, 'User', 'last_update_user_id'),
			'clientType' => array(self::BELONGS_TO, 'ClientType', 'client_type_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'id' => Yii::t('app', 'ID'),
			'host_name' => Yii::t('app', 'Host Name'),
			'IP' => Yii::t('app', 'Ip'),
			'last_update_time' => Yii::t('app', 'Last Update Time'),
			'last_update_user_id' => null,
			'client_type_id' => null,
			'alarmConfigs' => null,
			'lastUpdateUser' => null,
			'clientType' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('host_name', $this->host_name, true);
		$criteria->compare('IP', $this->IP, true);
		$criteria->compare('last_update_time', $this->last_update_time, true);
		$criteria->compare('last_update_user_id', $this->last_update_user_id);
		$criteria->compare('client_type_id', $this->client_type_id);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}