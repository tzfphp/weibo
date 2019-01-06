<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/30
 * Time: 20:58
 */

namespace app\index\model;

class User extends \think\Model
{
    protected $autoWriteTimestamp = true;

    public function getOneUserInfoByAccount($account)
    {
        return self::where('account', $account)->find();
    }

    public function add($data)
    {
     return    self::save($data);

    }
}