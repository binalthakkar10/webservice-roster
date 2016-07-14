<?php

/**
 * This is the model base class for the table "athlete_app_notification".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "AthleteAppNotification".
 *
 * Columns in table "athlete_app_notification" available as properties of the model,
 * followed by relations of table "athlete_app_notification" available as properties of the model.
 *
 * @property integer $ath_app_id
 * @property integer $user_id
 * @property string $screen_name
 * @property integer $badge
 *
 * @property UserDetail $user
 */
abstract class BaseAthleteAppNotification extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'athlete_app_notification';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'AthleteAppNotification|AthleteAppNotifications', $n);
	}

	public static function representingColumn() {
		return 'screen_name';
	}

	public function rules() {
		return array(
			array('user_id, screen_name', 'required'),
			array('user_id, badge', 'numerical', 'integerOnly'=>true),
			array('screen_name', 'length', 'max'=>100),
			array('badge', 'default', 'setOnEmpty' => true, 'value' => null),
			array('ath_app_id, user_id, screen_name, badge', 'safe', 'on'=>'search'),
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
			'ath_app_id' => Yii::t('app', 'Ath App'),
			'user_id' => null,
			'screen_name' => Yii::t('app', 'Screen Name'),
			'badge' => Yii::t('app', 'Badge'),
			'user' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('ath_app_id', $this->ath_app_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('screen_name', $this->screen_name, true);
		$criteria->compare('badge', $this->badge);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}