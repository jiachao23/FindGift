<?php

namespace Admin\Controller;

use Think\Controller;

class GoodsController extends PublicController {

    public function ShowGoods() {
        $m = M('Goods');
        $count = $m->where()->count();
        $p = getpage($count, 10);
        $list = $m->field(true)->where()->order('id desc')->limit($p->firstRow, $p->listRows)->select();
        $this->assign('data', $list); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出
        $this->display('GoodsManage');
    }

    public function GoodsOperate() {
         $category = D('Seller')->selectCategory();
         $type = D('Type')->selectType();
         $this->assign('type', $type);
         $this->assign('category', $category);
         $this->display('GoodsOperate');
    }

    public function queryGoods() {

        if (I('post.brand')) {
            $data['brand'] = I('post.brand');
        }
        if (I('post.goodsname')) {
            $data['goodsname'] = I('post.goodsname');
        }
        if (I('post.createman')) {
            $data['createman'] = I('post.createman');
        }

        $m = M('Goods');
        $count = $m->where($data)->count();
        $p = getpage($count, 10);
        $list = $m->field(true)->where($data)->order('id desc')->limit($p->firstRow, $p->listRows)->select();
        $this->assign('data', $list); // 赋值数据集
        $this->assign('page', $p->show()); // 赋值分页输出
        $this->display('GoodsManage');


        /*  echo I('post.brand'); * */
    }

    public function addGoods() {
        $price_E=priceE(I('post.price'));
        $application_EX=application_EX(I('post.application'));
        $application_EY=application_EY(I('post.application'));
        $art_tech_EX= art_tech_EX(I('post.artandtech'));
        $art_tech_EY=art_tech_EY(I('post.artandtech'));
        $composite=Composite($price_E,$application_EX,$application_EY,$art_tech_EX,$art_tech_EY);
        if(I('post.artandtech')=='[0%，100%]')            
        {$art_tech_nearby='1';}
        else if(I('post.artandtech')=='[10%，90%]')            
        {$art_tech_nearby='0,2';}
        else if(I('post.artandtech')=='[20%，80%]')            
        {$art_tech_nearby='1,3';}
        else if(I('post.artandtech')=='[30%，70%]')            
        {$art_tech_nearby='2,4';}
        else if(I('post.artandtech')=='[40%，60%]')            
        {$art_tech_nearby='3,5';}
        else if(I('post.artandtech')=='[50%，50%]')            
        {$art_tech_nearby='4,6';}
        else if(I('post.artandtech')=='[60%，40%]')            
        {$art_tech_nearby='5,7';}
        else if(I('post.artandtech')=='[70%，30%]')            
        {$art_tech_nearby='6,8';}
        else if(I('post.artandtech')=='[80%，20%]')            
        {$art_tech_nearby='7,9';}
        else if(I('post.artandtech')=='[90%，10%]')            
        {$art_tech_nearby='8,A';}
        else if(I('post.artandtech')=='[100%，0%]')            
        {$art_tech_nearby='9';}                
                
        $data = array(
            'seller' => I('post.seller'),
            'brand' => I('post.brand'),
            'goodsname' => I('post.goodsname'),
            'price' => I('post.price'),
            'price_E' => $price_E,
            'post' => I('post.post'),
            'link' => I('post.link'),
            'imagename' => I('post.imagename'),
            'type1' => I('post.type1'),
            'type2' => I('post.type2'),
            'type3' => I('post.type3'),
            'application' => I('post.application'),
            'application_EX' => $application_EX,
            'application_EY' => $application_EY,
            'art_tech' => I('post.artandtech'),
            'art_tech_nearby' => $art_tech_nearby,
            'art_tech_EX' =>$art_tech_EX,
            'art_tech_EY' =>$art_tech_EY,
           // 'application' => I('post.application'),
            'createman' => session('username'),
            'createtime' => date('y-m-d h:i:s'),
            'content' => I('post.content'),
            'description' => I('post.description'),
            'composite' => $composite,
        );
        if (D('Goods')->addHandle($data)) {
            echo '添加商品信息成功';
        } else {
            echo '添加商品信息失败';
        }


        /* echo 'dgshsdhgfhdgf'; */
    }

