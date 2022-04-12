<div class="page-wrapper">
	<div class="container-xl">
		<div class="page-header">
			<h1 class="page-title">
				API Credentials
			</h1>
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
					<div class="card" id="languageCard">
						<div class="card-header">
							<h3 class="card-title">MOFH Settings</h3>
						</div>
						<div class="card-body">
							<form action="function/MOFHSettings" method="POST">
								<div class="row">
									<div class="col-md-6">
										<div class="mb-10 px-10">
											<label class="form-label required">MOFH API Username</label>
											<input type="text" name="username" value="<?php echo $HostingApi['api_username']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-10 px-10">
											<label class="form-label required">MOFH API Password</label>
											<input type="text" name="password" value="<?php echo $HostingApi['api_password']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-10 px-10">
											<label class="form-label required">cPanel URL</label>
											<input type="text" name="url" value="<?php echo $HostingApi['api_cpanel_url']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-10 px-10">
											<label class="form-label required">Hosting Package</label>
											<input type="text" name="pkg" value="<?php echo $HostingApi['api_package']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-10 px-10">
											<label class="form-label required">Server IP</label>
											<input type="text" name="ip" value="<?php echo $HostingApi['api_server_ip']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-10 px-10">
											<label class="form-label required">Shared IP</label>
											<input type="text" value="<?php echo gethostbyname($_SERVER['HTTP_HOST']); ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-10 px-10">
											<label class="form-label required">Nameserver 1</label>
											<input type="text" name="ns1" value="<?php echo $HostingApi['api_ns_1']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-10 px-10">
											<label class="form-label required">Nameserver 2</label>
											<input type="text" name="ns2" value="<?php echo $HostingApi['api_ns_2']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-12 mt-3">
										<div class="mb-10 px-10">
											<button type="submit" name="submit" class="btn btn-primary">Update Settings</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="card" id="mfaCard">
						<div class="card-header">
							<h3 class="card-title">SMTP Settings</h3>
						</div>
						<div class="card-body">
							<form action="function/SMTPSettings" method="post">
								<?php
								$smtp_key = 'SMTP';
								$stmt1 = $connect->prepare("SELECT * FROM `hosting_smtp` WHERE `smtp_key`= ?");
								$stmt1->bind_param('s', $smtp_key);
								$stmt1->execute();
								$result = $stmt1->get_result();
								$SMTPInfo = $result->fetch_assoc();
								$stmt1->close();
								?>
								<div class="row">
									<div class="col-md-6">
										<div class="mb-10 px-10">
											<label class="form-label required">SMTP Hostname</label>
											<input type="text" name="host" value="<?php echo $SMTPInfo['smtp_host']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-10 px-10">
											<label class="form-label required">SMTP Username</label>
											<input type="text" name="username" value="<?php echo $SMTPInfo['smtp_username']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-10 px-10">
											<label class="form-label required">SMTP Password</label>
											<input type="password" name="password" value="<?php echo $SMTPInfo['smtp_password']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-10 px-10">
											<label class="form-label required">SMTP Port</label>
											<input type="text" name="port" value="<?php echo $SMTPInfo['smtp_port']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-10 px-10">
											<label class="form-label required">Email From</label>
											<input type="text" name="from" value="<?php echo $SMTPInfo['smtp_from']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-12 mt-3">
										<div class="mb-10 px-10">
											<button type="submit" name="submit" class="btn btn-primary">Update Settings</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="card" id="emailCard">
						<div class="card-header">
							<h3 class="card-title">GoGetSSL Settings</h3>
						</div>
						<div class="card-body">
							<form action="function/SSLSettings" method="post">
								<?php
								$api_key = 'FREESSL';
								$stmt2 = $connect->prepare("SELECT * FROM `hosting_ssl_api` WHERE `api_key`= ?");
								$stmt2->bind_param('s', $api_key);
								$stmt2->execute();
								$result = $stmt2->get_result();
								$SSLApi = $result->fetch_assoc();
								$stmt2->close();
								?>
								<div class="row">
									<div class="col-md-6">
										<div class="mb-10 px-10">
											<label class="form-label required">SSL API Username</label>
											<input type="text" name="username" value="<?php echo $SSLApi['api_username']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="mb-10 px-10">
											<label class="form-label required">SSL API Password</label>
											<input type="text" name="password" value="<?php echo $SSLApi['api_password']; ?>" class="form-control" required>
										</div>
									</div>
									<div class="col-md-12 mt-3">
										<div class="mb-10 px-10">
											<button type="submit" name="submit" class="btn btn-primary">Update Settings</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 mt-3"></div>
			</div>
		</div>
	</div>