<div class="page-wrapper">
	<div class="container-xl">
		<div class="page-header">
			<div class="alert alert-danger bg-red py-4" id="fundingNotice" style="display: block;">
				<div class="text-center">
					<h3>This is a dummy placeholder where you should insert your ad code. <br>Insert the ad code below this <kbd>div</kbd> element. Best of luck!</h3>
				</div>
			</div>
			<h1 class="page-title">
				Registered Clients
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
					<div class="card">
						<div class="card-header">
							<h3 class="card-title"> Client Records </h3>
						</div>
						<div class="table-responsive">
							<table class="table table-vcenter text-nowrap card-table" aria-describedby="Your Client Records">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Email</th>
										<th>Date</th>
										<th>Status</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = mysqli_query($connect, "SELECT * FROM `hosting_clients`");
									$Rows = mysqli_num_rows($sql);
									if ($Rows > 0) {
										while ($ClientInfo = mysqli_fetch_assoc($sql)) {
									?><tr>
												<td>#<?php $Count = $Count ?? 1;
														echo $Count;
														$Count += 1; ?></td>
												<td><?php echo $ClientInfo['hosting_client_fname'] . " " . $ClientInfo['hosting_client_lname']; ?></td>
												<td><?php echo $ClientInfo['hosting_client_email']; ?></td>
												<td><?php echo $ClientInfo['hosting_client_date']; ?></td>
												<td><?php
													if ($ClientInfo['hosting_client_status'] == '0') {
														$btn = ['warning', '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="9"></circle> <line x1="12" y1="8" x2="12" y2="12"></line> <line x1="12" y1="16" x2="12.01" y2="16"></line></svg>'];
														echo '<span class="badge bg-warning">Inactive</span>';
													} elseif ($ClientInfo['hosting_client_status'] == '1') {
														$btn = ['success', '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="9"></circle> <line x1="3.6" y1="9" x2="20.4" y2="9"></line> <line x1="3.6" y1="15" x2="20.4" y2="15"></line> <path d="M11.5 3a17 17 0 0 0 0 18"></path> <path d="M12.5 3a17 17 0 0 1 0 18"></path></svg>'];
														echo '<span class="badge bg-success">Active</span>';
													} elseif ($ClientInfo['hosting_client_status'] == '2') {
														$btn = ['danger', '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <rect x="5" y="11" width="14" height="10" rx="2"></rect> <circle cx="12" cy="16" r="1"></circle> <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path></svg>'];
														echo '<span class="badge bg-danger">Suspended</span>';
													}
													?></td>
												<td>
													<a href="viewclient?client_id=<?php echo $ClientInfo['hosting_client_key']; ?>" class="btn btn-<?php echo $btn[0]; ?>" role="button">
														<?php echo $btn[1]; ?> Manage Client
													</a>
												</td>
											</tr>
										<?php }
									} else { ?>
										<tr>
											<td colspan="6" class="text-center">Oops! Nothing found to display.</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="alert alert-danger bg-red py-4 mt-4" id="fundingNotice" style="display: block;">
				<div class="text-center">
					<h3>This is a dummy placeholder where you should insert your ad code. <br>Insert the ad code below this <kbd>div</kbd> element. Best of luck!</h3>
				</div>
			</div>
		</div>
	</div>
</div>