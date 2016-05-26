<?php

namespace Admin\Model;
use Think\Model;

/**
* Category文章分类表的操作
*/
class TypeModel extends Model{
    
	public function selectType(){
		$data = $this->order('id')->select();
		return $data;
	}

	public function addType($data){
		if ($this->add($data)) {
			return 1;
		}else{
			return 0;
		}
	}
        
	public function findType($whereId){
		if($category = $this->where($whereId)->find()){
			return $category;
		}else{
			return 0;	//查找失败返回0
		}
	}

	public function TypeUpdate($whereId, $data){
		if($this->where($whereId)->save($data)){
			return 1;
		}else{
			return 0;
		}
	}

	public function delType($whereId){
		if($this->where($whereId)->delete()){
			return 1;
		}else{
			return 0;
		}
	}

}