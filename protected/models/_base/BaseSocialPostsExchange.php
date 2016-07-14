<?php

/**
 * This is the model base class for the table "social_posts_exchange".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "SocialPostsExchange".
 *
 * Columns in table "social_posts_exchange" available as properties of the model,
 * and there are no model relations.
 *
 * @property integer $social_id
 * @property integer $user_id
 * @property string $twitter_screen_name
 * @property string $fb_screen_name
 * @property integer $postexchange_id
 * @property string $fb_post_id
 * @property string $twitter_post_ids
 * @property string $created_date
 * @property integer $is_delete
 * @property string $message
 * @property string $video_url
 * @property string $image_url
 *
 */
abstract class BaseSocialPostsExchange extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'social_posts_exchange';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'SocialPostsExchange|SocialPostsExchanges', $n);
	}

	public static function representingColumn() {
		return 'twitter_screen_name';
	}

	public function rules() {
		return array(
			array('user_id, twitter_screen_name, fb_screen_name, postexchange_id, fb_post_id, twitter_post_ids, created_date, message, video_url, image_url', 'required'),
			array('user_id, postexchange_id, is_delete', 'numerical', 'integerOnly'=>true),
			array('twitter_screen_name, fb_screen_name', 'length', 'max'=>100),
			array('fb_post_id, twitter_post_ids', 'length', 'max'=>250),
			array('message, video_url, image_url', 'length', 'max'=>500),
			array('is_delete', 'default', 'setOnEmpty' => true, 'value' => null),
			array('social_id, user_id, twitter_screen_name, fb_screen_name, postexchange_id, fb_post_id, twitter_post_ids, created_date, is_delete, message, video_url, image_url', 'safe', 'on'=>'search'),
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
			'social_id' => Yii::t('app', 'Social'),
			'user_id' => Yii::t('app', 'User'),
			'twitter_screen_name' => Yii::t('app', 'Twitter Screen Name'),
			'fb_screen_name' => Yii::t('app', 'Fb Screen Name'),
			'postexchange_id' => Yii::t('app', 'Postexchange'),
			'fb_post_id' => Yii::t('app', 'Fb Post'),
			'twitter_post_ids' => Yii::t('app', 'Twitter Post Ids'),
			'created_date' => Yii::t('app', 'Created Date'),
			'is_delete' => Yii::t('app', 'Is Delete'),
			'message' => Yii::t('app', 'Message'),
			'video_url' => Yii::t('app', 'Video Url'),
			'image_url' => Yii::t('app', 'Image Url'),
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('social_id', $this->social_id);
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('twitter_screen_name', $this->twitter_screen_name, true);
		$criteria->compare('fb_screen_name', $this->fb_screen_name, true);
		$criteria->compare('postexchange_id', $this->postexchange_id);
		$criteria->compare('fb_post_id', $this->fb_post_id, true);
		$criteria->compare('twitter_post_ids', $this->twitter_post_ids, true);
		$criteria->compare('created_date', $this->created_date, true);
		$criteria->compare('is_delete', $this->is_delete);
		$criteria->compare('message', $this->message, true);
		$criteria->compare('video_url', $this->video_url, true);
		$criteria->compare('image_url', $this->image_url, true);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}