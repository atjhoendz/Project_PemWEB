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
    <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
</head>
<body>
    <div class="container-fluid date-container">
        <div class="row">
            <div class="col-sm-12 date">
                <span id="tanggal"></span>
            </div>
        </div>
    </div>
    <div class="container login-container">
        <div class="row">
            <div class="col-sm-8 bg-text">
                <h1><strong>E-Home</strong></h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus molestias mollitia eius dolorum maxime dignissimos quos hic impedit assumenda ab, alias porro corporis et consequuntur quam, temporibus laborum molestiae repudiandae!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas omnis inventore quidem voluptas repudiandae esse dolorem iusto numquam, aliquid ad eligendi dignissimos at, quae quod velit voluptate tenetur! Laborum, optio.</p>
            </div>
            <div class="col-sm-4 form-login-container">
                <form action="<?php echo base_url('loginpage/login');?>" method="post">
                    <input type="text" name="homename" placeholder="Username" required><br>
                    <input type="password" name="password" placeholder="Password" required><br>
                    <input class="btn" type="submit" value="Login"><br>
                    <a href="<?php echo site_url('register'); ?>"><u>Dont have an account? Register now!</u></a>
                </form>
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