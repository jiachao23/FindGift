<?php

namespace Admin\Model;
use Think\Model;

/**
* Category文章分类表的操作
*/
class SellerModel extends Model{
	
	/**
	* 返回文章的所有分类
	*/
	public function selectCategory(){
		$data = $this->order('id')->select();
		return $data;
	}

	/**
	* 增加文章分类操作
	* @param array $data 需要增加的文章分类数据
	* @return integer 成功返回1，失败返回0
	*/
	public function addCategory($data){
		if ($this->add($data)) {
			return 1;
		}else{
			return 0;
		}
	}

	/**
	* 用分类id查找对应的文章分类名称
	* @param array $whereId 分类的id
	* @return array $CategoryName 分类的名称
	*/
	public function findCategoryName($whereId){
		if($CategoryName = $this->field('category')->where($whereId)->find()){
			return $CategoryName;
		}else{
			return 0;	//查找失败返回0
		}
	}

	/**
	* 用分类id查找对应的文章分类数据
	* @param array $whereId 分类的id
	* @return array 查找到的分类数据
	*/
	public function findCategory($whereId){
		if($category = $this->where($whereId)->find()){
			return $category;
		}else{
			return 0;	//查找失败返回0
		}
	}

	/**
	* 使用分类id修改分类
	* @param array $whereId 分类的id
	* @param array $data 分类的数据
	* @return 成功返回1，失败返回0
	*/
	public function categoryUpdate($whereId, $data){
		if($this->where($whereId)->save($data)){
			return 1;
		}else{
			return 0;
		}
	}

	/**
	* 使用分类id删除分类
	* @param array $whereId 分类的id
	* @return 成功返回1，失败返回0
	*/
	public function delcate($whereId){
		if($this->where($whereId)->delete()){
			return 1;
		}else{
			return 0;
		}
	}

}