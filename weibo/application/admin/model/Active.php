<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/28
 * Time: 0:33
 */

namespace app\admin\model;


class Active extends BaseModel
{
    protected $autoWriteTimestamp = true;

    public function show()
    {
        return self::all();
    }

    /** goods 添加页面
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getActiveToGoods(){
        return self::field('id,title')->select();
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

    public function getOneActiveByID($id)
    {
        return self::where(['id' => $id])->find();

    }
}