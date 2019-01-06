<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/28
 * Time: 0:25
 */

namespace app\admin\controller;

use app\admin\model\Goods as GoodsModel;
use app\admin\validate\GoodsValidate;
use think\Exception;
use think\Request;

class Goods extends Common
{
    public function index()
    {
        $goodsModel = new GoodsModel();
        $res = $goodsModel->show(); //显示所有数据
        $res= $this->dealImgSrcToShow($res);
        $this->assign("goodsRes", $res);
        return view();
    }

    public function add()
    {
        if (Request::instance()->isAjax()) {
            $data = Request::instance()->except('file,/admin/goods/add_html');

            $validate = is_array((new GoodsValidate())->goCheck()); //验证数据合法性

            if (is_array($validate)) {
                return json(['', "msg" => $validate['msg'], 'code' => 0]);
            } else {
                $goodsModel = new goodsModel();
                try {
                    $data['ip'] = Request::instance()->ip();
                    $data['num_left'] = $data['num_total'];
                    $goodsModel->add($data);
                } catch (Exception $e) {
                    return json(['', "msg" => $e->getMessage(), 'code' => 0]);
                }
                return json(['', "msg" => "添加成功!", 'code' => 1]);
            }
        } else {
            $active = new \app\admin\model\Active();
            $res = $active->getActiveToGoods();
            $this->assign('activeRes', $res);
            return view();
        }
    }

    public function edit($id = null)
    {
        $goodsModel = new goodsModel();
        if (Request::instance()->isAjax()) {
            $data = Request::instance()->except('file,/admin/goods/edit_html');
            $validate = is_array((new goodsValidate())->goCheck()); //验证数据合法性

            if (is_array($validate)) {
                return json(['', "msg" => $validate['msg'], 'code' => 0]);
            } else {

                try {
                    $data['ip'] = Request::instance()->ip();
                    $goodsModel->edit($data);
                } catch (Exception $e) {
                    return json(['', "msg" => $e->getMessage(), 'code' => 0]);
                }
                return json(['', "msg" => "修改成功!", 'code' => 1]);
            }
        } elseif ($id) {
            $res = $goodsModel->getOneGoodsByID($id);
            $goodsRes =$this->dealOneImgSrcToShow($res);
            $active = new \app\admin\model\Active();
            $res = $active->getActiveToGoods();
            $this->assign('activeRes', $res);
            $this->assign('goodsRes', $goodsRes);
            return view();
        }
    }
    public function delEditImg()
    {
        if (Request::instance()->isAjax()) {
            $data = input("post.");

            if (!empty($data['src'])) {
                $src = ROOT_PATH . $data['src'];
                try {
                    if (file_exists($src)){
                        unlink($src);
                    }
                    db('goods')->where('id',$data['id'])->update(['thumb'=>'']);
                } catch (Exception $e) {
                    return json([$e->getMessage(), "msg" => '删除失败', "code" => 0], 200);
                }
            }
            return json(['', "msg" => '删除成功！', "code" => 1], 200);

        }
    }
    public function del()
    {
        if (Request::instance()->isAjax()) {
            $id = input("id");
            $goodsModel = new goodsModel();
            try {

                $goodsModel->del($id);
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
            $goodsModel = new goodsModel();
            try {
                foreach ($id['arr'] as $k => $v) {

                    $goodsModel->del($v);
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
            $goodsModel = new goodsModel();
            try {
                $goodsModel->status($data);
            } catch (Exception $e) {
                return json(['', "msg" => $e->getMessage(), 'code' => 0]);
            }
            return json(['', "msg" => "已发布", 'code' => 1]);


        }

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