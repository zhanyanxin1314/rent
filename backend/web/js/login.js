$(function(){

		$("#da-login-form").validate({
			rules: {
				username: {
					required: true
				}, 
				password: {
					required: true
				}
			}
		});
})
