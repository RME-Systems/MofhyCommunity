<?php
$hosting_client_key = mysqli_real_escape_string($connect, $_GET['client_id']);
$sql = "SELECT * FROM `hosting_clients` WHERE `hosting_client_key`= ?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("s", $hosting_client_key);
$stmt->execute();
if ($result = $stmt->get_result()) {
	$ClientInfo = $result->fetch_assoc();
} else { ?>
	<div class="page page-center">
		<div class="container-tight py-4">
			<div class="empty">
				<div class="empty-header">404</div>
				<p class="empty-title">That's an error...</p>
				<p class="empty-subtitle text-muted">
				The requested page or resource could not be found.
				</p>
			</div>
		</div>
	</div>
	</div>
	<script src="https://assets.mofhy.tk/js/tabler.min.js"></script>
	</body>
	</html>
<?php exit; } ?>
<div class="page-wrapper">
	<div class="container-xl">
		<div class="page-header">
			<h1 class="page-title">
				Client Profile
			</h1>
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
							<h3 class="card-title">Viewing <kbd><?php echo $ClientInfo['hosting_client_email']; ?></kbd></h3>
						</div>
						<div class="card-body">
							<div class="row row-0">
								<div class="col-md-3">
									<img src="<?php echo get_gravatar($ClientInfo['hosting_client_email'], 190); ?>" alt="<?php echo $ClientInfo['hosting_client_fname'] . " " . $ClientInfo['hosting_client_lname'] . "'s Avatar"; ?>">
								</div>
								<div class="col-md-9">
									<div class="table-responsive">
										<table class="table table-bordered" aria-labelledby="Client Profile">
											<tbody>
												<tr>
													<td><strong>Full Name</strong></td>
													<td><?php echo $ClientInfo['hosting_client_fname'] . " " . $ClientInfo['hosting_client_lname']; ?></td>
												</tr>
												<tr>
													<td><strong>Email Address</strong></td>
													<td><?php echo $ClientInfo['hosting_client_email']; ?></td>
												</tr>
												<tr>
													<td><strong>Hosting Accounts</strong></td>
													<td><?php $sql = mysqli_query($connect, "SELECT `account_id` FROM `hosting_account` WHERE `account_for` = '" . $ClientInfo['hosting_client_key'] . "'");
														echo mysqli_num_rows($sql); ?></td>
												</tr>
												<tr>
													<td><strong>SSL Certificates</strong></td>
													<td><?php $sql = mysqli_query($connect, "SELECT `ssl_id` FROM `hosting_ssl` WHERE `ssl_for` = '" . $ClientInfo['hosting_client_key'] . "'");
														echo mysqli_num_rows($sql); ?></td>
												</tr>
												<tr>
													<td><strong>Registration Date</strong></td>
													<td><?php echo $ClientInfo['hosting_client_date']; ?></td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="card-footer">
							<a href="clogin.php?client_id=<?php echo $ClientInfo['hosting_client_key'] ?>" class="btn btn-primary">Login as <?php echo $ClientInfo['hosting_client_fname'] ?></a>
							<?php
							if ($ClientInfo['hosting_client_status'] == 0 || $ClientInfo['hosting_client_status'] == 2) {
								echo '<a href="function/ActivateClient.php?client_id=' . $ClientInfo['hosting_client_key'] . '" class="btn btn-success text-white">Mark as Active</a>';
							} else {
								echo '<a href="function/SuspendClient.php?client_id=' . $ClientInfo['hosting_client_key'] . '" class="btn btn-danger">Mark as Suspended</a>';
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>