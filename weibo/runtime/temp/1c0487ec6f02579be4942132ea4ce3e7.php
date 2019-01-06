<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:69:"E:\web\weibo\public/../application/index\view\user_setting\index.html";i:1546698704;s:54:"E:\web\weibo\application\index\view\common\header.html";i:1546343082;s:51:"E:\web\weibo\application\index\view\common\nav.html";i:1546655516;s:52:"E:\web\weibo\application\index\view\common\left.html";i:1546323594;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />

	<title><?php echo \think\Config::get('WEBNAME'); ?>-修改个人资料</title>
	<link rel="stylesheet" href="http://www.weibo.tzf/static/index/theme/default/css/nav.css" />
	<link rel="stylesheet" href="http://www.weibo.tzf/static/index/theme/default/css/edit.css" />

          <script type="text/javascript" src="http://www.weibo.tzf/static/hui/lib/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript" src="http://www.weibo.tzf/static/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="http://www.weibo.tzf/static/hui/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="http://www.weibo.tzf/static/hui/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer /作为公共模版分离出去-->
	<script type="text/javascript" src='http://www.weibo.tzf/static/index/js/nav.js'></script>

	<script type='text/javascript' src='http://www.weibo.tzf/static/index/js/edit.js'></script>


</head>
<body >
<!--==========顶部固定导行条==========-->
  

<!--==========顶部固定导行条==========-->
    <div id='top_wrap'>
        <div id="top">
            <div class='top_wrap'>
                <div class="logo fleft"></div>
                <ul class='top_left fleft'>
                    <li class='cur_bg'><a href='<?php echo url("Index/index"); ?>'>首页</a></li>
                    <li><a href="<?php echo url('User/letter'); ?>">私信</a></li>
                    <li><a href="<?php echo url('User/comment'); ?>">评论</a></li>
                    <li><a href="<?php echo url('User/atme'); ?>">@我</a></li>
                </ul>
                <div id="search" class='fleft'>
                    <form action='<?php echo url("Search/sechUser"); ?>' method='get'>
                        <input type='text' name='keyword' id='sech_text' class='fleft' value='搜索微博、找人'/>
                        <input type='submit' value='' id='sech_sub' class='fleft'/>
                    </form>
                </div>
                <div class="user fleft">
                    <a href="<?php echo url('/' . session('uid')); ?>"> </a>
                </div>
                <ul class='top_right fleft'>
                    <li title='快速发微博' class='fast_send'><i class='icon icon-write'></i></li>
                    <li class='selector'><i class='icon icon-msg'></i>
                        <ul class='hidden'>
                            <li><a href="<?php echo url('User/comment'); ?>">查看评论</a></li>
                            <li><a href="<?php echo url('User/letter'); ?>">查看私信</a></li>
                            <li><a href="<?php echo url('User/keep'); ?>">查看收藏</a></li>
                            <li><a href="<?php echo url('User/atme'); ?>">查看@我</a></li>
                        </ul>
                    </li>
                    <li class='selector'><i class='icon icon-setup'></i>
                        <ul class='hidden'>
                            <li><a href="<?php echo url('UserSetting/index'); ?>">帐号设置</a></li>
                            <li><a href="" class='set_model'>模版设置</a></li>
                            <li><a href="<?php echo url('Index/loginOut'); ?>">退出登录</a></li>
                        </ul>
                    </li>
                <!--信息推送-->
                    <li id='news' class='hidden'>
                        <i class='icon icon-news'></i>
                        <ul>
                            <li class='news_comment hidden'>
                                <a href="<?php echo url('User/comment'); ?>"></a>
                            </li>
                            <li class='news_letter hidden'>
                                <a href="<?php echo url('User/letter'); ?>"></a>
                            </li>
                            <li class='news_atme hidden'>
                                <a href="<?php echo url('User/atme'); ?>"></a>
                            </li>
                        </ul>
                    </li>
                <!--信息推送-->
                </ul>
            </div>
        </div>
    </div>
<!--==========顶部固定导行条==========-->
<!--==========加关注弹出框==========-->

 
    <script type='text/javascript'>
        var addFollow = "<?php echo url('Common/addFollow'); ?>";
    </script>
    <div id='follow'>
        <div class="follow_head">
            <span class='follow_text fleft'>关注好友</span>
        </div>
        <div class='sel-group'>
            <span>好友分组：</span>
            <select name="gid">
                <option value="0">默认分组</option>
                <foreach name='group' item='v'>
                    <option value="{$ v.id}">{$ v.name}</option>
                </foreach>
            </select>
        </div>
        <div class='fl-btn-wrap'>
            <input type="hidden" name='follow'/>
            <span class='add-follow-sub'>关注</span>
            <span class='follow-cencle'>取消</span>
        </div>
    </div>
