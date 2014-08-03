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
//        session_start();
        $uri="http://www.gjjx.com.cn/login";
        $verify="http://www.gjjx.com.cn/member/captcha/0.21266968157853705";

        $snoopy=$this->getSnoopy();
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

        $this->setCookie($cookies); //先保存cookie吧

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

    private function getSnoopy(){
        $snoopy=new \Snoopy();
        $snoopy->maxredirs = 2;
        $snoopy->offsiteok = false;
        $snoopy->expandlinks=true;
        $snoopy->referer="http://www.gjjx.com.cn/login";
        $snoopy->passcookies=true;
        $snoopy->agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; TheWorld)";
        return $snoopy;
    }

    public  function getForm(){
        $snoopy=$this->getSnoopy();
        $uri="http://www.gjjx.com.cn/login";
//        $snoopy=new \Snoopy();
        $snoopy->fetchform($uri);
        $form=$snoopy->results;
        echo  $form;
    }

    public function  loginForm(){
//        $snoopy=new \Snoopy();
        $snoopy=$this->getSnoopy();
        $cookies=$this->getCookies();
        //snoopy setcookie
//        foreach($cookies as $key=>$value){
////            $snoopy->rawheaders["COOKIE"]=;
//        }
       $snoopy->rawheaders["COOKIE"]=$cookies;
       $uri="http://www.gjjx.com.cn/member/login?hash=0.44259767997799215";
       $snoopy->submit($uri,$_POST);
       $res=$snoopy->results;
       echo $res;
    }

    private function setCookie($cookies){
        foreach($cookies as $key=>$value){
            cookie($key,$value);
        }
    }

    private function  getCookies(){
       return  $value = cookie("SESS009f3c71e51fefafc0101f44ac6f18d6");
    }

}
