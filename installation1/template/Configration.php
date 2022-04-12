<style>
	.card, .row{
		margin-left: auto;
		margin-right: auto;
		width: 80%;
	}
	@media only screen and (max-width: 728px) {
		.card, .row{
			margin-left: auto;
			margin-right: auto;
			width: 100%;
		}
	}
</style>
<div class="page page-center">
	<div class="container-tight py-4">
		<div class="text-center mb-4">
			<a href="https://mofhy.tk/" class="navbar-brand">
				<img src="https://assets.mofhy.tk/img/logo.svg" height="40" width="240" alt="MofhyLite"></a>
		</div>
		<div class="card">
			<div class="text-center mt-3">
				<h1>Database Credentials</h1>
			</div>
				<form action="function/configuration" method="POST" class="p-3">
					<?php if(isset($_SESSION['message'])){echo $_SESSION['message']; unset($_SESSION['message']);} ?>
					<div class="mb-2">
						<label class="form-label">Database Hostname</label>
						<input type="text" name="hostname" class="form-control" placeholder="Database Hostname" autofocus required>
					</div>
					<div class="mb-2">
						<label class="form-label">Database Username</label>
						<input type="text" name="username" class="form-control" placeholder="Database Username" required>
					</div>
					<div class="mb-2">
						<label class="form-label">Database Password</label>
						<input type="password" name="password" class="form-control" placeholder="Database Password">
					</div>
					<div class="mb-10">
						<label class="form-label">Database Name</label>
						<input type="text" name="name" class="form-control" placeholder="Database Name" required>
					</div>
		</div>
		<div class="row align-items-center mt-3">
			<div class="col-4">
				<div class="progress">
					<div class="progress-bar" style="width: 40%" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" aria-label="40% Complete">
						<span class="visually-hidden">40% Complete</span>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="btn-list justify-content-end">
					<button type="submit" name="submit" class="btn btn-green">
						Verify Credentials
					</button>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>