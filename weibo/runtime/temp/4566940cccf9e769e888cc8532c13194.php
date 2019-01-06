<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:64:"E:\web\miaosha\public/../application/admin\view\goods\index.html";i:1545984233;s:55:"E:\web\miaosha\application\admin\view\public\_meta.html";i:1543753456;s:57:"E:\web\miaosha\application\admin\view\public\_footer.html";i:1542119684;}*/ ?>
﻿<!DOCTYPE HTML>
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
<title>商品列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 秒杀管理 <span class="c-gray en">&gt;</span> 商品列表<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">


	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;"  class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>

<a class="btn btn-primary radius" data-title="添加商品" data-href="<?php echo url('Goods/add'); ?>" onclick="Hui_admin_tab(this)" href="javascript:;">
			<i class="Hui-iconfont">&#xe600;</i> 添加商品</a>

	</span> </div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="15"><input type="checkbox" name="" value=""></th>
					<th width="60">ID</th>
					<th width="150">商品名称</th>
					<th >商品描述</th>
					<th width="130">所属活动</th>
					<th width="120">缩略图</th>
					<th width="90">原价/秒杀价</th>
					<th width="150">总数量/限购数量/剩余数量</th>
					<th width="50">发布状态</th>
					<th width="80">操作</th>
				</tr>
			</thead>
			<tbody>
			<?php if(is_array($goodsRes) || $goodsRes instanceof \think\Collection || $goodsRes instanceof \think\Paginator): $i = 0; $__LIST__ = $goodsRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
				<tr class="text-c">

					<td><input type="checkbox"  class="checked" value="<?php echo $vo['id']; ?>" name="id[]"></td>
					<td><?php echo $vo['id']; ?></td>
					<td><?php echo $vo['name']; ?></td>
					<td><?php echo CutStr($vo['description']); ?></td>
					<td><?php echo $vo['title']; ?></td>
					<td><img width="100" src="<?php echo $vo['thumb']; ?>"></td>
					<td><?php echo $vo['price_normal']; ?>/<?php echo $vo['price_discount']; ?></td>
					<td><?php echo $vo['num_total']; ?>/<?php echo $vo['num_user']; ?>/<?php echo $vo['num_left']; ?></td>
					<td class="td-status"> <?php echo article_status($vo['status']); ?> </td>
					<td class="f-14 td-manage" data-id="<?php echo $vo['id']; ?>"><?php echo edit_status($vo['status']); ?>&nbsp;&nbsp;<a data-href="<?php echo url('goods/edit',array( 'id'=>$vo['id'])); ?>" onclick="Hui_admin_tab(this)" data-title="编辑商品" href="javascript:void(0)"><i class="Hui-iconfont"></i> </a> <a style="text-decoration:none" class="ml-5"  onClick='del(this,"<?php echo $vo['id']; ?>" )' href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
             <?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	</div>
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
//搜索
$("#search_btn").click(function () {
    var model_id = $("#search_model option:selected").val();
    var logmin = $("#logmin").val();
    var logmax = $("#logmax").val();
    var search_title =$("#search_title").val();

    if (model_id==0 && logmax==""&&logmin == ""&&search_title=="") {
        layer.msg( "搜索条件不能全为空！",{icon:2,time:2000});
        return;
    }
   var  sql ="?model_id="+ model_id+"&logmin="+logmin + "&logmax="+logmax + "&logmax="+logmax + "&title=" +search_title;
    alert(sql);
    window.location.href="<?php echo url('Content/search'); ?>" +sql;

});

    //批量删除
    $(".btn-danger").click(function () {
        var arr =new Array();

        $("input[name='id[]']:checked").each(function (i,v) {

            var id =$(this).val();

             arr[i]=[id];

        })
        if (arr.length<=0){
            layer.msg( "请正确选择删除的数据！",{icon:2,time:2000});
            return ;
        }
        layer.confirm('确认要删除吗？',function(index){
            $.ajax({
                type: 'POST',
                url: "<?php echo url('goods/delAll'); ?>",
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
    })


$('.table-sort').dataTable({
	"aaSorting": [[ 1, "id" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"pading":false,
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,2,3,4,5,6,7]}// 不参与排序的列
	]
});



/*资讯-删除*/
function del(obj,id){
	layer.confirm('确认要删除吗？',function(index){

		$.ajax({
			type: 'POST',
			url: "<?php echo url('goods/del'); ?>",
			data:{id:id},
			dataType: 'json',
			success: function(data){
			    console.log(data);
			    if (data.code==1){
                    $(obj).parents("tr").remove();
                    layer.msg(data.msg,{icon:6,time:2000});
				} else{
                    layer.msg(data.msg,{icon:5,time:2000});
				}
			},
			error:function(data) {
                layer.msg( '服务发生未知错误！',{icon:5,time:2000});
			},
		});		
	});
}
 /*资讯-下架*/
function  stop(obj,id){
    var id = $(obj).parents().attr('data-id');
    var status = $(obj).attr('data-status');
	layer.confirm('确认要下架吗？',function(index){
        $.ajax({
            type: 'POST',
            url: "<?php echo url('goods/status'); ?>",
            dataType: 'json',
            data:{id:id,status:status},
            success: function(data){
                console.log(data);
                if (data.code ==1){
                    $(obj).parents("tr").find(".td-status").html(' ');
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" data-status="0" onClick="start(this,id)" href="javascript:;" title="发布"><i class="Hui-iconfont">&#xe603;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已下架</span>');
                    $(obj).remove();
                    layer.msg('已下架!',{icon: 5,time:1000});
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

/*资讯-发布*/
function  start(obj,id){
    var id = $(obj).parents().attr('data-id');
    var status = $(obj).attr('data-status');
    layer.confirm('确认要发布吗？',function(index){
        $.ajax({
            type: 'POST',
            url: "<?php echo url('goods/status'); ?>",
            dataType: 'json',
            data:{id:id,status:status},
            success: function(data){
                console.log(data);
                if (data.code ==1){
                    $(obj).parents("tr").find(".td-status").html(' ');
                    $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" data-status="1" onClick="stop(this,id)" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a>');
                    $(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已发布</span>');
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