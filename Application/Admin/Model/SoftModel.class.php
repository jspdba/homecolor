<?php
namespace Admin\Model;
use Think\Model;
/**
* 主题表，用于分类主题
*/
class SoftModel extends Model{
	protected $fields = array('id', 'name', 'url','cid','_pk'=>'id');
}
