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
<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <!--<div class="collapse navbar-collapse">-->
            <ul class="nav navbar-nav">
                <li>
                    <a class="navbar-brand" href="#"><img alt="Brand" height="20" src="data:image/png;base64,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"></a>
                </li>
                <li ><a href="<?php echo U('Home/Index/index');?>"><?php echo L("home");?></a></li>
                <li ><a href="<?php echo U('Home/Login/index');?>"><?php echo L('manage');?></a></li>
                <li ><a href="<?php echo U('Craw/Index/index');?>">投票</a></li>
                <!--<li><a href="#">设置</a></li>-->
            </ul>

            <ul class="nav navbar-nav navbar-right ">
                <li class="dropdown ">
                    <a data-toggle="dropdown" class="dropdown-toggle" role="button" href="#"> <?php echo L("lang");?> <i class="caret"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="?l=zh-cn">中文</a></li>
                        <li><a href="?l=en-us">English</a></li>
                        <li><a href="?l=ja-jp">日本语</a></li>
                    </ul>
                </li>
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
        <!--</div>&lt;!&ndash; /.navbar-collapse &ndash;&gt;-->
    </div>
</div>
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


            
    <div id="content" class="col-sm-8">
        <!--<?php if(is_array($topics)): $i = 0; $__LIST__ = $topics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$out): $mod = ($i % 2 );++$i;?><div class="panel panel-primary">
                <div class="panel-heading"><?php echo ($out['name']); ?></div>
                <div class="panel-body">
                    <div calss="container">
                    <?php if(is_array($out['added'])): $i = 0; $__LIST__ = $out['added'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$in): $mod = ($i % 2 );++$i;?><div class="row">
                            &lt;!&ndash;<div class="col-lg-3"><a href="<?php echo U('Home/Soft/info?id='.$in['id']);?>"><?php echo ($in['name']); ?></a></div>&ndash;&gt;
                            <div class="col-sm-1"><a href="<?php echo ($in['url']); ?>" target="_blank"><?php echo ($i); ?></a></div>
                            <div class="col-lg-3"><a href="<?php echo ($in['url']); ?>" target="_blank"><i class="glyphicon glyphicon-floppy-save"></i>  <?php echo ($in['name']); ?></a></div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>-->
        <?php if(is_array($topics)): $i = 0; $__LIST__ = $topics;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$out): $mod = ($i % 2 );++$i;?><div class="panel panel-primary">
                <div class="panel-heading"><?php echo ($out['name']); ?></div>
                <div class="panel-body">
                    <table class="table table-hover table-bordered table-condensed">
                        <tr>
                            <th><?php echo L('xuhao');?></th>
                            <th><?php echo L('name');?></th>
                        </tr>
                        <?php if(is_array($out['added'])): $i = 0; $__LIST__ = $out['added'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$in): $mod = ($i % 2 );++$i;?><tr>
                                <td><a href="<?php echo ($in['url']); ?>" target="_blank"><?php echo ($i); ?></a></td>
                                <td><a href="<?php echo ($in['url']); ?>" target="_blank"><i class="glyphicon glyphicon-floppy-save"></i>  <?php echo ($in['name']); ?></a></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </table>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
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