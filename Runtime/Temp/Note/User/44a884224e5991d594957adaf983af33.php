<?php
//000000000120s:1847:"<!DOCTYPE HTML>
<html>
<head>
<link rel="shortcut icon" href="favicon.ico" />
<title>个人记事本登录</title>
<!-- Custom Theme files -->
<link href="/Public/css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Login form web template" />
<!--Google Fonts-->
<link href='http://fonts.useso.com/css?family=Roboto:500,900italic,900,400italic,100,700italic,300,700,500italic,100italic,300italic,400' rel='stylesheet' type='text/css'>
<link href='http://fonts.useso.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<!--Google Fonts-->
</head>
<body>
<div class="login">
	<!-- <h2>Acced Form</h2> -->
	<div class="login-top">
		<h1>登录</h1>
		<form id='NoteSubmit' action="http://test.com/Note/User/UserLoginDo" method="post">
			<input type="text" name='username' placeholder="用户帐号" >
			<input type="password" name='userpwd' placeholder="密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码">
	    </form>
	    <div class="forgot">
	    	<!-- <input type="button" value="注册" onclick="SubmitForm()"> -->
	    	<a href="#">忘记密码</a>
	    	<input type="submit" value="登录" onclick="SubmitForm()">
	    </div>
	</div>
	<!-- <div class="login-bottom">
		<h3>新用户 &nbsp;<a href="#">注册</a>&nbsp 这里</h3>
	</div> -->
</div>	
<div class="copyright">
	<p><a href="http://www.miitbeian.gov.cn/" target="_blank">京ICP备15032905号</a></p>
</div>
</body>
</html>

<script type="text/javascript">

function SubmitForm(){
	document.getElementById('NoteSubmit').submit();
}

</script>";
?>