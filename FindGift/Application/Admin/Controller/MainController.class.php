<?php
namespace Admin\Controller;
use Think\Controller;
class MainController extends Controller {
    public function index(){
            //  session('id', '1');
            //  session('username', '1');
            //  session('type','1');   
      $this->display('main');
    
    }
}