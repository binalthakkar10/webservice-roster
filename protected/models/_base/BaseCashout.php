<?php

/**
 * This is the model base class for the table "cashout".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Cashout".
 *
 * Columns in table "cashout" available as properties of the model,
 * followed by relations of table "cashout" available as properties of the model.
 *
 * @property integer $cashout_id
 * @property integer $user_id
 * @property double $amount_to_cashout
 * @property string $acc_no
 * @property string $name_on_acc
 * @property string $bank_swift_id
 * @property string $bank_name
 * @property string $bank_address
 * @property integer $is_verified
 * @property string $updated_date
 * @property string $created_date
 * @property integer $is_delete
 * @property string $cashout_message
 *
 * @property UserDetail $user
 */
abstract class BaseCashout extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'cashout';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Cashout|Cashouts', $n);
	}

	public static function representingColumn() {
		return 'acc_no';
	}

	public function rules() {
		return array(
			array('user_id, amount_to_cashout, acc_no, name_on_acc, bank_swift_id, bank_name, bank_address, updated_date, cashout_message', 'required'),
			array('user_id, is_verified, is_delete', 'numerical', 'integerOnly'=>true),
			array('amount_to_cashout', 'numerical'),
			array('acc_no, bank_swift_id', 'length', 'max'=>50),
			array('name_on_acc, bank_name', 'length', 'max'=>255),
			array('bank_address', 'length', 'max'=>5000),
			array('cashout_message', 'length', 'max'=>500),
			array('created_date', 'safe'),
			array('is_verified, created_date, is_delete', 'default', 'setOnEmpty' => true, 'value' => null),
			array('cashout_id, user_id, amount_to_cashout, acc_no, name_on_acc, bank_swift_id, bank_name, bank_address, is_verified, updated_date, created_date, is_delete, cashout_message', 'safe', 'on'=>'search'),
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
			'cashout_id' => Yii::t('app', 'Cashout'),
			'user_id' => null,
			'amount_to_cashout' => Yii::t('app', 'Amount To Cashout'),
			'acc_no' => Yii::t('app', 'Acc No'),
			'name_on_acc' => Yii::t('app', 'Name On Acc'),
			'bank_swift_id' => Yii::t('app', 'Bank Swift'),
			'bank_name' => Yii::t('app', 'Bank Name'),
			'bank_address' => Yii::t('app', 'Bank Address'),
			'is_verified' => Yii::t('app', 'Is Verified'),
			'updated_date' => Yii::t('app', 'Updated Date'),
			'created_date' => Yii::t('app', 'Created Date'),
			'is_delete' => Yii::t('app', 'Is Delete'),
			'cashout_message' => Yii::t('app', 'Cashout Message'),
			'user' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('cashout_id', $this->cashout_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('amount_to_cashout', $this->amount_to_cashout);
		$criteria->compare('acc_no', $this->acc_no, true);
		$criteria->compare('name_on_acc', $this->name_on_acc, true);
		$criteria->compare('bank_swift_id', $this->bank_swift_id, true);
		$criteria->compare('bank_name', $this->bank_name, true);
		$criteria->compare('bank_address', $this->bank_address, true);
		$criteria->compare('is_verified', $this->is_verified);
		$criteria->compare('updated_date', $this->updated_date, true);
		$criteria->compare('created_date', $this->created_date, true);
		$criteria->compare('is_delete', $this->is_delete);
		$criteria->compare('cashout_message', $this->cashout_message, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}