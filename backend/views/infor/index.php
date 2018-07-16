<?php

use \backend\services\DataHelper;
use \backend\services\UrlService;
use yii\helpers\Html;

$this->title = '好客租房-后台';
?>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 资讯管理 <span class="c-gray en">&gt;</span> 资讯列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="cl pd-5 bg-1 bk-gray"> <span class="l"> <a class="btn btn-primary radius" href="javascript:;" onclick="admin_infor_add('添加资讯','<?=UrlService::buildUrl("/infor/create-infor");?>','800')"><i class="Hui-iconfont">&#xe600;</i> 添加资讯</a> </span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<table class="table table-border table-bordered table-hover table-bg">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" value="" name=""></th>
				<th width="200">标题</th>
				<th width="300">创建时间</th>
				<th width="70">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if( $models ):?>
			<?php foreach ($models as $m): ?>
			<tr class="text-c">
				<td><input type="checkbox" value="" name=""></td>
				<td><?= Html::encode("{$m->title}") ?></td>
				<td><?= date('Y-m-d', Html::encode("{$m->created_at}")) ?></td>
				<td class="f-14">&nbsp;&nbsp;<a title="编辑" href="javascript:;" onclick="admin_infor_edit('资讯编辑','<?=UrlService::buildUrl("/infor/create-infor",[ 'id' => $m['id'] ]);?>','1')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <!--<a title="删除" href="javascript:;" onclick="admin_role_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a><--></td>

			</tr>
			<?php endforeach;?>
			 <?php else:?> 
                        <tr> <td colspan="5" style="text-align:center;">暂无资讯</td> </tr>
                        <?php endif;?>

		</tbody>
	</table>
</div>

<script type="text/javascript">
/*管理员-角色-添加*/
function admin_infor_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-角色-编辑*/
function admin_infor_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*管理员-角色-删除*/
function admin_role_del(obj,id){
	layer.confirm('角色删除须谨慎，确认要删除吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").remove();
				layer.msg('已删除!',{icon:1,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}
</script>
