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
				<h1>Register Admin</h1>
			</div>
				<form action="function/Step2" method="POST" class="p-3" onsubmit=" var password = document.getElementById('password').value; var cpassword = document.getElementById('cpassword').value; if(password != cpassword){ alert('Password not match'); return false; } return true;">
					<?php if(isset($_SESSION['message'])){echo $_SESSION['message']; unset($_SESSION['message']);} ?>
					<div class="mb-1">
							<label class="form-label required">First Name</label>
							<input type="text" name="first" class="form-control" placeholder="First Name" autofocus required>
						</div>
						<div class="mb-1">
							<label class="form-label required">Last Name</label>
							<input type="text" name="last" class="form-control" placeholder="Last Name" required>
						</div>
						<div class="mb-1">
							<label class="form-label required">Email Address</label>
							<input type="email" name="email" class="form-control" placeholder="Email Address" required>
						</div>
						<div class="mb-1">
							<label class="form-label required">Password</label>
							<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
						</div>
						<div class="mb-1">
							<label class="form-label required">Confirm Password</label>
							<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password" required>
						</div>
		</div>
		<div class="row align-items-center mt-3">
			<div class="col-4">
				<div class="progress">
					<div class="progress-bar" style="width: 90%" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" aria-label="90% Complete">
						<span class="visually-hidden">90% Complete</span>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="btn-list justify-content-end">
					<button type="submit" name="submit" class="btn btn-green">
						Continue
					</button>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>