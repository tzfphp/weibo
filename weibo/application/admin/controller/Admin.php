<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/11/20
 * Time: 11:12
 */

namespace app\admin\controller;

use app\admin\model\AuthGroup;
use think\Exception;
use think\Request;
use think\Session;

class Admin extends Common
{
    public function index()
    {
        $admin = new \app\admin\model\Admin();
        $res = $admin->show();
        $this->assign("adminRes", $res);
        return view();
    }

    public function add()
    {
        if (Request::instance()->isAjax()) {
            $data = Request::instance()->except('password2,file');
            //验证---
            $arr = $this->dealAdmin($data);

            $admin = new \app\admin\model\Admin();
            try {

                $id = $admin->add($arr);
                $access = ['uid' => $id, 'group_id' => $data['group_id']];
                db('auth_group_access')->insert($access);

            } catch (Exception $e) {
                return json(['', "msg" => $e->getMessage(), "code" => 0], 200);
            }
            return json([' ', "msg" => '添加成功', "code" => 1], 200);

        } else {
            $authGroup = new AuthGroup();
            $res = $authGroup->show();
            $this->assign("authGroup", $res);
            return view();

        }

    }

    public function edit($id)
    {
        if (Request::instance()->isAjax()) {
            $data = input("post.");
            try {
                $res = db('admin')->update($data);


                db('auth_group_access')->where('uid', $data['id'])->update(['group_id' => $data['group_id']]);
            } catch (Exception $e) {
                return json(['', "msg" => $e->getMessage(), "code" => 0], 200);
            }
            return json([$res, "msg" => '管理员修改成功', "code" => 1], 200);

        } else {
            $admin = new \app\admin\model\Admin();
            $authGroup = new AuthGroup();
            $res = $authGroup->show();
            $this->assign("authGroup", $res);
            $admin = $admin->getOneAdmin($id);

            $this->assign("admin", $admin);
            return view();
        }
    }


    public function del($id)
    {
        if (Request::instance()->isAjax()) {
            $admin = new \app\admin\model\Admin();
            $group = db("admin")->field('group_id')->where('id', $id)->find();
            if ($group['group_id'] == 1) {
                return json([' ', "msg" => "同级不能删除！", "code" => 0], 200);
            }
            $login_id = Session::get('id', 'login');
            if ($login_id == $id) {
                return json([' ', "msg" => "你不能删除自己！", "code" => 0], 200);
            }


            try {
                $admin->del($id);
            } catch (Exception $e) {
                return json([' ', "msg" => $e->getMessage(), "code" => 0], 200);
            }

            return json([' ', "msg" => '删除管理员成功', "code" => 1], 200);

        }
    }

    /** 批量删除数据
     * @param array $arr
     * @return \think\response\Json
     */
    public function delAll($arr)
    {
        if (Request::instance()->isAjax()) {
            if (count($arr) == 0) {
                return json([' ', "msg" => '你没有选中任何数据！！', "code" => 0], 200);
            }
            $admin = new \app\admin\model\Admin();
            foreach ($arr as $k => $id) {
                $group = db("admin")->field('group_id')->where('id', $id)->find();
                if ($group['group_id'] == 1) {
                    return json([' ', "msg" => "超级管理员不能被删除！", "code" => 0], 200);
                }
                $login_id = Session::get('id', 'login');
                if ($login_id == $id) {
                    return json([' ', "msg" => "你不能删除自己！", "code" => 0], 200);
                }
            }


            try {
                $admin->delAll($arr);
            } catch (Exception $e) {
                return json([' ', "msg" => $e->getMessage(), "code" => 0], 200);
            }
            return json([' ', "msg" => '删除管理员成功', "code" => 1], 200);

        }
    }

    /**修改模型状态
     * @return \think\response\Json
     */
    public function status()
    {
        if (Request::instance()->isAjax()) {
            $data = input('post.');
            $admin = new \app\admin\model\Admin();
            try {
                $admin->toggleStatus($data);
            } catch (Exception $e) {
                return json([' ', "msg" => $e->getMessage(), "code" => 0], 200);
            }
            return json([' ', "msg" => '修改状态成功', "code" => 1], 200);

        }
    }


    public function dealAdmin($data)
    {

        $data['login_ip'] = \request()->ip();
        $data['salt'] = $this->randSalt(10);
        $data["password"] = md5($data["password"] . $data['salt']);
        return $data;
    }

    public function uploads()
    {

        $file = request()->file('file');

        $res = $this->upload($file);
        return json($res);
    }

    public function delImg()
    {
        if (Request::instance()->isAjax()) {
            $data = input("post.");

            if (!empty($data['src'])) {
                $src = ROOT_PATH . $data['src'];

                try {
                    if (file_exists($src)) {
                        unlink($src);
                    }
                } catch (Exception $e) {
                    return json([$e->getMessage(), "msg" => '删除失败', "code" => 0], 200);
                }
            }
            return json(['', "msg" => '删除成功！', "code" => 1], 200);

        }
    }

}