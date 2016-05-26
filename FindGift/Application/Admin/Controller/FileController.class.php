<?php

namespace Admin\Controller;
use Think\Controller;

class FileController extends Controller {

public function _initialize(){
        //此处为解决Uploadify在火狐下出现http 302错误 重新设置SESSION
        $session_name = session_name();
        if (isset($_POST[$session_name])) {
            session_id($_POST[$session_name]);
            session_start();
        }
    }
/**/
public function upload()
    {
        if (!empty($_FILES)) {
            //图片上传设置
            $config = array(   
                'maxSize'    =>    3145728,
                'rootPath'   =>    './Uploads/',
                'savePath'   =>    '',  
                'saveName'   =>    array('uniqid',''), 
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),  
                'autoSub'    =>    true,   
                'subName'    =>    array('date','Ymd'),
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $images = $upload->upload();
            //判断是否有图
            if($images){
                $info=$images['Filedata']['savepath'].$images['Filedata']['savename'];
                //返回文件地址和名给JS作回调用
                echo $info;
            }
            else{
                //$this->error($upload->getError());//获取失败信息
            }
        }
    }
    
}
