<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:63:"E:\web\miaosha\public/../application/admin\view\goods\edit.html";i:1545996098;s:55:"E:\web\miaosha\application\admin\view\public\_meta.html";i:1543753456;s:57:"E:\web\miaosha\application\admin\view\public\_footer.html";i:1542119684;}*/ ?>
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

<title>新增商品</title>
<meta name="keywords" content=" ">
<meta name="description" content=" ">
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span>秒杀商品 <span
		class="c-gray en">&gt;</span>编辑商品 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px"
											 href="javascript:location.replace(location.href);" title="刷新"><i
		class="Hui-iconfont">&#xe68f;</i></a></nav>
<article class="page-container">
	<form class="form form-horizontal" id="form-article-add">
  <input id="id" name="id" value="<?php echo $goodsRes['id']; ?>" type="hidden">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>所属活动：</label>
			<div class="formControls col-xs-8 col-sm-4"> <span class="select-box">
				<select name="active_id" class="select">
					<option value=" ">----选择秒杀活动----</option>
					<?php if(is_array($activeRes) || $activeRes instanceof \think\Collection || $activeRes instanceof \think\Paginator): $i = 0; $__LIST__ = $activeRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<option value="<?php echo $vo['id']; ?>" <?php if($goodsRes['active_id'] == $vo['id']): ?> selected<?php endif; ?>>&nbsp;&nbsp;&nbsp;<?php echo $vo['title']; ?></option>
					 <?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品名称：</label>
			<div class="formControls col-xs-8 col-sm-7">
				<input type="text" class="input-text" value="<?php echo $goodsRes['name']; ?>" placeholder="" id="name" name="name">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">商品描述：</label>
			<div class="formControls col-xs-8 col-sm-7">
				<textarea name="description" cols="" rows="" class="textarea"  placeholder="商品描述" datatype="*10-100" dragonfly="true" nullmsg="备注不能为空！"  ><?php echo $goodsRes['description']; ?></textarea>
				<p class="textarea-numberbar"><?php if($goodsRes['description'] == ''): ?><em class="textarea-length">0</em><?php endif; ?>/200</p>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">商品缩略图：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-thum-container">
					<?php if($goodsRes['thumb'] != ''): ?>
					<input type="button"   data-class="Goods"  id="goods_thumb" style=" position: absolute; top: 0px; left:15px;"  class="btn btn-success " value="x">
					<img  id="edit_img"  src= "<?php echo $goodsRes['src']; ?>"  width="150px">
					<?php else: ?>
					<input type="button"   data-class="Goods"  id="goods_thumb" style=" display:none; position: absolute; top: 0px; left:15px;"  class="btn btn-success " value="x">
					<?php endif; ?>
					<div id="fileList" class="uploader-list"></div>
					<div id="filePicker">选择图片</div>

					<input type="hidden" name="thumb" id="thumb" value="<?php echo $goodsRes['thumb']; ?>">

				</div>
			</div>

		</div>


		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品原价：</label>
			<label style="color: orange;" ><span class="c-red">*</span>￥(元)</label>
			<div class="formControls col-xs-8 col-sm-3">
				<input type="text" class="input-text"  value="<?php echo $goodsRes['price_normal']; ?>" id="price_normal" name="price_normal">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品秒杀价：</label>
			<label style="color: orange;" ><span class="c-red">*</span>￥(元)</label>
			<div class="formControls col-xs-8 col-sm-3">
				<input type="text" class="input-text" value="<?php echo $goodsRes['price_discount']; ?>" placeholder="" id="price_discount" name="price_discount">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>商品总数量：</label>
			<label style="color: orange;" ><span class="c-red">*</span>正整数</label>
			<div class="formControls col-xs-8 col-sm-3">
				<input type="text" class="input-text" value="<?php echo $goodsRes['num_total']; ?>" placeholder="" id="num_total" name="num_total">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>单个用户限购数量：</label>
			<label style="color: orange;" ><span class="c-red">*</span>正整数</label>
			<div class="formControls col-xs-8 col-sm-3">
				<input type="text" class="input-text" value="<?php echo $goodsRes['num_user']; ?>" placeholder="" id="num_user" name="num_user">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>剩余库存：</label>
			<label style="color: orange;" ><span class="c-red">*</span>正整数</label>
			<div class="formControls col-xs-8 col-sm-3">
				<input type="text" class="input-text" value="<?php echo $goodsRes['num_left']; ?>" placeholder="" id="num_left" name="num_left">
			</div>
		</div>


		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">

				状态：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="switch" data-on="success" data-off="warning">
					<input type="checkbox" <?php if($goodsRes['status'] == 1): ?>checked <?php endif; ?> value="<?php echo $goodsRes['status']; ?>" name="status"/>
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

