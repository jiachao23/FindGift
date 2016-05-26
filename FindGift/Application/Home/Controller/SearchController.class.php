<?php

namespace Home\Controller;

use Home\Controller\CoreController;

class SearchController extends CoreController {

    public function search($ParamSet,$Param) {
        $Goods_data = C('Goods_INFO');
        foreach ($Goods_data as $GK => $GV) {
            $composite[$GK] = $Param['PriceOption'] * sqrt(pow($Param['application_EX'] - $GV['application_ex'], 2) + pow($Param['application_EY'] - $GV['application_ey'], 2) + pow($Param['art_tech_EX'] - $GV['art_tech_ex'], 2) + pow($Param['art_tech_EY'] - $GV['art_tech_ey'], 2));
        }
        
        asort($composite);
        
        foreach ($composite as $CK => $CV) {
           $composite[$CK]=& $Goods_data[$CK];
        }
        
        $type = M('Type')->order('id')->select();
        $this->assign('type', $type);
        
        exit;
        /*
          $data=$this->ExactQuery($ParamSet);
          $goods = M('Goods')->field('id,brand,goodsname,price,post,link,imagename,type1,type2,type3')->where($data)->order('id desc')->select();

          $data1=$this->ApplicationAdjustQuery($ParamSet);
          $goods1 = M('Goods')->field('id,brand,goodsname,price,post,link,imagename,type1,type2,type3')->where($data1)->order('id desc')->select();

          $data2=$this->ATAdjustQuery($ParamSet);
          $goods2 = M('Goods')->field('id,brand,goodsname,price,post,link,imagename,type1,type2,type3')->where($data2)->order('id desc')->select();

          $goodsM = array_merge($goods, $goods1,$goods2);

 */
          $this->assign('goods', $composite);
        
        session('application', $ParamSet['application']);
        session('art_tech', $ParamSet['art_tech']);
        session('PriceOption', $ParamSet['PriceOption']);

        //$this->assign('ParamSet', $ParamSet);
        $this->display('search');
    }

    public function searchParam() {
        $ParamSet = I('post.');
        $tt = $this->ApplicationExactQuery($ParamSet);
        $Param['application_EX'] = application_EX($tt['application']);
        $Param['application_EY'] = application_EY($tt['application']);
        $tt = $this->ATExactQuery($ParamSet);
        $Param['art_tech_EX'] = art_tech_EX($tt['art_tech']);
        $Param['art_tech_EY'] = art_tech_EY($tt['art_tech']);
        $Param['PriceOption'] = $this->Price_E($ParamSet);
        $this->search($ParamSet,$Param);
    }

    public function Price_E($ParamSet) {
        $data2 = $ParamSet['PriceOption'];
        if ($data2 == 'PriceL') {
            $input['price'] = '200';
        } else if ($data2 == 'PriceM') {
            $input['price'] = '500';
        } else if ($data2 == 'PriceH') {
            $input['price'] = '1000';
        } else if ($data2 == 'PriceVH') {
            $input['price'] = '2000';
        } else if ($data2 == 'PriceN') {
            $input['price'] = '5000';
        }
        $out = priceE($input['price']);
        return $out;
    }

    function ApplicationNearbyQuery($ParamSet) {
        $data = $ParamSet['application'];
        if (count($data) == 1) {
            if ($data[0] == '[娱乐]') {
                $input['application'] = array('like', array('[娱乐、家庭]', '[娱乐、工作]'), 'OR');
            } else if ($data[0] == '[家庭]') {
                $input['application'] = array('like', array('[家庭、工作]', '[娱乐、家庭]'), 'OR');
            } else if ($data[0] == '[工作]') {
                $input['application'] = array('like', array('[家庭、工作]', '[娱乐、工作]'), 'OR');
            }
        } else if (count($data) == 2) {
            if ($data[0] == '[娱乐]' && $data[1] == '[家庭]') {
                $input['application'] = array('like', array('[娱乐]', '[家庭]'), 'OR');
            } else if ($data[0] == '[家庭]' && $data[1] == '[工作]') {
                $input['application'] = array('like', array('[家庭]', '[工作]'), 'OR');
            } else if ($data[0] == '[娱乐]' && $data[1] == '[工作]') {
                $input['application'] = array('like', array('[娱乐]', '[工作]'), 'OR');
            }
        }
        return $input;
    }

