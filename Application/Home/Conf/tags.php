<?php
return array(
	//有问题不能用
//	 'app_begin'=>array('Behavior\CheckLang'),
	//3.2.1版本
	'app_begin' => array('Behavior\CheckLangBehavior'),
);
?>