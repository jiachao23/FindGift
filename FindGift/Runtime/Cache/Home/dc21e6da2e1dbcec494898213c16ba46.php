<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="utf-8">
        <title>Find a gift</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/FindGift/Public/Home/css/normalize.css" />
        <link rel="stylesheet" type="text/css" href="/FindGift/Public/Home/css/default.css">
        <!-- Global CSS for the page and tiles -->
        <link rel="stylesheet" href="/FindGift/Public/Home/css/main.css">
        <link href="/FindGift/Public/Home/css/SearchPage.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="/FindGift/Public/Home/css/jquery.ferro.ferroMenu.css" />
        <link rel="stylesheet" href="/FindGift/Public/Home/css/font-awesome/css/font-awesome.css" />
        <link href='/FindGift/Public/Home/css/rcswitcher.min.css' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="/FindGift/Public/Home/css/jquery-ui.min.css">
        <link rel="stylesheet" href="/FindGift/Public/Home/css/jquery-ui-slider-pips.min.css">

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
            <form role="form" action="<?php echo U('Search/searchParam');?>" method="POST" id="form1">       
            <div class="row main-header">
                <div class="col-md-12">
                    <table class="table table-striped table-condensed question">
                        <tbody>
                            <tr>
                                <td class="title" style="line-height: 40px;">艺术、科技性：</td>
                                <td>
                                    <div class="slider1" style="width: 40%;float: left"></div> 
                                    <div  style="width: 40%;float: left;margin: 0 20px;"> 
                                        <span class="percen" style="line-height: 40px;"><small class="text-primary" id="art_percentage">艺术性：50%</small></span>
                                        <span class="percen" style="line-height: 40px;"><small class="text-primary" id="technology_percentage">科技性：50%</small></span>
                                        <a class="btn btn-small" href="javascript:document:form1.submit();"><i class="icon-search"></i> 去搜</a>
                                        <input name="art_tech" id="art_tech" type="hidden"  value="<?php echo ($_SESSION['art_tech']); ?>"/>
                                    </div> 

                                </td>
                            </tr>
                            <tr>
                                <td class="title">价格：</td>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="radio" name="PriceOption" id="PriceOptionRadios1" 
                                               value="PriceL" <?php if($_SESSION['PriceOption'] == 'PriceL'): ?>checked<?php endif; ?>> 0-200
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" name="PriceOption" id="PriceOptionRadios2" 
                                               value="PriceM" <?php if($_SESSION['PriceOption'] == 'PriceM'): ?>checked<?php endif; ?>> 200-500
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" name="PriceOption" id="PriceOptionRadios3" 
                                               value="PriceH" <?php if($_SESSION['PriceOption'] == 'PriceH'): ?>checked<?php endif; ?>> 500-1000
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" name="PriceOption" id="PriceOptionRadios4" 
                                               value="PriceVH" <?php if($_SESSION['PriceOption'] == 'PriceVH'): ?>checked<?php endif; ?>> 1000-2000
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="radio" name="PriceOption" id="PriceOptionRadios5" 
                                               value="PriceN" <?php if($_SESSION['PriceOption'] == 'PriceN'): ?>checked<?php endif; ?>> 2000++
                                    </label>
                                    <a class="btn btn-small" href="javascript:document:form1.submit();"><i class="icon-search"></i> 去搜</a>
                                </td>
                            </tr>
                            <tr >
                                <td class="title">用途：</td>
                                <td>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="application[]" id="Interesting" 
                                               value="[娱乐]" <?php if(($_SESSION['application'][0] == '[娱乐]')): ?>checked<?php endif; ?>> 娱乐
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="application[]" id="Family" 
                                               value="[家庭]" <?php if(($_SESSION['application'][0] == '[家庭]') or ($_SESSION['application'][1] == '[家庭]')): ?>checked<?php endif; ?>> 家庭
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="application[]" id="Work" 
                                               value="[工作]" <?php if(($_SESSION['application'][0] == '[工作]') or ($_SESSION['application'][1] == '[工作]')): ?>checked<?php endif; ?>> 工作
                                    </label>
                                    <label class="checkbox-inline">
                                        <small class="text-primary">（最多只能选择其中两项哟）</small>
                                    </label>
                                    <a class="btn btn-small" href="javascript:document:form1.submit();"><i class="icon-search"></i> 去搜</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>    

            <ul id="nav">
                <li><a href="<?php echo U('Search/PriceChangeInfo', array('PriceOption'=>'PriceL'));?>">&lt;200</a></li>
                <li><a href="<?php echo U('Search/PriceChangeInfo', array('PriceOption'=>'PriceM'));?>">&lt;500</a></li>
                <li><a href="<?php echo U('Search/PriceChangeInfo', array('PriceOption'=>'PriceH'));?>">&lt;1000</a></li>
                <li><a href="<?php echo U('Search/PriceChangeInfo', array('PriceOption'=>'PriceVH'));?>">&lt;2000</a></li>
                <li><a href="<?php echo U('Search/PriceChangeInfo', array('PriceOption'=>'PriceN'));?>">2000+</i></a></li>
            </ul>
            <ul id="nav2">
                <li><a href="<?php echo U('Search/ApplicationChange1Info', array('application'=>'[娱乐]'));?>">娱乐</a></li>
                <li><a href="<?php echo U('Search/ApplicationChange2Info', array('application1'=>'[娱乐]','application2'=>'[家庭]'));?>">+</a></li>
                <li><a href="<?php echo U('Search/ApplicationChange1Info', array('application'=>'[家庭]'));?>">家庭</i></a></li>
                <li><a href="<?php echo U('Search/ApplicationChange2Info', array('application1'=>'[家庭]','application2'=>'[工作]'));?>">+</a></li>
                <li><a href="<?php echo U('Search/ApplicationChange1Info', array('application'=>'[工作]'));?>">工作</i></a></li>
                <li><a href="<?php echo U('Search/ApplicationChange2Info', array('application1'=>'[娱乐]','application2'=>'[工作]'));?>">+</a></li>
                <li><a href="<?php echo U('Search/ApplicationChange1Info', array('application'=>'[娱乐]'));?>">娱乐</a></li>
            </ul>
            <ul id="nav3">
                <li><a href="<?php echo U('Search/ATChangeInfo', array('art_tech'=>'1'));?>">10%</a></li>
                <li><a href="<?php echo U('Search/ATChangeInfo', array('art_tech'=>'2'));?>">20%</a></li>
                <li><a href="<?php echo U('Search/ATChangeInfo', array('art_tech'=>'3'));?>">30%</a></li>
                <li><a href="<?php echo U('Search/ATChangeInfo', array('art_tech'=>'4'));?>">40%</a></li>
                <li><a href="<?php echo U('Search/ATChangeInfo', array('art_tech'=>'5'));?>">50%</a></li>
                <li><a href="<?php echo U('Search/ATChangeInfo', array('art_tech'=>'6'));?>">60%</a></li>
                <li><a href="<?php echo U('Search/ATChangeInfo', array('art_tech'=>'7'));?>">70%</a></li>
                <li><a href="<?php echo U('Search/ATChangeInfo', array('art_tech'=>'8'));?>">80%</a></li>
                <li><a href="<?php echo U('Search/ATChangeInfo', array('art_tech'=>'9'));?>">90%</a></li>
                <li><a href="<?php echo U('Search/ATChangeInfo', array('art_tech'=>'10'));?>">100%</a></li>
            </ul>
            <ul id="nav4">
                <li><a href="<?php echo U('Search/ATChangeInfo', array('art_tech'=>'9'));?>">10%</a></li>
                <li><a href="<?php echo U('Search/ATChangeInfo', array('art_tech'=>'8'));?>">20%</a></li>
                <li><a href="<?php echo U('Search/ATChangeInfo', array('art_tech'=>'7'));?>">30%</a></li>
                <li><a href="<?php echo U('Search/ATChangeInfo', array('art_tech'=>'6'));?>">40%</a></li>
                <li><a href="<?php echo U('Search/ATChangeInfo', array('art_tech'=>'5'));?>">50%</a></li>
                <li><a href="<?php echo U('Search/ATChangeInfo', array('art_tech'=>'4'));?>">60%</a></li>
                <li><a href="<?php echo U('Search/ATChangeInfo', array('art_tech'=>'3'));?>">70%</a></li>
                <li><a href="<?php echo U('Search/ATChangeInfo', array('art_tech'=>'2'));?>">80%</a></li>
                <li><a href="<?php echo U('Search/ATChangeInfo', array('art_tech'=>'1'));?>">90%</a></li>
                <li><a href="<?php echo U('Search/ATChangeInfo', array('art_tech'=>'0'));?>">100%</a></li>
            </ul>

            <div class="bar">
                <ol id="filters">
                    <li data-filter="all" class="action filter__item">全部</li>
                    <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-filter="<?php echo ($vo["type"]); ?>" class="action filter__item"><?php echo ($vo["type"]); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ol> 
            </div>

            <div role="main" class="row">
                <div class="col-md-8 col-md-offset-2">
                    <ul id="container" class="tiles-wrap animated">
                        <!--
                          These are our grid items. Notice how each one has classes assigned that
                          are used for filtering. The classes match the "data-filter" properties above.
                        -->
                        <?php if(is_array($goods)): $i = 0; $__LIST__ = $goods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-filter-class='["<?php echo ($vo["type1"]); ?>", "<?php echo ($vo["type2"]); ?>", "<?php echo ($vo["type3"]); ?>"]'>                       
                                <div class="slider">
                                    <a href="<?php echo U('Search/GoodsInfo', array('GoodsId'=>$vo['id']));?>" target="_blank"><img src="/FindGift/Uploads/<?php echo ($vo["imagename"]); ?>"></a>
                                </div>
                                <div class="meta">
                                    <div class="meta__price">
                                        <span>¥</span>
                                        <span><?php echo ($vo["price"]); ?>元</span>
                                        <?php if($vo["post"] == 1): ?><span class="badge">包邮
                                            </span><?php endif; ?>
                                    </div>
                                    <span class="meta__title"><?php echo ($vo["goodsname"]); ?><a href="<?php echo ($vo["link"]); ?>" target="_blank">&gt;&gt;</a></span>
                                    <i class="glyphicon glyphicon-gift meta__icon"></i><span class="meta__brand"><?php echo ($vo["brand"]); ?></span>
                                </div>                        
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        <!-- End of grid blocks -->
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 search-footer">              
                </div>
            </div>
      </form>        
        </div>   


        <!-- include jQuery -->
        <script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
        <script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <!-- Include the imagesLoaded plug-in -->
        <script src="/FindGift/Public/Home/js/imagesloaded.pkgd.min.js"></script>

        <!-- Include the plug-in -->
        <script src="/FindGift/Public/Home/js/wookmark.js"></script>

        <script src="/FindGift/Public/Home/js/jquery.ferro.ferroMenu-1.2.3.min.js" type="text/javascript"></script>
        <script src="/FindGift/Public/Home/js/jquery-ui.min.js"></script>
        <script src="/FindGift/Public/Home/js/jquery-ui-slider-pips.js"></script> 
        <script type="text/javascript" src="/FindGift/Public/Home/js/rcswitcher.min.js"></script> 

        <!-- Once the page is loaded, initalize the plug-in. -->
        <script type="text/javascript">
            $(document).ready(function () {
                // Instantiate wookmark after all images have been loaded
                var wookmark;
                imagesLoaded('#container', function () {
                    wookmark = new Wookmark('#container', {
                        fillEmptySpace: false // Optional, fill the bottom of each column with widths of flexible height
                    });
                });

                // Setup filter buttons when jQuery is available
                var $filters = $('#filters li');

                function onClickFilter(event) {
                    var $item = $(event.currentTarget),
                            activeFilters = [],
                            filterType = $item.data('filter');

                    if (filterType === 'all') {
                        $filters.removeClass('active');
                    } else {
                        $item.toggleClass('active');

                        // Collect active filter strings
                        $filters.filter('.active').each(function () {
                            activeFilters.push($(this).data('filter'));
                        });
                    }

                    wookmark.filter(activeFilters, 'or');
                }

                // Capture filter click events.
                $('#filters').on('click.wookmark-filter', 'li', onClickFilter);


                $("#nav").ferroMenu({
                    position: "right-top",
                    delay: 50,
                    rotation: 720,
                    margin: 25,
                    drag: false,
                    //opened: true,
                    radius: 90,
                    mainText: "价格"
                });
                $("#nav2").ferroMenu({
                    position: "right-center",
                    delay: 50,
                    rotation: 720,
                    margin: 25,
                    drag: false,
                    //opened: true,
                    radius: 90,
                    mainText: "功能"
                });
                $("#nav3").ferroMenu({
                    position: "left-top",
                    delay: 50,
                    rotation: 720,
                    margin: 25,
                    drag: false,
                    //opened: true,
                    radius: 90,
                    mainText: "艺术性"
                });
                $("#nav4").ferroMenu({
                    position: "left-center",
                    delay: 50,
                    rotation: 720,
                    margin: 25,
                    drag: false,
                    //opened: true,
                    radius: 90,
                    mainText: "科技性"
                });

                //$("#art_tech").val(5);
                var hanzi = ["0%", "10%", "20%", "30%", "40%", "50%", "60%", "70%", "80%", "90%", "100%"];
                var input1 = 5;
                $(".slider1").slider({
                    //value: 5,
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
                            input1 = 10 - ui.value;
                            $("#art_tech").val(ui.value);
                            if (ui.value === 0)
                            {
                                $("#art_percentage").text("艺术性：" + ui.value + "%");
                                $("#technology_percentage").text("科技性：" + input1 + "0%");
                            } else if (ui.value === 10) {
                                $("#art_percentage").text("艺术性：" + ui.value + "0%");
                                $("#technology_percentage").text("科技性：" + input1 + "%");
                            } else
                            {
                                $("#art_percentage").text("艺术性：" + ui.value + "0%");
                                $("#technology_percentage").text("科技性：" + input1 + "0%");
                            }

                        });
                $(".slider1").slider({value: $("#art_tech").val()});


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

                checkuncheked();
                function checkuncheked() {
                    if ($('.question :checkbox:checked').length === 2) {
                        $('.question :checkbox').not(':checked').attr('disabled', true);
                    }
                }
            });



        </script>

    </body>
</html>