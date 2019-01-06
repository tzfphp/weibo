<?php

namespace app\index\controller;

use think\Controller;
use think\Cookie;
use think\Session;


class Index extends Common
{
    public function index()
    {
     $user= db('userinfo')->where('uid',Session::get('id','login'))->find();
     $this->assign('userRes',$user);
        return view();
    }

    public function user()
    {
        return view();
    }

    /**
     * 退出登陆
     */

    public function loginOut()
    {
        //清除session

        Session::clear("login");

        cookie(null, 'think_');
        $this->redirect('Login/index');
    }
}