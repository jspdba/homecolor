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
        $id=5797069;
        //登录状态查询http://www.gjjx.com.cn/member/status
        $snoopy=$this->getSnoopy();
        $mycookie=$this->getLoginCookie($snoopy);
        $this->setCookie($mycookie);

        $v0="./Public/verify0.jpg";
        $this->getVerify($snoopy,$mycookie,$v0);
        $this->display();
    }
    public function execoo(){
        $uri="http://s13.cnzz.com/stat.php?id=5797069&show=pic";
        $snoopy=new \Snoopy();
        $snoopy->referer="http://www.gjjx.com.cn/login";
        $snoopy->agent="Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36";
        $snoopy->fetch($uri);
        $res=$snoopy->results;
        //替换referer
        $res=str_replace("h.referrer","\"http://www.gjjx.com.cn/login\"",$res);
        $res=str_replace("d.location.href","\"http://www.gjjx.com.cn/login\"",$res);
        $res=str_replace("d.navigator.userAgent","\"Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36\"",$res);
        $res=str_replace("d.location.host","\"http://www.gjjx.com.cn\"",$res);
//        echo $res;
        $this->execJs($res);
    }
    public function  getLinks(){
        $snoopy=$this->getSnoopy();
        $uri="http://www.gjjx.com.cn/login";
//        $snoopy=new \Snoopy();
        $snoopy->fetchlinks($uri);
        $res=$snoopy->results;
        dump( $res);
    }

    public  function yuyue(){
        $uri="http://www.gjjx.com.cn/member/training/astern";
//        $snoopy=new \Snoopy();
        $snoopy=$this->getSnoopy();
//        $snoopy->fetchtext($uri);
        $snoopy->rawheaders["cookie"]="SESS009f3c71e51fefafc0101f44ac6f18d6=2_UuI37qWXlorkSXF3b6rZ2lzJvhaTV0pTmiTE58zDw; CNZZDATA5797069=cnzz_eid%3D51168006-1407128495-http%253A%252F%252Fwww.gjjx.com.cn%252F%26ntime%3D1407128495";
        $snoopy->fetchtext($uri);
//        $snoopy->fetchlinks($uri);
        $res=$snoopy->results;
        echo $res;
//        dump( $res);
    }

    private function getLoginCookie($snoopy){
        $uri="http://www.gjjx.com.cn/login";
        $snoopy->fetch($uri);
        $snoopy->setcookies();
        $cookies=$snoopy->cookies;
        echo "=================cookie==================="."<br>";
            dump($cookies);
            foreach($cookies as $key=>$value){
                echo "<br>".$key."=".$value."<br>";
            }
        echo "=================cookie==================="."<br>";

        $this->setcookie($cookies);
        return $cookies;
    }

    private function getVerify($snoopy,$mycookie,$name){
        //设置cookie
//        $snoopy->rawheaders["COOKIE"]= $mycookie;
        $verify="http://www.gjjx.com.cn/member/captcha/0.21266968157853705";

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
//        $snoopy->rawheaders["COOKIE"]="CNZZDATA5797069=cnzz_eid%3D812014887-1407118446-http%253A%252F%252Fwww.gjjx.com.cn%252F%26ntime%3D1407118446";
//        $snoopy->agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; TheWorld)";
        $snoopy->agent = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36";
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
            echo "<br>"."cookie:".$key."=".$value."<br>";
        }
        cookie("CNZZDATA5797069","cnzz_eid%3D812014887-1407118446-http%253A%252F%252Fwww.gjjx.com.cn%252F%26ntime%3D1407118446");
    }

    private function  getCookies(){
       return  $value = cookie("SESS009f3c71e51fefafc0101f44ac6f18d6");
    }
    //执行script脚本
    private function  execJs($js){
        echo "<script>".$js."</script>";
    }
}
