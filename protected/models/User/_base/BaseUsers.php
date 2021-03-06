<?php

/**
 * This is the model base class for the table "users".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Users".
 *
 * Columns in table "users" available as properties of the model,
 * and there are no model relations.
 *
 * @property string $id
 * @property string $firstname
 * @property string $lastname
 * @property string $user_type
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $created_at
 * @property string $updated_at
 * @property string $logdate
 * @property string $lognum
 * @property string $is_active
 * @property string $categories_id
 * @property string $city_id
 * @property string $user_roles
 * @property string $code
 *
 */
abstract class BaseUsers extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'users';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'Users|Users', $n);
	}

	public static function representingColumn() {
		return 'firstname';
	}

	public function rules() {
		return array(
			array('firstname, lastname, email, username, password, created_at, city_id, user_roles', 'required'),
			array('firstname, lastname, email', 'length', 'max'=>30),
			array('user_type, categories_id, city_id', 'length', 'max'=>10),
			array('username', 'length', 'max'=>250),
			array('password', 'length', 'max'=>150),
			array('lognum', 'length', 'max'=>5),
			array('is_active', 'length', 'max'=>1),
			array('user_roles', 'length', 'max'=>255),
			array('updated_at, logdate, code', 'safe'),
			array('user_type, updated_at, logdate, lognum, is_active, categories_id, code', 'default', 'setOnEmpty' => true, 'value' => null),
			array('id, firstname, lastname, user_type, email, username, password, created_at, updated_at, logdate, lognum, is_active, categories_id, city_id, user_roles, code', 'safe', 'on'=>'search'),
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
			'firstname' => Yii::t('app', 'Firstname'),
			'lastname' => Yii::t('app', 'Lastname'),
			'user_type' => Yii::t('app', 'User Type'),
			'email' => Yii::t('app', 'Email'),
			'username' => Yii::t('app', 'Username'),
			'password' => Yii::t('app', 'Password'),
			'created_at' => Yii::t('app', 'Created At'),
			'updated_at' => Yii::t('app', 'Updated At'),
			'logdate' => Yii::t('app', 'Logdate'),
			'lognum' => Yii::t('app', 'Lognum'),
			'is_active' => Yii::t('app', 'Is Active'),
			'categories_id' => Yii::t('app', 'Categories'),
			'city_id' => null,
			'user_roles' => Yii::t('app', 'User Roles'),
			'code' => Yii::t('app', 'Code'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id, true);
		$criteria->compare('firstname', $this->firstname, true);
		$criteria->compare('lastname', $this->lastname, true);
		$criteria->compare('user_type', $this->user_type, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('username', $this->username, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('created_at', $this->created_at, true);
		$criteria->compare('updated_at', $this->updated_at, true);
		$criteria->compare('logdate', $this->logdate, true);
		$criteria->compare('lognum', $this->lognum, true);
		$criteria->compare('is_active', $this->is_active, true);
		$criteria->compare('categories_id', $this->categories_id, true);
		$criteria->compare('city_id', $this->city_id);
		$criteria->compare('user_roles', $this->user_roles, true);
		$criteria->compare('code', $this->code, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}