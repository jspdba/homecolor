<?php
namespace Craw\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
Vendor("Snoopy.Snoopy","",".class.php");
class CaijiController extends Controller {
    public function index(){
//        import('Snoopy.Snoopy',VENDOR_PATH,'.class.php');
//        Vendor("Snoopy.Snoopy","",".class.php");
        $snoopy=new \Snoopy();
        //设置snoopy，登录并且获取百度信息
        $uri="http://www.baidu.com/index.php?tn=monline_5_dg";
        // need an proxy?
//        $snoopy->proxy_host = "";
//        $snoopy->proxy_port = "";

        // set browser and referer:
        $snoopy->agent = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36";
        $snoopy->referer = "http://start.firefoxchina.cn/";
        $cookies="BAIDUID=9EB0865E6598C8CA005C98EB7E75E11B:FG=1; BDUSS=Q2OGFKOGwzUGxiOHJ5V05Kc0tmcjRSU1FVcmpzNTlCdmgwVy05V3FRSHpIdmhUQVFBQUFBJCQAAAAAAAAAAAEAAADkQy8XanNwZGJhAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAPOR0FPzkdBTRW; BD_UPN=133143; BDRCVFR[kpkBv0s1F-3]=G01CoNuskzfuh-zuyuEXAPCpy49QhP8";
        $splice=explode(";",$cookies);
        foreach($splice as $key=>$value){
            $map=explode("=",$value);
            if(sizeof($map)==2){
//                $cookieArray[$map[0]]=$map[1];
                // set some cookies:
                $snoopy->cookies[$map[0]]=$map[1];
            }else{
//                $cookieArray[$map[0]]=$map[1]."=".$map[2];
                // set some cookies:
                $snoopy->cookies[$map[0]]=$map[1]."=".$map[2];
            }
        }
//        dump($cookieArray);
//        return;
//        // set some cookies:
//        $snoopy->cookies[""] = '';

        // set an raw-header:
//        $snoopy->rawheaders["Accept"] = "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8";
//        $snoopy->rawheaders["Accept-Encoding"] = "gzip,deflate";
//        $snoopy->rawheaders["Accept-Language"] = "zh-CN,zh;q=0.8";
//        $snoopy->rawheaders["Cache-Control"] = "max-age=0";
//        $snoopy->rawheaders["Connection"] = "keep-alive";
//        $snoopy->rawheaders["host"] = "www.baidu.com";

        // set some internal variables:
        $snoopy->maxredirs = 2;
        $snoopy->offsiteok = false;
        $snoopy->expandlinks = false;
        $snoopy->read_timeout=3;  //读取超时时间

        // set username and password (optional)
        //$snoopy->user = "joe";
        //$snoopy->pass = "bloe";

        // fetch the text of the website www.google.com:
        if($snoopy->fetchtext($uri)){
            // other methods: fetch, fetchform, fetchlinks, submittext and submitlinks

            // response code:
            //print "response code: ".$snoopy->response_code."<br/>\n";

            // print the headers:
            //print "<b>Headers:</b><br/>";
            //while(list($key,$val) = each($snoopy->headers)){
            //  print $key.": ".$val."<br/>\n";
            //}

            // print the texts of the website:
            //print_r( json_decode($snoopy->results) );
            if($snoopy->results){
                echo $snoopy->results."\r\n";
            }
        }


//        $this->display();

    }

