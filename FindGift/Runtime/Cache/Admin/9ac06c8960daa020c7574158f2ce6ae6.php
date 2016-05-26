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
            <div class="container-fluid">
          <!-- 右边内容页面 -->
                <div id="right_content">
                    <ol class="breadcrumb">
                        <li><a href="#">后台首页</a></li>
                        <li class="active">商品管理</li>
                    </ol>
                    <div class="right_div">
                        <div class="div_logo">添加商品信息</div>
                        
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label for="seller" class="col-sm-1 control-label">电商</label>
                                    <div class="col-sm-3">
                                       <select class="form-control" id="seller">
                                                <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["category"]); ?>"><?php echo ($vo["category"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                    </div>     
                                    <label for="brand" class="col-sm-1 control-label">品牌<span style="color:#f00;">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="brand" placeholder="例如：Philips 飞利浦">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="goodsname" id="check-tips" class="col-sm-1 control-label">货名<span style="color:#f00;">*</span></label>
                                    <div class="col-sm-11">
                                        <input type="text" class="form-control" id="goodsname" placeholder="可包括名称、型号">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="price" class="col-sm-1 control-label">价格<span style="color:#f00;">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="price" placeholder="例如：49.99">
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="checkbox-inline" >
                                                <input type="radio" name="post" id="post1" value="1" > 包邮
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="radio" name="post" id="post2" value="0" checked> 不包邮
                                            </label>
                                    </div>                                    
                                </div>
                                
                                <div class="form-group">
                                    <label for="link" class="col-sm-1 control-label">链接地址<span style="color:#f00;">*</span></label>
                                    <div class="col-sm-11">
                                        <input type="text" class="form-control" id="link" placeholder="商品淘宝客网址">
                                    </div>                                  
                                </div>


                                <div class="form-group">
                                    <label for="type1" class="col-sm-1 control-label">分类属性1</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" id="type1">
                                                <option value=""></option>
                                                <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["type"]); ?>"><?php echo ($vo["type"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                    </div>
                                    <label for="type2" class="col-sm-1 control-label">分类属性2</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" id="type2">
                                                <option value=""></option>
                                                <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["type"]); ?>"><?php echo ($vo["type"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                    </div>  
                                    <label for="type3" class="col-sm-1 control-label">分类属性3</label>
                                    <div class="col-sm-3">
                                        <select class="form-control" id="type3">
                                                <option value=""></option>
                                                <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["type"]); ?>"><?php echo ($vo["type"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                    </div>  
                                </div>


                                <div class="form-group">
                                    <label for="application" class="col-sm-2 control-label">[娱乐、家庭、工作]<span style="color:#f00;">*</span></label>
                                    <div class="col-sm-2">
                                        <select class="form-control" id="application">
                                                <option value="娱乐">[娱乐]</option>
                                                <option value="家庭">[家庭]</option>
                                                <option value="工作">[工作]</option>
                                                <option value="[娱乐、家庭]">[娱乐、家庭]</option>
                                                <option value="[家庭、工作]">[家庭、工作]</option>
                                                <option value="[娱乐、工作]">[娱乐、工作]</option>
                                                <option value="无" selected="selected">无</option>
                                            </select>
                                    </div>
                                    <label for="artandtech" class="col-sm-2 control-label">[艺术性、科技性]<span style="color:#f00;">*</span></label>
                                    <div class="col-sm-2">
                                        <select class="form-control" id="artandtech">
                                                <option value="[0%，100%]">[0%，100%]</option>
                                                <option value="[10%，90%]">[10%，90%]</option>
                                                <option value="[20%，80%]">[20%，80%]</option>
                                                <option value="[30%，70%]">[30%，70%]</option>
                                                <option value="[40%，60%]">[40%，60%]</option>
                                                <option value="[50%，50%]">[50%，50%]</option>
                                                <option value="[60%，40%]">[60%，40%]</option>
                                                <option value="[70%，30%]">[70%，30%]</option>
                                                <option value="[80%，20%]">[80%，20%]</option>
                                                <option value="[90%，10%]">[90%，10%]</option>
                                                <option value="[100%，0%]">[100%，0%]</option>
                                                <option value="无" selected="selected">无</option>
                                            </select>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                    <label for="file_upload" class="col-sm-1 control-label">商品图片<span style="color:#f00;">*</span></label>
                                    <div class="col-sm-3">
                                        <input id="file_upload" name="file_upload" type="file" multiple="true" value="" />
                                    </div>
                                    <label for="file_address" class="col-sm-1 control-label">图片地址<span style="color:#f00;">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="file_address" placeholder="该输入框禁止输入..." value="" disabled>
                                    </div> 
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="upload-img-box"></div>
                                    </div>   
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div id="ueditorDiv">
                                            <script id="ue_container" name="content" type="text/plain">
                                                <?php if($data != null): echo (html_entity_decode($data["content"])); endif; ?>
                                            </script>                                   
                                        </div>
                                    </div>
                                </div>

                                <div class="row" id="CategoryBtn">
                                    <div class="col-md-12">
                                        <button id="addLink" type="button" class="btn btn-primary">保存商品信息</button>
                                    </div>
                                </div>
                            </form>
                        
                    </div>
                </div>  
          </div>
        </section>        
        </section>
        

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
    <script type="text/javascript" src="/FindGift/Public/static/uploadify/jquery.uploadify.min.js"></script>

    <script type="text/javascript">
