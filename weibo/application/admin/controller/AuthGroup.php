<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/9/10
 * Time: 13:42
 */

namespace app\admin\controller;

use app\admin\service\AuthGroupService;
use app\admin\model\AuthGroup as AuthGroupModel;
use think\Exception;
use think\Request;

class AuthGroup extends Common
{
    public function index()
    {

        $authGroup = new  AuthGroupModel();
        $authRes = $authGroup->show();
        $this->assign("authRes", $authRes);

        return view();

    }

    public function add()
    {
        if (Request::instance()->isAjax()) {
            $data = Request::instance()->except('checkbox2,connection', 'post');
            $data['rules'] = implode(',', $data['rules']);

            $authGroup = new AuthGroupModel();
            try {
                $authGroup->add($data);
            } catch (Exception $e) {
                return json(['', 'msg' => $e->getMessage(), 'code' => 0], 200);
            }
            return json(['', 'msg' => "添加成功！", 'code' => 1], 200);

        } else {
            $res = AuthGroupService::power();
            $this->assign("authRuleRes", $res);
            return view();
        }
    }
    public function edit($id)
    {
        if (Request::instance()->isAjax()) {
            $data = Request::instance()->except('checkbox2,connection', 'post');
            $data['rules'] = implode(',', $data['rules']);

            $authGroup = new AuthGroupModel();
            try {
                $authGroup->edit($data);
            } catch (Exception $e) {
                return json(['', 'msg' => $e->getMessage(), 'code' => 0], 200);
            }
            return json(['', 'msg' => "编辑成功！", 'code' => 1], 200);

        } elseif($id) {
            $res = AuthGroupService::power();
            $authGroup = new AuthGroupModel();
            $oneData =  $authGroup->getOneDataByID($id);
            $this->assign("authRuleRes", $res);
            $this->assign("oneData", $oneData);
            return view();
        }
    }

    public function status()
    {
        if (Request::instance()->isAjax()) {
            $data = input("post.");
            $authGroup = new AuthGroupModel();
            try {
                $authGroup->status($data);
            } catch (Exception $e) {
                return json(['', 'msg' => $e->getMessage(), 'code' => 0], 200);
            }
            return json(['', 'msg' => "修改成功 ！", 'code' => 1], 200);
        }
    }

    public function del()
    {
        if (Request::instance()->isAjax()) {
            $id = Request::instance()->param();
            $authGroup = new AuthGroupModel();

            try {
             $admin =   db('admin')->where('group_id',$id['id'])->select();
             if (count($admin)<=0){
                 $authGroup->del($id['id']);
             }else{
                 return json(['', 'msg' => "请先删除该用户组的所属用户！", 'code' => 0], 200);
             }

            } catch (Exception $e) {
                return json(['', 'msg' => $e->getMessage(), 'code' => 0], 200);
            }
            return json(['', 'msg' => "删除成功 ！", 'code' => 1], 200);
        }


    }
  public function delall(){
      if (Request::instance()->isAjax()) {
          $id = Request::instance()->param();
          $authGroup = new AuthGroupModel();

          try {
              foreach ($id['arr'] as $k=>$v){
                  $admin =   db('admin')->where('group_id',$v)->select();
                  if (count($admin)<=0){
                      $authGroup->del($v);
                  }else{
                      return json(['', 'msg' => "请先删除id为".$v."该用户组的所属用户！", 'code' => 0], 200);
                  }
              }

          } catch (Exception $e) {
              return json(['', 'msg' => $e->getMessage(), 'code' => 0], 200);
          }
          return json(['', 'msg' => "删除成功 ！", 'code' => 1], 200);
      }
  }

}