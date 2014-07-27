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
    <link href="/homecolor/Public/css/index/index.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row col-md-6 col-sm-offset-3 login">
				
				<form class="form-horizontal" action="<?php echo U('Login/checkLogin','','');?>" role="form" method="post">
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
							<button type="submit" class="btn btn-primary btn-login">登陆</button>
						</div>
						
					</div>

				</form>	

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