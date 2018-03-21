(function(){
    var openLoginRight = document.querySelector('.h1');
    var loginWrapper = document.querySelector('.login-wrapper');
    var $Phone = $('#Phone');
    var $Password = $('#Password');
    var $loginLabel1 = $('#loginLabel1');
    var $loginLabel2 = $('#loginLabel2');
    var $loginLabel3 = $('#loginLabel3');

    openLoginRight.addEventListener('click', function(){
        loginWrapper.classList.toggle('open');
    });

    $('#btnLogin').bind('click',function(e){

        var $phone = $Phone.val();
        var $password = $Password.val();
        checkPhone();
        checkPasswrod();
        var mess = {};

        $.post('http://192.168.12.116:8066/home/ajax/login.php',
            {phone:$phone,password:$password},
            function(response){

                if(response.code == 100){
                    console.log(response.data);
                    location.href = 'index.html';
                    mess.nick = response.data[0].nick;
                    mess.id = response.data[0].id;
                    mess.phone = response.data[0].phone;
                    sessionStorage.setItem('login', JSON.stringify(mess));
                }
                else{
                    $loginLabel3.text('手机号码或密码不正确');
                }
            });
    });

    function checkPhone(){
        if($Phone.val().length == 0){
            $loginLabel1.text('手机号码不能为空');
            return ;
        }
        var registerPhone = /^1[3578]\d{9}$/;
        if(!(registerPhone.test($Phone.val()))){
            $loginLabel1.text('手机号码格式不正确');
            return ;
        }
        $loginLabel1.text('');
    }
    function checkPasswrod(){
        if($Password.val().length == 0){
            $loginLabel2.text('密码不能为空');
            return ;
        }
        var registerPassword = /^\d{4}$/;
        if(!(registerPassword.test($Password.val()))){
            $loginLabel2.text('密码不正确');
            return ;
        }
    }
    $loginLabel2.text('');
})();
