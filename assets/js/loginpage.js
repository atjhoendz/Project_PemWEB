$(document).ready(function () {

    //add padding on small width window
    $(window).on('resize', function(){
        if($(this).width() <= 768){
            $('#loginContainer').addClass('p-2');
        }else{
            $('#loginContainer').removeClass('p-2');
        }
    });

    //Login authentication
    $('#btnLogin').on('click', function(e){
        var uname = $('#txtUname').val();
        var pwd = $('#txtPwd').val();
        
        if(uname == '' || pwd == ''){
            $('#txtUname').addClass('border-red');
            $('#txtPwd').addClass('border-red');
        }else{
            var base_url = $('#baseUrl').val();
            var url = base_url + 'loginpage/login';
            var home = base_url + 'homepage';
            $.post(url, {username:uname, password:pwd},
                function (data) {
                    if(data == 'Login Berhasil...'){
                        window.location.replace(home);
                    }else{
                        $('#txtUname').addClass('border-red');
                        $('#txtPwd').addClass('border-red');
                        $('#message').text(data);
                        $('#modal').css({'display':'block'});
                    } 
                }
            );
            e.preventDefault();
        }
    });

    // Close PopUp
    $('#closePopUp').on('click', function(){
        $('#modal').css({'display':'none'});
        $('#txtUname').removeClass('border-red');
        $('#txtPwd').removeClass('border-red');
    });

    $('window').on('click', function(event){
        if(event.target == $('#modal')){
            $('#modal').css({'display':'none'});
        }
    });
});