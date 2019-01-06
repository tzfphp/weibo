<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"E:\web\miaosha\public/../application/admin\view\auth_group\index.html";i:1544889627;s:55:"E:\web\miaosha\application\admin\view\public\_meta.html";i:1543753456;s:57:"E:\web\miaosha\application\admin\view\public\_footer.html";i:1542119684;}*/ ?>
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
<title>角色管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 角色管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="delAll()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a> <a href="javascript:;" data-title="添加用户组" data-href="<?php echo url('AuthGroup/add'); ?>" onclick="Hui_admin_tab(this)" class="btn btn-primary radius "><i class="Hui-iconfont">&#xe600;</i> 添加用户组</a></span>  </div>
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr>
				<th scope="col" colspan="6">角色管理</th>
			</tr>
			<tr class="text-c">
				<th width="20"><input  type="checkbox" value="" name=""></th>
				<th width="40">ID</th>
				<th >角色名</th>
				<th width="200">描述</th>
				<th width="100">状态</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
		<?php if(is_array($authRes) || $authRes instanceof \think\Collection || $authRes instanceof \think\Paginator): $i = 0; $__LIST__ = $authRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
			<tr class="text-c">
				<td><input type="checkbox" value="<?php echo $vo['id']; ?>" name="id"></td>
				<td> <?php echo $vo['id']; ?> </td>
				<td> <?php echo $vo['title']; ?></td>
				<td> <?php echo $vo['remark']; ?></td>

				<td class="td-status"><div class="switch size-MINI" data-on="warning"  >
					<input type="checkbox"  class="mini" data-id="<?php echo $vo['id']; ?> " <?php if($vo['status'] == 1): ?> checked <?php endif; ?> value="<?php echo $vo['status']; ?>"/>
				</div></td>
				<td class="td-manage"> <a style="text-decoration:none" class="ml-5" data-title="修改用户组" data-href="<?php echo url('AuthGroup/edit',array('id'=>$vo['id'])); ?>" onclick="Hui_admin_tab(this)" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a>  <a title="删除" href="javascript:;" onclick="group_del(this, '<?php echo $vo['id']; ?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
		 <?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
</div>
<!--_footer 作为公共模版分离出去-->
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
 /* 批量删除*/
    function delAll(){
        var arr=new Array();
        $("input[name=id]:checked").each(function (index) {
            arr[index] =$(this).val();
        });

        if (arr.length ==0){
            layer.msg("你没有选中任何数据！",{icon:5,time:2000});
            return ;
        }else{
            layer.confirm(' 确认要删除吗？',function(index){
                $.ajax({
                    type: 'POST',
                    url: "<?php echo url('AuthGroup/delall'); ?>",
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
   // 单个删除
    function group_del(obj,id){
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'GET',
                url: "<?php echo url('AuthGroup/del'); ?>",
                dataType: 'json',
                data:{id:id},
                success: function(data){
                     console.log(data);
                    if(data.code ==1){
                        $(obj).parents("tr").remove();
                        layer.msg(data.msg,{icon:1,time:2000});
                    }else{
                        layer.msg(  data.msg,{icon:1,time:2000});
                    }
                },
                error:function(data) {
                    layer.msg( '操作失败！请服务器发生未知错误，请稍后再试!',{icon:2,time:2000});
                },
            });
        });
    }
    $('.size-MINI').on('click', function () {
        var id = $(this).find('input').attr('data-id');
        var status = $(this).find('input').val();

        $.ajax({
            type:"POST",
            dataType:"JSON",
            url:"<?php echo url('AuthGroup/status'); ?>",
            data:{id:id,status: status},
            success:function (data) {
                console.log(data);
                if (data.code==1){
                    layer.msg(data.msg,{icon:6,time:2000});
				} else{
                    layer.msg(data.msg,{icon:5,time:2000});
				}

            },error:function (data) {
                    layer.msg('发生未知错误!',{icon:1,time:2000});

            }
        });
    });
    $('.table-sort').dataTable({
        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
        "aLengthMenu": [[5,10,100, 200,-1], ["5条","10条","100条", "200条" ,"全部数据"]],
        "bStateSave": false,//状态保存
        "aoColumnDefs": [
        // {"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
            {"orderable":false,"aTargets":[0,2,3,4,5]}// 制定列不参与排序
        ]
    });
/*管理员-角色-添加*/
function admin_role_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-角色-编辑*/
function admin_role_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*管理员-角色-删除*/
function admin_role_del(obj,id){
	layer.confirm('角色删除须谨慎，确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*管理员-停用*/
function admin_stop(obj,id){
    layer.confirm('确认要停用吗？',function(index){
        //此处请求后台程序，下方是成功后的前台处理……

        $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_start(this,id)" href="javascript:;" title="启用" style="text-decoration:none"><i class="Hui-iconfont">&#xe615;</i></a>');
        $(obj).parents("tr").find(".td-status").html('<span class="label label-default radius">已禁用</span>');
        $(obj).remove();
        layer.msg('已停用!',{icon: 5,time:1000});
    });
}

/*管理员-启用*/
function admin_start(obj,id){
    layer.confirm('确认要启用吗？',function(index){
        //此处请求后台程序，下方是成功后的前台处理……
        $(obj).parents("tr").find(".td-manage").prepend('<a onClick="admin_stop(this,id)" href="javascript:;" title="停用" style="text-decoration:none"><i class="Hui-iconfont">&#xe631;</i></a>');
        $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
        $(obj).remove();
        layer.msg('已启用!', {icon: 6,time:1000});
    });
}
</script>
</body>
</html>