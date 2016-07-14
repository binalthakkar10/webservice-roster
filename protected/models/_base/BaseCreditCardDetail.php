<?php

/**
 * This is the model base class for the table "credit_card_detail".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "CreditCardDetail".
 *
 * Columns in table "credit_card_detail" available as properties of the model,
 * followed by relations of table "credit_card_detail" available as properties of the model.
 *
 * @property integer $user_id
 * @property string $card_holder_name
 * @property string $card_number
 * @property string $expire_date
 * @property string $security_code
 *
 * @property UserDetail $user
 */
abstract class BaseCreditCardDetail extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'credit_card_detail';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'CreditCardDetail|CreditCardDetails', $n);
	}

	public static function representingColumn() {
		return 'card_holder_name';
	}

	public function rules() {
		return array(
			array('user_id, card_holder_name, card_number, expire_date, security_code', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('card_holder_name', 'length', 'max'=>100),
			array('card_number', 'length', 'max'=>25),
			array('security_code', 'length', 'max'=>10),
			array('user_id, card_holder_name, card_number, expire_date, security_code', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'user' => array(self::BELONGS_TO, 'UserDetail', 'user_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'user_id' => null,
			'card_holder_name' => Yii::t('app', 'Card Holder Name'),
			'card_number' => Yii::t('app', 'Card Number'),
			'expire_date' => Yii::t('app', 'Expire Date'),
			'security_code' => Yii::t('app', 'Security Code'),
			'user' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('card_holder_name', $this->card_holder_name, true);
		$criteria->compare('card_number', $this->card_number, true);
		$criteria->compare('expire_date', $this->expire_date, true);
		$criteria->compare('security_code', $this->security_code, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}