<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/webuploader/0.1.5/webuploader.min.js"></script>
<script type="text/javascript">
    $('#goods_thumb').click(function () {
        var src =  $("#thumb").val();
        var id =  $("#id").val();
        $(this).hide();
        $.ajax({
            url:"<?php echo url('Goods/delEditImg'); ?>", /*去过那个php文件*/
            type:'POST',  /*提交方式*/
            data:{src:src,id:id},
            success:function(data){
                console.log(data);
                if (data.code==1){

                    location.replace(location.href);
                } else{
                    layer.msg( data.msg,{icon:5,time:2000});
                }
            },
            error:function(){
                layer.msg( "系统发生未知错误",{icon:2,time:2000});
            }
        });

    });

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
                active_id:{
                    required:true,
                },
                thumb:{
                    required:true,
                },
                num_user:{
                    required:true,
                },
                num_total:{
                    required:true,
                },
                price_normal:{
                    required:true,
                },
                price_discount:{
                    required:true,
                },
            },
            onkeyup:false,
            focusCleanup:true,
            success:"valid",
            submitHandler:function(form){
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "<?php echo url('Goods/edit'); ?>" ,
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

        $list = $("#fileList"),
            $btn = $("#btn-star"),
            state = "pending",
            uploader;

        var uploader = WebUploader.create({
            auto: true,
            swf: 'http://www.miaosha.tzf/static/hui/lib/webuploader/0.1.5/Uploader.swf',

            // 文件接收服务端。
            server: "<?php echo url('Goods/uploads'); ?>",
            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#filePicker',

            // 不压缩image, 默认如果是jpeg，文件上传前会压缩一把再上传！
            resize: false,
            // 只允许选择图片文件。
            accept: {
                title: 'Images',
                extensions: 'gif,jpg,jpeg,bmp,png',
                mimeTypes: 'image/*'
            },
            fileNumLimit:10,
            // 禁掉全局的拖拽功能。这样不会出现图片拖进页面的时候，把图片打开。
            disableGlobalDnd: true,
            fileSizeLimit: 200 * 1024 * 1024,    // 200 M
            fileSingleSizeLimit: 50 * 1024 * 1024    // 50 M

        });

        /*
           * 当某个文件上传到服务端响应后，会派送此事件来询问服务端响应是否有效。
           * 如果此事件handler返回值为false, 则此文件将派送server类型的uploadError事件。
           * */
        uploader.on('uploadAccept',function(object,ret){
            $("#goods_thumb").show();
            console.log(ret);
            if(ret.code==1){
                var  src = ret.src;
                $("#thumb").val(src);
            }
        });

        uploader.on('beforeFileQueued',function(object,ret){


            var src  =  $("#thumb").val( );
            if (src !=""){
                layer.msg("请先删除再上传", {icon:2, time: 2000});
                return false;
            }

        });
        uploader.on('uploadError',function(object,ret){
            layer.msg("服务器内部错误，请稍后再试",{icon:2,time:2000});
        } );
        uploader.on( 'fileQueued', function( file ) {
            var $li = $(
                '<div id="' + file.id + '" class="item">' +
                '<div class="pic-box "><img></div>'+
                '<div class="info">' + file.name + '</div>' +
                '<p class="state">等待上传...</p>'+
                '</div>'
                ),
                $img = $li.find('img');
            $list.append( $li );

            // 创建缩略图
            // 如果为非图片文件，可以不用调用此方法。
            // thumbnailWidth x thumbnailHeight 为 100 x 100
            uploader.makeThumb( file, function( error, src ) {
                if ( error ) {
                    $img.replaceWith('<span>不能预览</span>');
                    return;
                }

                $img.attr( 'src', src );
            }, thumbnailWidth=100, thumbnailHeight=100 );
        });
        // 文件上传过程中创建进度条实时显示。
        uploader.on( 'uploadProgress', function( file, percentage ) {
            var $li = $( '#'+file.id ),
                $percent = $li.find('.progress-box .sr-only');

            // 避免重复创建

            $li.find(".state").text("上传中");
            $percent.css( 'width', percentage * 100 + '%' );
        });

        // 文件上传成功，给item添加成功class, 用样式标记上传成功。
        uploader.on( 'uploadSuccess', function( file ) {
            $( '#'+file.id ).addClass('upload-state-success').find(".state").text("已上传");
        });

        // 文件上传失败，显示上传出错。
        uploader.on( 'uploadError', function( file ) {
            $( '#'+file.id ).addClass('upload-state-error').find(".state").text("上传出错");
        });

        // 完成上传完了，成功或者失败，先删除进度条。
        uploader.on( 'uploadComplete', function( file ) {
            $( '#'+file.id ).find('.progress-box').fadeOut();
        });
        uploader.on('all', function (type) {
            if (type === 'startUpload') {
                state = 'uploading';
            } else if (type === 'stopUpload') {
                state = 'paused';
            } else if (type === 'uploadFinished') {
                state = 'done';
            }

            if (state === 'uploading') {
                $btn.text('暂停上传');
            } else {
                $btn.text('开始上传');
            }
        });

        $btn.on('click', function () {
            if (state === 'uploading') {
                uploader.stop();
            } else {
                uploader.upload();
            }
        });


    });
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>