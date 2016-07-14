<?php

/**
 * This is the model base class for the table "inbox".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Inbox".
 *
 * Columns in table "inbox" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $inbox_id
 * @property integer $from_user_id
 * @property string $message
 * @property integer $to_user_id
 * @property string $created_date
 *
 */
abstract class BaseInbox extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'inbox';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Inbox|Inboxes', $n);
	}

	public static function representingColumn() {
		return 'message';
	}

	public function rules() {
		return array(
			array('from_user_id, message, to_user_id', 'required'),
			array('from_user_id, to_user_id', 'numerical', 'integerOnly'=>true),
			array('message', 'length', 'max'=>5000),
			array('created_date', 'safe'),
			array('created_date', 'default', 'setOnEmpty' => true, 'value' => null),
			array('inbox_id, from_user_id, message, to_user_id, created_date', 'safe', 'on'=>'search'),
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
			'inbox_id' => Yii::t('app', 'Inbox'),
			'from_user_id' => Yii::t('app', 'From User'),
			'message' => Yii::t('app', 'Message'),
			'to_user_id' => Yii::t('app', 'To User'),
			'created_date' => Yii::t('app', 'Created Date'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('inbox_id', $this->inbox_id);
		$criteria->compare('from_user_id', $this->from_user_id);
		$criteria->compare('message', $this->message, true);
		$criteria->compare('to_user_id', $this->to_user_id);
		$criteria->compare('created_date', $this->created_date, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}