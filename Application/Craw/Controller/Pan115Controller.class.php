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

class Pan115Controller extends Controller {
    public function index(){

        $snoopy=new \Snoopy();
        $snoopy->maxredirs = 3;
        $snoopy->maxframes=2;
        $snoopy->offsiteok = true;
        $snoopy->expandlinks=true;
        $snoopy->read_timeout=10;

        $snoopy->passcookies=true;
        //        $snoopy->rawheaders["COOKIE"]="CNZZDATA5797069=cnzz_eid%3D812014887-1407118446-http%253A%252F%252Fwww.gjjx.com.cn%252F%26ntime%3D1407118446";
        //        $snoopy->agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; TheWorld)";
        $snoopy->agent = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36";
        //下载验证
        $uri="http://www.115.com/?goto=http%3A%2F%2F115.com%2F";

        echo "fetch=".$uri;

        $snoopy->fetchform($uri);
        $res=$snoopy->results;
        dump($res);
        $snoopy->setcookies();
        $cookies=$snoopy->cookies;
        $keys=array();
        foreach($cookies as $key=>$value){
            session($key,$value);//放到session里，以免混杂cookie
            //实践证明，最多有一个cookie所以这里从简
            $keys[$cnt]=$key;
            cookie($key,$value);
            echo "<br>"."cookie:".$key."=".$value."<br>";
        }
        
        // $this->display();
    }
    public function  vote(){
        $uri="http://www.njxjyj.com/yxjs/vote.asp";
        $snoopy=new \Snoopy();
        $snoopy->maxredirs = 5;
        $snoopy->maxframes=2;
        $snoopy->offsiteok = false;
        $snoopy->expandlinks=false;
        $snoopy->passcookies=true;
        $snoopy->rawheaders["Origin"]="http://www.njxjyj.com";
        $snoopy->referer="http://www.njxjyj.com/yxjs/plus_vote.asp?id=111&t=1";
        $snoopy->agent = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36";

        //获取代理
        $proxy=$this->getProxyAutoFetch();
        if(sizeof($proxy)==0){
            echo "proxy error ,there is no proxy, returned!!";
            return ;
        }
        $snoopy->proxy_host=$proxy->host;
        $snoopy->proxy_port=$proxy->port;

        echo "========sesssoin============";
        $keys=session("keys");
        //从session中取出cookie,之后放入header
        $cookieHeaders="";
        foreach($keys as $key=>$value){
            echo $key."=".session($value);//从session中取出以key命名的cookie
            $cookieHeaders.=$key."=".session($value)."; ";
        }
        echo "========sesssoin============";
        echo "========cookie============";
        dump(cookie());
        echo "========cookie============";

//        $snoopy->rawheaders["COOKIE"]=cookie();
        //        $snoopy->rawheaders["COOKIE"]="CNZZDATA5797069=cnzz_eid%3D812014887-1407118446-http%253A%252F%252Fwww.gjjx.com.cn%252F%26ntime%3D1407118446";
        //        $snoopy->agent = "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; TheWorld)";

//        $snoopy->rawheaders["COOKIE"]="ASPSESSIONIDQSTTSRQA=MFAGNOBAHEBMPDNOOICBFOJC; ASPSESSIONIDCQQSTTSD=DAPFFBCAAHABLLDFHFHEEIDM;";
        //        $snoopy->rawheaders['Cookie']="ASPSESSIONIDQSTTSRQA=MFAGNOBAHEBMPDNOOICBFOJC; ASPSESSIONIDCQQSTTSD=DAPFFBCAAHABLLDFHFHEEIDM; tpc=1";

        $snoopy->rawheaders['COOKIE']=$cookieHeaders;

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


    /**
     * 采集代理数据
     * 默认采集10个代理
     */
    public function caiji(){
        $num=30;//采集数量
        $uri="http://www.tkdaili.com/api/getiplist.aspx?vkey=0BD06E292F31222BA38F46E53EA3D09B&num=".$num."&country=CN&style=4";
        $snoopy=new \Snoopy();
        $snoopy->agent = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36";
        $snoopy->rawheaders["Accept"] = "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8";
        $snoopy->rawheaders["Accept-Encoding"] = "gzip,deflate";
        $snoopy->rawheaders["Accept-Language"] = "zh-CN,zh;q=0.8";
        $snoopy->rawheaders["Cache-Control"] = "max-age=0";
        $snoopy->rawheaders["Connection"] = "keep-alive";
        $snoopy->maxredirs = 2;
        $snoopy->offsiteok = false;
        $snoopy->expandlinks = false;
        $snoopy->read_timeout=3;  //读取超时时间
        $m=M("Proxy");

        if($snoopy->fetchtext($uri)){
            if($snoopy->results){
                //以空格分隔
                $res=$snoopy->results;
                echo $res."<br />";
                $proxies=explode(" ",$res);
                $len=count($proxies);
                echo "本次获取".$len."个代理"."<br />";
                foreach($proxies as $key=>$value){
                    if(empty($value)){
                        continue;
                    }
                    $proxy=explode(":",$value);
                    if(empty($proxy)){
                        continue;
                    }
                    $data=array();
                    $data['host']=$proxy[0];
                    $data['port']=$proxy[1];
                    $data['used']=false;
                    $b=$m->create($data,1);
                    if(!$b){
                        echo $m->getDbError()."<br />";
                    }
                    $b=$m->add();
                    if(!$b){
                        $m->getDbError()."<br />";
                    }
                    echo "Saved proxy=".$value."<br />";
                }
            }
        }

        /*added 测试数据添加
         * $sproxy="222.183.88.142:18186 222.242.29.106:8088 223.153.5.182:8088 202.108.50.69:80 222.221.41.75:8088  123.245.55.197:8088 180.115.60.16:8088 120.3.12.25:8088";
        $proxies=explode(" ",$sproxy);
        foreach($proxies as $key=>$value){
            echo "<br />".$value;
            if(empty($value)){
                echo "empty"."<br />";
                continue;
            }
            $p=explode(":",$value);
            $data=array();
            $data['host']=$p[0];
            $data['port']=$p[1];
            $data['used']=false;
            $m->create($data,1);
            $m->add();
            echo "added"."<br />";
        }*/
    }
    public function getProxyOne(){
        $m=M("Proxy");
        $res=$m->where("used=false")->order("createTime desc")->find();
//        echo "id=".$res["id"].",host".$res["host"].",port=".$res['port'].",used=".$res["used"].",createTime=".$res["createTime"];
//        $res['used']=true;
        $m->used=true;
        $m->where("id=".$res["id"])->save();
        $this->getCount();
        return $res;
//        $res=$m->where("id=".$res["id"])->find();
//        echo "id=".$res["id"].",host".$res["host"].",port=".$res['port'].",used=".$res["used"].",createTime=".$res["createTime"];
    }

    private function getCount(){
        $m=M("Proxy");
        $c=$m->where("used=false")->count("id");
        return $c;
//        echo "<br /> 剩余proxy数量：".$c--."<br />";
    }
    /**
     * 自动远程获取proxy
     * @return mixed
     */
    private function getProxyAutoFetch(){
        $proxy=$this->getProxyOne();
        if(empty($proxy)){
            $this->caiji();
            $proxy=$this->getProxyOne();
            return $proxy;
        }
        return $proxy;
    }

    /**
     * sqlite 数据库
     */
    private function  getProxySqlite(){
        $db_path="C:/Users/Administrator/Workspaces/MyEclipse 8.5/ToupiaoProject/dailinew.db";
        $db = new \PDO("sqlite:".$db_path); //注意红字部分的路径格式，这样写会报错：new PDO('myDB.sqlite');
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

    }
}