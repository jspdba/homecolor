<?php 
namespace Admin\Controller;
use Think\Controller;

/**
 * Class AdminController
 * @package Admin\Controller
 * 如果需要登陆验证，则继承此模块
 */
class CommController extends Controller{
	public function _initialize(){
		//验证登陆,没有登陆则跳转到登陆页面
		if(empty($_SESSION['username'])){
			$this->redirect('Admin/Login/index');
		}

//		//权限验证
//		if(!authCheck(MODULE_NAME."/".CONTROLLER_NAME."/".ACTION_NAME,session('uid'))){
//			$this->error('你没有权限!');
//		}

	}
}
?>