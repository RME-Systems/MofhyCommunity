<div class="page-wrapper">
	<div class="container-xl">
		<div class="page-header">
			<h1 class="page-title">
				Edit Your Profile </h1>
		</div>
		<div class="row">
			<div class="col-12">
			</div>
		</div>
	</div>
	<div class="page-body">
		<div class="container-xl">
			<?php if (isset($_SESSION['message'])) {
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			} ?>
			<div class="row row-cards">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Personal Settings</h3>
						</div>
						<div class="card-body">
							<form action="function/MySettings" method="post">
								<div class="row">
									<div class="col-md-6">
										<div>
											<label class="form-label required">First Name</label>
											<input type="text" name="fname" value="<?php echo $ClientInfo['hosting_client_fname']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div>
											<label class="form-label required">Last Name</label>
											<input type="text" name="lname" value="<?php echo $ClientInfo['hosting_client_lname']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div>
											<label class="form-label required">Email Address</label>
											<input type="text" name="email" value="<?php echo $ClientInfo['hosting_client_email']; ?>" class="form-control disabled" required readonly>
										</div>
									</div>
									<div class="col-md-12 mt-3">
										<div>
											<button type="submit" name="submit" class="btn btn-primary">Update Profile</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Client Area Password</h3>
						</div>
						<div class="card-body">
							<form class="row" action="function/MyPassword" method="POST">
								<div class="col-md-6">
									<div>
										<label class="form-label required">New Password</label>
										<input type="password" name="new_password" id="password" class="form-control" required>
									</div>
								</div>
								<div class="col-md-6">
									<div>
										<label class="form-label required">Confirm Password</label>
										<input type="password" name="confirm_password" id="cpassword" class="form-control" required>
									</div>
								</div>
								<div class="col-md-12">
									<div class="mt-2">
										<button type="submit" name="submit" class="btn btn-primary text-white" onclick="
									var password = document.getElementById('password').value;
									var cpassword = document.getElementById('cpassword').value;
									if(password != cpassword){
											alert('Passwords do not match!');
											return false;
									}
									return true;">
										Change Password
									</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>