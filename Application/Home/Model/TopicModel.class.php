<?php
namespace Admin\Model;
use Think\Model;
/**
* 主题表，用于分类主题
*/
class TopicModel extends Model{
	#protected $connection = 'mysql://thinkphp:thinkphp@localhost:3306/thinkphp#utf8';
	protected $fields = array('id', 'name', 'leval','_pk'=>'id');
}
