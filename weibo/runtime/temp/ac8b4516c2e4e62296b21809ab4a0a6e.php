<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"E:\web\weibo\public/../application/index\view\login\register.html";i:1546274337;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html >
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title><?php echo \think\Config::get('WEBNAME'); ?>-注册</title>
	<link rel="stylesheet" href="http://www.weibo.tzf/static/index/css/regis.css" />

</head>
<body>
<div id='top-bg'></div>
<div id='register-form'>
	<div id='register-wrap'>
		<p>已经有微博帐号？<a href='<?php echo url("Login/index"); ?>'>立即登陆</a></p>
		<form class="form form-horizontal" id="form-article-add">
			<input type="hidden" name="__token__" value="<?php echo \think\Request::instance()->token(); ?>" />
			<fieldset>
				<legend>用户注册</legend>
				<p>
					<label for="account">注册账号：</label>
					<input type="text" name='account' class='input'/>
				</p>
				<p>
					<label for="password">密码：</label>
					<input type="password"  autocomplete="new-password" id="password" name='password' class='input'/>
				</p>
				<p>
					<label for="confirm_password">确认密码：</label>
					<input type="password" name='confirm_password'   name='confirm_password' id="confirm_password" class='input'/>
				</p>

				<p>
					<label for="captcha">验证码：</label>
					<input class='input'  type="text" placeholder="验证码" require name="captcha"
						   style="width:80px;" id="captcha">
					<img width="120"   style="border: 1px solid #ccc;border-radius: 4px;position: relative;top: 12px;" height="32" src="<?php echo captcha_src(); ?>" onclick='this.src="<?php echo captcha_src(); ?>?"'+ Math.random()>
				</p>

				<p>
					<input type="submit" value='马上注册' id='register'/>
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
                    minlength: 4,
                },
                password:{
                    required:true,
                    minlength: 5,
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                }

            },
            messages: {
            confirm_password: {
                equalTo: "密码不一致",

                },
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "<?php echo url('Login/register'); ?>" ,
                    success: function(data){
                        console.log(data);
                        if (data.code==1){
                            layer.msg( data.msg,{icon:6,time:1500});

                           setTimeout("window.location.href="+ "<?php echo url('Index/index'); ?>",1500);
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
