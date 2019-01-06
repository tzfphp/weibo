<?php

namespace app\admin\controller;

use app\admin\service\AuthRuleService;
use think\Exception;
use think\Request;

class AuthRule extends Common
{

    public function index()
    {
        $service = new AuthRuleService();
        if (\request()->isPost()) {
            $data = input("post.");
            $title = db("auth_rule")->where('title', 'like', "%" . $data['title'] . "%")->select();
            $res = $service->sort($title);
            $this->assign("AuthRule", $res);
            return view();
        } else {

            $data = \app\admin\model\AuthRule::all();
            $res = $service->sort($data);
            //   dump($res);die;
            $this->assign("AuthRule", $res);
            return view();
        }
    }


    public function add()
    {
        if (Request::instance()->isAjax()) {
            $data = input('post.');
            try {
                $authRule = new \app\admin\model\AuthRule();
                $authRule->add($data);
            } catch (Exception $e) {
                return json(['', "msg" => $e->getMessage(), "code" => 0], 200);
            }
            return json(['', "msg" => "添加成功！", "code" => 1], 200);
        } else {
            $service = new AuthRuleService();
            $data = \app\admin\model\AuthRule::all();
            $res = $service->sort($data);
            $this->assign("AuthRule", $res);
            return view();
        }
    }

    public function delall()
    {
        if (Request::instance()->isAjax()) {
            $arr = Request::instance()->param();

            $service = new AuthRuleService();
            $data = \app\admin\model\AuthRule::all();

            if (count($arr['arr']) <= 0) {
                return json(["msg" => '没有选择任何数据', "code" => 0], 200);
            }
            try {
                $array = [];
                $id = [];
                foreach ($arr['arr'] as $k => $v) {
                    $array = $service->getChildID($data, intval($v));
                    $data = $array[1];
                    $id = $array[0];
                    $id[] = intval($v);
                    $authRule = new \app\admin\model\AuthRule();
                    $authRule->del($id);
                }
            } catch (Exception $e) {
                return json(['', "msg" => $e->getMessage(), "code" => 0], 200);
            }
            return json(['', "msg" => "批量删除成功！", "code" => 1], 200);
        }
    }

    public function delete($id)
    {
        if (Request::instance()->isAjax()) {
            if (empty($id)) {
                return json(["msg" => '删除失败', "code" => 0], 200);
            }
            try {
                $authRule = new \app\admin\model\AuthRule();
                if ($authRule->getOneChildByID($id)) {  //查询是否有子类
                    return json(['', "msg" => "请先删除子权限！", "code" => 0], 200);
                }
                $authRule->del($id);
            } catch (Exception $e) {
                return json(['', "msg" => $e->getMessage(), "code" => 0], 200);
            }
            return json(['', "msg" => "删除成功！", "code" => 1], 200);

        }
    }

    public function edit($id = null)
    {
        $authRule = new \app\admin\model\AuthRule();
        if (Request::instance()->isAjax()) {
            $data = input('post.');
            try {
                $service = new AuthRuleService();
                $res = $authRule->show();

                if ($service->edit($res, $data)) {
                    db('auth_rule')->where("id", $data['id'])->update($data);
                } else {
                    return json(['', "msg" => " 同一层级下子权限不能作为上级权限！", "code" => 0], 200);
                }

            } catch (Exception $e) {
                return json(['', "msg" => $e->getMessage(), "code" => 0], 200);
            }
            return json(['', "msg" => "修改成功！", "code" => 1], 200);
        } else {
            $service = new AuthRuleService();
            $data = $authRule->show();
            $res = $service->sort($data);
            $oneData = $authRule->getOneDataByID($id);
            $this->assign("AuthRule", $res);
            $this->assign("oneData", $oneData);
            return view();
        }
    }

    /**修改状态
     * @return \think\response\Json
     */
    public function status()
    {
        if (Request::instance()->isAjax()) {
            $data = input('post.');

            $authRule = new \app\admin\model\AuthRule();
            try {
                $authRule->toggleStatus($data);

            } catch (Exception $e) {
                return json(['', "msg" => $e->getMessage(), "code" => 0], 200);
            }
            return json([' ', "msg" => '修改状态成功', "code" => 1], 200);

        }
    }
}