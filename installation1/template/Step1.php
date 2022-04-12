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
				<h1>ClientArea Settings</h1>
			</div>
				<form action="function/Step1" method="POST" class="p-3">
					<?php if(isset($_SESSION['message'])){echo $_SESSION['message']; unset($_SESSION['message']);} ?>
					<div class="mb-2">
						<label class="form-label">Clientarea Name</label>
						<input type="text" name="name" class="form-control" placeholder="Clientarea Name" autofocus required>
					</div>
					<div class="mb-2">
						<label class="form-label">Clientarea URL</label>
						<input type="text" name="url" class="form-control" placeholder="Clientarea URL" required>
					</div>
					<div class="mb-2">
						<label class="form-label">Clientarea Email</label>
						<input type="text" name="email" class="form-control" placeholder="Clientarea Email" required>
					</div>
		</div>
		<div class="row align-items-center mt-3">
			<div class="col-4">
				<div class="progress">
					<div class="progress-bar" style="width: 75%" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" aria-label="75% Complete">
						<span class="visually-hidden">75% Complete</span>
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