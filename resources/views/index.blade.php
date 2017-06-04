<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="Bookmark" href="favicon.ico">
    <link rel="Shortcut Icon" href="favicon.ico"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="./admin/lib/html5.js"></script>
    <script type="text/javascript" src="./admin/lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="./admin/static/h-ui/css/H-ui.min.css"/>
    <link rel="stylesheet" type="text/css" href="./admin/lib/Hui-iconfont/1.0.8/iconfont.css"/>
    <link rel="stylesheet" type="text/css" href="./css/selectDemo.css"/>
    <link rel="stylesheet" type="text/css" href="./css/index.css"/>
    <title>酒店搜索网</title>
    <meta name="keywords" content="酒店排名系统，酒店推荐">
    <meta name="description" content="整合各大酒店类网站信息，综合排名推荐">

</head>
<body>
<div class="container">
    <table class="display table table-border table-bordered table-bg table-hover" border="0" cellspacing="5" cellpadding="5">
        <thead>
        <tr>
            <th colspan="2" style="text-align:center; font-size: 24px">酒店搜索网</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>城市</td>
            <td>
                <div class="info">
                    <div>
                        <select id="s_province" name="s_province" class="btn btn-lg "></select>  
                        <select id="s_city" name="s_city" class="btn btn-lg "></select>  
                        <select hidden id="s_county" name="s_county" ></select>
                    </div>
                {{--    <div id="show"></div>--}}
                </div>
            </td>
        </tr>
        <tr id="filter_global">
            <td>酒店类型</td>
            <td align="center">
                <input hidden type="text" class="global_filter" id="global_filter" value="">
                <div class="selectBox">
                    <div class="searchTerm">
                    </div>
                    <div class="varietyBox">
                        <ul>
                            <li class="firstCol selected" style="height:41px;">不限</li>
                            <li class="firstCol">经济型</li>
                            <li class="firstCol">豪华型/五星级酒店</li>
                            <li class="firstCol">高档型/四星级酒店</li>
                            <li class="firstCol">舒适型/三星级酒店</li>
                            <li class="firstCol">精品酒店</li>
                            <li class="firstCol">青年旅舍</li>
                            <li class="firstCol">公寓式酒店</li>
                            <li class="firstCol">客栈旅舍</li>
                            <li class="firstCol">更多酒店住宿</li>
                        </ul>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>价格区间</td>
            <td>

                <ul class="num_ul">
                    <li class="num_chose selected">不限</li>
                    <li class="num_chose">￥100-200</li>
                    <li class="num_chose">￥200-300</li>
                    <li class="num_chose">￥300-500</li>
                    <li class="num_chose">￥500以上</li>
                </ul>
                <input type="text" id="min" name="min " class="input-text radius size-S" style="width: 50px;margin-top: 8px;">--<input type="text" id="max" name="max" class="input-text radius size-S" style="width: 50px;margin-top: 8px;">
            </td>

        </tr>

        </tbody>
    </table>
    <div class="row hotel_content1">
        <div  class="col-xs-9 hotel_content2">
            <div class="hotel_content3">
                <!-- 表格开始 -->
                <table id="example" class="display table table-border table-bordered table-bg table-hover" cellspacing="0" width="100%">
                    <thead>
                    <tr class="text-c">
                        <th width="70%">酒店信息</th>
                        <th width="10%">评分</th>
                        <th width="20%">价格</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $k)
                        <tr  onmouseover="map_search('{{$k->city}},{{ $k->hotelName }}');" style="cursor: pointer;">
                            <td>
                                <div class="row">
                                    <div class="col-xs-4">
                                        {{--<img class="lazyload" alt="" width="180" height="120" data-original="{{ $k->hotelImage }}" />--}}
                                        <img src="{{ $k->hotelImage }}"  style="width: 180px;height: 120px;">
                                    </div>
                                    <div class="col-xs-8">
                                        <p class="hotelname clearfix">{{ $k->hotelName }} </p>
                                        <p class="hotelstars clearfix">{{ $k->hotelStars }}</p>
                                        <p class="hotelType "><i class="Hui-iconfont Hui-iconfont-feedback1" style="font-size: 20px;color: #272727;margin-right: 3px;"></i>{{ $k->hotelType }}</p>
                                        <a class="hotelType clearfix" href="{{ $k->hotelUrl }}" target=_blank>{{ $k->hotelUrl }}</a>
                                        <div class="address clearfix"><i class="Hui-iconfont Hui-iconfont-weizhi" style="font-size: 20px;color: #6c6c6c;margin-right: 3px;"></i>位于{{ $k->city }},<span style="color:#fd2835;display:inline-block;">{{ $k->address }}</span></div>
                                    </div>
                                </div>
                            </td>
                            <td>{{$k->hotelScore}}</td>
                            <td>{{$k->hotelPrice}} </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- 表格结束 -->
            </div>
        </div>
        <div class="col-xs-3 map_stage">
            <div style="width:300px;height:400px;" id="my_map"></div>
            <input hidden id="where" name="where" type="text" placeholder="请输入地址" style="width:300px; height:30px; font-size:16px; color:#272727;">
          {{--  <input id="but" type="button" value="地图查找" onClick="sear(document.getElementById('where').value);" />--}}
        </div>
    </div>
