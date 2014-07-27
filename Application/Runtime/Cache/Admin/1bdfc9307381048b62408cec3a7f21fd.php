<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="description">
    <meta name="author" content="wcf">

    <!-- <link rel="icon" href="../../favicon.ico">-->

    <title><?php echo ($title); ?></title>

    <!-- Bootstrap core CSS -->
    <!--<link href="../../../../Public/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="/homecolor/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--<link href="../../../../Public/css/starter-template.css" rel="stylesheet">-->
    <link href="/homecolor/Public/css/index/index.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">logo</a></li>
                <li><a href="<?php echo U('Admin/Index/index');?>">首页</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">分类管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo U('Admin/Topic/index');?>">展示</a></li>
                        <li><a href="<?php echo U('Admin/Topic/input');?>">增加</a></li>
                        <li><a href="<?php echo U('Admin/Topic/index');?>">删除</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">软件管理<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo U('Admin/Soft/index');?>">展示</a></li>
                        <li><a href="<?php echo U('Admin/Soft/input');?>">增加</a></li>
                        <li><a href="<?php echo U('Admin/Soft/index');?>">删除</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#"><i class="glyphicon glyphicon-user"></i> <?php echo (session('username')); ?> <i class="caret"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <!--<li>
                            <a href="#" tabindex="-1"><i class="glyphicon glyphicon-cog"></i>设置</a>
                        </li>-->
                        <!--<li class="divider"></li>-->
                        <?php if(empty($_SESSION['username'])): ?><li><a href="<?php echo U('Admin/Login/checkLogin');?>"><i class="glyphicon glyphicon-ok-sign"></i>登录</a></li>
                        <?php else: ?>
                            <li>
                                <a href="<?php echo U('Admin/Login/logout');?>" tabindex="-1"><i class="glyphicon glyphicon-off"></i>	退出</a>
                            </li><?php endif; ?>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>

    <div class="container">
        <?php if(empty($soft)): ?><form role="form" action="<?php echo U('Admin/Soft/add');?>" method="post">
                <div class="form-group">
                    <label for="name">名称</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="软件名称">
                </div>
                <div class="form-group">
                    <label for="url">软件地址</label>
                    <input type="url" class="form-control" id="url" name="url" placeholder="软件连接地址">
                </div>
                <select class="form-control" name="cid">
                    <?php if(is_array($topics)): $k = 0; $__LIST__ = $topics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$it): $mod = ($k % 2 );++$k;?><option value="<?php echo ($it["id"]); ?>"><?php echo ($it["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        <?php else: ?>
            <form role="form" action="<?php echo U('Admin/Soft/update');?>" method="post">
                <input type="hidden" name="id" id="id" value="<?php echo ($soft['id']); ?>">
                <div class="form-group">
                    <label for="name">名称</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="软件名称" value="<?php echo ($soft['name']); ?>">
                </div>
                <div class="form-group">
                    <label for="url">软件地址</label>
                    <input type="url" class="form-control" id="url" name="url" placeholder="软件连接地址" value="<?php echo ($soft['url']); ?>">
                </div>
                <select class="form-control">
                    <?php if(is_array($topics)): $i = 0; $__LIST__ = $topics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$it): $mod = ($i % 2 );++$i; if($it['id'] == $soft['cid']): ?><option value="<?php echo ($it['id']); ?>" selected="selected"><?php echo ($it["name"]); ?></option>
                        <?php else: ?>
                            <option value="<?php echo ($it['id']); ?>"><?php echo ($it["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <button type="submit" class="btn btn-default">提交</button>
                <button type="reset" class="btn btn-default">取消</button>
            </form><?php endif; ?>
    </div>
    </div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!--<script src="../../../../Public/js/jquery.min.js"></script>-->
<!--<script src="../../../../Public/js/bootstrap.min.js"></script>-->

<script src="/homecolor/Public/js/jquery.min.js"></script>
<script src="/homecolor/Public/js/bootstrap.min.js"></script>
</body>
</html>