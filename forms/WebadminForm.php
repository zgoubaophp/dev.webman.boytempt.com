<?php
namespace app\forms;
use yii\base\Model;
class WebadminForm extends Model {
	/**
	 * 用户名
	 * @var string
	 */
	public $username;
	/**
	 * 密码
	 * @var string
	 */
	public $password;
	
	/**
	 * 验证码
	 * @var string
	 */
	public $verify;
	
	public function rules() {
		return array(
			array('username', 'validateUsername'),
			array('password', 'validatePassword'),
		);
	}
	
	public function validateUsername($attribute, $params) {
		
	}
	
	public function validatePassword($attribute, $params) {
		
	}
}