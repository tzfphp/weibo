<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:64:"E:\web\miaosha\public/../application/admin\view\admin\index.html";i:1544943060;s:55:"E:\web\miaosha\application\admin\view\public\_meta.html";i:1543753456;s:57:"E:\web\miaosha\application\admin\view\public\_footer.html";i:1542119684;}*/ ?>
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
<title>管理员列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 管理员列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{ $dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{ $dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入管理员名称" i  name="">
		<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a class="btn btn-primary radius" data-title="添加管理员" data-href="<?php echo url('admin/add'); ?>" onclick="Hui_admin_tab(this)" href="javascript:;">
			<i class="Hui-iconfont">&#xe600;</i> 添加管理员</a></span>  </div>
	<table class="table table-border table-bordered table-bg table-sort">
		<thead>

			<tr class="text-c">
				<th width="10"><input type="checkbox" name="" value=""></th>
				<th width="30">ID</th>
				<th width="80">登录名</th>
				<th width="90">手机</th>
				<th width="150">邮箱</th>
				<th width="100">角色</th>
				<th width="130">加入时间</th>
				<th width="50">是否已启用</th>
				<th width="60">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php if(is_array($adminRes) || $adminRes instanceof \think\Collection || $adminRes instanceof \think\Paginator): $i = 0; $__LIST__ = $adminRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<tr class="text-c">
				<td><input type="checkbox" value="<?php echo $vo['id']; ?>" name="id[]"></td>
				<td><?php echo $vo['id']; ?></td>
				<td><?php echo $vo['username']; ?></td>
				<td><?php echo $vo['phone']; ?></td>
				<td><?php echo $vo['email']; ?></td>
				<td> <?php echo $vo['title']; ?></td>
				<td><?php echo $vo['create_time']; ?></td>
				<td class="td-status"> <?php echo model_status($vo['status']); ?></td>
				<td class="td-manage" data-id="<?php echo $vo['id']; ?>">  <?php echo model_edit_status($vo['status']); ?><a style="text-decoration:none" class="ml-5" data-title="管理员修改" data-href="<?php echo url('admin/edit',array('id'=>$vo['id'])); ?>" onclick="Hui_admin_tab(this)" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;"  onclick="admin_del(this, '<?php echo $vo['id']; ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
		<?php endforeach; endif; else: echo "" ;endif; ?>

		</tbody>
	</table>
</div>
<!--_footer 作为公共模版分离出去-->
 <script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    $('.table-sort').dataTable({
        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        "aoColumnDefs": [
            //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
            {"orderable":false,"aTargets":[0,2,3,4,5,7,8]}// 制定列不参与排序
        ]
    });
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
    $(".btn-danger").click(function () {
        var arr =new Array();
        $("input[name='id[]']:checked").each(function (i,v) {
            arr[i]=$(this).val();

        })

        if (arr.length<=0){
            layer.msg( "请正确选择删除的数据！",{icon:2,time:2000});
            return ;
        }
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'get',
                url: 'delAll',
                dataType: 'json',
                data:{arr:arr},
                success: function(data){
                    console.log(data);
                    if(data.code ==1){
                        layer.msg(data.msg,{icon:6,time:2000});
                        setTimeout(location.replace(location.href),2000);

                    }else{
                        layer.msg(data.msg,{icon:5,time:2000});
                    }

                },
                error:function(data) {
                    layer.msg("服务器内部错误，请稍后再试",{icon:2,time:2000});
                },
            });
        });
    })

    /*管理员-删除*/
    function admin_del(obj,id){

        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'GET',
                url: "<?php echo url('admin/del'); ?>",
                dataType: 'json',
                data:{id:id},
                success: function(data){

                    if(data.code ==1){

                        $(obj).parents("tr").remove();
                        layer.msg(data.msg,{icon:6,time:2000});
                    }else{
                        layer.msg(data.msg,{icon:5,time:2000});
                    }

                },
                error:function(data) {
                    layer.msg("服务器内部错误，请稍后再试",{icon:2,time:2000});
                },
            });
        });
    }

    /*模型-编辑*/
    function admin_edit(title,url,id,w,h){

        $.ajax({
            type: 'GET',
            url: 'edit',
            dataType: 'json',
            data:{id:id},
            success: function(data){
                console.log(data);

            },
            error:function(data) {
                layer.msg('服务器发生错误，请稍后再试!',{icon: 2,time:2000});
            },
        });
        layer_show(title,url,w,h);
    }
    /*模型-停用*/
    function model_stop(obj){
        var id = $(obj).parents().attr('data-id');
        var status = $(obj).attr('data-status');

        layer.confirm('确认要停用吗？',function(index){
            //此处请求后台程序，下方是成功后的前台处理……
            $.ajax({
                type: 'POST',
                url: 'status',
                dataType: 'json',
                data:{id:id,status:status},
                success: function(data){
                    console.log(data);
                    if (data.code ==1){
                        $(obj).parents("tr").find(".td-status").html(' ');
                        $(obj).parents("tr").find(".td-manage").prepend('<a onClick="model_start(this,id)" href="javascript:;"  data-status="0" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
                        $(obj).parents("tr").find(".td-status").html('<span class="label label-danger radius">已禁用</span>');
                        $(obj).remove();

                        layer.msg(data.msg,{icon: 6,time:1000});
                    } else{
                        layer.msg(data.msg,{icon: 2,time:2000});
                    }

                },
                error:function(data) {
                    layer.msg('服务器发生错误，请稍后再试!',{icon: 2,time:2000});
                },
            });

        });
    }

    /*模型-启用*/
    function model_start(obj){
        var id = $(obj).parents().attr('data-id');
        var status = $(obj).attr('data-status');

        layer.confirm('确认要启用吗？',function(index){
            //此处请求后台程序，下方是成功后的前台处理……
            $.ajax({
                type: 'POST',
                url: 'status',
                dataType: 'json',
                data:{id:id,status:status},
                success: function(data){
                    if (data.code ==1){
                        $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius" >已启用</span>');
                        $(obj).parents("tr").find(".td-manage").prepend('<a onClick="model_stop(this,id)" href="javascript:;" title="停用" data-status="1" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');

                        $(obj).remove();

                        layer.msg(data.msg,{icon: 6,time:1000});
                    } else{
                        layer.msg(data.msg,{icon: 2,time:2000});
                    }
                },
                error:function(data) {
                    layer.msg('服务器发生错误，请稍后再试!',{icon: 2,time:2000});
                },
            });
        });
    }

</script>
</body>
</html>