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
					<option value="0">不限</option>
					<?php foreach( $hrent as $_key => $_hrent_info ):?>
						<option value="<?=$_hrent_info['id'];?>">
							<?=$_hrent_info['title'];?>
						</option>
					<?php endforeach;?>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>楼层：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="hfloor" class="select">
					<option value="0">不限</option>
					<?php foreach( $hfloor as $_key => $_hfloor_info ):?>
                                        	<option value="<?=$_hfloor_info['id'];?>">
							<?=$_hfloor_info['title'];?>
						</option>
                                        <?php endforeach;?>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>朝向：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="htoward" class="select">
					<option value="0">不限</option>
					<?php foreach( $htoward as $_key => $_htoward_info ):?>
                                        	<option value="<?=$_htoward_info['id'];?>">
							<?=$_htoward_info['title'];?>
						</option>
                                        <?php endforeach;?>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>押金方式：</label>

			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="hdeposit" class="select">
					<option value="0j">免押金</option>
					<?php foreach( $hdeposit as $_key => $_hdeposit_info ):?>
                                        	<option value="<?=$_hdeposit_info['id'];?>">
							<?=$_hdeposit_info['title'];?>
						</option>
                                        <?php endforeach;?>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>装修方式：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="hdecorate" class="select">
					<option value="0">不限</option>
					<?php foreach( $hdecorate as $_key => $_hdecorate_info ):?>
                                        	<option value="<?=$_hdecorate_info['id'];?>">
							<?=$_hdecorate_info['title'];?>
						</option>
                                        <?php endforeach;?>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>户型：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="hmodel" class="select">
					<option value="0">不限</option>
					 <?php foreach( $hmodel as $_key => $_hmodel_info ):?>
                                        	<option value="<?=$_hmodel_info['id'];?>">
							<?=$_hmodel_info['title'];?>
						</option>
                                        <?php endforeach;?>
				</select>
				</span> </div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>电梯：</label>
			<div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
				<select name="helevator" class="select">
					<option value="0">不限</option>
					<?php foreach( $helevator as $_key => $_helevator_info ):?>
                                        	<option value="<?=$_helevator_info['id'];?>">
							<?=$_helevator_info['title'];?>
						</option>
                                        <?php endforeach;?>
				</select>
				</span> </div>
		</div>
                <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>租房方式：</label>
                        <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
                                <select name="hway" class="select">
                                        <option value="0">不限</option>
                                        <?php foreach( $hway as $_key => $_hway_info ):?>
                                                <option value="<?=$_hway_info['id'];?>">
                                                        <?=$_hway_info['title'];?>
                                                </option>
                                        <?php endforeach;?>
                                </select>
                                </span> </div>
                </div>
		<div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>房屋类型：</label>
                        <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
                                <select name="htypes" class="select">
                                        <option value="0">不限</option>
                                        <?php foreach( $htypes as $_key => $_htypes_info ):?>
                                                <option value="<?=$_htypes_info['id'];?>">
                                                        <?=$_htypes_info['title'];?>
                                                </option>
                                        <?php endforeach;?>
                                </select>
                                </span> </div>
                </div>
		<div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>房屋年代：</label>
                        <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
                                <select name="hbuilding" class="select">
                                        <option value="0">不限</option>
                                        <?php foreach( $hbuilding as $_key => $_hbuilding_info ):?>
                                                <option value="<?=$_hbuilding_info['id'];?>">
                                                        <?=$_hbuilding_info['title'];?>
                                                </option>
                                        <?php endforeach;?>
                                </select>
                                </span> </div>
                </div>

                <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>房型：</label>
                        <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
                                <select name="hroom" class="select">
                                        <option value="0">不限</option>
                                        <?php foreach( $hroom as $_key => $_hroom_info ):?>
                                                <option value="<?=$_hroom_info['id'];?>">
                                                        <?=$_hroom_info['title'];?>
                                                </option>
                                        <?php endforeach;?>
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
				<button  class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
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

