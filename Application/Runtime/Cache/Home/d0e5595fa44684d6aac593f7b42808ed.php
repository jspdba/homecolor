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
    <link href="/homecolor/Public/css/index/footer.css" rel="stylesheet">
</head>

<body>
<!--导航-->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">logo</a></li>
                <li><a href="<?php echo U('Home/Index/index');?>"><?php echo L("home");?></a></li>
                <li><a href="<?php echo U('Home/Login/index');?>"><?php echo L('manage');?></a></li>
                <!--<li><a href="#">设置</a></li>-->
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#"><i class="glyphicon glyphicon-user"></i> <?php echo (session('username')); ?> <i class="caret"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <!--<li>
                            <a href="#" tabindex="-1"><i class="glyphicon glyphicon-cog"></i>	设置</a>
                        </li>
                        <li class="divider"></li>-->
                        <?php if(empty($_SESSION['username'])): ?><li><a href="<?php echo U('Admin/Login/index');?>"><i class="glyphicon glyphicon-ok-sign"></i>登录</a></li>
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
<!--页面内容放这里-->
<div id="wrap">
    <div class="container">
        <div class="row">
            
    <div id="sidebar" class="col-sm-3">
    <div class="panel-group" id="accordion">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="glyphicon glyphicon-list-alt"></i> <?php echo L('topics');?></a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                    <ul class=" nav nav-pills nav-stacked">
                        <?php if(is_array($topics)): $i = 0; $__LIST__ = $topics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$it): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Home/Soft/index',array('cid'=>$it['id']));?>"><i class="glyphicon glyphicon glyphicon-link"></i> <?php echo ($it["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                        <!--<li><a href="<?php echo U('Admin/Member/memberList');?>">会员列表</a></li>
                        <li><a href="<?php echo U('Admin/Member/memberAdd');?>">添加会员</a></li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

            
<!--    <div id="content" class="col-sm-8">
        <?php
 foreach ($list as $key => $value) { echo "<div class='container'>"; echo "<div class='row'>"; echo "<div class='col-md-3'>$value[name]</div>"; echo "<div class='col-md-3'>$value[url]</div>"; echo "<div class='col-md-3'>$value[cname]</div>"; echo "</div>"; echo "</div>"; } ?>
    </div>-->
    <div id="content" class="col-sm-8">
        <div class="panel panel-primary">
            <div class="panel-heading"><?php echo ($topicName); ?></div>
            <div class="panel-body">
                <div calss="container">
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$it): $mod = ($i % 2 );++$i;?><div class="row">
                            <div class="col-lg-3"><a href="<?php echo ($it['url']); ?>"><i class="glyphicon glyphicon-floppy-save"></i>  <?php echo ($it['name']); ?></a></div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
     </div>

        </div>
    </div><!-- /.container -->
</div> <!--wrap,end-->
<!--footer-->
<!--<div id="footer">
    <div class="container">
        this is a footer ,you can print something here
    </div>
</div>-->
<!--<footer>
    <p class="pull-right"><a href="#">Back to top</a></p>
    <p>© 2013 Company, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
</footer>-->
<div class="container marketing">
    <hr class="featurette-divider">
    <!-- FOOTER -->
    <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>© 2013 Company, Inc. · <a href="#">wcf</a> · <a href="#">Terms</a></p>
    </footer>
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