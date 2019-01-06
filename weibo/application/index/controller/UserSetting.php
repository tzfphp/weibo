<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/1/1
 * Time: 14:54
 */

namespace app\index\controller;
use app\index\service\UserInfoService;
use think\Exception;
use think\Image;
use think\Request;
use think\Session;

/**
 * 账号设置控制器
 */

class UserSetting extends Common
{

    /**
     * 用户基本信息设置视图
     */
    Public function index()
    {
        $where = array('uid' =>Session::get('id','login'));
        $field = array('nickname', 'truename', 'sex',  'constellation', 'intro', 'face180','province','city','town');
        $user = db('userinfo')->field($field)->where($where)->find();
        $city=array();
        if (!empty($user['province'])){
            $city['province'] = db('city')->field('province')->select();
        }
        if (!empty($user['city'])&& $city['province']){
            $city['city'] = db('city')->where('province',$user['province'])->field('city')->find();

            $city['city']=json_decode( $city['city']['city']);

        }
        if (!empty($city['city'])&& $city['province']&&$user['town']){

            $towns = db('city')->where('province',$user['province'])->field('city,town')->find();

            $service= new UserInfoService();
            $city['town'] =  $service->dealCity($towns,$user['city']);

        }

       // print_r($data);die;
        $this->assign('user', $user);
        $this->assign('citys', $city);
        return view();
    }

    /**头像图片上传
     * @return \think\response\Json
     */
    public function uploads()
    {


        $file = request()->file('upload_file');

        $res = $this->upload($file);

        $img180=  $this->thumb($res['src'],180,180);
        $img80=  $this->thumb($res['src'],80,80);
        $img50=  $this->thumb($res['src'],50,50);
        if (file_exists(ROOT_PATH.'public'.$res['src'])){

            unlink(ROOT_PATH.'public'.$res['src']);
        }
        try{
            $where = array('uid' =>Session::get('id','login'));
            $face =  db('userinfo')->where($where)->field('face50,face80,face180')->find();  //在上传图片之前先删除已存在的图片
            $arr=[$face['face50'],$face['face180'],$face['face80']];
            foreach ($arr as $k=>$v){
                if (file_exists(ROOT_PATH.'public'.$v)){
                    unlink(ROOT_PATH.'public'.$v);
                }
            }
         db('userinfo')->where($where)->update(['face50'=>$img50,'face80'=>$img80,'face180'=>$img180]);
        }catch (Exception $e){
            return json(['msg'=>$e->getMessage(),'code'=>0]);
        }
        return json(['src'=>$img180,'code'=>1,'msg'=>'上传成功']);
    }

    public function thumb($src,$width=150,$height=150){

        $image = Image::open(ROOT_PATH.'public'.$src);

        $arr=explode('.',$src);

     // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.png

        $image->thumb($width, $height)->save(ROOT_PATH.'public'.$arr['0'].'_'.$width.'x'.$height.'.'.$arr[1]);

        return $arr['0'].'_'.$width.'x'.$height.'.'.$arr[1];
    }

    /**
     * 获取城市分类
     */
    public function getCity(){

        $data =Request::instance()->param();
       if (isset($data['provinces'])){
        $city = db('city')->where('province',$data['provinces'])->field($data['city'])->find();
           $city =json_decode($city['city']);

          return json($city);

       }elseif(isset($data['city'])){

           $city = db('city')->where('province',$data['province'])->field('city,town')->find();
        ;
           $service= new UserInfoService();
           $town =  $service->dealCity($city,$data['city']);
           return json($town);
       }
    }

    /**
     * 修改用户基本信息
     */
    Public function editBasic()
    {
        if (Request::instance()->isAjax()) {
             $data=Request::instance()->except('/index/user_setting/editbasic_html');
             $where = array('uid' =>Session::get('id','login'));
             try{
                 db('userinfo')->where($where)->update($data);
             }catch (Exception $e){
                 return json(['msg'=>$e->getMessage(),'code'=>0]);
             }
            return json(['msg'=>'修改成功！','code'=>1]);
        }


        if (M('userinfo')->where($where)->save($data)) {
            $this->success('修改成功', U('index'));
        } else {
            $this->error('修改失败');
        }
    }


    /**
     * 修改密码
     */
    Public function editPwd()
    {
        if (Request::instance()->isAjax()) {
            $data=Request::instance()->except('/index/user_setting/editpwd_html');
            $where = array('id' => Session::get('id','login'));
            $pwd = db('user')->where($where)->field('password,salt')->find();
            if ($pwd['password']!=md5(trim($data['old'].$pwd['salt']))){
                 return json(['msg'=>"旧密码不正确",'code'=>0]);
            }
            if (!isset($data['new'])||!isset($data['newed'])){
                if ($data['new']!=$data['newed']){
                    return json(['msg'=>"密码不一致",'code'=>0]);
                }
            }
            try{
               db('user')->where($where)->update(['password'=>md5(trim($data['new']).$pwd['salt'])]);

            }catch (Exception $e){
                return json(['msg'=>$e->getMessage(),'code'=>0]);
            }
            return json(['msg'=>"密码修改成功！",'code'=>1]);
        }

    }
}