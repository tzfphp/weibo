<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/1
 * Time: 22:49
 */

namespace app\admin\model;

class Admin extends BaseModel
{
    protected $autoWriteTimestamp = true;
    public function add($data)
    {
        self::save($data);
        return self::getLastInsID();
    }

    public function show()
    {

        return self::alias('ad')->join("auth_group au", "ad.group_id = au.id")->field("ad.*,au.title")->select();

    }

    public function toggleStatus($data)
    {
        if ($data['status'] == 1) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }
        return self::where("id", $data['id'])->update(["status" => $data['status']]);
    }

    public function getOneAdmin($id)
    {
        return self::where("ad.id", $id)->alias('ad')->join("auth_group au", "ad.group_id = au.id")->field("ad.*,au.title,au.remark")->find();
    }

    public function del($id)
    {
        return self::where("id", $id)->delete();

    }

    public function delAll($arr)
    {
        return self::destroy($arr);
    }

    public function getOneAdminByName($name)
    {
        return self::where(['username' => $name, "status" => 1])->find();

    }

}