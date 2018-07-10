<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

?>

<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="username" name="username">
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
	<!--<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<div class="radio-box">
				<input name="sex" type="radio" id="sex-1" checked>
				<label for="sex-1">男</label>
			</div>
			<div class="radio-box">
				<input type="radio" id="sex-2" name="sex">
				<label for="sex-2">女</label>
			</div>
		</div>
	</div>-->
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="mobile" name="mobile">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="@" name="email" id="email">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">角色：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="adminRole" size="1">
				<option value="0">超级管理员</option>
				<option value="1">总编</option>
				<option value="2">栏目主辑</option>
				<option value="3">栏目编辑</option>
			</select>
			</span> </div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">备注：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea name="" cols="" rows="" class="textarea"  placeholder="说点什么...100个字符以内" dragonfly="true" onKeyUp="$.Huitextarealength(this,100)"></textarea>
			<p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
		</div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

<script type="text/javascript">
$(function(){
	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
/*	function aaa(){
	$("#form-admin-add").validate({
		rules:{
			username:{
				required:true,
				minlength:4,
				maxlength:16
			},
			password_hash:{
				required:true,
			},
			password2:{
				required:true,
				equalTo: "#password_hash"
			},
			sex:{
				required:true,
			},
			mobile:{
				required:true,
				isPhone:true,
				
			},
			email:{
				required:true,
				email:true,
			},
			adminRole:{
				required:true,
			},
		},
                messages: { 
			   password_hash : "请输入初始密码!",
			   password2 : "请输入确认密码!",
                	   mobile : "请输入手机号码!",
			   email : "请输入邮箱!",
    		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
	});
}*/


        //添加表单提交动作
    $('#form-admin-add').submit(function(evt){
        evt.preventDefault();//阻止浏览器自己的submit
	var username = $('#username').val();
	if(username == ''){
		layer.msg('管理员不能为空!',{icon:2,time:3000});
		return false;
	}
        var shuju = $(this).serialize();

        $.ajax({
            url:'<?= Url::to(['/manage/add']);?>',
            data:shuju,
            dataType:'json',
            type:'post',
            success:function(msg){
		alert(msg.code);
                if(msg.code==="success"){
                    //alert('添加课时成功');
                    //layer.msg('添加课时成功!',{icon:1,time:5000});
		
                   // layer.alert('添加课时成功', function(index){
                        //parent.mydatatable.api().ajax.reload();//刷新父页面,即刷新datatable
			var index = parent.layer.getFrameIndex(window.name);
                     	parent.window.location.href = parent.window.location.href; //父页面刷新
			parent.layer.close(index);
                       // layer_close();//关闭当前弹出层
                    //});
                }else{
                    //alert('添加课时失败【'+msg.errorinfo+'】');
                    layer.alert('添加课时失败【'+msg.errorinfo+'】',{icon:5});
                }
            }
        });
    });
});
</script> 
