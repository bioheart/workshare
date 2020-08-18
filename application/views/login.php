<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap-4.4.1/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css'); ?>">
	</head>
	<body>
        <?php include 'navbar.php'; ?>
		<div class="container">
            <div class="centered">
                <form id="login">
                    <div class="form-group">
                        <input type="text" class="form-control" id="username" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="foot">
                        <button id="submit-login" type="button" class="btn btn-primary submit">Login</button>
                    </div>
                </form>
            </div>
		</div>
		<script src="<?php echo base_url('assets/jquery/jquery-3.5.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/bootstrap-4.4.1/js/bootstrap.min.js'); ?>"></script>
        <script>
            $("#submit-login").on( "click", function() {
                $.ajax({
                    method: "POST",
                    url: '<?php echo base_url("login/check_login/")?>',
                    data: { 
                        username: $('#username').val(), 
                        password: $('#password').val() 
                    },
                    dataType: "json"
                }).done(function(data) {
                    // console.log("Return data :", data);
                    if(data != 0){
                        location.href = '<?php echo base_url()?>';
                    }else{
                        alert('username หรือ password ไม่ถูกต้อง');
                    }
                });
            });

            $('body').keyup(function(e){
                if(e.keyCode == 13){
                    $.ajax({
                        method: "POST",
                        url: '<?php echo base_url("login/check_login/")?>',
                        data: { 
                            username: $('#username').val(), 
                            password: $('#password').val() 
                        },
                        dataType: "json"
                    }).done(function(data) {
                        console.log("Return data :", data);
                        if(data != 0){
                            location.href = '<?php echo base_url()?>';
                        }else{
                            alert('username หรือ password ไม่ถูกต้อง');
                        }
                    });
                }
            });

        </script> 
	</body>
</html>