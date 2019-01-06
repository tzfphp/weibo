<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2018/12/25
 * Time: 13:08
 */

namespace app\admin\controller;

use think\Controller;
use think\Session;

class Common extends Controller
{


    /**随机产生盐
     * @param $length
     * @return string
     */
    public function randSalt($length)
    {
        $salt = "";
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyz   
               ABCDEFGHIJKLOMNOPQRSTUVWXYZ';
        for ($i = 0; $i < $length; $i++) {
            $salt .= $pattern{mt_rand(0, 35)};    //生成php随机数
        }
        return $salt;
    }


    /**上传图片
     * @param $file
     * @return array
     */
    public function upload($file)
    {
        $this->controller = request()->controller();
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads/' . $this->controller);
        $src = 'public/uploads/' . strtolower($this->controller) . '/' . $info->getSaveName();
        if ($info) {
            return ['src' => $src, 'code' => 1, 'msg' => '上传成功！'];
        } else {
            return ['msg' => $file->getError(), 'code' => 0];
        }
    }

    /**
     * 判断是否登陆
     */
    protected function isLogin()
    {
        if (is_null(Session::get('id', 'login'))) {
            $this->redirect('Login/index');
        }
    }

    /**
     * 已经登陆
     */
    protected function alreadyLogin()
    {
        if (!is_null(Session::get('id', 'login'))) {
            $this->redirect('Index/index');
        }
    }

    public function changeStatus($status)
    {
        if ($status == 1) {
            $status = 0;
        } else {
            $status = 1;
        }
        return $status;
    }
    public function dealImgSrcToShow($data,$type="thumb"){
        foreach($data as $k =>$v){
            $data[$k][$type] =  APP_HREF.str_replace('public','', $v[$type]);
        }
        return $data;
    }

    public function dealOneImgSrcToShow($data,$type="thumb"){
        $data['src']=APP_HREF.str_replace('public','',$data[$type]);
        $data[$type]= $data[$type];
        return $data;
    }
}