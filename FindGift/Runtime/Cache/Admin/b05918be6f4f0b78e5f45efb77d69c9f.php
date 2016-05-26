<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <title>Find a gift</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- 引入 Bootstrap -->
        <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="/FindGift/Public/Admin/css/admin_style.css" rel="stylesheet" type="text/css"/>
        <link href="/FindGift/Public/Admin/css/app.min.css" rel="stylesheet" type="text/css"/>
        <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
        <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
        <!--[if lt IE 9]>
           <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
           <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
  </head>
    <body>        
        <nav class="sidebar">
         

          <!-- 左边logo -->
          <div id="left_logo">
            <h1>后台管理系统</h1>
          </div>

          <!-- 左边登陆用户信息相关显示 -->
          <div id="left_user">
            <span class="left_user_info">
              <span class="glyphicon glyphicon-user"></span> 登陆用户名：<?php echo ($_SESSION['username']); ?>
            </span>
            <span class="left_user_info">
              <span class="glyphicon glyphicon-fire"></span> 用户级别：<?php echo ($_SESSION['type']); ?>
            </span>
            <span class="left_user_info">
              <a href="<?php echo U('Index/index');?>"><span class="glyphicon glyphicon-off"></span> 退出登陆</a>
            </span>
          </div>

          <!-- 左边导航菜单 -->
          <div id="left_nav">
            <ul id="left_nav_menu">
              <li class="nav_list">
                <a href="<?php echo U('index/index');?>" class="nav_link"><span class="glyphicon glyphicon-home nav_icon"></span>后台首页</a>
              </li>
              <li class="nav_list">
                <a href="<?php echo U('Home/Index/index');?>" class="nav_link" target="_black"><span class="glyphicon glyphicon-home nav_icon"></span>前台首页</a>
              </li>
              <li class="nav_list" id="user_manage_list">
                <a href="<?php echo U("User/glyh");?>" class="nav_link"><span class="glyphicon glyphicon-user nav_icon"></span>用户管理</a>
              </li>
               <li class="nav_list" id="article_manage_list">
                <a href="#" class="nav_link"><span class="glyphicon glyphicon-list-alt nav_icon"></span>基础信息管理</a>
                <ul id="article_manage" class="sub_menu">
                  <a href="<?php echo U("Basicinfo/SellerShow");?>"><li class="sub_list">电商来源类别</li></a>
                  <a href="<?php echo U("Basicinfo/TypeShow");?>"><li class="sub_list">商品分类</li></a>
                </ul>
              </li>
              
              <li class="nav_list" id="link_manage_list">
                <a href="<?php echo U("Goods/GoodsOperate");?>" class="nav_link"><span class="glyphicon glyphicon-sort nav_icon"></span>商品添加</a>
              </li>
              <li class="nav_list" id="link_manage_list">
                <a href="<?php echo U("Goods/ShowGoods");?>" class="nav_link"><span class="glyphicon glyphicon-sort nav_icon"></span>商品浏览</a>
              </li>
              <li class="nav_list" id="link_manage_list">
                <a href="<?php echo U("Basicinfo/LinkShow");?>" class="nav_link"><span class="glyphicon glyphicon-sort nav_icon"></span>友情链接</a>
              </li>
              <li class="nav_list" id="link_manage_list">
                <a href="<?php echo U("Basicinfo/UpdateCache");?>" class="nav_link"><span class="glyphicon glyphicon-sort nav_icon"></span>更新缓存</a>
              </li>
            </ul>
          </div>
   
        </nav>
        <section class="content">
        <section class="content__main">
          <div  id="right_content">
          <ol class="breadcrumb">
            <li><a href="#">后台首页</a></li>
            <li class="active">商品管理</li>
          </ol>
          <div class="right_div">
              
              <div class="div_query">
                  <form class="form-inline" role="form" action="<?php echo U('Goods/queryGoods');?>" method="post">
                      <div class="form-group">
                          <label for="name">品牌</label>
                          <input type="text" class="form-control" id="brand" name="brand" 
                                 placeholder="请输入品牌名称">
                      </div>
                      <div class="form-group">
                          <label for="name">货名</label>
                          <input type="text" class="form-control" id="goodsname" name="goodsname" 
                                 placeholder="请输入货物名称">
                      </div>
                      <div class="form-group">
                          <label for="name">创建人</label>
                          <input type="text" class="form-control" id="createman" name="createman" 
                                 placeholder="请输入创建人姓名">
                      </div>
                      <button type="submit" class="btn btn-default" id="query">查询</button>
                  </form>
              </div>
              
            <div class="div_logo">商品列表</div>
            <div class="div_con">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th style="display:none">ID</th>
                    <th>品牌</th>
                    <th>货名</th>
                    <th>价格</th>
                    <th>用途</th>
                    <th>艺术科技性</th>
                    <th>分类属性1</th>
                    <th>分类属性2</th>
                    <th>分类属性3</th>
                    <th>操作</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td style="display:none"><?php echo ($vo["id"]); ?></td>
                    <td><?php echo ($vo["brand"]); ?></td>
                    <td><?php echo ($vo["goodsname"]); ?></td>
                    <td><?php echo ($vo["price"]); ?></td>
                    <td><?php echo ($vo["application"]); ?></td>
                    <td><?php echo ($vo["art_tech"]); ?></td>
                    <td><?php echo ($vo["type1"]); ?></td>
                    <td><?php echo ($vo["type2"]); ?></td>
                    <td><?php echo ($vo["type3"]); ?></td>
                    <td>
                      <a href="<?php echo U('Goods/editInfo', array('id'=>$vo['id']));?>" title="编辑"><span class="glyphicon glyphicon-pencil"></span></a>
                    </td>
                  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
              </table>
              </div>    
                <div class="pages">
                        <?php echo ($page); ?>
                </div>
                
          
          </div>
         
        </div> 
        </section>        
        </section>
        
    <!-- 引入公共js -->
            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
        <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>

	<!-- 左边菜单栏点击展开和收起 -->
    <script type="text/javascript">
      $(".nav_list").each(function(){
        $(this).click(function(){
         var nav_id = $(this).attr("id");
         var sub_nav_id = $("#"+nav_id).find("ul").attr("id");
         $("#"+sub_nav_id).toggle();
        })
      });
    </script>
  
    </body>

</html>