<?php

namespace Home\Controller;

use Think\Controller;

class CoreController extends Controller {

    protected function _initialize() {
        $Goods_Info = S('Goods_INFO');
        if (!$Goods_Info) {
            D('Home/Goods')->cache();
            $Goods_Info = S('Goods_INFO');    
        }
        C('Goods_INFO',$Goods_Info);
    }

}
