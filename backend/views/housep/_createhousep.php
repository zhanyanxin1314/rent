<?php

use \backend\services\DataHelper;
use \backend\services\UrlService;
use \backend\services\StaticService;

?>

<article class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-house-params-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3">参数选项：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
				<select class="select" name="cat" size="1">
					<option <?php if(!empty($info) && $info['cat'] == 1):?>selected="selected"<?php endif;?> value="1">租金</option>
					<option <?php if(!empty($info) && $info['cat'] == 2):?>selected="selected"<?php endif;?> value="2">楼层</option>
					<option <?php if(!empty($info) && $info['cat'] == 3):?>selected="selected"<?php endif;?> value="3">朝向</option>
					<option <?php if(!empty($info) && $info['cat'] == 4):?>selected="selected"<?php endif;?> value="4">押金方式</option>
					<option <?php if(!empty($info) && $info['cat'] == 5):?>selected="selected"<?php endif;?>value="5">装修方式</option>
					<option <?php if(!empty($info) && $info['cat'] == 6):?>selected="selected"<?php endif;?>value="6">户型</option>
					<option <?php if(!empty($info) && $info['cat'] == 7):?>selected="selected"<?php endif;?>value="7">电梯</option>
					<option <?php if(!empty($info) && $info['cat'] == 8):?>selected="selected"<?php endif;?>value="8">租房方式</option>
					<option <?php if(!empty($info) && $info['cat'] == 9):?>selected="selected"<?php endif;?>value="9">类型</option>
					<option <?php if(!empty($info) && $info['cat'] == 10):?>selected="selected"<?php endif;?>value="10">房屋年代</option>
					<option <?php if(!empty($info) && $info['cat'] == 11):?>selected="selected"<?php endif;?>value="11">房型</option>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>参数名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text"  placeholder="" id="title" name="title" value="<?=$info?$info['title']:'';?>" >
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
    $('#form-house-params-add').submit(function(evt){
        evt.preventDefault();
	var title = $('#title').val();
	if(title == ''){
		layer.msg('参数名称不能为空!',{icon:2,time:3000});
		return false;
	}
        var shuju = $(this).serialize();
        $.ajax({
	    url:'<?=UrlService::buildUrl("/housep/create-housep");?>',
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

