<?php

/**
 * This is the model base class for the table "user_detail".
 * DO NOT MODIFY THIS FILE! It is automatically generated by giix.
 * If any changes are necessary, you must set or override the required
 * property or method in class "UserDetail".
 *
 * Columns in table "user_detail" available as properties of the model,
 * followed by relations of table "user_detail" available as properties of the model.
 *
 * @property integer $user_id
 * @property integer $user_type
 * @property string $profile_image
 * @property string $cover_image
 * @property string $display_name
 * @property string $first_name
 * @property string $last_name
 * @property string $password
 * @property string $description
 * @property string $email
 * @property string $phone_number
 * @property string $oauth_provider
 * @property string $oauth_uid
 * @property string $device_id
 * @property integer $device_type
 * @property integer $push_score_change
 * @property integer $push_get_contacted
 * @property integer $push_new_exchanges
 * @property integer $push_new_athletes
 * @property double $impact_score
 * @property string $created_date
 * @property integer $is_verified
 * @property integer $is_featured
 * @property string $facebook_screen_name
 * @property string $twitter_screen_name
 * @property double $ratings
 * @property integer $fb_followers
 * @property integer $twitter_followers
 * @property integer $fb_friends
 * @property integer $fb_likes
 * @property integer $twitter_tweets
 * @property integer $retweets
 * @property integer $is_page
 * @property integer $is_delete
 *
 * @property AthleteAppNotification[] $athleteAppNotifications
 * @property AthleteNotification[] $athleteNotifications
 * @property Balance[] $balances
 * @property Campaign[] $campaigns
 * @property Cashout[] $cashouts
 * @property ConvertToShare[] $convertToShares
 * @property EntourageAppNotification[] $entourageAppNotifications
 * @property EntourageNotification[] $entourageNotifications
 * @property PostToExchange[] $postToExchanges
 * @property Ratings[] $ratings0
 * @property Ratings[] $ratings01
 * @property SocialPosts[] $socialPosts
 * @property TotalShare[] $totalShares
 * @property Transaction[] $transactions
 */
abstract class BaseUserDetail extends GxActiveRecord {

	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	public function tableName() {
		return 'user_detail';
	}

	public static function label($n = 1) {
		return Yii::t('app', 'UserDetail|UserDetails', $n);
	}

	public static function representingColumn() {
		return 'display_name';
	}

	public function rules() {
		return array(
			array('user_type, profile_image, cover_image, display_name, first_name, last_name, password, description, email, phone_number, oauth_provider, oauth_uid, device_id, device_type, impact_score, created_date, is_verified, is_featured, facebook_screen_name, twitter_screen_name, fb_followers, twitter_followers, fb_friends, fb_likes, twitter_tweets, retweets, is_page', 'required'),
			array('user_type, device_type, push_score_change, push_get_contacted, push_new_exchanges, push_new_athletes, is_verified, is_featured, fb_followers, twitter_followers, fb_friends, fb_likes, twitter_tweets, retweets, is_page, is_delete', 'numerical', 'integerOnly'=>true),
			array('impact_score, ratings', 'numerical'),
			array('profile_image, first_name, last_name, facebook_screen_name, twitter_screen_name', 'length', 'max'=>100),
			array('cover_image, password', 'length', 'max'=>255),
			array('display_name', 'length', 'max'=>25),
			array('description', 'length', 'max'=>1000),
			array('email, oauth_provider, oauth_uid', 'length', 'max'=>250),
			array('phone_number', 'length', 'max'=>50),
			array('device_id', 'length', 'max'=>500),
			array('push_score_change, push_get_contacted, push_new_exchanges, push_new_athletes, ratings, is_delete', 'default', 'setOnEmpty' => true, 'value' => null),
			array('user_id, user_type, profile_image, cover_image, display_name, first_name, last_name, password, description, email, phone_number, oauth_provider, oauth_uid, device_id, device_type, push_score_change, push_get_contacted, push_new_exchanges, push_new_athletes, impact_score, created_date, is_verified, is_featured, facebook_screen_name, twitter_screen_name, ratings, fb_followers, twitter_followers, fb_friends, fb_likes, twitter_tweets, retweets, is_page, is_delete', 'safe', 'on'=>'search'),
		);
	}

	public function relations() {
		return array(
			'athleteAppNotifications' => array(self::HAS_MANY, 'AthleteAppNotification', 'user_id'),
			'athleteNotifications' => array(self::HAS_MANY, 'AthleteNotification', 'user_id'),
			'balances' => array(self::HAS_MANY, 'Balance', 'user_id'),
			'campaigns' => array(self::HAS_MANY, 'Campaign', 'user_id'),
			'cashouts' => array(self::HAS_MANY, 'Cashout', 'user_id'),
			'convertToShares' => array(self::HAS_MANY, 'ConvertToShare', 'user_id'),
			'entourageAppNotifications' => array(self::HAS_MANY, 'EntourageAppNotification', 'user_id'),
			'entourageNotifications' => array(self::HAS_MANY, 'EntourageNotification', 'user_id'),
			'postToExchanges' => array(self::HAS_MANY, 'PostToExchange', 'user_id'),
			'ratings0' => array(self::HAS_MANY, 'Ratings', 'from_user_id'),
			'ratings01' => array(self::HAS_MANY, 'Ratings', 'to_user_id'),
			'socialPosts' => array(self::HAS_MANY, 'SocialPosts', 'user_id'),
			'totalShares' => array(self::HAS_MANY, 'TotalShare', 'user_id'),
			'transactions' => array(self::HAS_MANY, 'Transaction', 'user_id'),
		);
	}

