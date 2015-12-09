<?php
namespace app\compents;
use yii\db\Connection;
use yii\db\Query;
/**
 * 所有服务类的基类
 * @author xiawei
 */
abstract class Service {
	/**
	 * 获取一个Service的单例
	 * @param unknown $className
	 * @return Ambigous <multitype:, unknown>
	 */
	public static function instance($className) {
		if (!isset(self::$INSTANCES[$className])) {
			self::$INSTANCES[$className] = new $className();
		}
		return self::$INSTANCES[$className];
	}
}