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
header("Content-type: text/html; charset=gb2312");

class YxjsController extends Controller {
    public function index(){
        $snoopy=new \Snoopy();
        $snoopy->maxredirs = 3;
        $snoopy->maxframes=2;
        $snoopy->offsiteok = true;
        $snoopy->expandlinks=true;
        /*$proxy=M('Proxy');
        $proxy->field("host,port")->where("used=1")->find();
        if(!$proxy){
            echo "eror daili null";
            $this->display();
        }else{
            dump($proxy);
        }*/
        $db = new \PDO("sqlite:C:/Users/Administrator/Workspaces/MyEclipse 8.5/ToupiaoProject/dailinew.db"); //注意红字部分的路径格式，这样写会报错：new PDO('myDB.sqlite');
        if ($db){
            echo 'connect ok';
        }else{
            echo 'connect bad';
        }
        $proxy=array();
        foreach ($db->query("SELECT host,port,id FROM daili where used=1 limit 1;") as $row){
            $proxy=array(
                "host"=>$row[0],
                "port"=>$row[1],
                "id"=>$row[2],
            );
            dump($proxy);
            //            $db->beginTransaction();
            $db->exec("update daili set used=0 where id=".$row[2]);
            //            $db->commit();
        }
        if(sizeof($proxy)==0){
            echo "proxy error ,there is no proxy, returned!!";
            return ;
        }
        $snoopy->proxy_host=$proxy->host;
        $snoopy->proxy_port=$proxy->port;

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
        $keys="";
        foreach($cookies as $key=>$value){
            session($key,$value);//放到session里，以免混杂cookie
            cookie($key,$value);
            $keys.=$key."|";
            echo "<br>"."cookie:".$key."=".$value."<br>";
        }

        session("keys",$keys);

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
        $snoopy->maxredirs = 5;
        $snoopy->maxframes=2;
        $snoopy->offsiteok = true;
        $snoopy->expandlinks=true;
        $snoopy->passcookies=true;
        $snoopy->referer="http://www.njxjyj.com/yxjs/plus_vote.asp?id=111&t=1";
        $snoopy->passcookies=true;
//        $snoopy->rawheaders["COOKIE"]=cookie();
        dump(cookie());
        //        $snoopy->rawheaders["COOKIE"]="CNZZDATA5797069=cnzz_eid%3D812014887-1407118446-http%253A%252F%252Fwww.gjjx.com.cn%252F%26ntime%3D1407118446";
        //        $snoopy->agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; TheWorld)";
        $snoopy->agent = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36";
        //下载验证
        $uri="http://www.njxjyj.com/yxjs/vote.asp";
//        $snoopy->rawheaders["COOKIE"]="ASPSESSIONIDQSTTSRQA=MFAGNOBAHEBMPDNOOICBFOJC; ASPSESSIONIDCQQSTTSD=DAPFFBCAAHABLLDFHFHEEIDM;";
        $snoopy->rawheaders["Origin"]="http://www.njxjyj.com";
        $db = new \PDO("sqlite:C:/Users/Administrator/Workspaces/MyEclipse 8.5/ToupiaoProject/dailinew.db"); //注意红字部分的路径格式，这样写会报错：new PDO('myDB.sqlite');
        if ($db){
            echo 'connect ok';
        }else{
            echo 'connect bad';
        }
        $proxy=array();
        foreach ($db->query("SELECT host,port,id FROM daili where used=1 limit 1;") as $row){
            $proxy=array(
                "host"=>$row[0],
                "port"=>$row[1],
                "id"=>$row[2],
            );
            dump($proxy);
            //            $db->beginTransaction();
            $db->exec("update daili set used=0 where id=".$row[2]);
            //            $db->commit();
        }
        if(sizeof($proxy)==0){
            echo "proxy error ,there is no proxy, returned!!";
            return ;
        }
        $snoopy->proxy_host=$proxy->host;
        $snoopy->proxy_port=$proxy->port;
//        .add("imageField.x", "84")
//        .add("imageField.y", "37")

        $code=I("code");
        $formvars["code"] = $code;
//        $formvars["code"] = "2syx";
        $formvars["id"] = "111";
        $formvars["t"] = "1";
        $formvars["imageField.x"] = "84";
        $formvars["imageField.y"] = "37";

        $snoopy->submit($uri,$formvars);
        $res=$snoopy->results;
        $snoopy->setcookies();
        dump($snoopy->cookies);
        echo "===== dump(snoopy->cookies)=======";
        dump(cookie());
        echo "===== dump(snoopy->cookies)=======";

//        $snoopy->rawheaders['Cookie']="ASPSESSIONIDQSTTSRQA=MFAGNOBAHEBMPDNOOICBFOJC; ASPSESSIONIDCQQSTTSD=DAPFFBCAAHABLLDFHFHEEIDM; tpc=1";
        dump($snoopy->headers);
        dump($res);
        $action_do="http://www.njxjyj.com/yxjs/vote_do.asp?id=111&t=1";//get,ASPSESSIONIDQSTTSRQA=MFAGNOBAHEBMPDNOOICBFOJC; ASPSESSIONIDCQQSTTSD=DAPFFBCAAHABLLDFHFHEEIDM; tpc=1,Referer:http://www.njxjyj.com/yxjs/plus_vote.asp?id=111&t=1

        /*$snoopy->fetch($action_do);
        $res=$snoopy->results;
        dump($snoopy->headers);
        dump($res);*/
        $snoopy->fetch($action_do);
        dump($snoopy-headers);
        echo $snoopy->results;
    }

