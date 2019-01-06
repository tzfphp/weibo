<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:64:"E:\web\miaosha\public/../application/admin\view\login\index.html";i:1545823272;s:55:"E:\web\miaosha\application\admin\view\public\_meta.html";i:1543753456;s:57:"E:\web\miaosha\application\admin\view\public\_footer.html";i:1542119684;}*/ ?>
﻿ <!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="Bookmark" href="/favicon.ico" >
<link rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/html5shiv.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="http://www.miaosha.tzf/static/hui/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="http://www.miaosha.tzf/static/hui/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="http://www.miaosha.tzf/static/hui/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="http://www.miaosha.tzf/static/hui/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="http://www.miaosha.tzf/static/hui/static/h-ui.admin/css/style.css" />
    <link rel="stylesheet" type="text/css"  href=" http://www.miaosha.tzf/static/hui/lib/webuploader/0.1.5/webuploader.css"/>
<!--[if IE 6]>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
 <link href="http://www.miaosha.tzf/static/hui/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
 <link href="http://www.miaosha.tzf/static/hui/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
 <link href="http://www.miaosha.tzf/static/hui/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
 <link href="http://www.miaosha.tzf/static/hui/lib/Hui-iconfont/1.0.8/iconfont.css" rel="stylesheet" type="text/css" />

 <![endif]-->
  <title>秒杀后台登录 </title>
  <meta name="keywords" content=" 秒杀后台系统">
  <meta name="description" content="  秒杀后台系统。">
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value=""/>
<div class="header">
</div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal"   id="form-login-submit">
      <input type="hidden" name="__token__" value="<?php echo \think\Request::instance()->token(); ?>" />
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="username" name="username" type="text" placeholder="请输入用户名" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="password" name="password" type="password" placeholder="请输入密码" class="input-text size-L">
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input class="input-text size-L" type="text" placeholder="验证码" name="code"
                 style="width:180px;" id="captcha">

          <img width="170" height="41" src="<?php echo captcha_src(); ?>" onclick='this.src="<?php echo captcha_src(); ?>?"'+ Math.random()></div>
      </div>
    <!--  <div class="row cl">
      <div class="formControls col-xs-8 col-xs-offset-3">
        <label for="online">
          <input type="checkbox" name="online" id="online" value="">
          使我保持登录状态</label>
      </div>
    </div>!-->
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input name="" type="submit" class="btn btn-success radius size-L"
                 value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
          <input name="" type="reset" class="btn btn-default radius size-L"
                 value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer">Copyright ©2015-2017 H-ui.admin v3.1 All Rights Reserved.</div>


 <script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/jquery.validation/1.14.0/jquery.validate.js"></script>

<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript">

    $("#captch").keyup(function () {
       var code =$('#captcha').val();
        if (code.length<5){
            return false;
        }
        $.ajax({
            data:{code:code},
            type: 'GET',
            url: "<?php echo url('Login/login'); ?> ",
            success: function (data) {
                if(data.code ==0){
                    layer.msg('验证码输入不正确!', {icon: 5, time: 2000});

                }else{
                    layer.msg('验证码输入正确!', {icon: 5, time: 1000});
                }

            },

        });
    });


    $(function () {
        $("#form-login-submit").validate({

            rules: {
                username: {
                    required: true,
                    minlength: 4,
                    maxlength: 36
                },
                password: {
                    required: true,
                    minlength: 4,
                    maxlength: 40
                },
                code: {
                    required: true,
                    minlength: 4,
                    maxlength: 4,
                }
            },
             message: {
                  password: {
                      required: '密码不能为空 ！'
                  },
                  username:{
                      required:'用户名不能为空！'
                  },
                  code:{
                      required:'验证码不能为空 ！',
                      minlength:'验证码不正确',
                      maxlength:'验证码不正确',
                  }
              },

            onkeyup: false,
            focusCleanup: true,
            success: "valid",
            submitHandler: function (form) {

                $(form).ajaxSubmit({
                    type: 'post',
                    url: "<?php echo url('Login/login'); ?>",
                    success: function (data) {
                        console.log(data);
                        if (data.code ==1){
                            layer.msg(data.msg, {icon: 6, time: 2000});
                            setTimeout('window.location.href="Index/index"',3000);
                        } else{
                            layer.msg(data.msg, {icon: 5, time: 2000});
                        }
                    },
                    error:function(data){
                        layer.msg("服务器发生内部错误，请稍后再试", {icon: 2, time: 2000});
                    }

                });

                var index = parent.layer.getFrameIndex(window.name);
                parent.$('.btn-refresh').click();
                parent.layer.close(index);
            }
        });
    });

</script>
</body>
</html>