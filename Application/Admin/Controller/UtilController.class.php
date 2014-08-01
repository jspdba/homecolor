<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-8-1
 * Time: 下午4:31
 */
namespace Admin\Controller;
header("Content-type: text/html; charset=utf-8");
class UtilController extends AdminController{
    public function  index(){
        $path=APP_PATH."Admin/Common/baidu.csv";
//        $content=file_get_contents($path);
//        echo $content;
        $f=fopen($path,"r");
        $model=M("Csv");
        //创建一张新表（冗余表）,只用来导入数据
        while(!feof($f)){
            $line=fgets($f);
            echo $line;
            if(empty($line)){
                continue;
            }
            $bean=explode(",","$line");
            $data=array();
            $data['topic']=$bean[0];
            $data['name']=$bean[1];
            $data['url']=$bean[2];
            $model->create($data,1);
            $result =$model->add();
            if($result){
                echo "insert ok!"."<br/>";
            }else{
                echo $model->getDbError()."<br/>";
            }
        }

    }

    public function getAndInsertTopic(){
        $model=M("Csv");
        $topic=M('Topic');
        $result=$model->field("topic")->group("topic")->select();
        foreach($result as $key=>$value){
           $data['name']=$value['topic'];
           $data['leval']=0;
           $topic->create($data,1);
           $ret=$topic->add();
            if(!$ret){
                echo $topic->getDbError()."<br />";
                return;
            }else{
                echo "insert to topic Ok!  ".$value['topic']."<br />";
            }
        }
    }
    public function getAndInsertSoft(){
        $result=M()->field("topic.id,csv.name,csv.url")->table("think_topic topic ,think_csv csv")->where("csv.topic=topic.name")->select();
        foreach($result as $key=>$value){
            $soft=M("Soft");
            $data['name']=$value['name'];
            $data['url']=$value['url'];
            $data['cid']=$value['id'];
            $soft->create($data,1);
            $ret=$soft->add();
            if(!$ret){
                echo $soft->getDbError()."<br />";
                return;
            }else{
                echo "insert to topic Ok!  ".$value['id'].",".$value['name'].",".$value['url']."<br />";
            }
        }
    }
}