<!--==========加关注弹出框==========-->

<!--==========自定义模版==========-->
    <div id='model' class='hidden'>
        <div class="model_head">
            <span class="model_text">个性化设置</span>
            <span class="close fright"></span>
        </div>
        <ul>
            <li style='background:url(__PUBLIC__/Images/default.jpg) no-repeat;' theme='default'></li>
            <li style='background:url(__PUBLIC__/Images/style2.jpg) no-repeat;' theme='style2'></li>
            <li style='background:url(__PUBLIC__/Images/style3.jpg) no-repeat;' theme='style3'></li>
            <li style='background:url(__PUBLIC__/Images/style4.jpg) no-repeat;' theme='style4'></li>
        </ul>
        <div class='model_operat'>
            <span class='model_save'>保存</span>
            <span class='model_cancel'>取消</span>
        </div>
    </div>
<!--==========自定义模版==========-->

<!--==========内容主体==========-->
	<div style='height:60px;opcity:10'></div>0.
+-
    <div class="main">
    <!--=====左侧=====-->
       <!--=====左侧=====-->
    <div id="left" class='fleft'>
        <ul class='left_nav'>
            <li><a href="<?php echo url('Index/index'); ?>"><i class='icon icon-home'></i>&nbsp;&nbsp;首页</a></li>
            <li><a href="<?php echo url('user/atme'); ?>"><i class='icon icon-at'></i>&nbsp;&nbsp;提到我的</a></li>
            <li><a href="<?php echo url('user/comment'); ?>"><i class='icon icon-comment'></i>&nbsp;&nbsp;评论</a></li>
            <li><a href="<?php echo url('user/letter'); ?>"><i class='icon icon-letter'></i>&nbsp;&nbsp;私信</a></li>
            <li><a href="<?php echo url('user/keep'); ?>"><i class='icon icon-keep'></i>&nbsp;&nbsp;收藏</a></li>
        </ul>
        <div class="group">
            <fieldset><legend>分组</legend></fieldset>
            <ul>
                <php>

                </php>
                <li><a href="__APP__"><i class='icon icon-group'></i>&nbsp;&nbsp;全部</a></li>

                    <li>
                        <a href=""><i class='icon icon-group'></i>&nbsp;&nbsp;</a>
                    </li>

            </ul>
            <span id='create_group'>创建新分组</span>
        </div>
    </div>
    
    <!--==========创建分组==========-->
    <script type='text/javascript'>

    </script>
    <div id='add-group'>
        <div class="group_head">
            <span class='group_text fleft'>创建好友分组</span>
        </div>
        <div class='group-name'>
            <span>分组名称：</span>
            <input type="text" name='name' id='gp-name'>
        </div>
        <div class='gp-btn-wrap'>
            <span class='add-group-sub'>添加</span>
            <span class='group-cencle'>取消</span>
        </div>
    </div>
    <!--==========创建分组==========-->
    <!--=====右侧=====-->
    	<div id='right'>
    		<ul id='sel-edit'>
    			<li class='edit-cur'>基本信息</li>
    			<li>修改头像</li>
    			<li>修改密码</li>
    		</ul>
    		<div class='form'>
    			<form   id="editBasic">
    				<p>
    					<label for=""><span class='red'>*</span>昵称：</label>
    					<input type="text" name='nickname' value='<?php echo $user['nickname']; ?>' placeholder="为空就默认为账号" class='input' />
    				</p>
    				<p>
    					<label for="">真实名称：</label>
    					<input type="text" name='truename'  value='<?php echo $user['truename']; ?>' class='input'/>
    				</p>
    				<p>
    					<label for=""><span class='red'>*</span>性别：</label>
    					<input type="radio" name='sex' value='1' <?php if($user["sex"] == "男"): ?>checked='checked'<?php endif; ?>/>&nbsp;男&nbsp;&nbsp;&nbsp;&nbsp;
    					<input type="radio" name='sex' value='2' <?php if($user["sex"] == "女"): ?>checked='checked'<?php endif; ?>/>&nbsp;女
    				</p>
    				<div style="margin-left: 120px;">
    					<label for=""><span class='red'>*</span>所在地：&nbsp;&nbsp;&nbsp;&nbsp;</label>
						<select class="select" name="province" id="provinces">
							<option value="0">---请选择---</option>
							<?php if(is_array($citys['province']) || $citys['province'] instanceof \think\Collection || $citys['province'] instanceof \think\Paginator): $i = 0; $__LIST__ = $citys['province'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$province): $mod = ($i % 2 );++$i;?>
					        	<option value="<?php echo $province['province']; ?>" <?php if($user['province'] == $province['province']): ?> selected<?php endif; ?>><?php echo $province['province']; ?> </option>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
						<select class="select" name="city" id="city" >
							<option>---请选择---</option>
							<?php if(is_array($citys['city']) || $citys['city'] instanceof \think\Collection || $citys['city'] instanceof \think\Paginator): $i = 0; $__LIST__ = $citys['city'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$city): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $city; ?>"<?php if($user['city'] == $city): ?> selected<?php endif; ?> ><?php echo $city; ?> </option>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
						<select class="select" name="town" id="town">
							<option>---请选择---</option>
							<?php if(is_array($citys['town']) || $citys['town'] instanceof \think\Collection || $citys['town'] instanceof \think\Paginator): $i = 0; $__LIST__ = $citys['town'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$town): $mod = ($i % 2 );++$i;?>
							<option value="<?php echo $town; ?>" <?php if($user['town'] == $town): ?> selected<?php endif; ?> ><?php echo $town; ?> </option>
							<?php endforeach; endif; else: echo "" ;endif; ?>
						</select>

    				</div>
    				<p>
    					<label for="">星座：</label>
    					<select name="constellation" id="">
    						<option value="">请选择</option>
    						<option value="白羊座" <?php if($user['constellation'] ==  '白羊座'): ?> selected<?php endif; ?>>白羊座</option>
    						<option value="金牛座"<?php if($user['constellation'] ==  '金牛座'): ?> selected<?php endif; ?>>金牛座</option>
    						<option value="双子座"<?php if($user['constellation'] ==  '双子座'): ?> selected<?php endif; ?>>双子座</option>
    						<option value="巨蟹座"<?php if($user['constellation'] ==  '巨蟹座'): ?> selected<?php endif; ?>>巨蟹座</option>
    						<option value="狮子座"<?php if($user['constellation'] ==  '狮子座'): ?> selected<?php endif; ?>>狮子座</option>
    						<option value="处女座"<?php if($user['constellation'] ==  '处女座'): ?> selected<?php endif; ?>>处女座</option>
    						<option value="天秤座"<?php if($user['constellation'] ==  '天秤座'): ?> selected<?php endif; ?>>天秤座</option>
    						<option value="天蝎座"<?php if($user['constellation'] ==  '天蝎座'): ?> selected<?php endif; ?>>天蝎座</option>
    						<option value="射手座"<?php if($user['constellation'] ==  '射手座'): ?> selected<?php endif; ?>>射手座</option>
    						<option value="魔羯座"<?php if($user['constellation'] ==  '魔羯座'): ?> selected<?php endif; ?>>魔羯座</option>
    						<option value="水瓶座"<?php if($user['constellation'] ==  '水瓶座'): ?> selected<?php endif; ?>>水瓶座</option>
    						<option value="双鱼座"<?php if($user['constellation'] ==  '双鱼座'): ?> selected<?php endif; ?>>双鱼座</option>
    					</select>
    				</p>

    				<p>
    					<label for="" class='intro'>一句话介绍自己：</label>
    					<textarea name="intro"><?php echo $user['intro']; ?></textarea>
    				</p>
    				<p>
    					<input type="submit" value='保存修改' class='edit-sub'/>
    				</p>
    			</form>
    		</div>

    		<div class='form hidden'>
    			<form action="<?php echo url('editFace'); ?>" method='post'>
	    			<div class='edit-face'>
                     <label for="face" style="cursor: pointer;">
						 <?php if($user["face180"]): ?>
						 <img src=" http://www.weibo.tzf<?php echo $user['face180']; ?>" width='180' height='180' id='face_img' style="border-radius: 120px;"/>

						 <?php else: ?>
						 <img src=" http://www.weibo.tzf/static/index/images/noface.gif" width='180' height='180' id='face_img'/>
						 <?php endif; ?>

					 </label>
	    				<p style="cursor: pointer;">
							<label for="face"  style="display: inline-block;width:50px;color: #fff; position: relative;top: 25px; background-color:#89D623;border-radius:5px;padding: 6px 15px;cursor: pointer;">图片上传</label>
	    					<input type="file" name='face' id='face' style="opacity:0;color: orange;"/>

	    				</p>

	    			</div>
    			</form>
    		</div>
    		<div class='form hidden'>
    			<form  id='editPwd'>
    				<p class='account'>登录邮箱：<span>admin@admin.com</span></p>
    				<p>
    					<label for=""><span class='red'>*</span>旧密码：</label>
    					<input type="password" name='old' class='input'/>
    				</p>
    				<p>
    					<label for=""><span class='red'>*</span>新密码：</label>
    					<input type="password" name='new' class='input' id='new'/>
    				</p>
    				<p>
    					<label for=""><span class='red'>*</span>确认密码：</label>
    					<input type="password" name='newed' class='input'/>
    				</p>
    				<p>
    					<input type="submit" value='确认修改' class='edit-sub'/>
    				</p>
    			</form>
    		</div>
    	</div>
    </div>
