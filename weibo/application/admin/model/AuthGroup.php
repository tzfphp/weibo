<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/13
 * Time: 23:26
 */

namespace app\admin\model;


class AuthGroup extends BaseModel
{
    public function add($data)
    {
        return self::save($data);
    }


    public function show()
    {
        return self::select();
    }

    public function status($data)
    {
        if ($data['status'] == 1) {
            $data['status'] = 0;
        } else {
            $data['status'] = 1;
        }
        return self::where("id", $data['id'])->update(['status' => $data['status']]);
    }

    public function del($id)
    {
        return self::destroy($id);
    }

    public function getOneDataByID($id)
    {
        return self::where('id', $id)->find();
    }

    public function edit($data)
    {
        return self::where('id', $data['id'])->update($data);
    }
}