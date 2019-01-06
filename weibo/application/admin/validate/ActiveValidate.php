<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/8/31
 * Time: 14:05
 */
namespace app\admin\validate;

class ActiveValidate extends BaseValidate
{
    protected $rule = [

        'title' => 'require|unique:active',
        ' time_start' => 'require',
        'time_end' => 'require '
    ];

}