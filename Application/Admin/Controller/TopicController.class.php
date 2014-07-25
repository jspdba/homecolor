<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-7-24
 * Time: 下午1:40
 */

namespace Admin\Controller;

class TopicController extends  AdminController {
    public function index(){
        $model=M('Topic');
        $list=$model->select();
        if($list){
            $this->assign("topics",$list);
        }
        $this->assign("title","分类展示");
        $this->display();
    }
    public function input(){
        $id=I('id');
        if($id){
            $topic=M('Topic');
            $result=$topic->where('id='.$id)->find();
            if($result){
                $this->assign("topic",$result);
            }
        }
        $this->display();
    }
    public function update(){
        if (IS_POST){
            $Topic = M('Topic');
            $Topic->create();
            $Topic->save();
            $this->success('保存完成',U('Admin/Topic/index'));
        }else{
            $this->error('非法请求',U('Admin/Topic/index'));
        }
    }
    public function add(){
        //		$entity=M('Soft','think_','DB_CONFIG');
        $entity=M('Topic');
        if($entity->create($_POST,1)){
            if($result=$entity->add()){
                $this->success('新增成功', U('Topic/index'));
            }
        }else{
            $this->error('新增失败,'.$entity->getDbError(),true);
        }
    }
    public function delete(){
        $entity=M('Topic');
        $id=I("id");
        if($ct=$entity->delete($id)){
            $this->success('删除成功!'.'删除'.$ct.'条', U('Topic/index'));
        }
        $this->error('删除失败'.$entity->getDbError(),U('Topic/index'));
    }
} 