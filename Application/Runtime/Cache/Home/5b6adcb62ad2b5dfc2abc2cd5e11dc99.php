<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="description">
    <meta name="author" content="wcf">

    <!-- <link rel="icon" href="../../favicon.ico">-->

    

    <!-- Bootstrap core CSS -->
    <!--<link href="../../../../Public/css/bootstrap.min.css" rel="stylesheet">-->
    <link href="/homecolor/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--<link href="../../../../Public/css/starter-template.css" rel="stylesheet">-->
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
    <div id="wrap">
        <div class="container">
            <div class="row col-md-6 col-sm-offset-3 login">
                    <form class="form-horizontal" action="<?php echo U('Admin/Login/checkLogin');?>" role="form" method="post">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">用户名:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="username" name="username" placeholder="用户名" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">密 &nbsp; &nbsp;码:</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="password" name="password" placeholder="密码" />
                            </div>
                        </div>
                        <!-- 验证码部分 -->
                        <!-- <div class="form-group">
                            <label for="code" class="col-sm-2 control-label">验证码:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="code" name="code" placeholder="验证码" />

                            </div>
                        </div> -->

                        <!-- <div class="form-group">
                            <label for="code" class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <img src="<?php echo U('Login/verify','','');?>" onclick="javascript:this.src=this.src+'?time='+Math.random()" />
                            </div>
                        </div> -->

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-7">
                                <button type="submit" class="btn btn-primary btn-login">登录</button>
                            </div>

                        </div>
                    </form>
            </div>
        </div>
    </div>

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