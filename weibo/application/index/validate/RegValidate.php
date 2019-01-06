<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/31
 * Time: 14:05
 */
namespace app\index\validate;

class RegValidate extends BaseValidate
{
    protected $rule = [
      '__token__'  =>  'require|max:35|token',
        'account'=>'require',
        'password'=>'require',
       'captcha|验证码'=>'require|captcha',
        'confirm_password'=>'require|confirm:password',
     'account'   => 'unique:user',
    ];
    protected $message=[
        "__token__.token"=>"令牌无效，请重新刷新页面",
        "account.require"=>"用户名不能为空",
        "password.require"=>"密码不能为空",
        "confirm_password.confirm"=>"密码不一致",
        "captcha.require"=>"验证码不能为空",
        "account.unique"=>"该用户已经存在",
    ];


}