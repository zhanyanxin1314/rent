<?php

use yii\helpers\Url;
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = '好客租房';
?>

<?=Html::jsFile('@web/js/jquery.js')?>
<?=Html::jsFile('@web/js/vue.js')?>
<?=Html::jsFile('@web/js/vue-resource.js')?>

   	<div id="app">
	{{ obj | json }}
		<button @click = "getdata">get请求</button>
	
	</div>

<script>
var vm = new Vue({
	el :'#app',
	data:{
		obj:null
	},
	methods:{
		getdata:function(){
			// 1.0 请求的url
			var url = 'http://120.79.212.63:8097/v1/goods/demo'

			// 2.0 利用 vue-resource发出ajax的get请求
			this.$http.get(url)  //发出请求
			.then(function(response){
				/**response.body 就是获取到 http://vueapi.ittun.com/api/getprodlist 响应回来的数据格式为：
				{
				  "status": 0,
				  "message": [
				    {
				      "id": 1,
				      "name": "奥迪",
				      "ctime": "2017-02-07T10:32:07.000Z"
				    },
				    {
				      "id": 2,
				      "name": "宝马",
				      "ctime": "2017-02-07T10:32:17.000Z"
				    }
				  ]
				}*/
				this.obj = response.body;

			}) // 获取服务器响应回来的数据
		}
	}
});
</script>
    <div class="app">
        <!-- 页面头部 -->
        <header>

            <div class="banner-roll">
                <div class="banner-item">
                    <div class="ite" style="background-image: url(/images/widget-banner1.png);"></div>

                    <div class="ite" style="background-image: url(/images/widget-banner2.png);"></div>
                    <div class="ite" style="background-image: url(/images/widget-banner3.png);"></div>
                </div>
                <div class="indicators"></div>
            </div>
            <div class="searchBox">
                <div class="search">
                    <div class="select">
                        <div class="sdOpt"><span>北京</span> <i class="icon-arrow"></i></div>
                        <div class="optes">
                            <p>北京</p>
                            <p>天津</p>
                            <p>上海</p>
                            <p>深圳</p>
                        </div>
                    </div>
                    <div class="searchInput"><i class="icon-seach"></i><input type="text" placeholder="请输入小区或地址"></div>
                </div>
                <div class="searchMap"><i class="icon-map"></i></div>
            </div>

        </header>
        <div class="contentBox">
            <!--头部导航-->
            <nav>
                <div>
                    <img src="<?= Url::to('@web/images/widget-nav-1.png');?>" alt="">
                    <p>整租</p>
                </div>
                <div>
                    <img src="<?= Url::to('@web/images/widget-nav-2.png');?>" alt="">
                    <p>合租</p>
                </div>
                <div>
                    <img src="<?= Url::to('@web/images/widget-nav-3.png');?>" alt="">
                    <p>地图找房</p>
                </div>
                <div>
                    <img src="<?= Url::to('@web/images/widget-nav-4.png');?>" alt="">
                    <p>去出租</p>
                </div>
            </nav>

            <div class="group">
                <div class="tit">
                    租房小组
                    <span>更多</span>
                </div>
                <div class="cont">
                    <div class="item">
                        <div class="info">
                            <p class="name">家住回龙观</p>
                            <p class="des">归属的感觉</p>
                        </div>
                        <div><img src="<?= Url::to('@web/images/widget-group-1.png');?>" alt=""></div>
                    </div>
                    <div class="item">
                        <div class="info">
                            <p class="name">宜居四五环</p>
                            <p class="des">归属的感觉</p>
                        </div>
                        <div><img src="<?= Url::to('@web/images/widget-group-2.png');?>" alt=""></div>
                    </div>
                    <div class="item">
                        <div class="info">
                            <p class="name">喧嚣三里屯</p>
                            <p class="des">归属的感觉</p>
                        </div>
                        <div><img src="<?= Url::to('@web/images/widget-group-3.png');?>" alt=""></div>
                    </div>
                    <div class="item">
                        <div class="info">
                            <p class="name">毗邻十号线</p>
                            <p class="des">地铁心连心</p>
                        </div>
                        <div><img src="<?= Url::to('@web/images/widget-group-4.png');?>" alt=""></div>
                    </div>
                </div>
            </div>

            <div class="contItem">
                <div class="title">
                    推荐房源
                </div>
                <div class="contNav">
                    <div class="select">
                        <div class="sdOpt "><span>区域</span> <i class="icon-arrow"></i></div>
                        <div class="clikOpen optes">
                            <p>北京</p>
                            <p>天津</p>
                            <p>上海</p>
                            <p>深圳</p>
                        </div>
                    </div>
                    <div class="select">
                        <div class="sdOpt "><span>方式</span> <i class="icon-arrow"></i></div>
                        <div class="clikOpen optes">
                            <p>北京</p>
                            <p>天津</p>
                            <p>上海</p>
                            <p>深圳</p>
                        </div>
                    </div>
                    <div class="select">
                        <div class="sdOpt "><span>租金</span> <i class="icon-arrow"></i></div>
                        <div class="clikOpen optes">
                            <p>北京</p>
                            <p>天津</p>
                            <p>上海</p>
                            <p>深圳</p>
                        </div>
                    </div>
                    <div class="select">
                        <div class="sdOpt "><span>筛选</span> <i class="icon-arrow"></i></div>
                        <div class="clikOpen optes-block">
                            <div class="sl-mask"></div>
                            <div class="sl-itembox">
                                <div class="sl-items">
                                    <div class="tit">户型</div>
                                    <div><span>一局</span><span>两局</span><span>三局</span><span>四局</span></div>
                                </div>
                                <div class="sl-items">
                                    <div class="tit">朝向</div>
                                    <div><span>东</span><span>南</span><span>西</span><span>北</span><span>东南</span></div>
                                </div>
                                <div class="sl-items">
                                    <div class="tit">楼层</div>
                                    <div><span>低楼层</span><span>中楼层</span><span>高楼层</span></div>
                                </div>
                                <div class="sl-items">
                                    <div class="tit">电梯</div>
                                    <div><span>有电梯</span><span>无电梯</span></div>
                                </div>
                            </div>
                            <div class="sl-but"><span class="clear">清除</span><span class="el-sub">确定</span></div>
                        </div>
                    </div>
                </div>

                <div class="cont">
                    <div class="item">
                        <div><img src="<?= Url::to('@web/images/widget-it-1.png');?>" alt=""></div>
                        <div class="message">
                            <!--看房记录需要以下标签 -->
                            <!--<div class="iconText cl-ready"></div>-->
                            <!--<div class="iconText cl-end"></div>-->
                            <!--<div class="iconText cl-fail"></div>-->
                            <p class="name">安贞西里 三室一厅</p>
                            <p class="des">72.32㎡/南 北/低楼层</p>
                            <p class="lab"><span class="lab1">押一付三</span> <span class="lab2">免押金</span> <span class="lab3">精装</span></p>
                            <p class="pic"><em>4500</em>/月</p>
                        </div>
                    </div>
                    <div class="item">
                        <div><img src="<?= Url::to('@web/images/widget-it-1.png');?>" alt=""></div>
                        <div class="message">
                            <!--看房记录需要以下标签 -->
                            <!--<div class="iconText cl-ready"></div>-->
                            <!--<div class="iconText cl-end"></div>-->
                            <!--<div class="iconText cl-fail"></div>-->
                            <p class="name">安贞西里 三室一厅</p>
                            <p class="des">72.32㎡/南 北/低楼层</p>
                            <p class="lab"><span class="lab1">押一付三</span> <span class="lab2">免押金</span> <span class="lab3">精装</span></p>
                            <p class="pic"><em>4500</em>/月</p>
                        </div>
                    </div>
                    <div class="item">
                        <div><img src="<?= Url::to('@web/images/widget-it-1.png');?>" alt=""></div>
                        <div class="message">
                            <!--看房记录需要以下标签 -->
                            <!--<div class="iconText cl-ready"></div>-->
                            <!--<div class="iconText cl-end"></div>-->
                            <!--<div class="iconText cl-fail"></div>-->
                            <p class="name">安贞西里 三室一厅</p>
                            <p class="des">72.32㎡/南 北/低楼层</p>
                            <p class="lab"><span class="lab1">押一付三</span> <span class="lab2">免押金</span> <span class="lab3">精装</span></p>
                            <p class="pic"><em>4500</em>/月</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sort"><img src="<?= Url::to('@web/images/page-sort.png');?>" alt=""></div>
        <!-- 页面底部 -->
        <!--底部版权-->
        <footer>
            <div class="active"><i class="icon-ind"></i>首页</div>
            <div><i class="icon-findHouse"></i>找房</div>
            <div><i class="icon-infom"></i>资讯</div>
            <div><i class="icon-my"></i>我的</div>
        </footer>
    </div>
    <script>
        $(function() {
            var ht = $('.banner-item').width() * 0.565
            var tg = $('.banner-item .ite');
            var num = 0;
            for (i = 0; i < tg.length; i++) {
                $('.indicators').append('<span></span>');
                $('.indicators').find('span').eq(num).addClass('active');
            }
            $(".banner-item,.banner-roll").css('height', ht)

            function roll() {
                tg.eq(num).animate({
                    'opacity': '1',
                    'z-index': num
                }, 2000).siblings().animate({
                    'opacity': '0',
                    'z-index': 0
                }, 2000);
                $('.indicators').find('span').eq(num).addClass('active').siblings().removeClass('active');
                if (num >= tg.length - 1) {
                    num = 0;
                } else {
                    num++;
                }
            }
            $('.indicators').find('span').click(function() {
                num = $(this).index();
                roll();
            });
            var timer = setInterval(roll, 2000);
            $('.banner-item').mouseover(function() {
                clearInterval(timer)
            });
            $('.banner-item').mouseout(function() {
                timer = setInterval(roll, 2000)
            });
        })
        $(window).resize(function() {
            var ht = $('.banner-item').find('img').eq(0).height()
            $(".banner-item,.banner-roll").css('height', ht)
        });


        var data = {}
        $('.sl-items span').click(function(e) {
            $(this).addClass('act').siblings('span').removeClass('act')
            var key = $(this).parent().parent().find('.tit').text()
            var val = $(this).text()
            data[key] = val
        })
        $('.clear').click(function() {
            data = []
            $('.sl-items span').removeClass('act')
        })
        $('.el-sub').click(function() {
            console.log(data)
            $('.clikOpen').removeClass('openSelect')
        })


        $('footer div').click(function() {
            $(this).addClass('active').siblings().removeClass('active')
        })
    </script>
