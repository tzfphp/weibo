<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

//显示model index页面的状态
function model_status($status)
{
    if ($status == 1) {
        return '<span class="label label-success radius"  >已启用</span>';
    } else {
        return '<span class="label radius label-danger"  >已禁用</span>';
    }
}

//显示model index 页面的操作里面的操作按钮
function model_edit_status($status)
{
    if ($status == 0) {
        return '<a style="text-decoration:none" onClick="model_start(this)" href="javascript:;" title="启用" data-status="0"><i class="Hui-iconfont">&#xe615;</i></a>';
    } else {
        return '<a style="text-decoration:none" onClick="model_stop(this)" href="javascript:;" title="停用" data-status="1"><i class="Hui-iconfont">&#xe631;</i></a>';
    }
}

function article_status($status)
{
    if ($status == 1) {
        return '<span class="label label-success radius"  >已发布</span>';
    } else {
        return '<span class="label radius label-default"  >已下架</span>';
    }
}

function edit_status($status)
{
    if ($status == 0) {
        return '<a style="text-decoration:none" onClick="start(this)" href="javascript:;" title="已发布" data-status="0" class="ml-5"><i class="Hui-iconfont">&#xe603;</i></a>';
    } else {
        return '<a  style="text-decoration:none;" onClick="stop(this)" href="javascript:;" title="已下架" data-status="1" class="ml-5" ><i class="Hui-iconfont"  >&#xe6de;</i></a>';
    }
}

function adver_edit_status($status)
{
    if ($status == 0) {
        return '<a style="text-decoration:none" onClick="start(this)" href="javascript:;" title="已发布" data-status="0" class="ml-5"><i class="Hui-iconfont">&#xe603;</i></a>';
    } else {
        return '<a  style="text-decoration:none;display: none" onClick="stop(this)" href="javascript:;" title="已下架" data-status="1" class="ml-5" ><i class="Hui-iconfont" style="display: none">&#xe6de;</i></a>';
    }
}

/**图片路径
 * @param $img
 * @return string
 */
/**
 * 截取字符长度
 */
function CutStr($str)
{
    if (strlen($str) > 20) {
        return mb_substr($str, 0, 10, "utf8") . '...';
    } else {
        return $str;
    }
}

function strToArray($str)
{
    $str = str_replace("，", ",", trim($str));
    return explode(',', $str);


}

function returnImgSrc($src)
{
    return './' . $src;
}

function explodes($str){
    return explode(",",$str);

}
//状态 0 初始状态 1 待支付 2. 已支付 3 已过期 4 管理员确认
// 5 已取消6 已删除 7 已发货 8 已收货 9 订单完成
function orderStatus($status){
    switch ($status){
        case 1:
            return "待支付";
            break;
        case 2:
            return "已支付";
            break;
        case 3:
            return "已过期";
            break;
        case 4:
            return "管理员确认";
            break;
        case 5:
            return "已取消";
            break;
        case 6:
            return "已删除";
            break;
        case 7:
            return "已发货";
            break;
        case 8:
            return "已收货";
            break;
        case 9:
            return "订单完成";
            break;
        default:
            return "初始状态";
    }
}