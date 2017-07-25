<?php
/**
 * @Author: Marte
 * @Date:   2017-07-24 22:00:08
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-25 09:15:34
 */
namespace app\index\controller;
use app\index\model\Member as MemberModel;
use app\index\model\Goods;

use think\Controller;
use think\Db;


class Member extends Controller
{
    protected $cart;
    public function _initialize()
    {
        $this->cart = new MemberModel();
        $this->cart = new Goods();
    }

    //购物车
    public function member_index()
    {
        $username = session('username');

        //分配变量
        $this->assign('username',$username);

        return $this->fetch();
    }

    public function member_info()
    {
        $username = session('username');

        //分配变量
        $this->assign('username',$username);

        return $this->fetch();
    }

    public function member_order()
    {
        $username = session('username');

        //分配变量
        $this->assign('username',$username);

        return $this->fetch();
    }

    public function member_order_detail()
    {
        $username = session('username');

        //分配变量
        $this->assign('username',$username);

        return $this->fetch();
    }
}