<?php 
 
namespace Home\Model;
use Think\Model;

class GoodsModel extends Model{

	public function cache(){
		S('Goods_INFO',null);
		$config = $this->getField ( 'id,brand,goodsname,price,price_E,post,link,imagename,content,description,type1,type2,type3,application,application_EX,application_EY,art_tech,art_tech_EX,art_tech_EY,seller' );
		S('Goods_INFO', $config);
	}
}