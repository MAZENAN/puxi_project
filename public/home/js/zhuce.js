$(function(){
    $("#header").load('./header.html');
    $("#footer").load('./footer.html');
})
//账号是否验证过
var username = false;
var phoneId = false;
var passwdIsOK = false;
var confirmpwdIsOK = false;
var phoneIsOK = false;
// 用户名输入框验证

$('#uname').blur(function(){ 
    var zh=$('#uname').val();
    var zhpd=/^[\w\u4e00-\u9fa5]{3,12}$/;
    if(zh==''){
        $('#uname-text').text('用户名不能为空');
        $('#uname-text').css('color','red');
        return false;
    }else if(!zhpd.test(zh)){
        $("#uname-text").text('请输入您的用户名,长度为3-12位,不能含有特殊字符');
        return false;
    }else{
        $("#uname-text").text("用户名格式正确");
        $("##uname-text").css("color","#000");
        
        username=true;
        // console.log(accountIsChecked);
        return true;
        
    } 
});

//手机号码格式验证
$("#tl").blur(function(){
    var tl = $("#tl").val();
    var tlpd = /^1[34578]\d{9}$/;
    if(tl == ""){
        $("#pdtl").text("手机号不能为空");
        $("#pdtl").css("color","red");
        return false;
    }else if(!tlpd.test(tl)){
        $("#pdtl").text("手机号码格式不正确");
        $("#pdtl").css("color","red");
        return false;
    }else{
        $("#pdtl").text("手机号码格式正确");
        $("#pdtl").css("color","#000");
        phoneId=true;
        return true;
    }
});
//密码验证

$("#pass").blur(function(){
    var pass1 = $("#pass").val();
    var pass1pd = /^[\w@!~$%&]{6,24}$/;
    if(pass1 == ""){
        $("#pdpass1").text("密码不能为空");
        $("#pdpass1").css("color","red");
        return false;
    }else if(!pass1pd.test(pass1)){
        $("#pdpass1").text("密码不能出现特殊字符");
        $("#pdpass1").css("color","red");
        return false;
    }else{
        $("#pdpass1").text("密码格式正确");
        $("#pdpass1").css("color","#000");
        passwdIsOK=true;
        return true;
    }
});


/**
 * 
 * 密码强度验证
 * 
 */

$('#pass').keyup(function () { 
    var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g"); 
    var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g"); 
    var enoughRegex = new RegExp("(?=.{6,}).*", "g"); 
    
    
    if(strongRegex.test($('#pass').val())) { 
        $('#medium').removeClass('pw-medium'); 
        $('#low').removeClass('pw-defule'); 
        $('#strong').addClass('pw-strong'); 
            //密码为八位及以上并且字母数字特殊字符三项都包括,强度最强 
    } 
    else if (mediumRegex.test($('#pass').val())) { 
        $('#low').removeClass('pw-defule'); 
        $('#strong').removeClass('pw-strong'); 
        $('#medium').addClass('pw-medium'); 
            //密码为七位及以上并且字母、数字、特殊字符三项中有两项，强度是中等 
    } 
    else if(enoughRegex.test($('#pass').val())){ 
        $('#medium').removeClass('pw-medium'); 
        $('#strong').removeClass('pw-strong'); 
        $('#low').addClass('pw-defule'); 
            //如果密码为6为及以下，就算字母、数字、特殊字符三项都包括，强度也是弱的 
    } else{
        $('#medium').removeClass('pw-medium'); 
        $('#strong').removeClass('pw-strong'); 
        $('#low').removeClass('pw-defule'); 
    }
    return true; 
}); 

/**
 * 两次密码判断相等不相等
 */
$('#pass2').blur(function(){
    var pass2 = $("#pass2").val();
    if(!$("#pass").val()==pass2){
        $("#pass3").text("两次密码不相同");
        $("#pass3").css("color","red");
        return false;
    }else if($("#pass").val()==pass2){
        $("#pass3").text("");
        $("#pass3").css("color","#000");
        confirmpwdIsOK=true;
        return true;
    }else{
        $("#pass3").text("请再次输入密码");
    }
});
//按钮提交
$('#zcbtn').click(function(){
    if(username && phoneId && passwdIsOK &&confirmpwdIsOK ==true){
        let uname=$('#uname').val();
        let phone=$("#tl").val();
        let upwd=$("#pass").val();
        $.ajax({
            url:"",
            type:'post',
            data:{uname:uname,phone:phone,upwd:upwd},
            success: function (data){

            },
        });
    }else{
        alert("注册信息有误,请重新填写");
        $('#uname').val('');
        $("#tl").val('');
        $("#pass").val('');
        $("#pass2").val('');
    }
});

/*数据表*/













