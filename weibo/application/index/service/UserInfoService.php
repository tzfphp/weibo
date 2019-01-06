<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/1/2
 * Time: 0:12
 */

namespace app\index\service;
class UserInfoService
{
    public function dealCity($citys, $city)
    {
        $town = array();
        $c = json_decode($citys['city']);
        $t = json_decode($citys['town']);
        foreach ($c as $k => $v) {
            if (trim($v) == trim($city)) {

                if (is_null($t[$k])) {
                    return  "";
                }
                return $t[$k];
            }
        }

    }

}