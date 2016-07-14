<?php

/**
 * This is the model base class for the table "user_role_mgmt".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "UserRoleMgmt".
 *
 * Columns in table "user_role_mgmt" available as properties of the model,
 * followed by relations of table "user_role_mgmt" available as properties of the model.
 *
 * @property integer $user_role
 * @property string $role_name
 *
 * @property UserDetail[] $userDetails
 */
abstract class BaseUserRoleMgmt extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'user_role_mgmt';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'UserRoleMgmt|UserRoleMgmts', $n);
	}

	public static function representingColumn() {
		return 'role_name';
	}

	public function rules() {
		return array(
			array('role_name', 'required'),
			array('role_name', 'length', 'max'=>100),
			array('user_role, role_name', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'userDetails' => array(self::HAS_MANY, 'UserDetail', 'user_role'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'user_role' => Yii::t('app', 'User Role'),
			'role_name' => Yii::t('app', 'Role Name'),
			'userDetails' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('user_role', $this->user_role);
		$criteria->compare('role_name', $this->role_name, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}