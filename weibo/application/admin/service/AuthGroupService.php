<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/31
 * Time: 14:03
 */

namespace app\admin\service;

use app\admin\model\AuthGroup;

class AuthGroupService
{
    private $authGroupModel;


    public function __construct()
    {
        $this->authGroupModel = new AuthGroup();



    }


    public  static function power()
    {
        $data = db("auth_rule")->where(['pid' => 0])->select();
        foreach ($data as $key => $value) {
            $data[$key]['child'] = db("auth_rule")->where(['pid' => $value['id']])->select();
            foreach ($data[$key]['child'] as $k => $v) {
                $data[$key]['child'][$k]['child'] = db("auth_rule")->where(['pid' => $v['id']])->select();
            }
        }
        return $data;
    }
}