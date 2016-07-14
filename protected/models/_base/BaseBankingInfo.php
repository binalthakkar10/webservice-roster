<?php

/**
 * This is the model base class for the table "banking_info".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "BankingInfo".
 *
 * Columns in table "banking_info" available as properties of the model,
 * followed by relations of table "banking_info" available as properties of the model.
 *
 * @property integer $user_id
 * @property string $name_on_account
 * @property string $account_no
 * @property string $bank_swift_id
 * @property string $bank_name
 * @property string $bank_address
 *
 * @property UserDetail $user
 */
abstract class BaseBankingInfo extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'banking_info';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'BankingInfo|BankingInfos', $n);
	}

	public static function representingColumn() {
		return 'name_on_account';
	}

	public function rules() {
		return array(
			array('user_id, name_on_account, account_no, bank_swift_id, bank_name, bank_address', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('name_on_account, bank_address', 'length', 'max'=>500),
			array('account_no, bank_swift_id, bank_name', 'length', 'max'=>250),
			array('user_id, name_on_account, account_no, bank_swift_id, bank_name, bank_address', 'safe', 'on'=>'search'),
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
			'name_on_account' => Yii::t('app', 'Name On Account'),
			'account_no' => Yii::t('app', 'Account No'),
			'bank_swift_id' => Yii::t('app', 'Bank Swift'),
			'bank_name' => Yii::t('app', 'Bank Name'),
			'bank_address' => Yii::t('app', 'Bank Address'),
			'user' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('name_on_account', $this->name_on_account, true);
		$criteria->compare('account_no', $this->account_no, true);
		$criteria->compare('bank_swift_id', $this->bank_swift_id, true);
		$criteria->compare('bank_name', $this->bank_name, true);
		$criteria->compare('bank_address', $this->bank_address, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}