//上传插件
$(function () {
    $('#file_upload').uploadify({
        'swf': "/FindGift/Public/static/uploadify/uploadify.swf",
        'uploader': '<?php echo U("File/upload");?>',
        'buttonText': '图片上传',
        'onUploadSuccess': function (file, data, response) {
            $('.upload-img-box').html(
                    '<img class="upload-pre-item" src="/FindGift/Uploads/' + data + '"/>'
                    );
            $('#file_address').val(data);
        }
    });
});

    </script>
    <!-- 配置文件 -->
    <script type="text/javascript" src="/FindGift/Public/utf8-php/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/FindGift/Public/utf8-php/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
var ue = UE.getEditor('ue_container');
    </script>

    <script type="text/javascript">
        $("#goodsname").blur(function () {
            var goodsname = $('#goodsname').val();
             if (goodsname !== '') {
                $.post("<?php echo U('Goods/checkGoods');?>",
                        { goodsname: goodsname},
                function ($result) {
                    if($result==1)
                  $("#check-tips").html("<span style='color:#f00;'>该商品名称已存在,请检查是否已添加过该商品！</span>");                        
              else
                  $("#check-tips").html("货品<span style='color:#f00;'>*</span>");
                    //alert($result);
                });
            }
        });
        
        //修改检测
        $("#addLink").click(function () {
            var seller = $('#seller').val();
            var brand = $('#brand').val();
            var goodsname = $('#goodsname').val();
            var price = $('#price').val();
            var post = $("input[name='post']:checked").val();
            var link = $('#link').val();
            var imagename = $('#file_address').val();
            var type1 = $('#type1').val();
            var type2 = $('#type2').val();
            var type3 = $('#type3').val();
            var application = $('#application').val();
            var artandtech = $('#artandtech').val();
            var content = UE.getEditor('ue_container').getContent();
            var description = ((UE.getEditor('ue_container').getContentTxt()).substring(0, 120)).trim();

            if (brand === '' || goodsname === '' || price === '' || imagename === '') {
                alert('带*号内容不能为空');
            } else {
                $.post("<?php echo U('Goods/addGoods');?>",
                        {seller: seller, brand: brand, goodsname: goodsname, price: price, post: post, link: link, imagename: imagename,
                            type1: type1, type2: type2, type3: type3, application: application, artandtech: artandtech,
                            content: content, description: description},
                function ($result) {
                    alert($result);
                    window.location.href = "<?php echo U('Goods/GoodsOperate');?>";
                });
            }
            /*   */
        });

    </script>
  
    </body>

</html>