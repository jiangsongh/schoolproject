$(function(e){
	$.validator.addMethod('userNameIsValid' , function(value , element , params){

		var pattern = /^1[34578]\d{9}$/;
		return pattern.test(value);
	});

	$('#frm').validate({
		rules:{
			regPhone:{
				required:true,
				userNameIsValid:{
					pattern:/^1[3|4|5|7|8][0-9]{9}$/,
					message:'用户名格式无效'
				}
			},
			regPassword:{
               required:true,
               minlength:4
           },
           regPonfirm:{
               equalTo:'#txtPassword'
           }
           ,
           regYanZhen:{
           		required:true,
           		minlength:4,
           		maxlength:4
           }
		},
		messages:{
           regPhone: {
               required: '用户名不能为空',
               userNameIsValid:'用户名的格式无效'
           },
           regPassword:{
               required:'密码不能为空',
               minlength:'密码的长度至少为4位'
           },
           regPonfirm:{
               equalTo:'两次密码不一致'
           }
           ,
           regYanZhen:{
           		required:'验证码不能为空',
           		minlength:'验证码无效',
           		maxlength:'验证码无效'
           }
       }
	});

	$('#btnSendCode').bind('click' , function(){
		var phone = $('#txtPhone').val();

		var pattern = /^1[3578]\d{9}$/;

		if(!pattern.test(phone)){
			alert('号码无效');
			return;
		}

		$.get('ajax/sendCode.php?txtPhone=' + phone , function(response){
			if(response.code == 100){

			}
		});
	});
});