</div>


</body>
</html>
<script class="resources library" src="./js/area.js" type="text/javascript"></script>
<script type="text/javascript">_init_area();</script>

<script type="text/javascript" src="./admin/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="./admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="./admin/static/h-ui/js/H-ui.js"></script>

<script type="text/javascript" src="./admin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.2"></script>
<script type="text/javascript" src="./js/map.js"></script>

<script type="text/javascript">

 $(function(){
     var a = $('.map_stage'),
         b =a.offset();//返回或设置导航栏相对于文档的偏移(位置)
     //加个屏幕滚动事件，c是滚动条相当于文档最顶端的距离
     $(document).on('scroll',function(){
         var c = $(document).scrollTop();
          if(b.top<=c){
          a.css({'position':'fixed','top':'0px','left':b.left})
          }else{
          a.css({'position':'absolute','top':'296px','left':b.left})
          }
          })
          });

/*地图选项*/
function map_search(map_addr) {
    $('input[name=where]').val(map_addr);
    sear(document.getElementById('where').value);
}
 /*地图选项*/

 /*酒店类型选项*/
 $('.firstCol').click(function () {

     $(this).siblings().removeClass("selected");
     $(this).addClass('selected');

     $content = this.innerHTML;
     if($content == '经济型'){
         $('.global_filter').val('经济型');
         filterGlobal();
     }else if($content == '豪华型/五星级酒店'){
         $('.global_filter').val('豪华型/五星级酒店');
         filterGlobal();
     }else if($content == '高档型/四星级酒店'){
         $('.global_filter').val('高档型/四星级酒店');
         filterGlobal();
     }else if($content == '舒适型/三星级酒店'){
         $('.global_filter').val('舒适型/三星级酒店');
         filterGlobal();
     }else if($content == '精品酒店'){
         $('.global_filter').val('精品酒店');
         filterGlobal();
     }else if($content == '青年旅舍'){
         $('.global_filter').val('青年旅舍');
         filterGlobal();
     }else if($content == '公寓式酒店'){
         $('.global_filter').val('公寓式酒店');
         filterGlobal();
     }else if($content == '客栈旅舍'){
         $('.global_filter').val('客栈旅舍');
         filterGlobal();
     }else if($content == '更多酒店住宿'){
         $('.global_filter').val('更多酒店住宿');
         filterGlobal();
     }else if($content == '不限'){
         $('.global_filter').val('');
         filterGlobal();
     }
 })
 /*酒店类型选项*/

 /*酒店价格选项*/
