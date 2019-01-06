<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/31
 * Time: 14:03
 */

namespace app\admin\service;
class AuthRuleService
{

    /**
     * 无限极排序
     * @param $data 传入的数据
     * @param int $pid 父级ID
     * @param int $level 等级
     * @return array 返回排序好的数据
     */
    public function sort($data, $pid = 0, $level = 0)
    {
        static $arr = array();
        foreach ($data as $k => $v) {
            if ($v['pid'] == $pid) {
                if ($v['pid'] != 0) {
                    $v['title'] = '|' . str_repeat("---", $level) . $v['title'];
                    $v['level'] = $level;
                } else {
                    $v['level'] = 0;
                }
                $arr[$k] = $v;
                self::sort($data, $v['id'], $level + 1);
            }
        }
        return $arr;
    }

    public function edit($res, $arr)
    {
        $data = $this->getChildID($res, $arr['id']);
        $id = $data[0];
        $id[] = intval($arr['id']);

        if (in_array($arr['pid'], $id)) {
            return false;
        }
        return true;

    }

    /**根据ID，查找所有的子元素
     * @param $data
     * @param $id
     * @return array
     */
    public function getChildID($data, $id)
    {
        static $arr = array();
        foreach ($data as $k => $v) {
            if ($v['pid'] == $id) {

                $arr[] = $v['id'];
                unset($data[$k]);
                self::getChildID($data, $v['id']);
            }

        }

        return [$arr, $data];
    }

    /**获取栏目等级深度
     * @param $res
     * @return array
     */
    public function getLevel($res)
    {
        $arr = array();
        foreach ($res as $k => $v) {
            if (!in_array($v['level'], $arr)) {
                $arr[] = $v['level'];
            }
        }
        return $arr;
    }

}