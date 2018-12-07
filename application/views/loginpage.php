<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url("assets/image/ehome-solid.png");?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css');?>">
    <script src="<?php echo base_url('assets/js/jquery-3.3.1.js');?>"></script>
    <script src="<?php echo base_url('assets/js/loginpage.js');?>"></script>
</head>
<body>
    <div class="container">
        <div class="container-fluid date-container">
            <div class="row">
                <div class="col-sm-12 date">
                    <span id="tanggal"></span>
                </div>
            </div>
        </div>
        <div id="loginContainer" class="login-container">
            <div class="row">
                <div class="col-sm-8 bg-text">
                    <h1><strong>E-Home</strong></h1>
                    <p>E-Home adalah aplikasi berbasis web online gratis yang memiliki fungsi untuk mengatur suatu kondisi rumah. E-Home dapat mengatur segala pemasukan dan pengeluaran dari rumah anda serta mengatur segala kewajiban yang harus dilakukan oleh anggota rumah anda.</p>
                </div>
                <div class="col-sm-4 form-login-container">
                    <form method="post">
                        <input type="hidden" id="baseUrl" value="<?php echo base_url();?>">
                        <input id="txtUname" type="text" name="homename" placeholder="Username" required><br>
                        <input id="txtPwd" type="password" name="password" placeholder="Password" required><br>
                        <input id="btnLogin" class="btn" type="submit" value="Login"><br>
                        <a href="<?php echo site_url('register'); ?>"><u>Dont have an account? Register now!</u></a>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal" id="modal">
            <div class="modal-content">
                <span id="closePopUp" class="close">&times;</span>
                <p id="message">Message</p>
            </div>
        </div>
    </div>

    
</body>
<script type="text/javascript">
    var timer = setInterval(tanggal, 1000);
    function tanggal(){
        var d = new Date();
        document.getElementById("tanggal").innerHTML = d;
    }
</script>
</html>