<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="view/login.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Đăng nhập & Đăng ký</title>
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link type="text/css" rel="stylesheet" href="<?php echo _WEB_ROOT ; ?>/public/asset/client/css/login.css">
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">

                <form action="" method="post" class="sign-in-form" id="sign-in">
                    <h2 class="title">Đăng nhập</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" id="username" placeholder="Tên người dùng" name="username" />

                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" placeholder="Mật khẩu" name="password" />
                    </div>
                    <input type="button" value="Đăng nhập" class="btn solid" id="btn-sub" name="submit" />
                    <a href="forget_pass/quenmk.php" style="text-decoration: none;">Quên mật khẩu</a>
                    <a href="index.php?" style="text-decoration: none;">Quay trở lại trang chủ</a>
                    <p class="social-text">Hoặc đăng nhập bằng các nền tảng xã hội</p>
                    <div class="social-media">
                        <a href="<?= $loginUrl ?>" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="<?=$authUrl?>" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>

                <form action="" method="post" class="sign-up-form">
                    <h2 class="title">Đăng ký</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Tên người dùng" name="firstname" id="firstname1" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Số điện thoại" name="lastname" id="lastname1" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email" name="email" id="email1" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Mật khẩu" name="password" id="password1" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Nhập lại mật khẩu" name="repassword" id="repass1" />
                    </div>

                    <input type="button" id="yes" name="signin" class="btn" value="Đăng ký" />


                    <p class="social-text">Hoặc đăng ký với các nền tảng xã hội</p>
                    <div class="social-media">
                        <a href="<?= $loginUrl ?>" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="<?=$authUrl?>" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>Bạn là Người Mới ?</h3>
                    <p>
                        Đăng ký để nhận ngay ưu đãi cho 1 số món hàng đắt tiền
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
                        Đăng ký
                    </button>
                </div>
                <img src="view/assets/img/shopping.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>Bạn đã có tài khoản ?</h3>
                    <p>
                        đăng nhập và shopping cùng chúng tôi nào
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
                        Đăng nhập
                    </button>
                </div>
                <img src="view/assets/img/empty.svg" class="image" alt="" />
            </div>
        </div>
    </div>
    <script src="view/assets/js/app.js"></script>
</body>
<script>
    const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

</script>

<script type="text/javascript">
   
$(document).ready(function(){  

    $('#btn-sub').on('click',function(e){
        
        var firstname=$('#username').val();
        var pass=$('#password').val();

    if(firstname==''||pass==''){

        alert('please enter probaly');
    }else{
        $.ajax({
          url:"<?php echo _WEB_ROOT;?>/admin/taikhoan/dashboard/dangnhap",
          method:"POST",
          data:{firstname:firstname,pass:pass},
          success:function(data){
           var data1=data;
           if(data1=='1'){
            window.location.assign("http://localhost/ps16895.assingmen/mvs-test/main/page/home/index")
           }else{
            alert(data1);
           }
          }
    });
    }
   });

   

   $('#yes').on('click',function(e){
        
        var firstname=$('#firstname1').val();
        var lastname=$('#lastname1').val();
        var email=$('#email1').val();
        var repass=$('#repass1').val();
        var pass=$('#password1').val();
    if(firstname==''||pass==''||lastname==''||repass==''||email==''){

        alert('please enter probaly');
    }else{
        $.ajax({
          url:"index.php?act=dangky",
          method:"POST",
          data:{firstname:firstname,lastname:lastname,email:email,pass:pass,repass:repass},
          success:function(data){
           var data1=data;
           if(data1=='1'){
            window.location.assign("index.php?act=chaoban")
           }
          }
    });
    }
   });
   
    
});
</script>
</html>