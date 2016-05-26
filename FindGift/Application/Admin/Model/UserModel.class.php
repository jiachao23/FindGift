<?php

namespace Admin\Model;
use Think\Model;

/**
* 用户表User操作类
*/
class UserModel extends Model{
	
	/**
	* 添加用户处理
	* @param array $data 需要添加的用户数据
	* @return 成功返回1，失败返回0
	*/
	public function addHandle($data){
		if($this->add($data)){
			return 1;
		}else{
			return 0;
		}
	}

	/**
	* 显示用户列表处理
	* @return 返回user表内的所有数据
	*/
	public function userList(){
		$data = $this->select();
		return $data;
	}

	/**
	* 使用用户名查找用户
	* @param array $username 用来查找的用户名
	* @return 成功返回查询到的数据，失败返回0
	*/
	public function findUsername($username){
		if($data = $this->where($username)->find()){
			return $data;
		}else{
			return 0;
		}
	}

	/**
	* 返回数据库内用户的总数
	* @return 用户的总数
	*/
	public function userSum(){
		if($userSum = $this->count("id")){
			return $userSum;
		}else{
			return 0;
		}
	}

	/**
	* 用户登陆处理，核对用户名和密码
	* @param array $data 用户输入的账号和密码
	* @return 账号密码核对正确返回1，任意失败返回0
	*/
	public function loginHandle($data){
		$username = array('username' => $data['username'], );
		if($findata = $this->findUsername($username)){
			if($findata['password'] == $data['password']){
				return $findata;
			}else{
				return 0;
			}
		}else{
			return 0;
		}
	}

	/**
	* 删除用户处理
	* @param array $whereId 需要删除的用户id
	* @return 成功返回1，失败返回0
	*/
	public function delHandle($whereId){
		if($this->where($whereId)->delete()){
			return 1;
		}else{
			return 0;
		}
	}

	/**
	* 修改用户密码
	* @param array $username 需要修改密码的用户名
	* @param array $password 新设置的密码
	* @return 成功修改返回1，失败返回0
	*/
	public function changeHandle($username, $password){
		if($this->where($username)->save($password)){
			return 1;
		}else{
			return 0;
		}
	}

}