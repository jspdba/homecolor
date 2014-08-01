<?php
namespace Craw\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");

class IndexController extends Controller {
    public function index(){
//        import('Snoopy.Snoopy',VENDOR_PATH,'.class.php');
        Vendor("Snoopy.Snoopy","",".class.php");
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
        $snoopy->rawheaders["Accept"] = "text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8";
        $snoopy->rawheaders["Accept-Encoding"] = "gzip,deflate";
        $snoopy->rawheaders["Accept-Language"] = "zh-CN,zh;q=0.8";
        $snoopy->rawheaders["Cache-Control"] = "max-age=0";
        $snoopy->rawheaders["Connection"] = "keep-alive";
        $snoopy->rawheaders["host"] = "www.baidu.com";

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