    public function uploads() {
        $upload = new \Think\Upload(); // 实例化上传类
        $upload->maxSize = 3145728; // 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg'); // 设置附件上传类型
        $upload->rootPath = './Uploads/'; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录
// 上传文件 
        $info = $upload->upload();
        if (!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        } else {// 上传成功 获取上传文件信息
            foreach ($info as $file) {
                echo $file['savepath'] . $file['savename'];
            }
        }
    }
    
	public function editInfo($id){
		$whereId = array('id' => $id, );
		$data = D('Goods')->findHandle($whereId);
                $category = D('Seller')->selectCategory();
                $type = D('Type')->selectType();
                $this->assign('type', $type);
		$this->assign('data', $data);
                $this->assign('category', $category);
		$this->display('GoodsEdit');

	}
        
        public function GoodsUpdate() {
        $price_E=priceE(I('post.price'));
        $application_EX=application_EX(I('post.application'));
        $application_EY=application_EY(I('post.application'));
        $art_tech_EX= art_tech_EX(I('post.artandtech'));
        $art_tech_EY=art_tech_EY(I('post.artandtech'));
        $composite=Composite($price_E,$application_EX,$application_EY,$art_tech_EX,$art_tech_EY);    
                if(I('post.artandtech')=='[0%，100%]')            
        {$art_tech_nearby='1';}
        else if(I('post.artandtech')=='[10%，90%]')            
        {$art_tech_nearby='0,2';}
        else if(I('post.artandtech')=='[20%，80%]')            
        {$art_tech_nearby='1,3';}
        else if(I('post.artandtech')=='[30%，70%]')            
        {$art_tech_nearby='2,4';}
        else if(I('post.artandtech')=='[40%，60%]')            
        {$art_tech_nearby='3,5';}
        else if(I('post.artandtech')=='[50%，50%]')            
        {$art_tech_nearby='4,6';}
        else if(I('post.artandtech')=='[60%，40%]')            
        {$art_tech_nearby='5,7';}
        else if(I('post.artandtech')=='[70%，30%]')            
        {$art_tech_nearby='6,8';}
        else if(I('post.artandtech')=='[80%，20%]')            
        {$art_tech_nearby='7,9';}
        else if(I('post.artandtech')=='[90%，10%]')            
        {$art_tech_nearby='8,A';}
        else if(I('post.artandtech')=='[100%，0%]')            
        {$art_tech_nearby='9';}    
        
        $whereId = array(
            'id' => I('post.id'),
        );
        $data = array(
            'seller' => I('post.seller'),
            'brand' => I('post.brand'),
            'goodsname' => I('post.goodsname'),
            'price' => I('post.price'),
            'price_E' => $price_E,
            'post' => I('post.post'),
            'link' => I('post.link'),
            'imagename' => I('post.imagename'),
            'type1' => I('post.type1'),
            'type2' => I('post.type2'),
            'type3' => I('post.type3'),
            'application' => I('post.application'),
            'art_tech_nearby' => $art_tech_nearby,
            'application_EX' => $application_EX,
            'application_EY' => $application_EY,
            'art_tech' => I('post.artandtech'),
            'art_tech_EX' => $art_tech_EX,
            'art_tech_EY' => $art_tech_EY,
            'createman' => session('username'),
            'createtime' => date('y-m-d h:i:s'),
            'content' => I('post.content'),
            'description' => I('post.description'),
            'composite' => $composite,
        );
        if (D('Goods')->updateHandle($whereId, $data)) {
            echo "修改商品信息成功！";
        } else {
            echo "修改商品信息失败！";
        }
       
    }
    
     public function checkGoods(){
        $goodsname = array('goodsname' => I('post.goodsname'), );
        if (D('Goods')->checkHandle($goodsname)) {
            echo 1;
        } else {
            echo 0;
        }
        
     }

}
