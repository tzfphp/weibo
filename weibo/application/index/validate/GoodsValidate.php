<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/31
 * Time: 14:05
 */
namespace app\admin\validate;

class GoodsValidate extends BaseValidate
{
    protected $rule = [

        'title' => 'require|unique:goods',
         'price_normal'=>'number',
         'price_discount'=>'number',
          'num_user'=>'isPositiveInteger',
          'price_left'=>'isPositiveInteger',
          'price_total'=>'isPositiveInteger',
    ];

}