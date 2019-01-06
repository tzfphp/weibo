<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/26
 * Time: 19:49
 */

namespace app\admin\controller;
use think\Request;

class Person extends Common
{
    public function index()
    {
        if (Request::instance()->isAjax()) {
            $data = input("post.");
        } else {
            $admin = new \app\admin\model\Admin();
            $one = $admin->getOneAdmin(Session::get('id', "login"));
            if (trim($one['title']) == "游客") {

                return view("404");
            }
            $this->assign("admin", $one);
            return view();
        }
    }
}