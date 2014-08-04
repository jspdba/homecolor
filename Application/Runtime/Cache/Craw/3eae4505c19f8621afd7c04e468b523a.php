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
    <link href="../../../../Public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/homecolor/Public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <!--<link href="../../../../Public/css/starter-template.css" rel="stylesheet">-->

</head>

<body>
<div class=" container">
    <form class="form-horizontal" action="<?php echo U('Craw/Gjjx/loginForm');?>" method="post" id="theform" role="form">
        <div class="form-group">
            <label for="username" >用户名</label>
            <input name="username" id="username" type="text"  class="form-control" value="jspdba">
        </div>
        <div class="form-group">
            <label for="password">密码</label>
            <input name="password" id="password" type="password" class="form-control" value="wuchaofei">
        </div>
        <div class="form-group">
            <label for="captcha">验证码</label>
            <input name="captcha" id="captcha" maxlength="6" type="text" class="field2" node-type="captcha_input">
            <img src="/homecolor/Public/verify0.jpg">
        </div>
        <input name="" type="checkbox" value="" class="hidden">
        <input name="button" type="submit" value="登 录" class="btn">
    </form>
<img class="img-responsive" src="/homecolor/Public/verify0.jpg">

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