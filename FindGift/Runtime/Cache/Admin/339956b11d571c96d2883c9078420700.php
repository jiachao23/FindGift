<?php if (!defined('THINK_PATH')) exit(); header('HTTP/1.1 404 Not Found'); header("status: 404 Not Found"); ?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>404 - 简单文章管理系统</title>
    <!-- Bootstrap -->
    <link href="/FindGift/Public/css/bootstrap.min.css" rel="stylesheet">
    <!-- 后台css文件 -->
    <link href="/FindGift/Public/css/admin_style.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="/cms/Public/js/html5shiv.min.js"></script>
      <script src="/cms/Public/js/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
    	/*body{
    		width: 100%;
    	}*/
    	#hint{
    		position:absolute;
    		top:50%;
    		left:50%;
    		margin-left:-400px;
    		margin-top:-200px;
    		text-align: center;
    		width:800px;
    		height:500px
    	}
    	#hint a{
    		color:black;
    	}
    	#hint a:hover{
    		text-decoration: none;
    		color:red;
    	}
    	#home{
    		font-size: 100px;
    	}
    </style>
  </head>
  <body>
  <div id="hint">
  	<span id="home" class="glyphicon glyphicon-home"></span>
  	<h3>对不起，你访问的页面不存在或者已删除！</h3>
  	<span>
  		<a href="<?php echo U('index/index');?>">返回首页</a>
  	</span>
  </div>
    <script src="/FindGift/Public/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/FindGift/Public/js/bootstrap.min.js"></script>
      </body>
</html>