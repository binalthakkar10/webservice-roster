<?php

/**
 * This is the model base class for the table "creditcard_information".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "CreditcardInformation".
 *
 * Columns in table "creditcard_information" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $id
 * @property string $user_id
 * @property string $cardholder_name
 * @property string $credit_card_no
 * @property string $card_type
 * @property string $expired_date
 * @property string $phone
 *
 */
abstract class BaseCreditcardInformation extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'creditcard_information';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'CreditcardInformation|CreditcardInformations', $n);
	}

	public static function representingColumn() {
		return 'cardholder_name';
	}

	public function rules() {
		return array(
			array('user_id, cardholder_name, credit_card_no, card_type, expired_date, phone', 'required'),
			array('user_id, credit_card_no', 'length', 'max'=>10),
			array('cardholder_name', 'length', 'max'=>255),
			array('card_type, phone', 'length', 'max'=>50),
			array('id, user_id, cardholder_name, credit_card_no, card_type, expired_date, phone', 'safe', 'on'=>'search'),
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
			'user_id' => null,
			'cardholder_name' => Yii::t('app', 'Cardholder Name'),
			'credit_card_no' => Yii::t('app', 'Credit Card No'),
			'card_type' => Yii::t('app', 'Card Type'),
			'expired_date' => Yii::t('app', 'Expired Date'),
			'phone' => Yii::t('app', 'Phone'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('cardholder_name', $this->cardholder_name, true);
		$criteria->compare('credit_card_no', $this->credit_card_no, true);
		$criteria->compare('card_type', $this->card_type, true);
		$criteria->compare('expired_date', $this->expired_date, true);
		$criteria->compare('phone', $this->phone, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}