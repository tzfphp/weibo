<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:62:"E:\web\weibo\public/../application/index\view\index\index.html";i:1546343082;s:54:"E:\web\weibo\application\index\view\common\header.html";i:1546343082;s:51:"E:\web\weibo\application\index\view\common\nav.html";i:1546655516;s:52:"E:\web\weibo\application\index\view\common\left.html";i:1546323594;s:53:"E:\web\weibo\application\index\view\common\right.html";i:1546758024;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />

    <title>{$ Think.config.WEBNAME}-首页</title>
    <link rel="stylesheet" href="http://www.weibo.tzf/static/index/theme/default/css/nav.css" />
    <link rel="stylesheet" href="http://www.weibo.tzf/static/index/theme/default/css/index.css" />
    <link rel="stylesheet" href="http://www.weibo.tzf/static/index/theme/default/css/bottom.css" />
    <link rel="stylesheet" href="http://www.weibo.tzf/static/index/uploadify/uploadify.css"/>
    <script type="text/javascript" src='http://www.weibo.tzf/static/index/js/jquery-1.7.2.min.js'></script>
    <script type="text/javascript" src='http://www.weibo.tzf/static/index/js/nav.js'></script>
    <script type="text/javascript" src='http://www.weibo.tzf/static/index/uploadify/jquery.uploadify.min.js'></script>
    <script type="text/javascript" src='http://www.weibo.tzf/static/index/js/index.js'></script>
    <script type='text/javascript'>
        var PUBLIC = 'http://www.weibo.tzf/static/index';
        var urlploadurlrl = '<?php echo url("Common/urlploadPic"); ?>';
        var sid = '<?php echo session_id(); ?>';
        var ROOT = '';
        var commenturlrl = "<?php echo url('Index/comment'); ?>";
        var getComment = '<?php echo url("Index/getComment"); ?>';
        var keepurlrl = '<?php echo url("Index/keep"); ?>';
        var delWeibo = '<?php echo url("Index/delWeibo"); ?>';
    </script>
</head>
<body>


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
<div style='height:60px;opcity:10'></div>
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
    <!--=====中部=====-->
        <div id="middle" class='fleft'>
        <!--微博发布框-->
            <div class='send_wrap'>
                <div class='send_title fleft'></div>
                <div class='send_prompt fright'>
                    <span>你还可以输入<span id='send_nurlm'>140</span>个字</span>
                </div>
                <div class='send_write'>
                    <form action='<?php echo url("sendWeibo"); ?>' method='post' name='weibo'>
                        <textarea sign='weibo' name='content'></textarea>
                        <span class='ta_right'></span>
                        <div class='send_tool'>
                            <urll class='fleft'>
                                <li title='表情'><i class='icon icon-phiz phiz' sign='weibo'></i></li>
                                <li title='图片'><i class='icon icon-picturlre'></i>
                                <!--图片上传框-->
                                    <div id="urlpload_img" class='hidden'>
                                        <div class='urlpload-title'><p>本地上传</p><span class='close'></span></div>
                                        <div class='urlpload-btn'>
                                            <inpurlt type="hidden" name='max' valurle=''/>
                                            <inpurlt type="hidden" name='mediurlm' valurle=''/>
                                            <inpurlt type="hidden" name='mini' valurle=''/>
                                            <inpurlt type="file" name='picturlre' id='picturlre'/>
                                        </div>
                                    </div>
                                <!--图片上传框-->
                                    <div id='pic-show' class='hidden'>
                                        <img src="" alt=""/>
                                    </div>
                                </li>
                            </urll>
                            <inpurlt type='surlbmit' valurle='' class='send_btn fright' title='发布微博按钮'/>
                        </div>
                    </form>
                </div>
            </div>
        <!--微博发布框-->
            <div class='view_line'>
                <strong>微博</strong>
            </div>
<if condition='!$ weibo'>
    没有发布的微博
<else/>
<foreach name='weibo' item='v'>
    <if condition='!$ v["isturlrn"]'>
