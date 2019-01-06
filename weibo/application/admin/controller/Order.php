<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/28
 * Time: 19:36
 */

namespace app\admin\controller;
use app\admin\model\Order as OrderModel;

class Order extends Common
{
    public function index()
    {
        $order = new  OrderModel();
        $res =$order->show();
       $this->assign('orderRes',$res);
        return view();
    }

}