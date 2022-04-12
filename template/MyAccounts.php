<div class="page-wrapper">
	<div class="container-xl">
		<div class="page-header">
			<h1 class="page-title">
				Hosting Accounts
			</h1>
		</div>
		<div class="row">
			<div class="col-12">
			</div>
		</div>
	</div>
	<div class="page-body">
		<div class="container-xl">
			<div class="alert alert-danger bg-red py-4" id="fundingNotice" style="display: block;">
				<div class="text-center">
					<h3>This is a dummy placeholder where you should insert your ad code. <br>Insert the ad code below this <kbd>div</kbd> element. Best of luck!</h3>
				</div>
			</div>
			<?php
			if (isset($_SESSION['message'])) {
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			}
			?>
			<div class="row row-cards">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title"> Your Accounts </h3>
						</div>
						<div class="table-responsive">
							<table class="table table-vcenter text-nowrap card-table">
								<thead>
									<tr>
										<th>Username</th>
										<th>Label</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT * FROM `hosting_account` WHERE `account_for`= ? ORDER BY `account_id` DESC";
									$stmt = $connect->prepare($sql);
									$stmt->bind_param("s", $ClientInfo['hosting_client_key']);
									$stmt->execute();
									$result = $stmt->get_result();
									$fetch = $stmt->fetch();
									$Rows = $result->num_rows;
									$stmt->close();
									$one = 1;
									////
									$query = "SELECT * FROM `hosting_account` WHERE `account_for`= ? AND `account_status`= ? ORDER BY `account_id` DESC";
									$stmt1 = $connect->prepare($query);
									$stmt1->bind_param("si", $ClientInfo['hosting_client_key'], $one);
									$stmt1->execute();
									$result1 = $stmt1->get_result();
									$fetch1 = $stmt1->fetch();
									$Active = $result1->num_rows;
									$stmt1->close();
									if ($Rows > 0) {
										while ($AccountInfo = $fetch) { ?>
											<tr>
												<td><?php echo $AccountInfo['account_username']; ?></a></td>
												<td><?php echo $AccountInfo['account_label']; ?></td>
												<td><?php if ($AccountInfo['account_status'] == '0') {
														echo '<span class="badge bg-danger text-white">Inactive</span>';
													} elseif ($AccountInfo['account_status'] == '1') {
														$btn = ['success', 'globe'];
														echo '<span class="badge bg-success text-white">Active</span>';
													} elseif ($AccountInfo['account_status'] == '2') {
														$btn = ['danger', 'lock'];
														echo '<span class="badge bg-danger text-white">Suspended</span>';
													} ?></td>
												<td class="text-center">
													<?php if ($AccountInfo['account_status'] == '0') {
														$btn = ['danger', '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <rect x="5" y="11" width="14" height="10" rx="2"></rect> <circle cx="12" cy="16" r="1"></circle> <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path></svg>'];
													} elseif ($AccountInfo['account_status'] == '1') {
														$btn = ['success', '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-world" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <circle cx="12" cy="12" r="9"></circle> <line x1="3.6" y1="9" x2="20.4" y2="9"></line> <line x1="3.6" y1="15" x2="20.4" y2="15"></line> <path d="M11.5 3a17 17 0 0 0 0 18"></path> <path d="M12.5 3a17 17 0 0 1 0 18"></path></svg>'];
													} elseif ($AccountInfo['account_status'] == '2') {
														$btn = ['danger', '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"> <path stroke="none" d="M0 0h24v24H0z" fill="none"></path> <rect x="5" y="11" width="14" height="10" rx="2"></rect> <circle cx="12" cy="16" r="1"></circle> <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path></svg>'];
													} ?>
													<a href="viewAccount?account_id=<?php echo $AccountInfo['account_username']; ?>" class="btn btn-<?php echo $btn[0] ?>" role="button">
														<?php echo $btn[1] ?> Manage
													</a>
												</td>
											</tr>
										<?php
										}
									} else { ?>
										<tr>
											<td colspan="6" class="text-center">No accounts yet, want to create one?</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="card-footer">
							<div class="d-flex">
								<span>
									Active Accounts: <?php echo $Active; ?> / 3
								</span>
								<a href="createAccount" class="btn btn-primary btn-sm ms-auto">
									Create Account
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 mt-3">
					<div class="alert alert-danger bg-red py-4" id="fundingNotice" style="display: block;">
						<div class="text-center">
							<h3>This is a dummy placeholder where you should insert your ad code. <br>Insert the ad code below this <kbd>div</kbd> element. Best of luck!</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>