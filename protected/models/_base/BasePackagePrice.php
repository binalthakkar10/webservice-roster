<?php

/**
 * This is the model base class for the table "package_price".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "PackagePrice".
 *
 * Columns in table "package_price" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $package_id
 * @property string $package_name
 * @property double $package_price
 *
 */
abstract class BasePackagePrice extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'package_price';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'PackagePrice|PackagePrices', $n);
	}

	public static function representingColumn() {
		return 'package_name';
	}

	public function rules() {
		return array(
			array('package_name, package_price', 'required'),
			array('package_price', 'numerical'),
			array('package_name', 'length', 'max'=>50),
			array('package_id, package_name, package_price', 'safe', 'on'=>'search'),
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
			'package_id' => Yii::t('app', 'Package'),
			'package_name' => Yii::t('app', 'Package Name'),
			'package_price' => Yii::t('app', 'Package Price'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('package_id', $this->package_id);
		$criteria->compare('package_name', $this->package_name, true);
		$criteria->compare('package_price', $this->package_price);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}