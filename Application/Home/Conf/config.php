<?php
$dbArray=array(
    //数据库配置default
    'DB_CONFIG' => 'mysql://thinkphp:thinkphp@localhost:3306/thinkphp',
);
return array_merge(include './Conf/config.php',$dbArray);
?>