    /**
     * 采集代理数据
     * 默认采集10个代理
     */
    public function caiji(){
        $num=10;//采集数量
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
//                echo $res."<br />";
                $proxies=explode(" ",$res);
                $len=count($proxies);
//                echo "本次获取".$len."个代理"."<br />";
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
//                        echo $m->getDbError()."<br />";
                    }
                    $b=$m->add();
                    if(!$b){
//                        $m->getDbError()."<br />";
                    }
//                    echo "Saved proxy=".$value."<br />";
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
    public function toupiao(){
        //设置超时时间，不会出现30秒超时提示
        set_time_limit (0);
        $uri="http://www.njxjyj.com/yxjs/ajax_dc.asp?action=d&id=111";
        $snoopy=new \Snoopy();
        $snoopy->agent = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36";
//        $snoopy->rawheaders["Accept"] = "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8";
//        $snoopy->rawheaders["Accept-Encoding"] = "gzip,deflate";
//        $snoopy->rawheaders["Accept-Language"] = "zh-CN,zh;q=0.8";
//        $snoopy->rawheaders["Cache-Control"] = "max-age=0";
//        $snoopy->rawheaders["Connection"] = "keep-alive";
        $snoopy->maxredirs = 3;
        $snoopy->offsiteok = false;
        $snoopy->expandlinks = false;//如果需要验证码，则很有用
        $snoopy->read_timeout=2;  //读取超时时间
        $snoopy->referer="http://www.njxjyj.com/yxjs";
//        $snoopy->rawheaders["Pragma"] = "no-cache"; //cache 的http头信息

//        $snoopy->rawheaders["X_FORWARDED_FOR"] = "202.108.50.69"; //伪装ip

//        $snoopy->maxredirs = 2; //重定向次数
//        $snoopy->expandlinks = true; //是否补全链接 在采集的时候经常用到
//        例如链接为 /images/taoav.gif 可改为它的全链接 http://www.taoav.com/images/taoav.gif
//        $snoopy->maxframes = 5 //允许的最大框架数
        //代理
 /*       $proxy=$this->getProxyAutoFetch();
        if(!empty($proxy)){
//            echo "<br />"."use proxy=".$proxy["host"].":".$proxy["port"]."<br />";
            $snoopy->proxy_host = $proxy["host"];
            $snoopy->proxy_port = $proxy["port"];
        }

        $arr=array(
            'error'=>1,
            'result'=>"",
            'dbCount'=>$this->getCount(),
        );
        $json_string="";
        if($snoopy->fetchtext($uri)){
            $data=$snoopy->results;
            $res=mb_convert_encoding($data,"utf-8","gb2312");
            if(!empty($res)){
                $arr['result']=mb_convert_encoding($data,"utf-8","gb2312");
                $arr['error']=0;
            }else{
                $arr['result']="返回为空，应该是超时错误";
                $json_string = json_encode($arr);
                echo $json_string;
                return;
            }
        }
        if($snoopy->error){ //返回报错信息
            $arr['result']=$snoopy->error;
            $arr['error']=1;
        }
        $json_string = json_encode($arr);
        echo $json_string;*/

       //一次投10票
        $this->moreThenOneToupiao($snoopy,$uri,3);
    }

    private  function  moreThenOneToupiao($snoopy,$uri,$times){
        for($i=0;$i<$times;$i++){
            $proxy=$this->getProxyAutoFetch();
            if(!empty($proxy)){
//            echo "<br />"."use proxy=".$proxy["host"].":".$proxy["port"]."<br />";
                $snoopy->proxy_host = $proxy["host"];
                $snoopy->proxy_port = $proxy["port"];
            }else{
                continue;
            }

            $snoopy->fetchtext($uri);
            if ($snoopy->status>0&& $snoopy->status== '200' && !$snoopy->timed_out) {
                echo  $this->getCount();
            }

            /*if($snoopy->fetchtext($uri)){
                $data=$snoopy->results;
                echo mb_convert_encoding($data,"utf-8","gb2312")."<br />";
            }*/
        }
    }
    /**
     * 输出变量的内容，通常用于调试
     *
     * @package Core
     *
     * @param mixed $vars 要输出的变量
     * @param string $label
     * @param boolean $return
     */
    private function dump($vars, $label = '', $return = false){
        if (ini_get('html_errors')) {
            $content = "<pre>\n";
            if ($label != '') {
                $content .= "<strong>{$label} :</strong>\n";
            }
            $content .= htmlspecialchars(print_r($vars, true));
            $content .= "\n</pre>\n";
        } else {
            $content = $label . " :\n" . print_r($vars, true);
        }
        if ($return) { return $content; }
        echo $content;
        return null;
    }
}