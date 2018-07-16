<?php
use \backend\services\DataHelper;
use \backend\services\UrlService;
use \backend\services\StaticService;
?>

<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text"  placeholder="" id="adminName" name="username" value="<?=$info?$info['username']:'';?>">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>初始密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off" value="" placeholder="密码" id="password_hash" name="password_hash">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>确认密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" autocomplete="off"  placeholder="确认新密码" id="password2" name="password2">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="@" name="email" id="email" value="<?=$info?$info['email']:'';?>">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">角色：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
				<?php if( $role_list ):?>
					<?php foreach( $role_list as $_role_item ):?>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="role_ids[]" value="<?=$_role_item['id'];?>"
                                <?php if( in_array( $_role_item['id'] ,$related_role_ids ) ):?> checked <?php endif;?>
                                />
								<?=$_role_item['name'];?>
                            </label>
                        </div>
					<?php endforeach;?>
				<?php endif;?>
			</span> </div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input type="hidden" name="id" id="xgidps" value="<?=$info?$info['id']:0;?>">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

<script type="text/javascript">
$(function(){
    $('#form-admin-add').submit(function(evt){
        evt.preventDefault();
	var name = $('#adminName').val();
	var password_hash = $('#password_hash').val();
        var password2 = $('#password2').val();
	var xgidps = $('#xgidps').val();
	if(name == ''){
		layer.msg('管理员名称不能为空!',{icon:2,time:3000});
		return false;
	}
	if(xgidps == 0){
        if(password_hash == ''){
                layer.msg('初始密码不能为空!',{icon:2,time:3000});
                return false;
        }
        if(password2 == ''){
                layer.msg('确认密码不能为空!',{icon:2,time:3000});
                return false;
        }
        if(password_hash != password2){
                layer.msg('两次密码不一样!',{icon:2,time:3000});
                return false;
        }
        }
        var shuju = $(this).serialize();
        $.ajax({
	    url:'<?=UrlService::buildUrl("/user/create-user");?>',
            data:shuju,
            dataType:'json',
            type:'post',
            success:function(res){
                if(res.code == 200) {
			var index = parent.layer.getFrameIndex(window.name);
                     	parent.window.location.href = parent.window.location.href;
			parent.layer.close(index);
                } else {
                    layer.alert(res.msg,{icon:5});
                }
            }
        });
    });
});
</script> 
