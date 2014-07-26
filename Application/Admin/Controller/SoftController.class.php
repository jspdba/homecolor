<?php
namespace Admin\Controller;
header("Content-type: text/html; charset=utf-8");
class SoftController extends AdminController
{
	/*
	public function index(){
		$entity=M('Soft','think_','DB_CONFIG');
		#$list=$entity->select();
		$list=$entity->field("id,name,url,cid")->select();
		if($list){
			$this->assign("list",$list);
		}
		$this->display();
	}
	*/
	public function index(){
//		$entity=M('','','DB_CONFIG');
		$entity=M();
		#$list=$entity->select();
		$cid=I("cid");
		$where="t.id=s.cid";
		if($cid){
			$where.=" and s.cid=$cid ";
		}
		$list=$entity->table('think_topic t,think_soft s')->field("s.id,s.name,s.url,t.name cname")->where($where)->select();
		#print_r($entity->getLastsql());
		#dump($list);
		if($list){
			$this->assign("softs",$list);
		}
		$this->display();
	}
    public function input(){
        //修改前先查询
        $id=I('id');
        $softModel=M('Soft');
        $soft=$softModel->find($id);
        if($soft){
            $this->assign("soft",$soft);
        }
        //分类（下拉）
        $topicModel=M('Topic');
        $topics=$topicModel->select();
        if($topics){
            $this->assign("topics",$topics);
        }
        $this->display();
    }
	//稍后改名为input
	public function add(){
//        $entity=M('Soft','think_','DB_CONFIG');
        $entity=M('Soft');
        if($entity->create($_POST,1)){
            if($result=$entity->add()){
                $this->success('新增成功', U('Soft/index'));
            }
        }
        $this->error('新增失败,'.$entity->getDbError(),U('Soft/index'));
	}
	public function delete(){
		$entity=M('Soft');
		$id=I("id");
		if($ct=$entity->delete($id)){
			$this->success('删除成功!'.'删除'.$ct.'条',U('Soft/index'));
		}else{
		    $this->error('删除失败'.$entity->getDbError(),U('Soft/index'));
        }
	}
    public function update(){
        if (IS_POST){
            $Topic = M('Soft');
            $Topic->create();
            $Topic->save();
            $this->success('保存完成',U('Admin/Soft/index'));
        }else{
            $this->error('非法请求',U('Admin/Soft/index'));
        }
    }
}
?>