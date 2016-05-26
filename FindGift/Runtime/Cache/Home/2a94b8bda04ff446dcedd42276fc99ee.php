<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <title>Find a gift</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- 引入 Bootstrap -->
        <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href='/FindGift/Public/Home/css/rcswitcher.min.css' rel='stylesheet' type='text/css'>
        <link href="/FindGift/Public/Home/css/HomePage.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="/FindGift/Public/Home/css/jquery-ui.min.css">
        <link rel="stylesheet" href="/FindGift/Public/Home/css/jquery-ui-slider-pips.min.css">

        <!-- HTML5 Shim 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
        <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
        <!--[if lt IE 9]>
           <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
           <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="home-template">
      <div class="container">  
        <header class="main-header">
            
                <div class="row">
                    <div class="col-md-12">
                        <h1>Find a gift</h1>
                    </div>                    
                </div>
                <div class="row blank">
                    <div class="col-md-12">
                        <img src="/FindGift/Public/Home/images/logo.png" />
                    </div>                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p>善于发现、准确定位、简单有趣、让您找到好礼物</p>
                        <hr>
                    </div> 
                </div>
            
        </header>

        <section class="content-wrap">
            
                <form role="form" action="<?php echo U('Search/searchParam');?>" method="POST">
                    <div class="row question">
                        <div class="col-md-1">
                            <img src="/FindGift/Public/Home/images/icon-nav-white-events.svg" alt="" class="pic">
                        </div>
                        <div class="col-md-3 ">
                            您想挑个什么<em><strong class="text-primary">价位</strong></em>的礼品呢？                  
                        </div>
                        <div class="col-md-8">                            
                                <label class="checkbox-inline">
                                    <input type="radio" name="PriceOption" id="PriceOptionRadios1" 
                                           value="PriceL" checked> <200
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" name="PriceOption" id="PriceOptionRadios2" 
                                           value="PriceM"> 200-500
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" name="PriceOption" id="PriceOptionRadios3" 
                                           value="PriceH"> 500-1000
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" name="PriceOption" id="PriceOptionRadios4" 
                                           value="PriceVH"> 1000-2000
                                </label>
                                <label class="checkbox-inline">
                                    <input type="radio" name="PriceOption" id="PriceOptionRadios5" 
                                           value="PriceN"> 2000++
                                </label>                            
                        </div>
                    </div>

                    <div class="row question">
                        <div class="col-md-1">
                            <img src="/FindGift/Public/Home/images/icon-nav-white-gears.svg" alt="" class="pic">  
                        </div>
                        <div class="col-md-3">
                           您的礼物要做什么<em><strong class="text-primary">用途</strong></em>呢？                   
                        </div>
                        <div class="col-md-8">                          
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="application[]" id="Interesting" 
                                           value="[娱乐]" checked> 娱乐
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="application[]" id="Family" 
                                           value="[家庭]"> 家庭
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="application[]" id="Work" 
                                           value="[工作]"> 工作
                                </label>
                                <label class="checkbox-inline">
                                    <small class="text-primary">（最多只能选择其中两项哟）</small>
                                </label>                           
                        </div>
                    </div>    

                    <div class="row question">
                        <div class="col-md-1">
                            <img src="/FindGift/Public/Home/images/icon-nav-white-community.svg" alt="" class="pic">
                        </div>
                        <div class="col-md-3">
                            最后，关于<em><strong class="text-primary">艺术性和科技性</strong></em>呢？                  
                        </div>
                        <div class="col-md-6">
                            <div class="slider1"></div> 
                            <input name="art_tech" id="art_tech" type="hidden"/>
                        </div>
                        
                        <div class="col-md-2">
                            <p class="percen" ><small class="text-primary" id="art_percentage">艺术性：50%</small></p>
                            <p class="percen"><small class="text-primary" id="technology_percentage">科技性：50%</small></p>
                        </div>
                    </div>

                    <div class="row searchButton">
                        <div class="col-md-4 col-md-offset-4">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Go！找到好礼物</button>
                        </div>
                    </div>
                </form>
           
        </section>

        <footer class="main-footer">
            
                <div class="row">
                    <div class="col-md-12">
                        <span>
                            请使用IE9以上浏览器访问本网站！
                        </span>
                        &nbsp;|&nbsp;
                        <span>
                            Copyright ©2015 Find a Gift
                        </span>
                        &nbsp;|&nbsp;
                        <span>
                            ***备******号
                        </span>
                        &nbsp;|&nbsp;
                    </div>
                </div>
            
        </footer>
        </div>   
          
        <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
        <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script src="/FindGift/Public/Home/js/jquery-ui.min.js"></script>
        <script src="/FindGift/Public/Home/js/jquery-ui-slider-pips.js"></script> 
        <script type="text/javascript" src="/FindGift/Public/Home/js/rcswitcher.min.js"></script> 
        <script>
            window.onload = function () {
                $('.question :radio').rcSwitcher({
                    // reverse: true,
                    theme: 'light',
                    // width: 70,
                    blobOffset: 0,
                    onText: 'YES', // 'ON'             ON状态时的文本
                    offText: 'NO', // 'OFF'            OFF状态时的文本
                    autoStick: true
                });

                $('.question :checkbox').rcSwitcher({
                    // reverse: true,
                    theme: 'light',
                    // width: 70,
                    blobOffset: 0,
                    onText: 'YES', // 'ON'             ON状态时的文本
                    offText: 'NO', // 'OFF'            OFF状态时的文本
                    autoStick: true
                })
                        .on('change.rcSwitcher', function (e, data, changeType) {
                            if ($('.question :checkbox:checked').length === 2) {
                                $('.question :checkbox').not(':checked').attr('disabled', true);
                            } else if ($('.question :checkbox:checked').length === 1) {
                                $('.question :checkbox').not(':checked').attr('disabled', false);
                                //alert($('.gender :checkbox').not(':checked').length);
                            }
                        });

            };

            $(function () {
                $("#art_tech").val(5);
                var hanzi = ["0%", "10%", "20%", "30%", "40%", "50%", "60%", "70%", "80%", "90%", "100%"];
                var input1=5;
                $(".slider1").slider({
                    value: 5,
                    min: 0,
                    max: 10,
                    step: 1
                }).slider("pips", {
                    rest: "label"
                })
                        .slider("float", {
                            labels: hanzi
                        })
                        .on("slidechange", function (e, ui) {
                         input1=10-ui.value;
                         $("#art_tech").val(ui.value); 
                            if(ui.value===0)
                            {   
                         $("#art_percentage").text( "艺术性：" +ui.value + "%");
                         $("#technology_percentage").text( "科技性：" + input1 + "0%");        
                            }
                            else if(ui.value===10){
                         $("#art_percentage").text( "艺术性：" +ui.value + "0%");
                         $("#technology_percentage").text( "科技性：" + input1 + "%");        
                            }
                            else
                            {
                          $("#art_percentage").text( "艺术性：" +ui.value + "0%");
                         $("#technology_percentage").text( "科技性：" + input1 + "0%");        
                            }
                   
                        });
            /*            
                $(".slider2").slider({
                    value: 5,
                    min: 0,
                    max: 10,
                    step: 1
                }).slider("pips", {
                    rest: "label"
                })
                        .slider("float", {
                            labels: hanzi
                        })
                        .on("slidechange", function (e, ui) {
                            if(input2!==ui.value)
                    {
                        input2=ui.value;
                        input1=10-ui.value;
                        $(".slider1").slider('value', 10 - ui.value);
                        $("#art_percentage").text( "艺术性：" +input1 + "0%");
                         $("#technology_percentage").text( "科技性：" + input2 + "0%"); 
                    }
                });
              */          
            });
        </script>
    </body>
</html>