/**
 * Created by Admin on 2015/10/25.
 */

var t = n =0, count;
$(document).ready(function(){
    count=$("#banner_list a").length;
    $("#banner_list a:not(:first-child)").hide();
    $("#banner_text_list a:not(:first-child)").hide();
    $("#banner li").click(function() {
        var i = $(this).text() -1;//获取Li元素内的值，即1，2，3，4
        n = i;
        if (i >= count) return;
        $("#banner_list a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
        $("#banner_text_list a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);
        document.getElementById("banner").style.background="";
        $(this).toggleClass("on");
        $(this).siblings().removeAttr("class");
    });
    t = setInterval("showAuto()", 4000);
    $("#banner").hover(function(){clearInterval(t)}, function(){t = setInterval("showAuto()", 4000);});
})

function showAuto()
{
    n = n >=(count -1) ?0 : ++n;
    $("#banner li").eq(n).trigger('click');
}
