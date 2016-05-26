<?php

namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller {

    public function index() {
        session(null); 
        $this->display();
    }

    public function login($username = null, $password = null, $verify = null) {
        if (IS_POST) {
/*检测验证码 TODO: */            
            if (!check_verify($verify)) {
                $this->error('验证码输入错误！');
            }

            $User = M("User"); // 实例化User对象
            $map['username'] = $username;
            $map['password'] = md5($password);
            $data = $User->where($map)->find();

            if ($data) { //UC登录成功
                session('id', $data['id']);
                session('username', $data['username']);
                session('type', $data['type']);
                $this->success('登录成功！', U('Main/main'));
            } else { //登录失败
                $this->error('用户名或密码不正确！');
            }
          
        } else {

            $this->display();
        }
    }

    public function verify() {
        $verify = new \Think\Verify();
        $verify->entry(1);
    }

}