    function ATNearbyQuery($ParamSet) {
        $data1 = $ParamSet['art_tech'];
        if ($data1 == 0) {
            $input['art_tech_nearby'] = array('like', '%0%');
        } else if ($data1 == 1) {
            $input['art_tech_nearby'] = array('like', '%1%');
        } else if ($data1 == 2) {
            $input['art_tech_nearby'] = array('like', '%2%');
        } else if ($data1 == 3) {
            $input['art_tech_nearby'] = array('like', '%3%');
        } else if ($data1 == 4) {
            $input['art_tech_nearby'] = array('like', '%4%');
        } else if ($data1 == 5) {
            $input['art_tech_nearby'] = array('like', '%5%');
        } else if ($data1 == 6) {
            $input['art_tech_nearby'] = array('like', '%6%');
        } else if ($data1 == 7) {
            $input['art_tech_nearby'] = array('like', '%7%');
        } else if ($data1 == 8) {
            $input['art_tech_nearby'] = array('like', '%8%');
        } else if ($data1 == 9) {
            $input['art_tech_nearby'] = array('like', '%9%');
        } else if ($data1 == 10) {
            $input['art_tech_nearby'] = array('like', '%A%');
        }
        return $input;
    }

    function PriceQuery($ParamSet) {
        $data2 = $ParamSet['PriceOption'];
        if ($data2 == 'PriceL') {
            $input['price'] = array(array('gt', 0), array('lt', 200));
        } else if ($data2 == 'PriceM') {
            $input['price'] = array(array('gt', 200), array('lt', 500));
        } else if ($data2 == 'PriceH') {
            $input['price'] = array(array('gt', 500), array('lt', 1000));
        } else if ($data2 == 'PriceVH') {
            $input['price'] = array(array('gt', 1000), array('lt', 2000));
        } else if ($data2 == 'PriceN') {
            $input['price'] = array('gt', 2000);
        }
        return $input;
    }

    function ApplicationExactQuery($ParamSet) {
        $data = $ParamSet['application'];
        if (count($data) == 1) {
            $input['application'] = $data[0];
        } else if (count($data) == 2) {
            if ($data[0] == '[娱乐]' && $data[1] == '[家庭]') {
                $input['application'] = '[娱乐、家庭]';
            } else if ($data[0] == '[娱乐]' && $data[1] == '[工作]') {
                $input['application'] = '[娱乐、工作]';
            } else if ($data[0] == '[家庭]' && $data[1] == '[工作]') {
                $input['application'] = '[家庭、工作]';
            }
        }
        return $input;
    }

    function ATExactQuery($ParamSet) {
        $data1 = $ParamSet['art_tech'];
        if ($data1 == 0) {
            $input['art_tech'] = '[0%，100%]';
        } else if ($data1 == 1) {
            $input['art_tech'] = '[10%，90%]';
        } else if ($data1 == 2) {
            $input['art_tech'] = '[20%，80%]';
        } else if ($data1 == 3) {
            $input['art_tech'] = '[30%，70%]';
        } else if ($data1 == 4) {
            $input['art_tech'] = '[40%，60%]';
        } else if ($data1 == 5) {
            $input['art_tech'] = '[50%，50%]';
        } else if ($data1 == 6) {
            $input['art_tech'] = '[60%，40%]';
        } else if ($data1 == 7) {
            $input['art_tech'] = '[70%，30%]';
        } else if ($data1 == 8) {
            $input['art_tech'] = '[80%，20%]';
        } else if ($data1 == 9) {
            $input['art_tech'] = '[90%，10%]';
        } else if ($data1 == 10) {
            $input['art_tech'] = '[100%，0%]';
        }
        return $input;
    }

    function ExactQuery($ParamSet) {
        $ApplicationExact = $this->ApplicationExactQuery($ParamSet);
        $ATExact = $this->ATExactQuery($ParamSet);
        $inputPrice = $this->PriceQuery($ParamSet);
        $inputM = array_merge($ApplicationExact, $ATExact, $inputPrice);
        return $inputM;
    }

