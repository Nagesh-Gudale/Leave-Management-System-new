
<?php 
include '../include/session.php'; 
include '../templates/admin-header.php';
?>
<main class="main" id="main">
	<section class="section">
<div class="container mt-5 p-4 text-center" style=" border-bottom:1px solid gray;">
	<h1 class="text-dark">Welcome to Leave Management System</h1>
</div>
<div class="container" style=" margin-top:20px">
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
		<div class="col-3">
			<div class="card rounded shadow-lg" style="background-color:#29313d;">
				<div class="card-body text-light" style="padding:20px;">
					<span><i class="fas fa-building" style="font-size: 50px; color:#0e9cb3;"></i>
						<h4>Total Departments</h4>
					</span>
				</div>
			</div>
		</div>
		<div class="col-3">
			<div class="card rounded shadow-lg" style="background-color:#020109;">
				<div class="card-body text-light" style="padding:20px;">
					<span><i class="fa fa-users text-primary" style="font-size: 50px;"></i>
						<h4>Total Employees</h4>
					</span>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
</main>
<?php include '../templates/footer.php';
