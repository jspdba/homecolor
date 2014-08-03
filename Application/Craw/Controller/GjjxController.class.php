<?php
/**
 * Created by PhpStorm.
 * User: hadoop
 * Date: 14-8-3
 * Time: 下午2:58
 */

namespace Craw\Controller;
use Think\Controller;
Vendor("Snoopy.Snoopy","",".class.php");
header("Content-type: text/html; charset=utf-8");
class GjjxController extends Controller {
    public function index(){
        session_start();
        $uri="http://www.gjjx.com.cn/login";
        $snoopy=new \Snoopy();
        $snoopy->maxredirs = 2;
        $snoopy->offsiteok = false;
        $snoopy->expandlinks=true;
        $snoopy->referer="http://www.gjjx.com.cn/login";
        $snoopy->passcookies=true;
        $snoopy->agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; TheWorld)";
        $verify="http://www.gjjx.com.cn/member/captcha/0.21266968157853705";
        //cookie得到会话
        $snoopy->fetch($verify);
        $snoopy->setcookies();
        $cookies = $snoopy->cookies;
//        echo "====cookie======"."<br >";
        $mycookie="";
        foreach($cookies as $key=>$value){
//            echo $key."=".$value;
            $mycookie=$key."=".$value;
        }
//        echo "<br>"."====cookie======";

        $v0="./Public/verify0.jpg";
        $this->getVerify($snoopy,$mycookie,$verify,$v0);
        $this->display();
    }

    private function getVerify($snoopy,$mycookie,$verify,$name){
        //设置cookie
//        $snoopy->rawheaders["COOKIE"]= $mycookie;

        $snoopy->fetch($verify);

        $snoopy->setcookies();
        $cookies = $snoopy->cookies;

        echo "====cookie======"."<br >";
        foreach($cookies as $key=>$value){
            echo $key."=".$value;
        }
        echo "<br>"."====cookie======";

        $res=$snoopy->results;
        //生成图像
        $im = imagecreatefromstring($res);
        if ($im !== false) {
//            header('Content-Type: image/jpeg');
            imagejpeg($im,$name);
            imagedestroy($im);
        }
    }

}
