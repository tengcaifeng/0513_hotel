var varietyButton =0;
var addCount = 0;
$(".varietyBox .moreSelect").click(function () {
    $(".varietyBox .buttonBox").css("display","block");
    varietyButton =1;
})
$(".varietyBox ul li").click(function () {
    var _this1= this;
    var content =$(this).find("a").html();

    /*自己写的去触发datatables的全局搜索事件*/
    $('.global_filter').val(content);
    filterGlobal();
    /*自己写的去触发datatables的全局搜索事件*/


    var count=0;
    $(".searchTerm .selected .my-content").each(function (){
        var _this=this;
        // console.log($(_this).html())
        if($(_this).html()!= content){
            count++;
        }
    })
    /* --------*/
    //如果已经是选中的就去除seleced样式
    if($(this).hasClass("selected")){
        $(this).removeClass("selected");
        $(this).find("a").css("color","#000");

        var tempname = $(this).find("a").html();
        $(".my-content").each(function(){
            //console.info($(this).html());
            if($(this).html()==tempname){
                $(this).parent().remove();
            }
        })
        return;
    }
    if($(".searchTerm .selected").length == count){
        var addInfo ="<div href='#' class='selected'><span class='my-content' style='margin-right: 10px;'>"+content+"</span><span class='close' style='display: inline-block;height: 100%;'>x</span></div>";
        $(this).children().css("color","#fff");
        $(".selected a").css("color","#fff");
        addCount++;
    }else{

    }
    if(varietyButton == 0 && addCount > 1){
        if($(".searchTerm .selected").length == 0){
            var addInfo ="<div href='#' class='selected'><span class='my-content' style='margin-right: 10px;'>"+content+"</span><span class='close' style='display: inline-block;height: 100%;'>x</span></div>";
            $(this).children().css("color","#fff");
            $(".selected a").css("color","#fff");
            addCount++;
            $(".searchTerm .resultBox").append(addInfo);
            $(_this1).addClass("selected");
        }
//            单选
        $(".searchTerm .selected .my-content").html(content);
        $(".varietyBox ul li").each(function(){
            $(this).removeClass("selected");
            $(this).find("a").css("color","#000");
            $(this).find("p").css("color","#000");
        })
        $(_this1).addClass("selected");
        $(_this1).find("a").css("color","#fff");

    }else{
        $(".searchTerm .resultBox").append(addInfo);
        $(_this1).addClass("selected");
    }

})

//取消按钮
/*$(".returnBack").click(function () {
    $(".resultBox .selected").each(function () {
        var _this = this;
//            上面的结果
        var result =$(this).find(".my-content").html();
        //console.log("result："+result)
        $(".varietyBox .selected").each(function () {
//                选择的
            var select =$(this).find("a").html();
            //console.log("select："+select)
            if (result == select){
                //console.log("有相等的");
                $(_this).remove();
                $(this).removeClass("selected");
                $(this).find("a").css("color","#000");
            }
        })

    })

})*/

$(".searchTerm").delegate(".close","click",function(){
    var _this1 = this;

    /*自己写的去触发datatables的全局搜索事件*/
    $('.global_filter').val('');
    filterGlobal();
    /*自己写的去触发datatables的全局搜索事件*/

    $(".varietyBox ul li").each(function(){

        var _this =this;
        // console.log($(_this1).parent().find(".my-content").html());
        if($(_this).find("a").html()==$(_this1).parent().find(".my-content").html()){
            $(_this).removeClass("selected");
            $(_this).find("a").css("color","#000")
            $(_this).find("p").css("color","#ffffff")

        }

    })
    $(this).parent().remove();
})

$(".buttonBox button").click(function () {
    $(".buttonBox").css("display","none");
})

$(".clearAll").click(function () {
    $(".searchTerm").find(".selected").remove();
    $(".varietyBox ul li").removeClass("selected");
    $(".varietyBox ul li a").css("color","#000");
    $(".varietyBox ul li p").css("color","#fbfbfb");


    /*自己写的去触发datatables的全局搜索事件*/
    $('.global_filter').val('');
    filterGlobal();
    /*自己写的去触发datatables的全局搜索事件*/
})

