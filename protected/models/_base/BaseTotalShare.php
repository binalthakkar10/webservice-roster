<?php

/**
 * This is the model base class for the table "total_share".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "TotalShare".
 *
 * Columns in table "total_share" available as properties of the model,
 * followed by relations of table "total_share" available as properties of the model.
 *
 * @property integer $total_share_id
 * @property integer $user_id
 * @property double $no_of_shares
 * @property string $created_date
 * @property string $updated_date
 *
 * @property UserDetail $user
 */
abstract class BaseTotalShare extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'total_share';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'TotalShare|TotalShares', $n);
	}

	public static function representingColumn() {
		return 'created_date';
	}

	public function rules() {
		return array(
			array('user_id, no_of_shares, created_date', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('no_of_shares', 'numerical'),
			array('updated_date', 'safe'),
			array('updated_date', 'default', 'setOnEmpty' => true, 'value' => null),
			array('total_share_id, user_id, no_of_shares, created_date, updated_date', 'safe', 'on'=>'search'),
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
			'total_share_id' => Yii::t('app', 'Total Share'),
			'user_id' => null,
			'no_of_shares' => Yii::t('app', 'No Of Shares'),
			'created_date' => Yii::t('app', 'Created Date'),
			'updated_date' => Yii::t('app', 'Updated Date'),
			'user' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('total_share_id', $this->total_share_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('no_of_shares', $this->no_of_shares);
		$criteria->compare('created_date', $this->created_date, true);
		$criteria->compare('updated_date', $this->updated_date, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}