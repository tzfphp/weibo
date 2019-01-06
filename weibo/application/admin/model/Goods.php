<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/28
 * Time: 0:33
 */

namespace app\admin\model;


class Goods extends BaseModel
{
    protected $autoWriteTimestamp = true;

    public function show()
    {
        return self::alias("g")->join('active a','a.id = g.active_id')->where('a.status',1)->field('g.*,a.title ')->select();
    }

    public function add($data)
    {

        return self::save($data);
    }

    public function edit($data)
    {

        return self::where("id", $data['id'])->update($data);
    }

    public function del($data)
    {

        return self::destroy($data);
    }

    public function status($data)
    {
        return self::where('id', $data['id'])->update(['status' => $data['status']]);
    }

    public function getOneGoodsByID($id)
    {
        return self::where(['id' => $id])->find();

    }
}