	public function pivotModels() {
		return array(
		);
	}

	public function attributeLabels() {
		return array(
			'user_id' => Yii::t('app', 'User'),
			'user_type' => Yii::t('app', 'User Type'),
			'profile_image' => Yii::t('app', 'Profile Image'),
			'cover_image' => Yii::t('app', 'Cover Image'),
			'display_name' => Yii::t('app', 'Display Name'),
			'first_name' => Yii::t('app', 'First Name'),
			'last_name' => Yii::t('app', 'Last Name'),
			'password' => Yii::t('app', 'Password'),
			'description' => Yii::t('app', 'Description'),
			'email' => Yii::t('app', 'Email'),
			'phone_number' => Yii::t('app', 'Phone Number'),
			'oauth_provider' => Yii::t('app', 'Oauth Provider'),
			'oauth_uid' => Yii::t('app', 'Oauth Uid'),
			'device_id' => Yii::t('app', 'Device'),
			'device_type' => Yii::t('app', 'Device Type'),
			'push_score_change' => Yii::t('app', 'Push Score Change'),
			'push_get_contacted' => Yii::t('app', 'Push Get Contacted'),
			'push_new_exchanges' => Yii::t('app', 'Push New Exchanges'),
			'push_new_athletes' => Yii::t('app', 'Push New Athletes'),
			'impact_score' => Yii::t('app', 'Impact Score'),
			'created_date' => Yii::t('app', 'Created Date'),
			'is_verified' => Yii::t('app', 'Is Verified'),
			'is_featured' => Yii::t('app', 'Is Featured'),
			'facebook_screen_name' => Yii::t('app', 'Facebook Screen Name'),
			'twitter_screen_name' => Yii::t('app', 'Twitter Screen Name'),
			'ratings' => Yii::t('app', 'Ratings'),
			'fb_followers' => Yii::t('app', 'Fb Followers'),
			'twitter_followers' => Yii::t('app', 'Twitter Followers'),
			'fb_friends' => Yii::t('app', 'Fb Friends'),
			'fb_likes' => Yii::t('app', 'Fb Likes'),
			'twitter_tweets' => Yii::t('app', 'Twitter Tweets'),
			'retweets' => Yii::t('app', 'Retweets'),
			'is_page' => Yii::t('app', 'Is Page'),
			'is_delete' => Yii::t('app', 'Is Delete'),
			'athleteAppNotifications' => null,
			'athleteNotifications' => null,
			'balances' => null,
			'campaigns' => null,
			'cashouts' => null,
			'convertToShares' => null,
			'entourageAppNotifications' => null,
			'entourageNotifications' => null,
			'postToExchanges' => null,
			'ratings0' => null,
			'ratings01' => null,
			'socialPosts' => null,
			'totalShares' => null,
			'transactions' => null,
		);
	}

	public function search() {
		$criteria = new CDbCriteria;

		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('user_type', $this->user_type);
		$criteria->compare('profile_image', $this->profile_image, true);
		$criteria->compare('cover_image', $this->cover_image, true);
		$criteria->compare('display_name', $this->display_name, true);
		$criteria->compare('first_name', $this->first_name, true);
		$criteria->compare('last_name', $this->last_name, true);
		$criteria->compare('password', $this->password, true);
		$criteria->compare('description', $this->description, true);
		$criteria->compare('email', $this->email, true);
		$criteria->compare('phone_number', $this->phone_number, true);
		$criteria->compare('oauth_provider', $this->oauth_provider, true);
		$criteria->compare('oauth_uid', $this->oauth_uid, true);
		$criteria->compare('device_id', $this->device_id, true);
		$criteria->compare('device_type', $this->device_type);
		$criteria->compare('push_score_change', $this->push_score_change);
		$criteria->compare('push_get_contacted', $this->push_get_contacted);
		$criteria->compare('push_new_exchanges', $this->push_new_exchanges);
		$criteria->compare('push_new_athletes', $this->push_new_athletes);
		$criteria->compare('impact_score', $this->impact_score);
		$criteria->compare('created_date', $this->created_date, true);
		$criteria->compare('is_verified', $this->is_verified);
		$criteria->compare('is_featured', $this->is_featured);
		$criteria->compare('facebook_screen_name', $this->facebook_screen_name, true);
		$criteria->compare('twitter_screen_name', $this->twitter_screen_name, true);
		$criteria->compare('ratings', $this->ratings);
		$criteria->compare('fb_followers', $this->fb_followers);
		$criteria->compare('twitter_followers', $this->twitter_followers);
		$criteria->compare('fb_friends', $this->fb_friends);
		$criteria->compare('fb_likes', $this->fb_likes);
		$criteria->compare('twitter_tweets', $this->twitter_tweets);
		$criteria->compare('retweets', $this->retweets);
		$criteria->compare('is_page', $this->is_page);
		$criteria->compare('is_delete', $this->is_delete);

		return new CActiveDataProvider($this, array(
			'criteria' => $criteria,
		));
	}
}