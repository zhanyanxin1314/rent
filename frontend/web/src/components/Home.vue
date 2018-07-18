<template>

 <div class="app">
        <!-- 页面头部 -->
        <header>

            <div class="banner-roll">
                <div class="banner-item">
                    <div class="ite" style="background-image: url(../img/widget-banner1.png);"></div>
                    <div class="ite" style="background-image: url(../img/widget-banner2.png);"></div>
                    <div class="ite" style="background-image: url(../img/widget-banner3.png);"></div>
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
                <div class="searchMap"><i class="icon-map" @click="toLogin()"></i></div>
            </div>

        </header>
        <div class="contentBox">
            <!--头部导航-->
            <nav>
                <div>
		    <img :src="navSrc1" alt="">
                    <p>整租</p>
                </div>
                <div>
		    <img :src="navSrc2" alt="">
                    <p>合租</p>
                </div>
                <div>
		    <img :src="navSrc3" alt="">
                    <p>地图找房</p>
                </div>
                <div>
		    <img :src="navSrc4" alt="">
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
		   	<div><img :src="groupSrc1" alt=""></div>
                    </div>
                    <div class="item">
                        <div class="info">
                            <p class="name">宜居四五环</p>
                            <p class="des">归属的感觉</p>
                        </div>
		   	<div><img :src="groupSrc2" alt=""></div>
                    </div>
                    <div class="item">
                        <div class="info">
                            <p class="name">喧嚣三里屯</p>
                            <p class="des">归属的感觉</p>
                        </div>
		   	<div><img :src="groupSrc3" alt=""></div>
                    </div>
                    <div class="item">
                        <div class="info">
                            <p class="name">毗邻十号线</p>
                            <p class="des">地铁心连心</p>
                        </div>
		   	<div><img :src="groupSrc4" alt=""></div>
                    </div>
                </div>
            </div>

            <div class="contItem" style="margin-bottom:10px;">
                <div class="title">
                    租房资讯
                </div>
                <div class="cont">
                    <div class="itemC">
		   	<div><img :src="itSrc1" alt=""></div>
                        <div class="message">
                            <p class="name">置业选择 | 安贞西里 三室一厅 河间的古雅别院 </p>
                            <p class="lab"><span>限购</span><span>租房</span></p>
                            <p class="source"><span>两天前</span></p>
                        </div>
                    </div>

                    <div class="itemC">
		   	<div><img :src="itSrc2" alt=""></div>
                        <div class="message">
                            <p class="name">置业选择 | 安贞西里 三室一厅 河间的古雅别院 </p>
                            <p class="lab"><span>限购</span><span>租房</span></p>
                            <p class="source"><span>两天前</span></p>
                        </div>
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
        <div class="sort">
        </div>
        <!--//  排序弹框 -->
        <div class="selPop">
            <div class="selItem">
                <div>
                    <div class="itemes">
                        <li><i></i> 按时间排序</li>
                        <li><i></i> 价格排序（高 - 低）</li>
                        <li><i></i> 价格排序（低 - 高）</li>
                    </div>
                </div>
                <div class="selCan">取消</div>
            </div>
        </div>

        <!-- 页面底部 -->
        <!--底部版权-->
        <footer>
            <div class="active"><i class="icon-ind"></i>首页</div>
            <div><i class="icon-findHouse"></i>找房</div>
            <div><i class="icon-infom"></i>资讯</div>
            <div><i class="icon-my"></i>我的</div>
        </footer>
    </div> 
</template> 
 
<script> 
 
import Auth from '../services/auth.js' 
 
export default { 
  data(){ 
    return { 
      msg:"",
      navSrc1:"../static/img/widget-nav-1.png",
      navSrc2:"../static/img/widget-nav-2.png",
      navSrc3:"../static/img/widget-nav-3.png",
      navSrc4:"../static/img/widget-nav-4.png",
      groupSrc1:"../static/img/widget-group-1.png", 
      groupSrc2:"../static/img/widget-group-2.png", 
      groupSrc3:"../static/img/widget-group-3.png", 
      groupSrc4:"../static/img/widget-group-4.png", 
      itSrc1:"../static/img/widget-it-1.png", 
      itSrc2:"../static/img/widget-it-2.png" 
    } 
  }, 
  created(){ 
 
    this.$http.get('/item').then((res)=>{ 
      this.msg = res.data.msg; 
    }) 
 
  }, 
  methods:{ 
    toLogin(){
      this.$router.push({path: '/login'})
    },
    logout(){ 
      Auth.logout() 
      this.$router.push({path:'/login'}) 
    } 
  } 
} 
</script> 
