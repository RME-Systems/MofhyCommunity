<div class="page-wrapper">
	<div class="container-xl">
		<div class="page-header">
			<h1 class="page-title">
				Subdomain Extensions
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
							<h3 class="card-title">New Domain Extension</h3>
						</div>
						<div class="card-body">
							<form method="post" action="function/NewExtension">
								<div class="mb-3">
									<label for="domain" class="form-label">Domain Name (must include <kbd>.</kbd> at start)</label>
									<input type="text" name="domain" class="form-control" value="" placeholder=".example.com" autofocus required>
								</div>
								<button type="submit" name="submit" class="btn btn-primary">
									Add Domain
								</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="card">
						<div class="card-header">Registered Domains</div>
						<div class="card-body">
							<div class="table-responsive text-center">
								<table class="table table-vcenter" aria-describedby="Registered Domains">
									<thead>
										<tr>
											<th>Extension</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
									$stmt = $connect->prepare("SELECT * FROM `hosting_domain_extensions` ORDER BY `extension_id` ASC");
									$stmt->execute();
									$result = $stmt->get_result();
									if ($result->num_rows>0) {
										while ($Extensions = $result->fetch_assoc()) {?>
										<tr>
											<td><code><?php echo $Extensions['extension_value'] ?></code></td>
											<td><a href="function/DeleteExtension?extension=<?php echo $Extensions['extension_value']; ?>" class="btn btn-danger">Delete Extension</a></td>
										</tr>
										<?php
										}
									} else { ?>
									<tr>
										<td colspan="3" class="text-center">No extensions found</td>
									</tr>
									<?php
									}
									?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 mt-3"></div>
			</div>
		</div>
	</div>