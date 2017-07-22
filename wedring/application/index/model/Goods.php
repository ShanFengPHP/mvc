<?php
/**
 * @Author: Marte
 * @Date:   2017-07-21 15:50:12
 * @Last Modified by:   Marte
 * @Last Modified time: 2017-07-22 18:00:25
 */
namespace app\index\model;
use think\Model;
use think\Db;

class Goods extends Model
{
    // 查询数据库商品表
    public function selectGoods()
    {
        $data = Db::name('goods')->where('kid','8')->field('gid,nid,gname,color,weight,sales,price_sale,images')->limit(4)->select();
        return $data;
    }

    //查询数据库商品系列表
    public function selectNav()
    {
        $data = Db::name('goods_nav')->where('id','>','1')->field('id,sid,nname')->select();
        return $data;
    }

    //查询数据库商品种类表
    public function selectKind()
    {
        $data = Db::name('goods_kind')->where('id','>','0')->field('id,sid,classname')->select();
        return $data;
    }

    // 查询商品详细信息
    public function seeGoods($gid)
    {
        $data = Db::name('goods')->where('gid',$gid)->field('gid,nid,gname,color,review,collected,size,weight,sales,price_sale,images')->select();
        return $data;
    }
}