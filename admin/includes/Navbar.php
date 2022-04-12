<header class="navbar navbar-expand-md navbar-dark d-print-none">
	<div class="container-xl">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
			<span class="navbar-toggler-icon"></span>
		</button>
		<h1 class="navbar-brand d-none-navbar-horizontal pe-0 pe-md-3" style="filter: brightness(0) invert(1);">
			<a href="<?php if (isset($_SERVER['HTTPS'])) {
							echo "https://" . $AreaInfo['area_url'] . "/admin";
						} else {
							echo "http://" . $AreaInfo['area_url'] . "/admin";
						} ?>">
				<img src="https://assets.mofhy.tk/img/logo.svg" width="240" height="40" alt="MofhyLite" class="navbar-brand-image">
			</a>
		</h1>
		<div class="navbar-nav flex-row order-md-last">
			<div class="nav-item dropdown">
				<a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
					<span class="avatar avatar-sm rounded-1" style="background-image: url(<?php echo get_gravatar($AdminInfo['admin_email']); ?>)"></span>
					<div class="d-none d-xl-block ps-2">
						<div><?php echo $AdminInfo['admin_fname'] . " " . $AdminInfo['admin_lname']; ?></div>
						<div class="mt-1 small text-muted"><?php echo $AdminInfo['admin_email']; ?></div>
					</div>
				</a>
				<div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
					<a class="dropdown-item" href="<?php if (isset($_SERVER['HTTPS'])) {
										echo "https://" . $AreaInfo['area_url'] . "/admin/profile";
									} else {
										echo "http://" . $AreaInfo['area_url'] . "/admin/profile";
									} ?>">
						Profile
					</a>
					<a class="dropdown-item" href="<?php if (isset($_SERVER['HTTPS'])) {
										echo "https://" . $AreaInfo['area_url'] . "/admin/logout";
									} else {
										echo "http://" . $AreaInfo['area_url'] . "/admin/logout";
									} ?>">
						Sign Out
					</a>
				</div>
			</div>
		</div>
	</div>
</header>
<div class="navbar-expand-md">
	<div class="collapse navbar-collapse" id="navbar-menu">
		<div class="navbar navbar-light">
			<div class="container-xl">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="<?php if (isset($_SERVER['HTTPS'])) {
										echo "https://" . $AreaInfo['area_url'] . "/admin";
									} else {
										echo "http://" . $AreaInfo['area_url'] . "/admin";
									} ?>" class="nav-link">
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
									<path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
									<path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"></path>
								</svg>
							</span>
							<span class="nav-link-title">
								Home
							</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php if (isset($_SERVER['HTTPS'])) {
										echo "https://" . $AreaInfo['area_url'] . "/admin/clients";
									} else {
										echo "http://" . $AreaInfo['area_url'] . "/admin/clients";
									} ?>" class="nav-link ">
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<circle cx="9" cy="7" r="4"></circle>
									<path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
									<path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
									<path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
								</svg>
							</span>
							<span class="nav-link-title">
								Clients
							</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php if (isset($_SERVER['HTTPS'])) {
										echo "https://" . $AreaInfo['area_url'] . "/admin/accounts";
									} else {
										echo "http://" . $AreaInfo['area_url'] . "/admin/accounts";
									} ?>" class="nav-link">
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-server" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<rect x="3" y="4" width="18" height="8" rx="3"></rect>
									<rect x="3" y="12" width="18" height="8" rx="3"></rect>
									<line x1="7" y1="8" x2="7" y2="8.01"></line>
									<line x1="7" y1="16" x2="7" y2="16.01"></line>
								</svg>
							</span>
							<span class="nav-link-title">
								Accounts
							</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php if (isset($_SERVER['HTTPS'])) {
										echo "https://" . $AreaInfo['area_url'] . "/admin/sslCertificates";
									} else {
										echo "http://" . $AreaInfo['area_url'] . "/admin/sslCertificates";
									} ?>" class="nav-link ">
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shield-lock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3"></path>
									<circle cx="12" cy="11" r="1"></circle>
									<line x1="12" y1="12" x2="12" y2="14.5"></line>
								</svg>
							</span>
							<span class="nav-link-title">
								Free SSL Certificates
							</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php if (isset($_SERVER['HTTPS'])) {
										echo "https://" . $AreaInfo['area_url'] . "/admin/apiSettings";
									} else {
										echo "http://" . $AreaInfo['area_url'] . "/admin/apiSettings";
									} ?>" class="nav-link ">
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-api-app" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<path d="M12 15h-6.5a2.5 2.5 0 1 1 0 -5h.5"></path>
									<path d="M15 12v6.5a2.5 2.5 0 1 1 -5 0v-.5"></path>
									<path d="M12 9h6.5a2.5 2.5 0 1 1 0 5h-.5"></path>
									<path d="M9 12v-6.5a2.5 2.5 0 0 1 5 0v.5"></path>
								</svg>
							</span>
							<span class="nav-link-title">
								API Credentials
							</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php if (isset($_SERVER['HTTPS'])) {
										echo "https://" . $AreaInfo['area_url'] . "/admin/extensions";
									} else {
										echo "http://" . $AreaInfo['area_url'] . "/admin/extensions";
									} ?>" class="nav-link ">
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-subtask" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<line x1="6" y1="9" x2="12" y2="9"></line>
									<line x1="4" y1="5" x2="8" y2="5"></line>
									<path d="M6 5v11a1 1 0 0 0 1 1h5"></path>
									<rect x="12" y="7" width="8" height="4" rx="1"></rect>
									<rect x="12" y="15" width="8" height="4" rx="1"></rect>
								</svg>
							</span>
							<span class="nav-link-title">
								Extensions
							</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="https://forum.mofhy.tk/docs" class="nav-link" target="_blank">
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<circle cx="12" cy="12" r="9"></circle>
									<line x1="12" y1="17" x2="12" y2="17.01"></line>
									<path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4"></path>
								</svg>
							</span>
							<span class="nav-link-title">
								Knowledge Base
							</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="https://forum.mofhy.tk" class="nav-link" target="_blank">
							<span class="nav-link-icon d-md-none d-lg-inline-block">
								<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-messages" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
									<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
									<path d="M21 14l-3 -3h-7a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1h9a1 1 0 0 1 1 1v10"></path>
									<path d="M14 15v2a1 1 0 0 1 -1 1h-7l-3 3v-10a1 1 0 0 1 1 -1h2"></path>
								</svg>
							</span>
							<span class="nav-link-title">
								Community Forum
							</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>