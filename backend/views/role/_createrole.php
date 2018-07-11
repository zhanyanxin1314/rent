<?php

use \backend\services\DataHelper;
use \backend\services\UrlService;
use \backend\services\StaticService;

?>

<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-admin-role-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>角色名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  placeholder="" id="roleName" name="name" value="<?=$info?$info['name']:'';?>" >
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
				<input type="hidden" name="id" value="<?=$info?$info['id']:'';?>"/>
				<button type="submit" class="btn btn-success radius" id="admin-role-save" name="admin-role-save"><i class="icon-ok"></i> 确定</button>
			</div>
		</div>
	</form>
</article>
<script type="text/javascript">
$(function(){
    $('#form-admin-role-add').submit(function(evt){
        evt.preventDefault();//阻止浏览器自己的submit
	var name = $('#roleName').val();
	if(name == ''){
		layer.msg('角色名称不能为空!',{icon:2,time:3000});
		return false;
	}
        var shuju = $(this).serialize();
        $.ajax({
	    url:'<?=UrlService::buildUrl("/role/create-role");?>',
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

