<?php
use \backend\services\DataHelper;
use \backend\services\UrlService;
?>

<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-admin-access-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>父级权限</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="pid" class="select">
					<option value="0">请选择</option>
				        <?php foreach( $alllist as $_key => $_all ):?>
						<option <?php if(!empty($info['pid']) && $_all['id'] == $info['pid']):?>selected="selected"<?php endif; ?> value="<?=$_all['id'];?>">
					<?php echo str_repeat('--',$_all['level']);?>
					<?php echo $_all['title']?></option>
			  	        <?php endforeach;?>	
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>权限名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" placeholder="" id="accessTitle" name="title" value="<?=$info?$info['title']:'';?>">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">URLS：</label>
			<div class="formControls col-xs-8 col-sm-9">
		        <?php
		 		$urls = $info?@json_decode( $info['urls'],true ):[];
				$urls = $urls?$urls:[];
                        ?>
				<input type="text" class="input-text"  placeholder="" id="urls" name="urls" value="<?=implode("\r\n",$urls);?>">
格式 xxx/xxxx
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input type="hidden" name="id"  value="<?=$info?$info['id']:0;?>">
				<button type="submit" class="btn btn-success radius" id="admin-role-save" name="admin-role-save"><i class="icon-ok"></i> 确定</button>
			</div>
		</div>
	</form>
</article>

<script type="text/javascript">
$(function(){
    $('#form-admin-access-add').submit(function(evt){
        evt.preventDefault();
	var title = $('#accessTitle').val();
	if(title == ''){
		layer.msg('权限名称不能为空!',{icon:2,time:3000});
		return false;
	}
        var shuju = $(this).serialize();
        $.ajax({
	    url:'<?=UrlService::buildUrl("/access/create-access");?>',
            data:shuju,
            dataType:'json',
            type:'post',
            success:function(res){
		
                if(res.code == 200) {
			var index = parent.layer.getFrameIndex(window.name);
                     	parent.window.location.href = parent.window.location.href; //父页面刷新
			parent.layer.close(index);
                } else {
                    layer.alert(res.msg,{icon:5});
                }
            }
        });
    });
});
</script> 


