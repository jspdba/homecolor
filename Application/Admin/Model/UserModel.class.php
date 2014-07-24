<?php
namespace Admin\Model;
use Think\Model;
/**
* 主题表，用于分类主题
*/
class UserModel extends Model{
	#protected $connection = 'mysql://thinkphp:thinkphp@localhost:3306/thinkphp#utf8';
	protected $fields = array('id', 'username', 'passwd','email','_pk'=>'id');
}
