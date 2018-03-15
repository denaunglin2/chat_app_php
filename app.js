$(function () {
    getImg();
    function getImg() {
        $.ajax({
            type: 'get',
            url: 'get_img.php',
            success:function (msg) {
                $("#user_image").html(msg);
            }
        })
    }

    $("#user_img").on('change', function (e) {
        e.preventDefault();
        var file_data=$("#user_img").prop("files")[0];
        var form_data=new FormData();
        form_data.append("user_img", file_data);
        
        $.ajax({
            type: 'post',
            url : 'upload.php',
            data : form_data,
            processData:false,
            contentType: false,
            success:function (msg) {
                getImg();

            }
        })
        
    });

    setInterval(function () {
        getMsg();
    }, 3000)

    getMsg();
    function getMsg() {
        $.ajax({
            type: 'get',
            url : 'get_msg.php',
            success:function (msg) {
                $("#myMsg").html(msg);
            }
        })
    }

    $("body").delegate('#btnDelMsg', 'click', function () {
        var id=$(this).attr('idd');
        $.ajax({
            type: 'get',
            url : 'delete_msg.php',
            data : {id:id},
            success:function (msg) {
                getMsg();
            }
        })
    })
    $("#msgText").on('keydown', function (e) {
        if(e.keyCode==13){
            var msg=$("#msgText").val();
            if(msg){
                $.ajax({
                    type: 'post',
                    url : 'send_msg.php',
                    data : {message:msg},
                    success:function (msg) {
                        if(msg==="success"){
                            $("#msgText").val('');
                            getMsg();
                        }
                    }
                });
            }

        }
    });



    $("#btnLogin").on('click', function () {
        $("#loginForm").submit();
    });

    $("#loginForm").on('submit', function (e) {
        e.preventDefault();
        var name=$("#name").val();
        var password=$("#password").val();

        $.ajax({
            type: 'post',
            url :'post_login.php',
            data : {name:name, password:password},
            success:function (msg) {
                $("#info").html(msg);
                if(msg==="<div class='alert alert-success'>Login success.</div>"){
                    setTimeout(function () {
                        window.location.replace("home.php");
                    }, 2000)
                }
            }
        });

    });



    $("#btnReg").on('click', function () {
        $("#regForm").submit();
    });

    $("#regForm").on('submit', function (e) {
        e.preventDefault();
        var name=$("#name").val();
        var email=$("#email").val();
        var password=$("#password").val();
        var password_again=$("#password_again").val();

        $.ajax({
            type : 'post',
            url : 'post_register.php',
            data : {name:name, email:email, password:password, password_again:password_again},
            success:function (msg) {
                $("#info").html(msg);
                if(msg==="<div class='alert alert-success'>The user account have been created.</div>"){
                    $("#name").val('');
                    $("#email").val('');
                    $("#password").val('');
                    $("#password_again").val('');
                }
            }
        })

    });

})