$('.num_chose').click(function () {

    $(this).siblings().removeClass("selected");
    $(this).addClass('selected');

    $num = this.innerHTML;
    if($num == '￥100-200'){
        $('#min').val(100);
        $('#max').val(200);
    }else if($num == '￥200-300'){
        $('#min').val(200);
        $('#max').val(300);
    }else if($num == '￥300-500'){
        $('#min').val(300);
        $('#max').val(400);
    }else if($num == '￥500以上'){
        $('#min').val(500);
        $('#max').val('');
    }else if($num == '不限'){
        $('#min').val('');
        $('#max').val('');
    }
})
 /*酒店价格选项*/

  //展开全局搜索
    function filterGlobal() {
        $('#example').DataTable().search(
            $('#global_filter').val()
        ).draw();
    }
  //展开全局搜索

    //范围搜索
  $.fn.dataTable.ext.search.push(
      function (settings, data, dataIndex) {
          var min = parseInt($('#min').val(), 10);
          var max = parseInt($('#max').val(), 10);
          var age = parseFloat(data[2]) || 0; // use data for the age column

          if (( isNaN(min) && isNaN(max) ) ||
              ( isNaN(min) && age <= max ) ||
              ( min <= age && isNaN(max) ) ||
              ( min <= age && age <= max )) {
              return true;
          }
          return false;
      }
  );
  //范围搜索


  //当网页加载完成执行
 $(document).ready(function () {

     /*表格初始化调用的是dataTables插件*/
        var table = $('#example').DataTable({
            "dom": '<"top">rt<"bottom"lp>if<"clear">',
            "aaSorting": [[1, "desc"]],//默认第几个排序
            "bStateSave": false,//状态保存
            "aoColumnDefs": [
                //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                {"orderable": false, "aTargets": [0]}// 不参与排序的列
            ]
        });

     //执行范围搜索
      $('#min, #max').keyup(function () {
            table.draw();
        });
     $('.num_chose').click(function () {
         table.draw();a
     });
    });

  $(document).ajaxStart(function(){
      var lr = layer.load(0, {shade: false}); //0代表加载的风格，支持0-2
  });
  $(document).ajaxStop(function(){
      var hh = layer.load(1, {time:1,shade: false}); //0代表加载的风格，支持0-2
      layer.msg('加载完成', {icon:1, time:1000});
  });


    $('#s_city').change(function () {
        $('.hotel_content3').remove();
        $.ajax({
            type: 'post', // 提交方式 get/post
            url: 'query', // 需要提交的 url
            dataType: 'json',
            data: {
               /* s_province: $('select[name=s_province] option:selected').val(),*/
                s_city: $('select[name=s_city] option:selected').val(),
                _token: "{{csrf_token()}}"
            },
            success: function(data) {

                var text ='';
                   text+='  <div class="hotel_content3">'
                   text+='  <table id="example" class="display table table-border table-bordered table-bg table-hover" cellspacing="0" width="100%">'

                   text+='<thead>'
                   text+='<tr class="text-c">'
                   text+='<th width="70%">酒店信息</th>'
                   text+='<th width="10%">评分</th>'
                   text+='<th width="20%">价格</th>'
                   text+='</tr>'
                   text+='</thead>'
                   text+='<tbody>'
                       $.each(data,function () {
                           var cityName = this['city'];
                           var addr = this['address'];
                           var hotelname = this['hotelName'];
                           var images = this['hotelImage'];
                           var price = this['hotelPrice'];
                           var score = this['hotelScore'];
                           var stars = this['hotelStars'];
                           var hotelType = this['hotelType'];
                           text+='<tr onmouseover="map_search(\' '+cityName+'市,'+hotelname+'\');" style="cursor: pointer;">'
                           text+='<td>'
                           text+='<div class="row">'
                           text+='<div class="col-xs-4">'
                           text+='<img src="'+images+'" style="width: 180px;height: 120px;">'
                           text+='</div>'
                           text+='<div class="col-xs-8">'
                           text+='<p class="hotelname clearfix">'+hotelname+' </p>'
                           text+='<p class="hotelstars clearfix">'+stars+'</p>'
                           text+='<p class="hotelType "><i class="Hui-iconfont Hui-iconfont-feedback1" style="font-size: 20px;color: #272727;margin-right: 3px;"></i>'+hotelType+'</p>'
                           text+='<div class="address clearfix"  ><i class="Hui-iconfont Hui-iconfont-weizhi" style="font-size: 20px;color: #6c6c6c;margin-right: 3px;"></i>位于'+cityName+',<span style="color:#fd2835;display:inline-block;">'+addr+'</span></div>'
                           text+='</div>'
                           text+='</div>'
                           text+='</td>'
                           text+='<td>'+score+'</td>'
                           text+='<td>'+price+'</td>'
                           text+='</tr>'
                       });
                text+='</tbody>'
                text+='</table>'
                text+='</div>'
                $('.hotel_content2').append(text);
                function map_search(map_addr) {

                    $('input[name=where]').val(map_addr);
                    sear(document.getElementById('where').value);
                }

                $(document).ready(function () {
                    var table = $('#example').DataTable({
                        "dom": '<"top">rt<"bottom"lp>i<"clear">',
                        "aaSorting": [[1, "desc"]],//默认第几个排序
                        "bStateSave": false,//状态保存
                        "aoColumnDefs": [
                            //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
                            {"orderable": false, "aTargets": [0]}// 不参与排序的列
                        ]
                    });
                    /*去掉用全局搜索函数,里面的值就是input全里面的值*/
                    filterGlobal();

                    $('#min, #max').keyup(function () {
                        table.draw();
                    });
                    $('.num_chose').click(function () {
                        table.draw();
                    });

                });

            },

            error: function() {
                alert('网络错误');
            },
        });
    })
</script>