$(document).ready(function(){

    /****** 隱藏、出現 ******/
    /* 隱藏 - 預設值 */
    $('#btn-hide1').click(function(){
        $('#div-hideshow1').hide(3000);
    });

    /* 出現 - 預設值 */
    $('#btn-show1').click(function(){
        $('#div-hideshow1').show(3000);
    });

    /* 增加、移除 CSS */
    $("#addrecss").mouseover(function(){
        $('#addrecss').addClass('addCss1');
    });
    $("#addrecss").mouseout(function(){
        $('#addrecss').removeClass('addCss1');
    });

/*    $('.tab4s').each(function(){
        $(this).mouseover(function(){
            $(this).find('.tab4s-tit').stop().fadeOut(1000);
        });
        $(this).mouseout(function(){
            $(this).find('.tab4s-tit').stop().fadeIn(1000);
        });
    });*/

    $('.tab4s-himg').addClass('tab4s-addHide');
    $('.tab4s-himg').addClass('tab4s-addCSS1');
    $('.tab4s').each(function(){
        $(this).mouseover(function(){
            $(this).find('.tab4s-tit').stop().fadeOut(1000);
            $(this).find('.tab4s-img').stop().animate({top:'-100'}, 300);
            $(this).find('.tab4s-img').addClass('tab4s-addCSS2');
            $(this).find('.tab4s-himg').removeClass('tab4s-addHide');
        });
        $(this).mouseout(function(){
            $(this).find('.tab4s-tit').stop().fadeIn(1000);
            $(this).find('.tab4s-img').stop().animate({top:'0'}, 300);
            $(this).find('.tab4s-img').removeClass('tab4s-addCSS2');
            $(this).find('.tab4s-himg').addClass('tab4s-addHide');
        });
    });

    /* 版頭按鈕列 - 固定、解除 Part1 */
    $(window).scroll(function(){
        var headH = $('.headArea').height(); // 取得版頭.headArea區塊的高度
        var scrollH = $(window).scrollTop(); // 取得目前捲軸捲動的高度
        if (scrollH > headH) { 		
            $('.headBtnArea').addClass('headbtn-fixed');
        } else {		
            $('.headBtnArea').removeClass('headbtn-fixed');
        }
    });
});