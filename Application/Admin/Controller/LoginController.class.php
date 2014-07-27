<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 14-7-24
 * Time: 下午1:17
 */

namespace Admin\Controller;
use Think\Controller;

class LoginController extends  Controller {
    public function index(){
        $this->display();
    }

    //登录验证
    public function checkLogin(){
        $where['username']=I("username");
        $where['passwd']=I("password");

        $user=M("user");
        $result=$user->where($where)->find();
        $user=null;

        if($result){
            session('username',$result['username']);
            session('id',$result['id']);
            $this->success('登录成功!',U('Admin/Index/index'));
        }else{
            $this->error('账号或密码错误!',U('Admin/Login/index'));
        }
    }

    //退出
    public function logout(){
        unset($_SESSION['username']);
        unset($_SESSION['id']);
        $this->success('退出成功!',U('Home/Index/index'));
    }
} 