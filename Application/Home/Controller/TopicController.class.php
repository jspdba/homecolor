<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-7-24
 * Time: 下午1:40
 */

namespace Home\Controller;

use Think\Controller;

class TopicController extends  Controller {
    public function index(){
        $model=M('Topic');
        $list=$model->field("id,username,email")->select();
        if($list){
            $this->assign("list",$list);
        }
        $this->display();
    }

    public function input(){
        $this->display();
    }

    public function insert(){
        //		$entity=M('Soft','think_','DB_CONFIG');
        $entity=M('Topic');
        if($entity->create($_POST,1)){
            if($result=$entity->add()){
                $this->success('新增成功', 'index');
            }
        }
        $this->error('新增失败,'.$entity->getDbError(),true);
    }
    public function delete(){
        $entity=M('Topic');
        $id=I("id");
        if($ct=$entity->delete($id)){
            $this->success('删除成功!'.'删除'.$ct.'条', 'index');
        }
        $this->error('删除失败'.$entity->getDbError(),'index');
    }
} 