<?php

namespace Admin\Model;
use Think\Model;

class GoodsModel extends Model{

	public function addHandle($data){
		if($this->add($data)){
			return 1;
		}else{
			return 0;
		}
	}

	public function linkSelect(){
		return $this->order('linkorder')->select();
	}


	public function delHandle($whereId){
		if($this->where($whereId)->delete()){
			return 1;
		}else{
			return 0;
		}
	}

	public function findHandle($whereId){
		if($data = $this->where($whereId)->find()){
			return $data;
		}else{
			return 0;	//失败返回0
		}
	}
        
        public function findNewGoods(){
          return $this->field('id,imagename,price,goodsname')->order('id desc')->limit(6)->select();
        }

	public function updateHandle($whereId, $data){
		if($this->where($whereId)->save($data)){
			return 1;
		}else{
			return 0;
		}
	}

	public function linkSum(){
		if($linkSum = $this->count("id")){
			return $linkSum;
		}else{
			return 0;
		}
	}
        
       public function checkHandle($goodsname){
           
          if($this->where($goodsname)->find()){
              return 1;
	    }else{
	      return 0;	//失败返回0
		}
       }

}