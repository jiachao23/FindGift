<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <title>Find a gift</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="/FindGift/Public/Home/css/SearchPage.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="/FindGift/Public/Home/css/main.css">
        <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
        <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
        <!--[if lt IE 9]>
           <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
           <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="container-fluid">
                <div class="row main-header">
    <div class="col-md-2">                            
        <i class="glyphicon glyphicon-home" style="color:#666666"></i>
        <a class="mainlink" href="<?php echo U('Index/index');?>">首页</a>
    </div>
    <div class="col-md-3 col-md-offset-7">    
        <img src="/FindGift/Public/Home/images/logo.png" />
        <span class="logo" style="color:#666666">Find a gift</span>     
    </div>
</div>
        </div>
        
        <div class="row">
            <div style="height: 10px;width: 20%;float: left"></div>
            <div style="float: left;width: 60%;margin: 0 auto;">

                <div class="row grid">
                    <div class="col-md-5 center-left"><img class="goods-img" src="/FindGift/Uploads/<?php echo ($showData["imagename"]); ?>"></div>
                    <div class="col-md-7 center-middle">
                        <span class="goods-meta"><strong>品牌：</strong><?php echo ($showData["brand"]); ?></span><br>
                        <span class="goods-meta"><strong>商品名称：</strong><?php echo ($showData["goodsname"]); ?></span><br>
                        <span class="goods-meta"><strong>价格：</strong><?php echo ($showData["price"]); ?>&nbsp;元</span><br>
                        <span class="goods-meta"><strong>商城：</strong><?php echo ($showData["seller"]); ?></span><br>
                        <span class="goods-meta"><strong>标签：</strong><?php echo ($showData["type1"]); ?>、<?php echo ($showData["type2"]); ?>、<?php echo ($showData["type3"]); ?></span><br>
                        <a class="btn btn-danger" href="<?php echo ($showData["link"]); ?>" role="button">直达链接</a>
                    </div>
                </div>
                <div class="row grid center-right">
                    <div class="col-md-12 grid-nomargin">
                        <div class="goods-tag">商品详情</div>
                        <hr  />
                        <div><?php echo (html_entity_decode($showData["content"])); ?></div>
                    </div>
                </div>
            </div>

            <div class="main-left">
                <div class="main-left-bottom">
                    <h4>   <span style="background-color: #c9302c;color:#FFF">最新</span>宝贝  </h4>
                </div>
                
                    <ul class="list-unstyled">
                        <?php if(is_array($NewGoods)): $i = 0; $__LIST__ = $NewGoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="main-left-li"> 
                                <div class="new-show">
                                    <a href="<?php echo U('Search/GoodsInfo', array('GoodsId'=>$vo['id']));?>"><img src="/FindGift/Uploads/<?php echo ($vo["imagename"]); ?>"></a>
                                </div> 
                                <div>
                                    <span><?php echo ($vo["goodsname"]); ?></span><br>
                                    <span class="badge">SALE</span><span>¥&nbsp;<?php echo ($vo["price"]); ?>&nbsp;元</span>
                                </div>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        <!-- End of grid blocks -->
                    </ul>
                
            </div>  

            <div style="height: 100px;width: 5%;float: left"></div>
        </div>    
            
            <div class="row page-foot-main">
                <div class="col-md-10 col-md-offset-1 page-foot">
                    
                         <p>
                    <?php if(is_array($Link)): $i = 0; $__LIST__ = $Link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href="<?php echo ($vo["address"]); ?>" target="_blank"><?php echo ($vo["linkname"]); ?></a><b>|</b><?php endforeach; endif; else: echo "" ;endif; ?>
                     </p><br>

                     <hr>
                     <p> <span>联系我们</span><span>关于Find A Gift</span><span>法律声明</span><span>© 2015 Find A Gift 版权所有</span></p>
                </div>
            </div>
      
    </body>
</html>