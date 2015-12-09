<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo empty($this->title) ? Yii::$app->params['webinfo']['title'] : $this->title ?></title>
	</head>
	<body>
		<?php echo $content?>
	</body>
</html>