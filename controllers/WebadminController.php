<?php
namespace app\controllers;
use yii\web\Controller;
use app\forms\WebadminForm;
/**
 * 管理员对应的Controller
 * @author xiawei
 */
class WebadminController extends Controller {
	/**
	 * 管理员登陆
	 */
	public function actionLogin() {
		$webadminForm = new WebadminForm();
		$webadminForm->setScenario('login');
		$this->render('login', array('webadminForm' => $webadminForm));
	}
}