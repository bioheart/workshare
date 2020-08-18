<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Home</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap-4.4.1/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css'); ?>">
	</head>
	<body>
		<?php include 'navbar.php'; ?>
        <div class="centered">
            <form id="chage_password">
                <div class="form-group">
                    <input type="password" class="form-control" id="old_password" placeholder="Old Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="new_password" placeholder="New Password">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="renew_password" placeholder="Re-New Password">
                </div>
                <div class="foot">
                    <button id="submit-change-password" type="button" class="btn btn-primary submit">Confirm</button>
                    <a href="<?=base_url()?>"><button id="submit-cancel" type="button" class="btn btn-danger submit">Cancel</button></a>
                </div>
            </form>
        </div>
		<div class="container">
        </div>
    </body>
    <script src="<?php echo base_url('assets/jquery/jquery-3.5.1.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-4.4.1/js/bootstrap.min.js'); ?>"></script>
    <script>
        console.log("<?=$_SESSION['user_id']?>");

        $("#submit-change-password").on( "click", function() {
            var new_pass = $('#new_password').val();
            var renew_pass = $('#renew_password').val();
            var old_pass = $('#old_password').val();

            if(new_pass!=renew_pass){
                alert('password ไม่ตรงกัน');
            }
            else{
                $.ajax({
                    method: "POST",
                    url: '<?php echo base_url("account/update_password/")?>',
                    data: { 
                        old_password: old_pass,
                        new_password: new_pass,
                    },
                    dataType: "json"
                }).done(function(data) {
                    console.log("Return data :", data);
                    if(data == 1){
                        alert("เปลี่ยนรหัสผ่านได้สำเร็จ");
                        window.setTimeout(location.href = '<?php echo base_url();?>', 3000);
                        
                    }
                    else if(data == 2){
                        alert('ไม่สามารถอัพเดทรหัสผ่านได้');
                    }
                    else{
                        alert('รหัสผ่านเดิมไม่ถูกต้อง');
                    }
                });
            }
        });
    </script>
</html>