    public function one(){
        $snoopy=new \Snoopy();
        $snoopy->maxredirs = 5;
        $snoopy->maxframes=2;
        $snoopy->offsiteok = false;
        $snoopy->expandlinks=false;
        $snoopy->passcookies=true;
        $snoopy->referer="http://www.njxjyj.com/yxjs/plus_vote.asp?id=111&t=1";
        $snoopy->passcookies=true;
        $snoopy->agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; TheWorld)";
//        $snoopy->agent = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.3";
        $uri="http://www.njxjyj.com/yxjs/vote.asp";
        $snoopy->rawheaders["COOKIE"]="ASPSESSIONIDCQTTTTTD=FADNBCPAILCAMGHPPBDNMOOE;";
        $snoopy->rawheaders["Origin"]="http://www.njxjyj.com";

        $db = new \PDO("sqlite:C:/Users/Administrator/Workspaces/MyEclipse 8.5/ToupiaoProject/dailinew.db"); //注意红字部分的路径格式，这样写会报错：new PDO('myDB.sqlite');
        if ($db){
            echo 'connect ok';
        }else{
            echo 'connect bad';
        }
        $proxy=array();
        foreach ($db->query("SELECT host,port,id FROM daili where used=1 limit 1;") as $row){
            $proxy=array(
                "host"=>$row[0],
                "port"=>$row[1],
                "id"=>$row[2],
            );
            dump($proxy);
//            $db->beginTransaction();
              $db->exec("update daili set used=0 where id=".$row[2]);
//            $db->commit();
        }
        if(sizeof($proxy)==0){
            echo "proxy error ,there is no proxy, returned!!";
            return ;
        }
        $snoopy->proxy_host=$proxy->host;
        $snoopy->proxy_port=$proxy->port;
        //        .add("imageField.x", "84")
        //        .add("imageField.y", "37")

        $code=I("code");
        //        $formvars["code"] = $code;
        $formvars["code"] = "3tg9";
        $formvars["id"] = "111";
        $formvars["t"] = "1";
        /*        $formvars["imageField.x"] = "84";
                $formvars["imageField.y"] = "37";*/

        $snoopy->submit($uri,$formvars);
        dump($snoopy->headers);
        dump( $snoopy->results);

        $action_do="http://www.njxjyj.com/yxjs/vote_do.asp?id=111&t=1";//get,ASPSESSIONIDQSTTSRQA=MFAGNOBAHEBMPDNOOICBFOJC; ASPSESSIONIDCQQSTTSD=DAPFFBCAAHABLLDFHFHEEIDM; tpc=1,Referer:http://www.njxjyj.com/yxjs/plus_vote.asp?id=111&t=1
        $snoopy->fetch($action_do);
        dump($snoopy-headers);
        echo $snoopy->results;
    }
}