<?php

use \backend\services\DataHelper;
use \backend\services\UrlService;
use \backend\services\StaticService;

?>

	<div class="role_access_set_wrap" role="form">
        <div>
            <div>
                <?php if( $access_list ):?>
                    <?php foreach( $access_list as $_item ):?>
                        <div style="margin:10px 10px">
                            <label>
                                <input type="checkbox" name="access_ids[]" value="<?=$_item['id'];?>"
                                <?php if( in_array( $_item['id'],$access_ids ) ):?> checked <?php endif;?>
                                >
                                <?=$_item['title'];?>
                            </label>
                        </div>
                    <?php endforeach;?>
                <?php endif;?>
            </div>
        </div>
		<div class="col-xs-6 col-xs-offset-2 col-sm-6 col-sm-offset-2 col-md-6  col-md-offset-2 col-lg-6 col-sm-lg-2 ">
            <input type="hidden" name="id" value="<?=$info['id'];?>">
			<button type="button" class="btn btn-primary pull-right  save">确定</button>
		</div>
	</div>

<script>

var role_access_set_ops = {
    init: function () {//初始化方法
        this.eventBind();
    },
    eventBind: function () {//事件绑定
        $(".role_access_set_wrap .save").click( function(){
            var btn_target = $(this);
            if( btn_target.hasClass("disabled") ){
                alert("正在处理，请不要重复提交~~");
                return false;
            }

            var access_ids = [];
            $(".role_access_set_wrap input[name='access_ids[]']").each(function () {
                if ($(this).prop("checked")) {
                    access_ids.push( $(this).val() );
                }
            });

            btn_target.addClass("disabled");
            $.ajax({
                url:'<?=UrlService::buildUrl("/role/access");?>',
                type:'POST',
                data:{
                    id:$(".role_access_set_wrap input[name=id]").val(),
                    access_ids:access_ids
                },
                dataType:'json',
                success:function( res ){
                    btn_target.removeClass("disabled");
                    
                    if( res.code == 200 ){
                        parent.location.href = "<?=UrlService::buildUrl("/role/index");?>";
                    }
                }
            });
        });
    }
};

$(document).ready( function() {
    role_access_set_ops.init();
});
</script>
