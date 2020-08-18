<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Add Work</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap-4.4.1/css/bootstrap.min.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/main.css'); ?>">
	</head>
	<body>
        <?php include 'navbar.php'; ?>
		<div class="container">
            <div class="centered">
                <form id="add-work">
                    <div class="form-group">
                        <textarea id="detail" rows="4" class="form-control" placeholder="Detail"></textarea>
                    </div>
                    <div class="foot">
                        <button id="submit-add-work" type="button" class="btn btn-primary submit">Add</button>
                    </div>
                </form>
            </div>
		</div>
		<script src="<?php echo base_url('assets/jquery/jquery-3.5.1.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/bootstrap-4.4.1/js/bootstrap.min.js'); ?>"></script>
        <script>
            $("#submit-add-work").on( "click", function() {
                var detail = $('#detail').val();
                console.log(detail);
                $.ajax({
                    method: "POST",
                    url: '<?php echo base_url("work/add_work/")?>',
                    data: { 
                        detail: detail
                    },
                    dataType: "json"
                }).done(function(res) {
                    // console.log("Return data :", data);
                    if(res != 0){
                        location.href = '<?php echo base_url()?>';
                    }else{
                        alert('เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง');
                    }
                });
            });

        </script> 
	</body>
</html>