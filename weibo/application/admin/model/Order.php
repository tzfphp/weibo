<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/28
 * Time: 19:37
 */

namespace app\admin\model;


class Order extends BaseModel
{
  public function show(){
      return self::alias('o')
          ->join('active a',"a.id=o.active_id")
          ->join('goods g',"g.id =o.goods_id")
          ->join('admin ad','ad.id=o.uid')
          ->field("a.*,ad.*,g.name,a.title")->select();
  }
}