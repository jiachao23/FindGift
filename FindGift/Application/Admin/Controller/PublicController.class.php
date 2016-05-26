<?php

namespace Admin\Controller;
use Think\Controller;

/**
* 登陆类
*/
class PublicController extends Controller{

	/**
	* 访问后台页面时先触发检测是否登陆
	*/
	public function _initialize(){
		if(session('id') == ''){
			$this->redirect('Index/index');
		}else{
			$this->assign('username',session('username'));
		}
	}

	/**
	* 访问空方法显示404页面
	*/
	public function _empty(){
		$this->display('Common/404');
	}
}