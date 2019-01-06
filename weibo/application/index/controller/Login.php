<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/9/25
 * Time: 14:12
 */

namespace app\index\controller;

use app\index\validate\LoginValidate;
use app\index\validate\RegValidate;
use think\Controller;
use think\Cookie;
use think\Request;
use think\Session;

class Login extends Controller
{
    /**
     * 登录页面
     */
    public function index()
    {
        Cookie::init(['prefix'=>'think_','expire'=>config('login.AUTO_LOGIN_TIME'),'path'=>'/']);
        if (!is_null(Session::get('id', 'login'))) {
            $this->redirect('Index/index');
        }
        return view();
    }

    /**
     * 登录表单处理
     */
    public function login()
    {
        if (Request::instance()->isAjax()) {
            $data = input('post.');

            $validate = (new LoginValidate())->goCheck($data);
            if (is_array($validate)) {
                return json(['', "msg" => $validate['msg'], 'code' => 0]);
            }


            $user = new \app\index\model\User();
            $res = $user->getOneUserInfoByAccount($data['account']);
            if (empty($res)) {
                return json(['', "msg" => "该用户不存在或密码错误", 'code' => 0]);
            }
            if ($res['password'] !== md5(trim($data['password'] . $res['salt']))) {
                return json(['', "msg" => "该用户不存在或密码错误", 'code' => 0]);
            }
            if ($res['lock']) {
                return json(['', "msg" => "用户被锁定", 'code' => 0]);
            }
            Session::set("account", $res['account'], 'login');
            Session::set("id", $res['id'], 'login');
            if (isset($data['auto'])) {
                $account = $res['account'];
                $ip = \request()->ip(1);
                db('user')->where('id', $res['id'])->update(['login_time' => time(), 'login_ip' => $ip]);
                $value = $account . '|' . $ip;
                $value = Common::encryption($value);
                Cookie::set('name',$value);
               // setcookie('auto', $value, config('login.AUTO_LOGIN_TIME'), '/');
            }
            return json(['', "msg" => "欢迎你，{$res['account']}", 'code' => 1]);
        }

        //处理下一次自动登录

    }

    /**
     * 注册页面
     */
    public function register()
    {

        if (Request::instance()->isAjax()) {

            $data = Request::instance()->except("/index/login/register_html");
            $validate = (new RegValidate())->goCheck($data);
            if (is_array($validate)) {
                return json(['', "msg" => $validate['msg'], 'code' => 0]);
            }

            $user = new \app\index\model\User();
            try {
                unset($data['confirm_password']);
                unset($data['__token__']);
                unset($data['captcha']);
                $salt = $this->randSalt(10);
                $data['salt'] = $salt;
                $data['login_time'] = time();
                $data['login_ip'] = \request()->ip(1);
                $data['password'] = md5($data['password'] . $salt);
                  $user->add($data);
                $id= $user->getLastInsID();
                //将数据插入userinfo表
                $userinfo=array();
                $userinfo['nickname']=$data["account"];
                $userinfo['uid']=$id;
                db("userinfo")->insert($userinfo);
            } catch (Exception $e) {
                return json(['', "msg" => $e->getMessage(), "code" => 0], 200);
            }

            Session::set("account", $data['account'], 'login');
            Session::set("id", $id, 'login');
            return json([' ', "msg" => '用户名注册成功', "code" => 1], 200);

        } else {
            /* if (!C('REGIS_ON')) {
             $this->error('网站暂停注册', U('index'));
         }*/
            return view();
        }

    }

}