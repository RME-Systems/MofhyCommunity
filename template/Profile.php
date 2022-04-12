<div class="page-wrapper">
	<div class="container-xl">
		<div class="page-header">
			<h1 class="page-title">
				Your Profile
			</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
		</div>
	</div>
</div>
<div class="page-body">
	<div class="container-xl">
		<div class="row row-cards">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Your Profile</h3>
					</div>
					<div class="card-body">
						<div class="row row-0">
							<div class="col-md-3">
								<img src="<?php echo get_gravatar($ClientInfo['hosting_client_email'], 185); ?>" alt="<?php echo $ClientInfo['hosting_client_fname'] . "'s Avatar"; ?>">
							</div>
							<div class="col-md-9">
								<h4>Your Profile</h4>
								<div class="table-responsive">
									<table class="table table-bordered">
										<tbody>
											<tr>
												<td><strong>Full Name</strong></td>
												<td><?php echo $ClientInfo['hosting_client_fname']." ".$ClientInfo['hosting_client_lname']; ?></td>
											</tr>
											<tr>
												<td><strong>Email Address</strong></td>
												<td><?php echo $ClientInfo['hosting_client_email']; ?></td>
											</tr>
											<tr>
												<td><strong>Device OS</strong></td>
												<td><?php echo UserInfo::get_os(); ?></td>
											</tr>
											<tr>
												<td><strong>Signed Up On</strong></td>
												<td><?php echo $ClientInfo['hosting_client_date']; ?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<a href="userProfile" class="btn btn-primary">
							Edit Profile
						</a>
						<a href="https://en.gravatar.com/" class="btn btn-primary" target="_blank">
							Update Avatar
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 mt-3"></div>
		</div>
	</div>
</div>