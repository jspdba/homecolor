<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");

class IndexController extends Controller {
    public function index(){
        $title = "欢迎页面，首页";
        $this -> assign("title",$title);
        $this->sidebar();//引入sidebar
        $this->display();
    }
    private function sidebar(){
        $model=M('Topic');
        $list=$model->select();
        $this->assign("topics",$list);
    }
    /**
     * 输出变量的内容，通常用于调试
     *
     * @package Core
     *
     * @param mixed $vars 要输出的变量
     * @param string $label
     * @param boolean $return
     */
    private function dump($vars, $label = '', $return = false){
        if (ini_get('html_errors')) {
            $content = "<pre>\n";
            if ($label != '') {
                $content .= "<strong>{$label} :</strong>\n";
            }
            $content .= htmlspecialchars(print_r($vars, true));
            $content .= "\n</pre>\n";
        } else {
            $content = $label . " :\n" . print_r($vars, true);
        }
        if ($return) { return $content; }
        echo $content;
        return null;
    }
}