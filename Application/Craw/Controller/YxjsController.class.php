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

class YxjsController extends Controller {
    public function index(){
        $snoopy=new \Snoopy();
        $snoopy->maxredirs = 2;
        $snoopy->offsiteok = false;
        $snoopy->expandlinks=true;

        $proxy=M('Proxy');
        $proxy->field("host,port")->where("used=1")->find();
        if(!$proxy){
            echo "eror daili null";
            $this->display();
        }else{
            dump($proxy);
        }
        $snoopy->proxy_port=$proxy->port;
        $snoopy->proxy_host=$proxy->host;
        $snoopy->referer="http://www.njxjyj.com/yxjs";
        $snoopy->passcookies=true;
        //        $snoopy->rawheaders["COOKIE"]="CNZZDATA5797069=cnzz_eid%3D812014887-1407118446-http%253A%252F%252Fwww.gjjx.com.cn%252F%26ntime%3D1407118446";
        //        $snoopy->agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; TheWorld)";
        $snoopy->agent = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36";
//        $snoopy->rawheaders["Accept"]= "image/webp,*/*;q=0.8";
        $snoopy->accept="image/webp,*/*;q=0.8";
        //下载验证
        $uri="http://www.njxjyj.com/yxjs/code.asp";
        $snoopy->fetch($uri);
        $res=$snoopy->results;
        $snoopy->setcookies();
        $cookies=$snoopy->cookies;
        foreach($cookies as $key=>$value){
            cookie($key,$value);
            echo "<br>"."cookie:".$key."=".$value."<br>";
        }

        //生成图像
        $name="./Public/verify0.bmp";

        $file_pointer = fopen($name,"w");
        fwrite($file_pointer,$res);
        fclose($file_pointer);
        /*$im = imagecreatefromstring($res);
        if ($im !== false) {
            //            header('Content-Type: image/jpeg');
            image2wbmp($im,$name);
//            imagejpeg($im,$name);
            imagedestroy($im);
        }else{
            echo "error";
        }*/
        $this->display();
    }
    public function  vote(){
        $snoopy=new \Snoopy();
        $snoopy->maxredirs = 2;
        $snoopy->offsiteok = false;
        $snoopy->expandlinks=true;
        $snoopy->referer="http://www.njxjyj.com/yxjs/plus_vote.asp?id=111&t=1";

        $snoopy->passcookies=true;
        //        $snoopy->rawheaders["COOKIE"]="CNZZDATA5797069=cnzz_eid%3D812014887-1407118446-http%253A%252F%252Fwww.gjjx.com.cn%252F%26ntime%3D1407118446";
        //        $snoopy->agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; TheWorld)";
        $snoopy->agent = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36";
        //下载验证
        $uri="http://www.njxjyj.com/yxjs/vote.asp";
        $snoopy->rawheaders["COOKIE"]=cookie("ASPSESSIONIDQQSRQSQB");
        $snoopy->rawheaders["Origin"]="http://www.njxjyj.com";
        $proxy=M('Proxy');
        $proxy->field("host,port")->where("used=1")->find();
        if(!$proxy){
            echo "eror daili null";
            $this->display();
        }
        $snoopy->proxy_port=$proxy->port;
        $snoopy->proxy_host=$proxy->host;
//        .add("imageField.x", "84")
//        .add("imageField.y", "37")

        $code=I("code");
//        $formvars["code"] = $code;
        $formvars["code"] = "ASPSESSIONIDQSTTSRQA=MFAGNOBAHEBMPDNOOICBFOJC; ASPSESSIONIDCQQSTTSD=DAPFFBCAAHABLLDFHFHEEIDM;";
        $formvars["id"] = "111";
        $formvars["t"] = "1";
        $formvars["imageField.x"] = "84";
        $formvars["imageField.y"] = "37";

        $snoopy->submit($uri,$formvars);
        $res=$snoopy->results;
        dump($res);
    }
}