<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:62:"E:\web\weibo\public/../application/index\view\login\index.html";i:1546307272;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title><?php echo \think\Config::get('WEBNAME'); ?>-登录</title>
	<link rel="stylesheet" href="http://www.weibo.tzf/static/index/css/login.css" />

</head>
<body>
	<div id='top-bg'></div>
	<div id='login-form'>
		<div id='login-wrap'>
			<p>还没有微博帐号？<a href='<?php echo url("Login/register"); ?>'>立即注册</a></p>
			<form class="form form-horizontal" id="form-article-add">
				<input type="hidden" name="__token__" value="<?php echo \think\Request::instance()->token(); ?>" />
				<fieldset>
					<legend>用户登录</legend>
					<p>
						<label for="account">登录账号：</label>
						<input type="text" name='account' class='input'/>
					</p>
					<p>
						<label for="password">密码：</label>
						<input type="password"  autocomplete="new-password" name='password' class='input'/>
					</p>
					<p>
						<label for="captcha">验证码：</label>
						<input class='input'  type="text" placeholder="验证码" name="captcha"
							   style="width:80px;" id="captcha">
						<img width="120"   style="border: 1px solid #ccc;border-radius: 4px;position: relative;top: 12px;" height="32" src="<?php echo captcha_src(); ?>" onclick='this.src="<?php echo captcha_src(); ?>?"'+ Math.random()>
					</p>
					<p>
						<input type="checkbox" name='auto' checked='1' class='auto' id='auto'/>
						<label for="auto">下次自动登录</label>
					</p>
					<p>
						<input type="submit" value='马上登录' id='login'/>
					</p>
				</fieldset>
			</form>
		</div>
	</div>

	<script type="text/javascript" src="http://www.weibo.tzf/static/hui/lib/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://www.weibo.tzf/static/hui/lib/layer/2.4/layer.js"></script>
	<script type="text/javascript" src="http://www.weibo.tzf/static/hui/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
	<script type="text/javascript" src="http://www.weibo.tzf/static/hui/lib/jquery.validation/1.14.0/validate-methods.js"></script>
	<script type="text/javascript" src="http://www.weibo.tzf/static/hui/static/h-ui/js/H-ui.min.js"></script>
	<script type="text/javascript" src="http://www.weibo.tzf/static/hui/static/h-ui.admin/js/H-ui.admin.js"></script>
	<script type="text/javascript" src="http://www.weibo.tzf/static/hui/lib/jquery.validation/1.14.0/messages_zh.js"></script>
  <script type="text/javascript">
      $(function () {
      //表单验证
      $("#form-article-add").validate({
          rules:{
              account:{
                  required:true,
              },
              password:{
                  required:true,
              },

          },
          onkeyup:false,
          focusCleanup:true,
          success:"valid",
          submitHandler:function(form){
              $(form).ajaxSubmit({
                  type: 'post',
                  url: "<?php echo url('Login/login'); ?>" ,
                  success: function(data){
                      console.log(data);
                      if (data.code==1){
                          layer.msg( data.msg,{icon:6,time:2000});
                          window.location.href ="<?php echo url('Index/index'); ?>";
                      } else {
                          layer.msg( data.msg,{icon:5,time:2000});
                      }
                  },
                  error: function(XmlHttpRequest, textStatus, errorThrown){
                      layer.msg('服务器发生未知错误',{icon:2,time:1000});
                  }
              });
          }
      });
      });

  </script>
</body>
</html>
