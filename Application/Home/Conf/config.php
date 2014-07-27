<?php
$dbArray=array(
    //数据库配置default
    'DB_CONFIG' => 'mysql://thinkphp:thinkphp@localhost:3306/thinkphp',

    'LANG_SWITCH_ON' => true, // 开启语言包功能
    'LANG_AUTO_DETECT' => true, // 自动侦测语言 开启多语言功能后有效
    'LANG_LIST' => 'zh-cn,en-us,ja-jp', // 允许切换的语言列表 用逗号分隔
    'VAR_LANGUAGE' => '2', // 默认语言切换变量
);
return array_merge(include './Conf/config.php',$dbArray);
?>