<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/28
 * Time: 0:25
 */

namespace app\admin\controller;

use app\admin\model\Active as ActiveModel;
use app\admin\validate\ActiveValidate;
use think\Exception;
use think\Request;

class Active extends Common
{
    public function index()
    {
        $activeModel = new ActiveModel();
        $res = $activeModel->show(); //显示所有数据
        $this->assign("activeRes", $res);
        return view();
    }

    public function add()
    {
        if (Request::instance()->isAjax()) {
            $data = input("post.");
            $validate = is_array((new ActiveValidate())->goCheck()); //验证数据合法性
            if (is_array($validate)) {
                return json(['', "msg" => $validate['msg'], 'code' => 0]);
            } else {
                $activeModel = new ActiveModel();
                try {
                    $data['ip'] = Request::instance()->ip();
                    $activeModel->add($data);
                } catch (Exception $e) {
                    return json(['', "msg" => $e->getMessage(), 'code' => 0]);
                }
                return json(['', "msg" => "添加成功!", 'code' => 1]);
            }
        } else {

            return view();
        }
    }

    public function edit($id = null)
    {
        $activeModel = new ActiveModel();
        if (Request::instance()->isAjax()) {
            $data = input("post.");
            $validate = is_array((new ActiveValidate())->goCheck()); //验证数据合法性
            if (is_array($validate)) {
                return json(['', "msg" => $validate['msg'], 'code' => 0]);
            } else {

                try {
                    $data['ip'] = Request::instance()->ip();
                    $activeModel->edit($data);
                } catch (Exception $e) {
                    return json(['', "msg" => $e->getMessage(), 'code' => 0]);
                }
                return json(['', "msg" => "修改成功!", 'code' => 1]);
            }
        } elseif ($id) {
            $res = $activeModel->getOneActiveByID($id);
            $this->assign('activeRes', $res);
            return view();
        }
    }

    public function del()
    {
        if (Request::instance()->isAjax()) {
            $id = input("id");
            $activeModel = new ActiveModel();
            try {

                $activeModel->del($id);
            } catch (Exception $e) {
                return json(['', "msg" => $e->getMessage(), 'code' => 0]);
            }
            return json(['', "msg" => "删除成功!", 'code' => 1]);
        }
    }

    public function delAll()
    {
        if (Request::instance()->isAjax()) {
            $id = input("post.");
            $activeModel = new ActiveModel();
            try {
                foreach ($id['arr'] as $k => $v){

                    $activeModel->del($v);
                }
            } catch (Exception $e) {
                return json(['', "msg" => $id['arr'], 'code' => 0]);
            }
            return json(['', "msg" => "删除成功!", 'code' => 1]);
        }
    }

    public function status()
    {
        if (Request::instance()->isAjax()) {
            $data = input("post.");
            $data['status'] = $this->changeStatus($data['status']);
            $activeModel = new ActiveModel();
            try {
                $activeModel->status($data);
            } catch (Exception $e) {
                return json(['', "msg" => $e->getMessage(), 'code' => 0]);
            }
            return json(['', "msg" => "已发布", 'code' => 1]);


        }

    }
}