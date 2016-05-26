<?php

namespace Admin\Controller;

use Think\Controller;

/**
 * 基础信息管理
 */
class BasicinfoController extends Controller {

    /**
     * 显示电商分类管理界面
     */
    public function SellerShow() {
        $data = D('Seller')->selectCategory();
        $this->assign('data', $data);
        $this->display();
    }

    /**
     * 添加电商分类处理
     */
    public function SellerAdd() {
        $data = array(
            'category' => I('post.CategoryName'),
            'rank' => I('post.rankNum'),
        );
        if ($data['category'] == '')
            return 0; //如果分类名称为空则中断操作
        if (D('seller')->addCategory($data)) {
            echo "添加电商分类成功！";
        } else {
            echo "添加电商分类失败！";
        }
    }

    /**
     * 显示修改电商分类界面
     */
    public function SellerEditShow($id) {
        $whereId = array('id' => $id,);
        $data = D('Seller')->findCategory($whereId);
        $this->assign('data', $data);
        $this->display();
    }

    /**
     * 修改电商分类处理
     */
    public function SellerUpdate() {
        $whereId = array(
            'id' => I('post.id'),
        );
        $data = array(
            'category' => I('post.CategoryName'),
            'rank' => I('post.rankNum'),
        );
        if (D('Seller')->categoryUpdate($whereId, $data)) {
            echo "修改分类成功！";
        } else {
            echo "修改分类失败！";
        }
    }

    /**
     * 删除文章分类
     */
    public function SellerDel() {
        $whereId = array('id' => I('post.id'));
        if (D('seller')->delcate($whereId)) {
            echo "删除分类成功";
        } else {
            echo "删除分类失败";
        }
    }

    public function TypeShow() {
        $data = D('Type')->selectType();
        $this->assign('data', $data);
        $this->display();
    }

    public function TypeAdd() {
        $data = array(
            'type' => I('post.type'),
            'rank' => I('post.rank'),
            'filter'=> I('post.filter'),
        );
        if ($data['type'] == '')
            return 0; //如果分类名称为空则中断操作
        if (D('Type')->addType($data)) {
            echo "添加商品分类成功！";
        } else {
            echo "添加商品分类失败！";
        }
    }

    public function TypeEditShow($id) {
        $whereId = array('id' => $id,);
        $data = D('Type')->findType($whereId);
        $this->assign('data', $data);
        $this->display();
    }

    /**
     * 修改电商分类处理
     */
    public function TypeUpdate() {
        $whereId = array(
            'id' => I('post.id'),
        );
        $data = array(
            'type' => I('post.type'),
            'rank' => I('post.rank'),
            'filter'=> I('post.filter'),
        );
        if (D('Type')->TypeUpdate($whereId, $data)) {
            echo "修改商品分类成功！";
        } else {
            echo "修改商品分类失败！";
        }
    }

    /**
     * 删除文章分类
     */
    public function TypeDel() {
        $whereId = array('id' => I('post.id'));
        if (D('Type')->delType($whereId)) {
            echo "删除商品分类成功";
        } else {
            echo "删除商品分类失败";
        }
    }
    
        public function LinkShow() {
        $data = D('Link')->selectLink();
        $this->assign('data', $data);
        $this->display();
    }

    public function LinkAdd() {
        $data = array(
            'linkname' => I('post.linkname'),
            'rank' => I('post.rank'),
            'address'=> I('post.address'),
        );
        if ($data['linkname'] == '')
            return 0; //如果分类名称为空则中断操作
        if (D('Link')->addLink($data)) {
            echo "添加友情链接成功！";
        } else {
            echo "添加友情链接失败！";
        }
    }

    public function LinkEditShow($id) {
        $whereId = array('id' => $id,);
        $data = D('Link')->findLink($whereId);
        $this->assign('data', $data);
        $this->display();
    }

    /**
     * 修改电商分类处理
     */
    public function LinkUpdate() {
        $whereId = array(
            'id' => I('post.id'),
        );
        $data = array(
            'linkname' => I('post.linkname'),
            'rank' => I('post.rank'),
            'address'=> I('post.address'),
        );
        if (D('Link')->LinkUpdate($whereId, $data)) {
            echo "修改友情链接成功！";
        } else {
            echo "修改友情链接失败！";
        }
    }

    /**
     * 删除文章分类
     */
    public function LinkDel() {
        $whereId = array('id' => I('post.id'));
        if (D('Link')->delLink($whereId)) {
            echo "删除友情链接成功";
        } else {
            echo "删除友情链接失败";
        }
    }
    
     public function UpdateCache(){
         if(IS_POST){
        D('Home/Goods')->cache();
        $Goods_Info = S('Goods_INFO');   
        C('Goods_INFO',$Goods_Info);   
         $this->ajaxReturn('OK');   
         }
         else{
         $this->display();
         }
        
     }

}
