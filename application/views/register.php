<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="<?php echo base_url("assets/image/ehome-solid.png");?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css" />
    <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
</head>
<body>
    <div class="container regist-container">
        <div class="row">
            <div class="col-sm-12">
                <?php echo form_open('register'); ?>
                    <h1 class="register-text">Create Account</h1>
                    <input class="input-register" type="text" placeholder="Username" name="username"><br>
                    <input class="input-register" type="password" placeholder="Password" name="password"><br>
                    <input class="input-register" type="password" placeholder="Confirm Password" name="confirm_password"><br>
                    <input class="input-register" type="text" placeholder="Nomor Telepon" name="nomor"><br>                
                    <input class="input-register" type="email" placeholder="Email" name="email"><br>
                    <input class="btn" type="submit" value="Register"><br>
                </form>
                <a href="<?php echo site_url();?>"><u>Back to Login Page</u></a>
            </div>
        </div>
    </div>
</body>
</html>