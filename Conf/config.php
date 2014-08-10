<?php
return $arrayName = array(
    'db_type' => 'mysql',
    'db_user' => 'thinkphp',
    'db_pwd' => 'thinkphp',
    'db_host' => 'localhost',
    'db_port' => '3306',
    'db_name' => 'thinkphp',
    'DB_HOST' => '127.0.0.1', // 服务器地址
    'DB_PREFIX' => 'think_', // 数据库表前缀
    'DB_CHARSET' => 'utf8', // 数据库的编码 默认为utf8

    //显示调试信息
    'SHOW_PAGE_TRACE'=>true,

    'LOG_TYPE'              =>  'File', // 日志记录类型 默认为文件方式
    'LOG_RECORD' => true, // 开启日志记录
    'LOG_LEVEL' =>'EMERG,ALERT,CRIT,ERR', // 只记录EMERG ALERT CRIT ERR 错误
);
?>