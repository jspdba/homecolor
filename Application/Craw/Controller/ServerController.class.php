<?php
namespace Craw\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: hadoop
 * Date: 14-8-9
 * Time: 下午6:58
 */
class ServerController extends Controller{
    public function index(){
        $headers=getallheaders();
        $posts="";
        $info="";
        foreach($headers as $key=>$value){
            $info.=($key."=".$value."\r\n");
        }
        foreach($_POST as $key=>$value){
            $posts.=($key."=".$value."\r\n");
        }
        $info.="=========post=======\r\n";
        $info.=$posts;

        \Think\Log::write($info,'ERR');
        echo "<br >".LOG_PATH;
    }
}