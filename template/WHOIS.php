<div class="page-wrapper">
	<div class="container-xl">
		<div class="page-header">
			<h1 class="page-title">
				WHOIS Lookup
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
		<div class="alert alert-danger bg-red py-4" id="fundingNotice" style="display: block;">
			<div class="text-center">
				<h3>This is a dummy placeholder where you should insert your ad code. <br>Insert the ad code below this <kbd>div</kbd> element. Best of luck!</h3>
			</div>
		</div>
		<?php if (isset($_SESSION['message'])) {
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		} ?>
		<div class="row row-cards">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Enter Domain Name</h3>
					</div>
					<div class="card-body">
						<form method="post" action="function/WHOIS">
							<div class="mb-3">
								<label for="domain" class="form-label">Domain Name</label>
								<input type="text" name="domain" class="form-control" placeholder="example.com" required>
							</div>
							<button type="submit" name="submit" class="btn btn-primary">
								Check Domain Name
							</button>
						</form>
					</div>
				</div>
			</div>
			<div class="col-12">
				<?php if (isset($_SESSION['return'])) {
					echo $_SESSION['return'];
					unset($_SESSION['return']);
				} ?>
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