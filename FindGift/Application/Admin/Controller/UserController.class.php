<?php

namespace Admin\Controller;
use Think\Controller;

/**
* 用户操作类
*/
class UserController extends PublicController{
	
	/**
	* 显示用户管理界面
	*/
	public function glyh(){
		$data = D('User')->userList();
		$this->assign('data', $data);
		$this->display('UserManage');
	}

	/**
	* 添加用户处理
	*/
	public function addUser(){
		$username =array('username' => I('post.username'));
		if(D('User')->findUsername($username)){	//验证提交的用户名是否已经存在
			echo '用户名已存在';
			exit;
		}
		$data = array(
			'username' => I('post.username'),
			'password' => md5(I('post.password')),
                        'type'=> '普通操作员'
		);
		if(D('User')->addHandle($data)){
			echo '添加用户成功';
		}else{
			echo '添加用户失败';
		}
	}

	/**
	* 删除用户处理
	*/
	public function delUser(){
		$whereId = array('id' => I('post.id'));
		if($whereId['id'] == session('id')){
			echo '无法删除当前登陆的账户';
		}else{
			if(D('User')->delHandle($whereId)){
				echo '删除用户成功';
			}else{
				echo '删除用户失败';
			}
		}
	}

	/**
	* 显示修改密码界面
	*/
	public function updateUser(){
		$username = array('username' => I('get.username'));
		$data = D('User')->findUsername($username);
		$this->assign('data', $data);
		$this->display('UserEdit');
	}

	/**
	* 修改密码处理
	*/
	public function changePass(){
		$username = array('username' => I('post.username') );
		$password = array('password' => md5(I('post.password')) );
		if($username['username'] == session('username')){	
			if(D('User')->changeHandle($username, $password)){
				echo '修改密码成功';	//如果修改的是当前登陆用户的密码，则修改成功后注销session，重新登陆
				session('id',null);
				session('username',null);
			}else{
				echo '修改密码失败';
			}
		}else{
			if(D('User')->changeHandle($username, $password)){
				echo '修改密码成功';
			}else{
				echo '修改密码失败';
			}
		}
	}

}