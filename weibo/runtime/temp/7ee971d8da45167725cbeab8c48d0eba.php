<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"E:\web\miaosha\public/../application/admin\view\auth_group\edit.html";i:1544889729;s:55:"E:\web\miaosha\application\admin\view\public\_meta.html";i:1543753456;s:57:"E:\web\miaosha\application\admin\view\public\_footer.html";i:1542119684;}*/ ?>
﻿<!DOCTYPE HTML>
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
<title>添加用户组</title>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
    <span class="c-gray en">&gt;</span>
    角色管理
    <span class="c-gray en">&gt;</span>
    编辑用户组
    <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
</nav>
<article class="page-container">
    <form action="" method="post" class="form form-horizontal" id="form-admin-role-add">
        <input type="hidden" name="id" value="<?php echo $oneData['id']; ?>">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>角色名称：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="<?php echo $oneData['title']; ?>" placeholder="" id="title" name="title">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">描述：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <textarea  name="remark" cols="" rows="" class="textarea"  placeholder="说点什么..."   dragonfly="true" nullmsg="备注不能为空！"  ><?php echo $oneData['remark']; ?></textarea>
                <p class="textarea-numberbar"><?php if($oneData['remark'] == ''): ?><em class="textarea-length">0</em><?php endif; ?>/200</p>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">

                状态：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="switch" data-on="success" data-off="warning">
                    <input type="checkbox" <?php if($oneData['status'] == 1): ?>checked <?php endif; ?> value="1" name="status"/>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">网站角色：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <dl class="permission-list">
                    <label style="margin-left: 5px; " class="c-orange">
                       <input type="checkbox" id="checkbox-6" name="checkbox2" onchange="checkAll(this)">
                        全选
                   </label>
                </dl>
                <?php if(is_array($authRuleRes) || $authRuleRes instanceof \think\Collection || $authRuleRes instanceof \think\Paginator): $i = 0; $__LIST__ = $authRuleRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$one): $mod = ($i % 2 );++$i;?>
                <dl class="permission-list">
                    <dt>
                        <label>
                            <input type="checkbox" value="<?php echo $one['id']; ?>" <?php if(is_array(explodes($oneData['rules'])) || explodes($oneData['rules']) instanceof \think\Collection || explodes($oneData['rules']) instanceof \think\Paginator): $i = 0; $__LIST__ = explodes($oneData['rules']);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($v == $one['id']): ?>checked<?php endif; endforeach; endif; else: echo "" ;endif; ?>  name="rules[]" class="isChecked" >
                            <?php echo $one['title']; ?></label>
                    </dt>
                    <dd>
                        <?php if(is_array($one['child']) || $one['child'] instanceof \think\Collection || $one['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $one['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$two): $mod = ($i % 2 );++$i;?>
                        <dl class="cl permission-list2">
                            <dt style="margin-right: 10px;">
                                <label class="" >
                                    <input type="checkbox"  <?php if(is_array(explodes($oneData['rules'])) || explodes($oneData['rules']) instanceof \think\Collection || explodes($oneData['rules']) instanceof \think\Paginator): $i = 0; $__LIST__ = explodes($oneData['rules']);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($v == $two['id']): ?>checked<?php endif; endforeach; endif; else: echo "" ;endif; ?>  class="isChecked"  name="rules[]" value="<?php echo $two['id']; ?>" id="user-Character-0-<?php echo $one['id']; ?>">
                                    <?php echo $two['title']; ?></label>
                            </dt>
                            <dd>
                                <?php if(is_array($two['child']) || $two['child'] instanceof \think\Collection || $two['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $two['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$three): $mod = ($i % 2 );++$i;?>
                                <label class="">
                                    <input type="checkbox" <?php if(is_array(explodes($oneData['rules'])) || explodes($oneData['rules']) instanceof \think\Collection || explodes($oneData['rules']) instanceof \think\Paginator): $i = 0; $__LIST__ = explodes($oneData['rules']);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($v == $three['id']): ?>checked<?php endif; endforeach; endif; else: echo "" ;endif; ?> value="<?php echo $three['id']; ?>" name="rules[]" id="user-Character-0-0-<?php echo $three['id']; ?>" class="isChecked">
                                    <?php echo $three['title']; ?></label>
                                <?php endforeach; endif; else: echo "" ;endif; ?>


                            </dd>
                        </dl>
                        <?php endforeach; endif; else: echo "" ;endif; ?>

                    </dd>
                </dl>
                <?php endforeach; endif; else: echo "" ;endif; ?>

            </div>
        </div>
        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
                <button type="submit" class="btn btn-success radius"  ><i class="icon-ok"></i> 确定</button>
            </div>
        </div>
    </form>
</article>

<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/jquery.validation/1.14.0/messages_zh.js"></script>

<script type="text/javascript">
    $(".textarea").Huitextarealength({
        minlength:0,
        maxlength:200
    });
    function  checkAll(obj){
      if (obj.checked){
          $(".isChecked").prop("checked",obj.checked);
      } else{
          $(".isChecked").prop("checked",obj.checked);
      }
    }
    $(function(){

        $(".permission-list dt input:checkbox").click(function(){
            $(this).closest("dl").find("dd input:checkbox").prop("checked",$(this).prop("checked"));
        });
        $(".permission-list2 dd input:checkbox").click(function(){
            var l =$(this).parent().parent().find("input:checked").length;
            var l2=$(this).parents(".permission-list").find(".permission-list2 dd").find("input:checked").length;
            if($(this).prop("checked")){
                $(this).closest("dl").find("dt input:checkbox").prop("checked",true);
                $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",true);
            }
            else{
                if(l==0){
                    $(this).closest("dl").find("dt input:checkbox").prop("checked",false);
                }
                if(l2==0){
                    $(this).parents(".permission-list").find("dt").first().find("input:checkbox").prop("checked",false);
                }
            }
        });

        $("#form-admin-role-add").validate({
            rules:{
                title:{
                    required:true,
                },
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "<?php echo url('AuthGroup/edit'); ?>" ,
                    success: function(data){
                        console.log(data);
                        if (data.code==1){
                            layer.msg( data.msg,{icon:6,time:2000});

                        } else {
                            layer.msg( data.msg,{icon:5,time:2000});
                        }
                    },
                    error: function(XmlHttpRequest, textStatus, errorThrown){
                        layer.msg('error!',{icon:1,time:1000});
                    }
                });

            }

        });
    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>