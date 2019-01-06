<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/28
 * Time: 20:04
 */

namespace app\admin\controller;


use app\admin\validate\LoginValidate;
use think\captcha\Captcha;
use think\Request;
use think\Session;


class Login extends Common
{
    public function index()
    {
        $this->alreadyLogin();
        return view();

    }

    public function login()
    {
        if (Request::instance()->isAjax()) {
            $data = input("post.");
            $validate =is_array( (new LoginValidate())->goCheck( ));
            if (is_array($validate)) {
                return json(['', "msg" => $validate['msg'], 'code' => 0]);
            } else {
                $admin = new  \app\admin\model\Admin();
                $res = $admin->getOneAdminByName(trim($data['username']));
                if (empty($res)) {
                    return json(['', "msg" => "该用户不存在或密码错误", 'code' => 0]);
                }
                if ($res['password'] !== md5(trim($data['password'] . $res['salt']))) {
                    return json(['', "msg" => "该用户不存在或密码错误", 'code' => 0]);
                }
                Session::set("username",$res['username'],'login');
                Session::set("img",$res['img'],'login');
                Session::set("id",$res['id'],'login');
                return json(['', "msg" => "欢迎你，{$res['username']}", 'code' => 1]);
            }

        }
    }



}