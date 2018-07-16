<?php

use \backend\services\DataHelper;
use \backend\services\UrlService;

?>

<div class="page-container">
	<form action="" method="post" class="form form-horizontal" id="form-house-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>房源名称：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="" placeholder="" id="hname" name="hname">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>租金：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="hrent" class="select">
					<option value="bx">不限</option>
					<option value="8-0">800元以下</option>
					<option value="8-1">800-1500元</option>
					<option value="1-2">1500-2000元</option>
					<option value="2-3">2000-3000元</option>
					<option value="3-5">3000-5000元</option>
					<option value="5-6">5000-6500元</option>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>楼层：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="hfloor" class="select">
					<option value="bx">不限</option>
					<option value="small">低楼层</option>
					<option value="middle">中楼层</option>
					<option value="big">高楼层</option>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>朝向：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="htoward" class="select">
					<option value="bx">不限</option>
					<option value="dong">东</option>
					<option value="nan">南</option>
					<option value="xi">西</option>
					<option value="bei">北</option>
					<option value="dn">东南</option>
					<option value="xb">西北</option>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>押金方式：</label>

			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="hdeposit" class="select">
					<option value="myj">免押金</option>
					<option value="yyfy">押一付一</option>
					<option value="yyfs">押一付三</option>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>装修方式：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="hdecorate" class="select">
					<option value="bx">不限</option>
					<option value="jzx">精装修</option>
					<option value="ptzx">普通装修</option>
					<option value="hhzx">豪华装修</option>
					<option value="zdzx">中等装修</option>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>户型：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="hmodel" class="select">
					<option value="bx">不限</option>
					<option value="yj">一局</option>
					<option value="lj">两居</option>
					<option value="sj">三局</option>
					<option value="sij">四局</option>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>电梯：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="helevator" class="select">
					<option value="bx">不限</option>
					<option value="wdt">无电梯</option>
					<option value="ydt">有电梯</option>
				</select>
				</span> </div>
		</div>
		
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">排序：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="0" name="hsort">
			</div>
		</div>
		<!--<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">缩略图：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-thum-container">
					<div id="fileList" class="uploader-list"></div>
					<div id="filePicker">选择图片</div>
					<button id="btn-star" class="btn btn-default btn-uploadstar radius ml-10">开始上传</button>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">图片上传：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<div class="uploader-list-container">
					<div class="queueList">
						<div id="dndArea" class="placeholder">
							<div id="filePicker-2"></div>
							<p>或将照片拖到这里，单次最多可选300张</p>
						</div>
					</div>
					<div class="statusBar" style="display:none;">
						<div class="progress"> <span class="text">0%</span> <span class="percentage"></span> </div>
						<div class="info"></div>
						<div class="btns">
							<div id="filePicker2"></div>
							<div class="uploadBtn">开始上传</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">详细内容：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<script id="editor" type="text/plain" style="width:100%;height:400px;"></script> 
			</div>
		</div>-->
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<input type="hidden" name="hid"  value="<?=$info?$info['hid']:0;?>">
				<button  class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存并提交审核</button>
				<button onClick="layer_close();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
$(function(){
    $('#form-house-add').submit(function(evt){
        evt.preventDefault();
	var hname = $('#hname').val();
	if(hname == ''){
		layer.msg('房源名称不能为空!',{icon:2,time:3000});
		return false;
	}
        var shuju = $(this).serialize();
        $.ajax({
	    url:'<?=UrlService::buildUrl("/house/create-house");?>',
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