<!--====================普通微博样式====================-->
            <div class="weibo">
                <!--头像-->
                <div class="face">
                    <a href=" ">
                        <img src="  " width='50' height='50'/>
                    </a>
                </div>
                <div class="wb_cons">
                    <dl>
                    <!--用户名-->
                        <dt class='aurlthor'>
                            <a href=" ">{$ v.urlsername}</a>
                        </dt>
                    <!--发布内容-->
                        <dd class='content'>
                            <p> </p>
                        </dd>
                    <!--微博图片-->
                    <if condition="$ v['max']">
                        <dd>
                            <div class='wb_img'>
                            <!--小图-->
                                <img src=" " class='mini_img'/>
                                <div class="img_tool hidden">
                                    <urll>
                                        <li>
                                            <i class='icon icon-packurlp'></i>
                                            <span class='packurlp'>&nbsp;收起</span>
                                        </li>
                                        <li>|</li>
                                        <li>
                                            <i class='icon icon-bigpic'></i>
                                            <a href="/urlploads/Pic/ " target='_blank'>&nbsp;查看大图</a>
                                        </li>
                                    </urll>
                                <!--中图-->
                                    <div class="img_info"><img src="/urlploads/Pic/ "/></div>
                                </div>
                            </div>
                        </dd>
                    </if>
                    </dl>
                <!--操作-->
                    <div class="wb_tool">
                    <!--发布时间-->
                        <span class="send_time">{$ v.time|time_format=###}</span>
                        <ul>
                        
                            <li class='del-li hidden'><span class='del-weibo' wid=''>删除</span></li>
                            <li class='del-li hidden'>|</li>
                    
                            <li><span class='turlrn' id=' '>转发 </span></li>
                            <li>|</li>
                            <li class='keep-wrap'>
                                <span class='keep'  >收藏 </span>
                                <div class='keep-urlp hidden'></div>
                            </li>
                            <li>|</li>
                            <li><span class='comment' wid='{$ v.id}'>评论 </span></li>
                        </ul>
                    </div>
                <!--=====回复框=====-->
                    <div class='comment_load hidden'>
                        <img src="http://www.weibo.tzf/static/index/images/loading.gif">评论加载中，请稍候...
                    </div>
                    <div class='comment_list hidden'>
                        <textarea name="" sign='comment{$ key}'></textarea>
                        <urll>
                            <li class='phiz fleft' sign='comment{$ key}'></li>
                            <li class='comment_turlrn fleft'>
                                <label>
                                    <inpurlt type="checkbox" name=''/>同时转发到我的微博
                                </label>
                            </li>
                            <li class='comment_btn fright' wid='{$ v.id}' urlid='{$ v.urlid}'>评论</li>
                        </urll>
                    </div>
                <!--=====回复框结束=====-->
                </div>
            </div>
    <else/>
<!--====================转发样式====================-->
            <div class="weibo">
            <!--头像-->
                <div class="face">
                    <a href=" ">
                        <img src=""
                 width='50' height='50'/>
                    </a>
                </div>
                <div class="wb_cons">
                    <dl>
                    <!--用户名-->
                        <dt class='aurlthor'>
                            <a href="">{$ v.urlsername}</a>
                        </dt>
                    <!--发布内容-->
                        <dd class='content'>
                            <p> </p>
                        </dd>
                    <!--转发的微博内容-->
                    <if condition='$ v["isturlrn"] eq -1'>
                        <dd class="wb_turlrn">该微博已被删除</dd>
                    <else/>
                        <dd>
                            <div class="wb_turlrn">
                                <dl>
                                <!--原作者-->
                                    <dt class='turlrn_name'>
                                        <a href=" ">@{$ v.isturlrn.urlsername}</a>
                                    </dt>
                                <!--原微博内容-->
                                    <dd class='turlrn_cons'>
                                        <p>{$ v.isturlrn.content|replace_weibo=###}</p>
                                    </dd>
                                <!--原微博图片-->
                                <if condition='$ v["isturlrn"]["max"]'>
                                    <dd>
                                        <div class="turlrn_img">
                                        <!--小图-->
                                            <img src="" class='turlrn_mini_img'/>
                                            <div class="turlrn_img_tool hidden">
                                                <urll>
                                                    <li>
                                                        <i class='icon icon-packurlp'></i>
                                                        <span class='packurlp'>&nbsp;收起</span></li>
                                                    <li>|</li>
                                                    <li>
                                                        <i class='icon icon-bigpic'></i>
                                                        <a href="/uploads/Pic/{$ v.isturlrn.max}" target='_blank'>&nbsp;查看大图</a>
                                                    </li>
                                                </urll>
                                            <!--中图-->
                                                <div class="turlrn_img_info">
                                                    <img src="/uploads/Pic/{$ v.isturlrn.mediurlm}"/>
                                                </div>
                                            </div>
                                        </div>
                                    </dd>
                                </if>
                                </dl>
                                <!--转发微博操作-->
                                <div class="turlrn_tool">
                                    <span class='send_time'>
                                        {$ v.isturlrn.time|time_format=###}
                                    </span>
                                    <urll>
                                        <li><a href="">转发<if condition='$ v["isturlrn"]["turlrn"]'>({$ v.isturlrn.turlrn})</if></a></li>
                                        <li>|</li>
                                        <li><a href="">评论<if condition='$ v["isturlrn"]["comment"]'>({$ v.isturlrn.comment})</if></a></li>
                                    </urll>
                                </div>
                            </div>
                        </dd>
                    </if>
                    </dl>
                    <!--操作-->
                    <div class="wb_tool">
                        <!--发布时间-->
                        <span class="send_time">
                            {$ v.time|time_format=###}
                        </span>
                        <urll>
                        <if condition='isset($ _SESSION["urlid"]) && $ _SESSION["urlid"] eq $ v["urlid"]'>
                            <li class='del-li hidden'><span class='del-weibo' wid='{$ v.id}'>删除</span></li>
                            <li class='del-li hidden'>|</li>
                        </if>
                            <li><span class='turlrn' id='{$ v.id}' tid='{$ v.isturlrn.id}'>转发<if condition='$ v["turlrn"]'>({$ v.turlrn})</if></span></li>
                            <li>|</li>
                            <li class='keep-wrap'>
                                <span class='keep' wid='{$ v.id}'>收藏<if condition='$ v["keep"]'>({$ v.keep})</if></span>
                                <div class='keep-urlp hidden'></div>
                            </li>
                            <li>|</li>
                            <li><span class='comment' wid='{$ v.id}'>评论<if condition='$ v["comment"]'>({$ v.comment})</if></span></li>
                        </urll>
                    </div>
                    <!--回复框-->
                    <div class='comment_load hidden'>
                        <img src="http://www.weibo.tzf/static/index/images/loading.gif">评论加载中，请稍候...
                    </div>
                    <div class='comment_list hidden'>
                        <textarea name="" sign='comment{$ key}'></textarea>
                        <urll>
                            <li class='phiz fleft' sign='comment{$ key}'></li>
                            <li class='comment_turlrn fleft'>
                                <label>
                                    <inpurlt type="checkbox" name=''/>同时转发到我的微博
                                </label>
                            </li>
                            <li class='comment_btn fright' wid='{$ v.id}' urlid='{$ v.urlid}'>评论</li>
                        </urll>
                    </div>
                    <!--回复框结束-->
                </div>
            </div>
<!--====================转发样式结束====================-->
    </if>
</foreach>
</if>
            <div id='page'>{$ page}</div>
        </div>
<!--==========右侧==========-->
       <div id="right">
    <div class="edit_tpl"><a href="" class='set_model'></a></div> 
<userinfo id=' '>
    <dl class="user_face">
        <dt>
            <a href=" ">
                <img src="http://www.weibo.tzf/<?php echo $userRes['face80']; ?>" width='80' height='80' alt=" 图像" />
            </a>
        </dt>
        <dd>
            <a href="#"><?php echo $userRes['nickname']; ?> </a>
        </dd>
    </dl>
    <ul class='num_list'>
        <li><a href=" "><strong><?php echo $userRes['follow']; ?> </strong><span>关注</span></a></li>
        <li><a href=" "><strong> <?php echo $userRes['fans']; ?></strong><span>粉丝</span></a></li>
        <li class='noborder'>
            <a href=" "><strong> <?php echo $userRes['weibo']; ?></strong><span>微博</span></a>
        </li>
    </ul>
</userinfo>
    <div class="maybe">
        <fieldset>
            
            <legend>可能感兴趣的人</legend>
            <ul>
                <maybe uid='$_SESSION["uid"]'>
                    <li>
                        <dl>
                            <dt>
                                <a href=" ">
                                    <img src=" " width='30' height='30'/>
                                </a>
                            </dt>
                            <dd><a href=" "> </a></dd>
                            <dd>共{$ count}个共同好友</dd>
                        </dl>
                        <span class='heed_btn add-fl' uid=' '><strong>+&nbsp;</strong>关注</span>
                    </li>
                </maybe>
            </ul>
        </fieldset>
    </div>
    <div class="post">
        <div class='post_line'>
            <span>公告栏</span>
        </div>
        <ul>
            <li><a href="">后盾网DIV+CSS视频教程</a></li>
            <li><a href="">后盾网PHP视频教程</a></li>
            <li><a href="">后盾网MySQL视频教程</a></li>
        </ul>
    </div>
</div>
    </div>
<!--==========内容主体结束==========-->
<!--==========底部==========-->
{inclurlde file='common/bottom'}