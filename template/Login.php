<div class="page page-center">
	<div class="container-tight py-4">
		<div class="text-center mb-4">
			<a href="https://mofhy.tk/">
				<img src="https://assets.mofhy.tk/img/logo.svg" height="40" width="240" alt="MofhyLite">
			</a>
		</div>
		<form class="card card-md" action="function/Login" method="POST">
			<div class="card-body">
				<h2 class="card-title text-center mb-4">Login To Your Account</h2>
				<div id="hidden-area">
					<?php
					if (isset($_SESSION['message'])) {
						echo $_SESSION['message'];
						unset($_SESSION['message']);
					}
					?>
					<div class="mb-3">
						<label class="form-label required">Email Address</label>
						<input type="email" name="email" class="form-control" placeholder="Email Address" required>
					</div>
					<div>
						<label class="form-label required">
							Password
							<span class="form-label-description">
								<a href="forgetPassword">Forgot Password</a>
							</span>
						</label>
						<div class="input-group input-group-flat">
							<input type="password" name="password" class="form-control" placeholder="Password" required>
						</div>
						<div class="mt-3">
							<button type="submit" class="btn btn-primary col-12" name="login" type="submit">Sign In</button>
						</div>
					</div>
					<div class="text-center text-muted mt-2">
						Are you new here? Just <a href="/signup" tabindex="-1">Sign Up</a>!
					</div>
				</div>
		</form>
	</div>
</div>