<!--==========内容主体结束==========-->

<script type="text/javascript" src="http://www.weibo.tzf/static/hui/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="http://www.weibo.tzf/static/hui/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="http://www.weibo.tzf/static/hui/lib/jquery.validation/1.14.0/messages_zh.js"></script>

    <script type="text/javascript">

        $('#face').change(function(){
            var file = this.files[0];

            // console.log(file);
            // alert(file);

         /*   if ( $("#face_img").val() !== ''){
                layer.msg( "请先删除图片再重新上传！",{icon:5,time:2000});
                return;
            }*/

            var data = new FormData();
            data.append('upload_file', file);
            $.ajax({
                url:"<?php echo url('UserSetting/uploads'); ?>",
                type:'POST',  /*提交方式*/
                data: data,
                cache: false,
                contentType: false,        /*不可缺*/
                processData: false,         /*不可缺*/
                success:function(data){
                    console.log(data);
                    $("#face_img").attr('src','http://www.weibo.tzf'+data.src);

                    if (data.code==1){
                        layer.msg( data.msg,{icon:6,time:2000});
                    } else{
                        layer.msg( data.msg,{icon:5,time:2000});
                    }
                },
                error:function(){
                    layer.msg( "服务器内部发生错误",{icon:6,time:2000});
                }
            });
        });


        $(function () {
            $("#editBasic").validate({
                rules: {
                    nickname: {
                        required: true,
                        minlength: 4,
                        maxlength: 30
                    },
                    city: {
                        required: true,

                    },
                    province: {
                        required: true,

                    },
                    town: {
                        required: true,

                    },
                },
                onkeyup: false,
                focusCleanup: true,
                success: "valid",
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: 'post',
                        url: "<?php echo url('UserSetting/editBasic'); ?>",
                        success: function (data) {
                            console.log(data) ;
                            if (data.code == 1) {
                                layer.msg(data.msg, {icon: 6, time: 2000});
                            } else {
                                layer.msg(data.msg, {icon: 5, time: 2000});
                            }
                        },
                        error: function (XmlHttpRequest, textStatus, errorThrown) {
                            layer.msg('服务器内部错误，请稍后再试', {icon: 2, time: 1000});
                        }
                    });

                }
            });



            $("#editPwd").validate({
                rules: {
                    old: {
                        required: true,
                        minlength: 4,
                        maxlength: 30
                    },
                    new: {
                        required: true,
                        minlength: 4,
                        maxlength: 30
                    },
                    newed: {
                        required: true,
                        equalTo: "#new",
                        minlength: 4,
                        maxlength: 30
                    },
                },
                onkeyup: false,
                focusCleanup: true,
                success: "valid",
                submitHandler: function (form) {
                    $(form).ajaxSubmit({
                        type: 'post',
                        url: "<?php echo url('UserSetting/editPwd'); ?>",
                        success: function (data) {
                            console.log(data) ;
                            if (data.code == 1) {
                                layer.msg(data.msg, {icon: 6, time: 2000});
                            } else {
                                layer.msg(data.msg, {icon: 5, time: 2000});
                            }
                        },
                        error: function (XmlHttpRequest, textStatus, errorThrown) {
                            layer.msg('服务器内部错误，请稍后再试', {icon: 2, time: 1000});
                        }
                    });

                }
            });


            $("#provinces").change(function () {
				var province=$(this).val();
				if (province==0){
				    return false;
				}
				$.ajax({
                     type:'post',
					  dataType:'json',
					  url:"<?php echo url('UserSetting/getCity'); ?>",
					  data:{provinces:province,city:'city'},
				    	success:function (data) {
                            $("#city").html('');
					      console.log(data);
							var html='<option value="0">--请选择---</option>';
							for (var i=0;i<data.length;i++){

							    html +='<option value="'+data[i]+'">'+data[i]+'</option>';
							}
							$("#city").append(html);
                    }
				});
            });

            $("#city").change(function () {
                var city=$(this).val();
                var province=$("#provinces option:selected").text();
                if (city==0){
                    return false;
                }
                $.ajax({
                    type:'post',
                    dataType:'json',
                    url:"<?php echo url('UserSetting/getCity'); ?>",
                    data:{province:province,city:city},
                    success:function (data) {
                        $("#town").html('');
                        console.log(data);
                        var html='<option value="0">--请选择---</option>';
                        for (var i=0;i<data.length;i++){

                            html +='<option value="'+data[i]+'">'+data[i]+'</option>';
                        }
                        $("#town").append(html);
                    }
                });
            });
        })
    </script>

</body>
</html>