<?php

namespace app\admin\controller;
use think\Session;

class Index extends Common
{
    public function index()
    {
        $this->assign('admin',Session::get('username','login'));
        $this->assign('img',APP_HREF.str_replace('public','',Session::get('img','login')));
        return view();
    }


    public function welcome()
    {
        return view();
    }
    public function loginOut()
    {
        session(null, 'login');
        \session(null);
        $this->redirect('Login/index');
    }
}
