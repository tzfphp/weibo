<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:64:"E:\web\miaosha\public/../application/admin\view\active\edit.html";i:1545933027;s:55:"E:\web\miaosha\application\admin\view\public\_meta.html";i:1543753456;s:57:"E:\web\miaosha\application\admin\view\public\_footer.html";i:1542119684;}*/ ?>
<!DOCTYPE HTML>
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
<![endif]-->
<!--/meta 作为公共模版分离出去-->

<title>新增活动</title>
<meta name="keywords" content=" ">
<meta name="description" content=" ">
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>秒杀活动 <span
		class="c-gray en">&gt;</span>增加活动 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"
											 href="javascript:location.replace(location.href);" title="刷新"><i
		class="Hui-iconfont">&#xe68f;</i></a></nav>
<article class="page-container">
	<form class="form form-horizontal" id="form-article-add">
		<input type="hidden" name="id" value="<?php echo $activeRes['id']; ?>">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>活动名称：</label>
			<div class="formControls col-xs-8 col-sm-7">
				<input type="text" class="input-text"   placeholder="" id="title" name="title" value="<?php echo $activeRes['title']; ?>">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">活动描述：</label>
			<div class="formControls col-xs-8 col-sm-7">
				<textarea name="description" cols="" rows="" class="textarea"  placeholder="活动描述" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！"  > <?php echo $activeRes['description']; ?> </textarea>
				<p class="textarea-numberbar"><?php if($activeRes['description'] ==  ''): ?>  <em class="textarea-length">0</em><?php endif; ?>/200</p>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">活动开始日期：</label>
			<div class="formControls col-xs-8 col-sm-4">
				<input type="text" onfocus="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss',maxDate:'#F{ $dp.$D(\'time_end\')||\'%y-%M-%d\'}' })" value="<?php echo $activeRes['time_start']; ?>" id="time_start" name="time_start" class="input-text Wdate">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"> 活动结束日期：</label>
			<div class="formControls col-xs-8 col-sm-4">
				<input type="text" onfocus="WdatePicker({ dateFmt:'yyyy-MM-dd HH:mm:ss',minDate:'#F{ $dp.$D(\'time_start\')}' })" id="time_end" value="<?php echo $activeRes['time_end']; ?>" name="time_end" class="input-text Wdate">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">

				状态：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="switch" data-on="success" data-off="warning">
					<input type="checkbox" <?php if($activeRes['status'] == 1): ?>checked <?php endif; ?>  value="1" name="status"/>
				</div>
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<button   class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 提交</button>
			</div>
		</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/webuploader/0.1.5/webuploader.min.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
    $(function(){
        $(".textarea").Huitextarealength({
            minlength:0,
            maxlength:200
        });
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        //表单验证
        $("#form-article-add").validate({
            rules:{
                title:{
                    required:true,
                },

                time_start:{
                    required:true,
                },
                time_end:{
                    required:true,
                },
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "<?php echo url('Active/edit'); ?>" ,
                    success: function(data){
                        console.log(data);
                        if (data.code==1){
                            layer.msg( data.msg,{icon:1,time:2000});
                        } else {
                            layer.msg( data.msg,{icon:1,time:2000});
                        }
                    },
                    error: function(XmlHttpRequest, textStatus, errorThrown){
                        layer.msg('服务器发生未知错误',{icon:1,time:1000});
                    }
                });
            }
        });


    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>