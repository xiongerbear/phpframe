<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->

<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->

<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- BEGIN HEAD -->

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

	<title>登陆管理-linux服务器简易管理面板</title>

	<meta content="width=device-width, initial-scale=1.0" name="viewport" />

	<meta content="" name="description" />

	<meta content="" name="author" />

	<!-- BEGIN GLOBAL MANDATORY STYLES -->

	<link href="<?php echo PUBLICPATH;?>/public/media/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo PUBLICPATH;?>/public/media/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo PUBLICPATH;?>/public/media/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo PUBLICPATH;?>/public/media/css/style-metro.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo PUBLICPATH;?>/public/media/css/style.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo PUBLICPATH;?>/public/media/css/style-responsive.css" rel="stylesheet" type="text/css"/>

	<link href="<?php echo PUBLICPATH;?>/public/media/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>

	<link href="<?php echo PUBLICPATH;?>/public/media/css/uniform.default.css" rel="stylesheet" type="text/css"/>

	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL STYLES -->

	<link href="<?php echo PUBLICPATH;?>/public/media/css/login-soft.css" rel="stylesheet" type="text/css"/>

	<!-- END PAGE LEVEL STYLES -->

	<link rel="shortcut icon" href="<?php echo PUBLICPATH;?>/public/media/image/favicon.ico" />

</head>

<!-- END HEAD -->

<!-- BEGIN BODY -->

<body class="login">

	<!-- BEGIN LOGO -->

	<div class="logo">

		<img src="<?php echo PUBLICPATH;?>/public/media/image/logo-big.png" alt="" /> 

	</div>

	<!-- END LOGO -->

	<!-- BEGIN LOGIN -->

	<div class="content">

		<!-- BEGIN LOGIN FORM -->

		<form class="form-vertical login-form" action="<?php echo U('Login/loginLand');?>" method="post">

			<h3 class="form-title">linux服务器简易管理面板</h3>

			<div class="alert alert-error hide">

				<button class="close" data-dismiss="alert"></button>

				<span>请输入你的账号密码</span>

			</div>

			<div class="control-group">

				<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->

				<label class="control-label visible-ie8 visible-ie9">用户名</label>

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-user"></i>

						<input class="m-wrap placeholder-no-fix" type="text" placeholder="用户名" name="username"/>

					</div>

				</div>

			</div>

			<div class="control-group">

				<label class="control-label visible-ie8 visible-ie9">密码</label>

				<div class="controls">

					<div class="input-icon left">

						<i class="icon-lock"></i>

						<input class="m-wrap placeholder-no-fix" type="password" placeholder="密码" name="password"/>

					</div>

				</div>

			</div>

			<div class="form-actions">

				<!-- <label class="checkbox">

				<input type="checkbox" name="remember" value="1"/>记住密码？
				</label> -->

				<button type="submit" class="btn blue pull-right">

				登陆<i class="m-icon-swapright m-icon-white"></i>

				</button>            

			</div>

			<div class="forget-password">

				<h4>忘记密码 ?</h4>

				<p>

					请 <a href="javascript:;" class="" id="forget-password">点击</a>这里

					找回密码！

				</p>

			</div>

			<div class="create-account">

				<p>

					如果你没有用户 ?&nbsp; 

					<a href="javascript:;" id="register-btn" class="">请注册</a>

				</p>

			</div>

		</form>

		<!-- END LOGIN FORM -->        


	</div>

	<!-- END LOGIN -->

	<!-- BEGIN COPYRIGHT -->

	<div class="copyright">

		2017 &copy; linux服务器简易管理面板

	</div>

	<!-- END COPYRIGHT -->

	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

	<!-- BEGIN CORE PLUGINS -->

	<script src="<?php echo PUBLICPATH;?>/public/media/js/jquery-1.10.1.min.js" type="text/javascript"></script>

	<script src="<?php echo PUBLICPATH;?>/public/media/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>

	<!-- IMPORTANT! Load jquery-ui-1.10.1.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->

	<script src="<?php echo PUBLICPATH;?>/public/media/js/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>      

	<script src="<?php echo PUBLICPATH;?>/public/media/js/bootstrap.min.js" type="text/javascript"></script>

	<!--[if lt IE 9]>

	<script src="<?php echo PUBLICPATH;?>/public/media/js/excanvas.min.js"></script>

	<script src="<?php echo PUBLICPATH;?>/public/media/js/respond.min.js"></script>  

	<![endif]-->   

	<script src="<?php echo PUBLICPATH;?>/public/media/js/jquery.slimscroll.min.js" type="text/javascript"></script>

	<script src="<?php echo PUBLICPATH;?>/public/media/js/jquery.blockui.min.js" type="text/javascript"></script>  

	<script src="<?php echo PUBLICPATH;?>/public/media/js/jquery.cookie.min.js" type="text/javascript"></script>

	<script src="<?php echo PUBLICPATH;?>/public/media/js/jquery.uniform.min.js" type="text/javascript" ></script>

	<!-- END CORE PLUGINS -->

	<!-- BEGIN PAGE LEVEL PLUGINS -->

	<script src="<?php echo PUBLICPATH;?>/public/media/js/jquery.validate.min.js" type="text/javascript"></script>

	<script src="<?php echo PUBLICPATH;?>/public/media/js/jquery.backstretch.min.js" type="text/javascript"></script>

	<!-- END PAGE LEVEL PLUGINS -->

	<!-- BEGIN PAGE LEVEL SCRIPTS -->

	<!-- <script src="<?php echo PUBLICPATH;?>/public/media/js/app.js" type="text/javascript"></script> -->

	<!-- <script src="<?php echo PUBLICPATH;?>/public/media/js/login-soft.js" type="text/javascript"></script> -->      

	<!-- END PAGE LEVEL SCRIPTS --> 

	<script>

		jQuery(document).ready(function() {     

		  App.init();

		  Login.init();

		});

	</script>

	<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->

</html>