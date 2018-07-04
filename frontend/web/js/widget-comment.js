/*
 * Created by itcast_web on 17/7/27.
 */

/* *
js-select下拉 模拟
html结构

<div class="select">
    <div class="sdOpt ">北京 <i class="icon-arrow"></i></div>
    <div class="optes">
        <p>北京</p>
        <p>天津</p>
        <p>上海</p>
        <p>深圳</p>
    </div>
</div>
 * */

$(function () {
    $('.select .sdOpt').click(function (e) {
        $('.clikOpen').removeClass('openSelect')
        if(!$(this).parent().find('.clikOpen').hasClass('openSelect')){
            $(this).parent().find('.clikOpen').addClass('openSelect').removeClass('clsSelect')
        }else{
            $(this).parent().find('.clikOpen').addClass('clsSelect').removeClass('openSelect')
        }
    })
    $('.select .optes p').click(function (e) {
        $(this).parent().parent().find('.sdOpt span').text($(this).text())
        $(this).parent().addClass('clsSelect').removeClass('openSelect')
    })
})