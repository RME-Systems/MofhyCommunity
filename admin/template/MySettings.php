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
											<input type="text" name="fname" value="<?php echo $AdminInfo['admin_fname']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div>
											<label class="form-label required">Last Name</label>
											<input type="text" name="lname" value="<?php echo $AdminInfo['admin_lname']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div>
											<label class="form-label required">Email Address</label>
											<input type="text" name="email" value="<?php echo $AdminInfo['admin_email']; ?>" class="form-control disabled" required readonly>
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
							<h3 class="card-title">Security Settings</h3>
						</div>
						<div class="card-body">
							<form class="row" action="function/MyPassword" method="post">
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
								<div class="col-md-12 mt-3">
									<button type="submit" name="submit" class="btn btn-primary text-white" onclick="
									var password = document.getElementById('password').value;
									var cpassword = document.getElementById('cpassword').value;
									if(password != cpassword){
											alert('Password not match');
											return false;
									}
									return true;">
										Change Password
									</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Company Settings</h3>
						</div>
						<div class="card-body">
							<form action="function/AreaSettings" method="post">
								<div class="row">
									<div class="col-md-6">
										<div>
											<label class="form-label required">Clientarea Name</label>
											<input type="text" name="name" value="<?php echo $AreaInfo['area_name']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div>
											<label class="form-label required">Clientarea URL</label>
											<input type="text" name="url" value="<?php echo $AreaInfo['area_url']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div>
											<label class="form-label required">Clientarea Email</label>
											<input type="email" name="email" value="<?php echo $AreaInfo['area_email']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div>
											<label class="form-label required">Clientarea Status</label>
											<select name="status" class="form-select">

												<?php
												$Statuses = array(
													array('name' => 'Operational', 'value' => '1'),
													array('name' => 'Maintaince', 'value' => '0'),
												);
												foreach ($Statuses as $Status) {
													if ($Status['value'] == $AreaInfo['area_status']) { ?>
														<option value="<?php echo $Status['value']; ?>" selected><?php echo $Status['name']; ?></option>
													<?php } else { ?>
														<option value="<?php echo $Status['value']; ?>"><?php echo $Status['name']; ?></option>
												<?php }} ?>
											</select>
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
			</div>
		</div>
	</div>