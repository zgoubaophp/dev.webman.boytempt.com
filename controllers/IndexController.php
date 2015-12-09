<?php
namespace app\controllers;
use app\compents\CController;
use yii\db\Connection;
use app\forms\WebadminForm;
/**
 * 首页控制器
 * @author xiawei
 */
class IndexController extends CController {
	public function actionIndex() {
		return $this->render('index');
	}
}