<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-1
 * Time: 下午4:31
 */
namespace Admin\Controller;
header("Content-type: text/html; charset=utf-8");
class UtilController extends AdminController{
    public function  index(){
        $path=APP_PATH."Admin/Common/baidu.csv";
//        $content=file_get_contents($path);
//        echo $content;
        $f=fopen($path,"r");
        $topic=M("Topic");
        while(!feof($f)){
            $line=fgets($f);
        }
    }
}