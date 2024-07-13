
<?php 
include '../include/session.php'; 
include '../templates/admin-header.php';
?>

<div class="container mt-5 p-4 text-center" style="margin-left:320px; border-bottom:1px solid gray;">
	<h1 class="text-dark">Welcome to Leave Management System</h1>
</div>
<div class="container" style="margin-left:320px; margin-top:20px">
	<div class="row">
		<div class="col-3">
			<div class="card rounded shadow-lg " style="background-color:#38384f;">
				<div class="card-body text-light" style="padding:20px;">
					<span><i class="fa fa-file-alt " style="font-size: 50px; color:#00ffff;"></i>
						<h4>Pending Applications</h4>
					</span>
				</div>
			</div>
		</div>
		<div class="col-3">
			<div class="card rounded shadow-lg" style="background-color:#4B49AC">
				<div class="card-body text-light" style="padding:20px;">
					<span><i class="fa fa-list" style="font-size: 50px;"></i>
						<h4>Total Type of Leave</h4>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include '../templates/footer.php';
