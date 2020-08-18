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
		<div class="container">
		<!-- <?php 
			echo '<pre>';
			print_r($this->session->userdata('user_id')); 
			echo '</pre>';
		?> -->
			<table>
				<tr>
					<th>Date</th>
					<th>User</th>
					<th>Work</th>
					<th>Status</th>
				</tr>
				<?php
					if (isset($work_list)) {
						foreach ($work_list as $val) {
							if($val->status == 1) {
								$status = '<span style="color:red;">To do</span>';
							} else if($val->status == 2) {
								$status = '<span style="color:green;">Done</span>';
							}
				?>
							<tr>
								<td><?=$val->date_created;?></td>
								<td><?=$val->username;?></td>
								<td><?=$val->work_detail;?></td>
								<td><?=$status;?></td>
							</tr>
				<?php
						}
					} else {
				?>
					<tr>
						<td colspan="4" style="text-align:center;color:red;">No Data</td>
					</tr>
				<?php
					}
				?>
			</table>
		</div>
		<script src="<?php echo base_url('assets/jquery/jquery-3.5.1.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/bootstrap-4.4.1/js/bootstrap.min.js'); ?>"></script>
	</body>
</html>