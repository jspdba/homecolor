<?php
namespace Admin\Controller;
//use Think\Controller\AdminController;
header("Content-type: text/html; charset=utf-8");

class IndexController extends AdminController {
    public function index(){
//        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>[ 您现在访问的是Home模块的Index控制器 ]</div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
        $title = "后台管理-->首页";
        $this -> assign("title",$title);
        //生成一个二维数组用于页面分类展示
        $topicModel=M('Topic');
        $softModel=M('Soft');
        $topics=$topicModel->select();
        foreach($topics as $index=>$value){//每个分类显示5条记录
            $topics[$index]['added']=$softModel->where('cid='.$value['id'])->limit(5)->select();
        }
        $this->assign("topics",$topics);
        $this->display();
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