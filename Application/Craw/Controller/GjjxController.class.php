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
//        $id=5797069;
        //登录状态查询http://www.gjjx.com.cn/member/status
        $snoopy=$this->getSnoopy();
        $this->getVerifyCookie($snoopy);
        $v0="./Public/verify0.jpg";
        $this->getVerify($snoopy,$v0);
        $this->getVerify($snoopy,$v0);
        $this->getVerify($snoopy,$v0);
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
        $snoopy->rawheaders["cookie"]=" SESS009f3c71e51fefafc0101f44ac6f18d6=EMSsc3F4Pp9XrRvU0zhavd3Iqd0PUdF4sLIrfw7bdG4;";
//        $snoopy->fetchtext($uri);
//        $snoopy->fetch($uri);
        $snoopy->fetchlinks($uri);
        $res=$snoopy->results;
//        echo $res;
        dump( $res);
        $code="/member/training/asterncar";
//        echo $res;
//        dump($res);
        $count=0;
        foreach($res as $key=>$value){
            if(strstr($code,$value)){
                $count++;
               echo "<a src=\"".$value."\"</a><br>";
            }
        }
        if($count==0){
            echo "没有约车数据！！";
        }
    }

    private function getVerifyCookie($snoopy){
        $verify="http://www.gjjx.com.cn/member/captcha";
        $snoopy->fetch($verify);
        $snoopy->setcookies();
        $cookies=$snoopy->cookies;
//        echo "=================cookie==================="."<br>";
//            foreach($cookies as $key=>$value){
//                echo "<br>".$key."=".$value."<br>";
//            }
//        echo "=================cookie==================="."<br>";
//        echo $cookies['SESS009f3c71e51fefafc0101f44ac6f18d6'];//session
        cookie($cookies);
        dump($cookies);
    }

    private function getVerify($snoopy,$name){
        //设置cookie
        $snoopy->rawheaders["cookie"]= cookie("SESS009f3c71e51fefafc0101f44ac6f18d6");
        $random=mt_rand(0,100) /100;
//        $verify="http://www.gjjx.com.cn/member/captcha/".$random;
        $verify="http://www.gjjx.com.cn/member/captcha";
        $snoopy->fetch($verify);
        $res=$snoopy->results;
        $snoopy->setcookies();
        $cookies=$snoopy->cookies;
        dump($cookies);

        cookie($cookies);
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
       $snoopy->rawheaders["COOKIE"]=cookie('SESS009f3c71e51fefafc0101f44ac6f18d6');
        dump(cookie('SESS009f3c71e51fefafc0101f44ac6f18d6'));
       $uri="http://www.gjjx.com.cn/member/login";
       $username=I('username');
       $password=I('password');
       $captcha=I('captcha');
        echo $username."<br>";
        echo $password."<br>";
        echo $captcha."<br>";
        $data=array(
            'username'=>$username,
            'password'=>$password,
            'captcha'=>$captcha,
        );
       $snoopy->submit($uri,$_POST);
       $res=$snoopy->results;
       echo $res;
        $snoopy->setcookies();
        dump($snoopy->cookies);
    }

    //执行script脚本
    private function  execJs($js){
        echo "<script>".$js."</script>";
    }
}
