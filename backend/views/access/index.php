<?php
use \backend\services\DataHelper;
use \backend\services\UrlService;
?>

<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> 权限管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c">
		<form class="Huiform" method="post" action="" target="_self">
			<input type="text" class="input-text" style="width:250px" placeholder="权限名称" id="" name="">
			<button type="submit" class="btn btn-success" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜权限节点</button>
		</form>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l"><a href="javascript:;" onclick="admin_permission_add('添加权限节点','<?=UrlService::buildUrl("/access/create-access");?>','','310')" class="btn btn-primary radius"><i class="Hui-iconfont">&#xe600;</i> 添加权限节点</a></span> <span class="r">共有数据：<strong>54</strong> 条</span> </div>
	<table class="table table-border table-bordered table-bg">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="200">权限名称</th>
				<th>Urls</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
			<?php if( $models ):?>
			<?php foreach( $models as $_key => $_access_info ):?>
			<?php
				$tmp_urls = @json_decode( $_access_info['urls'],true );
				$tmp_urls = $tmp_urls?$tmp_urls:[];
			?>
			<tr class="text-c">
				<td><input type="checkbox" value="1" name=""></td>
				<td><?=$_access_info['id'];?></td>
				<td>&nbsp;<?php echo str_repeat('&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;',$_access_info['level']);?><?php echo $_access_info['title']?></td>
				<td><?=implode("<br/>",$tmp_urls);?></td>
				<td><a title="编辑" href="javascript:;" onclick="admin_permission_edit('角色编辑','<?=UrlService::buildUrl("/access/create-access",[ 'id' => $_access_info['id'] ]);?>','1','','310')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a> <a title="删除" href="javascript:;" onclick="admin_permission_del(this,'1')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
			<?php endforeach;?>
			<?php else:?>
			<tr> <td colspan="5" style="text-align:center;">暂无权限</td> </tr>
			<?php endif;?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
/*
	参数解释：
	title	标题
	url		请求的url
	id		需要操作的数据id
	w		弹出层宽度（缺省调默认值）
	h		弹出层高度（缺省调默认值）
*/
/*管理员-权限-添加*/
function admin_permission_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*管理员-权限-编辑*/
function admin_permission_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}

/*管理员-权限-删除*/
function admin_permission_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
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
