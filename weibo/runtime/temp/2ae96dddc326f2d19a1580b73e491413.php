<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"E:\web\miaosha\public/../application/admin\view\auth_rule\index.html";i:1544887296;s:55:"E:\web\miaosha\application\admin\view\public\_meta.html";i:1543753456;s:57:"E:\web\miaosha\application\admin\view\public\_footer.html";i:1542119684;}*/ ?>
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
<![endif]-->
<title>权限管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 权限管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<form class="Huiform" method="post" action="<?php echo url("","",true,false);?>" target="_self">
			<input type="text" class="input-text" style="width:250px" placeholder="权限名称"name="title">
			<button type="submit" class="btn btn-success"><i class="Hui-iconfont">&#xe665;</i> 搜权限节点</button>
		</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="delAll()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" data-title="添加权限节点" data-href="<?php echo url('AuthRule/add'); ?>" onclick="Hui_admin_tab(this)" class="btn btn-primary radius "><i class="Hui-iconfont">&#xe600;</i> 添加权限节点</a></span>  </div>
	<table class="table table-border table-bordered table-bg table-sort">
		<thead>
			<tr>
				<th scope="col" colspan="7">权限节点</th>
			</tr>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="260">权限名称</th>
				<th>字段名</th>
				<th>状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php if(is_array($AuthRule) || $AuthRule instanceof \think\Collection || $AuthRule instanceof \think\Paginator): $i = 0; $__LIST__ = $AuthRule;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<tr class="text-c">
				<td><input type="checkbox" value="<?php echo $vo['id']; ?>" name="id"></td>
				<td><?php echo $vo['id']; ?></td>
				<td class="text-l"><?php echo $vo['title']; ?></td>
				<td><?php echo $vo['name']; ?></td>
				<td class="td-status"> <?php echo model_status($vo['status']); ?></td>
				<td class="td-manage" data-id="<?php echo $vo['id']; ?>">  <?php echo model_edit_status($vo['status']); ?><a style="text-decoration:none" class="ml-5" data-title="修改权限节点" data-href="<?php echo url('AuthRule/edit',array('id'=>$vo['id'])); ?>" onclick="Hui_admin_tab(this)" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;"   onclick="del(this, '<?php echo $vo['id']; ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
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
<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="http://www.miaosha.tzf/static/hui/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
    $('.table-sort').dataTable({
        "aLengthMenu": [[100, 200,-1], ["100条", "200条" ,"全部数据"]],
        "bStateSave": false,//状态保存
        "aoColumnDefs": [
            //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
            {"orderable":false,"aTargets":[0,1,2,3,4,5]}// 制定列不参与排序
        ]
    });
/*批量删除*/
    function delAll(){
        var arr=new Array();
        $("input[name=id]:checked").each(function (index) {
            arr[index] =$(this).val();
        });
       alert(arr);
        if (arr.length ==0){
            layer.msg("你没有选中任何数据！",{icon:5,time:2000});
            return ;
        }else{
            layer.confirm('该操作会将所属权限的子权限也一起删除，确认要删除吗？',function(index){
                $.ajax({
                    type: 'POST',
                    url: "<?php echo url('AuthRule/delall'); ?>",
                    dataType: 'json',
                    data:{arr:arr},
                    success: function(data){
                      console.log(data);
                        if(data.code ==1){
                            layer.msg(data.msg,{icon:6,time:2000});
                            setTimeout("location.replace(location.href)",2000);
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


    }

    /*权限节点-删除*/
    function del(obj,id){

        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'POST',
                url:"<?php echo url('AuthRule/delete'); ?>",
                dataType: 'json',
                data:{id:id,},
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

    /*权限节点-编辑*/
    function model_edit(title,url,id,w,h){

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
    /*权限节点-停用*/
    function model_stop(obj){
        var id = $(obj).parents().attr('data-id');
        var status = $(obj).attr('data-status');

        layer.confirm('确认要停用吗？',function(index){
            //此处请求后台程序，下方是成功后的前台处理……
            $.ajax({
                type: 'POST',
                url: "<?php echo url('AuthRule/status'); ?>",
                dataType: 'json',
                data:{id:id,status:status},
                success: function(data){
                    console.log(data);
                    if (data.code ==1){
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

    /*权限节点-启用*/
    function model_start(obj){
        var id = $(obj).parents().attr('data-id');
        var status = $(obj).attr('data-status');

        layer.confirm('确认要启用吗？',function(index){
            //此处请求后台程序，下方是成功后的前台处理……
            $.ajax({
                type: 'POST',
                url: "<?php echo url('AuthRule/status'); ?>",
                dataType: 'json',
                data:{id:id,status:status},
                success: function(data){
                    console.log(data);
                    if (data.code ==1){

                        $(obj).parents("tr").find(".td-manage").prepend('<a onClick="model_stop(this,id)" href="javascript:;" title="停用" data-status="1" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
                        $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius" >已启用</span>');
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