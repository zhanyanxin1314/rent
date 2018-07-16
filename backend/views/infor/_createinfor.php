<?php

use \backend\services\DataHelper;
use \backend\services\UrlService;
use \backend\services\StaticService;

?>

<article class="page-container">
	<form class="form form-horizontal" id="form-article-add">
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>文章标题：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?=$info?$info['title']:'';?>" placeholder="" id="title" name="title">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">排序：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?=$info?$info['sort']:'';?>"  name="sort">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">关键词：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?=$info?$info['keywords']:'';?>" name="keywords">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章来源：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<input type="text" class="input-text" value="<?=$info?$info['source']:'';?>" name="source">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">文章内容：</label>
			<div class="formControls col-xs-8 col-sm-9"> 
				<script id="editor" type="text/plain" style="width:100%;height:400px;"></script> 
			</div>
		</div>
		<div class="row cl">
			<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
				<input type="hidden" name="id" value="<?=$info?$info['id']:'';?>"/>
				<button class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
				<button onClick="removeIframe();" class="btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
			</div>
		</div>
	</form>
</article>
<script type="text/javascript">
$(function(){
    $('#form-article-add').submit(function(evt){
        evt.preventDefault();
	var title = $('#title').val();
	if(title == ''){
		layer.msg('文章标题不能为空!',{icon:2,time:3000});
		return false;
	}
        var shuju = $(this).serialize();
        $.ajax({
	    url:'<?=UrlService::buildUrl("/infor/create-infor");?>',
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
var ue = UE.getEditor('editor');
</script> 