    function ApplicationAdjustQuery($ParamSet) {
        $ApplicationNearbyQuery = $this->ApplicationNearbyQuery($ParamSet);
        $ATExact = $this->ATExactQuery($ParamSet);
        $inputPrice = $this->PriceQuery($ParamSet);
        $inputM = array_merge($ApplicationNearbyQuery, $ATExact, $inputPrice);
        return $inputM;
    }

    function ATAdjustQuery($ParamSet) {
        $ApplicationExact = $this->ApplicationExactQuery($ParamSet);
        $ATNearby = $this->ATNearbyQuery($ParamSet);
        $inputPrice = $this->PriceQuery($ParamSet);
        $inputM = array_merge($ApplicationExact, $ATNearby, $inputPrice);
        return $inputM;
    }

    public function GoodsInfo() {
        $GoodsId = array('id' => I('get.GoodsId'));
        $showData = D('Admin/Goods')->findHandle($GoodsId);
        $this->assign('showData', $showData);
        $NewGoods = D('Admin/Goods')->findNewGoods();
        $this->assign('NewGoods', $NewGoods);
        $Link = D('Admin/Link')->findAllLink();
        $this->assign('Link', $Link);
        $this->display();
    }

    public function PriceChangeInfo() {
        $ParamSet['application'] = session('application');
        $ParamSet['art_tech'] = session('art_tech');
        $ParamSet['PriceOption'] = I('get.PriceOption');
        $tt = $this->ApplicationExactQuery($ParamSet);
        $Param['application_EX'] = application_EX($tt['application']);
        $Param['application_EY'] = application_EY($tt['application']);
        $tt = $this->ATExactQuery($ParamSet);
        $Param['art_tech_EX'] = art_tech_EX($tt['art_tech']);
        $Param['art_tech_EY'] = art_tech_EY($tt['art_tech']);
        $Param['PriceOption'] = $this->Price_E($ParamSet);
        $this->search($ParamSet,$Param);
    }

    public function ApplicationChange1Info() {
        $ParamSet['application'] = array('0' => I('get.application'));
        $ParamSet['art_tech'] = session('art_tech');
        $ParamSet['PriceOption'] = session('PriceOption');
        $tt = $this->ApplicationExactQuery($ParamSet);
        $Param['application_EX'] = application_EX($tt['application']);
        $Param['application_EY'] = application_EY($tt['application']);
        $tt = $this->ATExactQuery($ParamSet);
        $Param['art_tech_EX'] = art_tech_EX($tt['art_tech']);
        $Param['art_tech_EY'] = art_tech_EY($tt['art_tech']);
        $Param['PriceOption'] = $this->Price_E($ParamSet);
        $this->search($ParamSet,$Param);
    }

    public function ApplicationChange2Info() {
        $ParamSet['application'] = array('0' => I('get.application1'), '1' => I('get.application2'));
        $ParamSet['art_tech'] = session('art_tech');
        $ParamSet['PriceOption'] = session('PriceOption');
        $tt = $this->ApplicationExactQuery($ParamSet);
        $Param['application_EX'] = application_EX($tt['application']);
        $Param['application_EY'] = application_EY($tt['application']);
        $tt = $this->ATExactQuery($ParamSet);
        $Param['art_tech_EX'] = art_tech_EX($tt['art_tech']);
        $Param['art_tech_EY'] = art_tech_EY($tt['art_tech']);
        $Param['PriceOption'] = $this->Price_E($ParamSet);
        $this->search($ParamSet,$Param);
    }

    public function ATChangeInfo() {
        $ParamSet = I('get.');
        $ParamSet['application'] = session('application');
        $ParamSet['PriceOption'] = session('PriceOption');
        $tt = $this->ApplicationExactQuery($ParamSet);
        $Param['application_EX'] = application_EX($tt['application']);
        $Param['application_EY'] = application_EY($tt['application']);
        $tt = $this->ATExactQuery($ParamSet);
        $Param['art_tech_EX'] = art_tech_EX($tt['art_tech']);
        $Param['art_tech_EY'] = art_tech_EY($tt['art_tech']);
        $Param['PriceOption'] = $this->Price_E($ParamSet);
        $this->search($ParamSet,$Param);
    }

}
