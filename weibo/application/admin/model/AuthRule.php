<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/13
 * Time: 23:26
 */

namespace app\admin\model;


class AuthRule extends BaseModel
{
    public function add($data)
    {
        return self::save($data);
    }

    public function show()
    {
        return self::select();
    }

    public function toggleStatus($data)
    {
        if ($data['status'] == 0) {
            $data['status'] = 1;
        } else {
            $data['status'] = 0;
        }

        return self::where('id', $data['id'])->update(['status' => $data['status']]);
    }

    public function getOneChildByID($id)
    {
        return self::where('pid', $id)->find();
    }

    public function getOneDataByID($id)
    {
        return self::where('id', $id)->find();
    }

    public function del($id)
    {
        return self::destroy($id);
    }
}