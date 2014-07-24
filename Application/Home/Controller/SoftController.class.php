<?php
namespace Home\Controller;
use Think\Controller;

header("Content-type: text/html; charset=utf-8");
class SoftController extends Controller
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
			$this->assign("list",$list);
		}
		$this->display();
	}

	public function insert(){
//		$entity=M('Soft','think_','DB_CONFIG');
		$entity=M('Soft');
		if($entity->create($_POST,1)){
			if($result=$entity->add()){
				$this->success('新增成功', 'index');
			}
		}
		$this->error('新增失败,'.$entity->getDbError(),true);
	}
	//稍后改名为input
	public function add(){
		$entity=M('Topic');
		#$result=$entity->where("id=1 ")->find();//只查询一条
		$list=$entity->field("id,name")->select();

		if($list){
			#dump($list);
			$this->assign("list",$list);
		}else{
			print_r($entity->getDbError());
		}
		$this->display();
	}
	public function delete(){
		$entity=M('Soft');
		$id=I("id");
		if($ct=$entity->delete($id)){
			$this->success('删除成功!'.'删除'.$ct.'条', 'index');
		}
		$this->error('删除失败'.$entity->getDbError(),'index');
	}
	
}
?>