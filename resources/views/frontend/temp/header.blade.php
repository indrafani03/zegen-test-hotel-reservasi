<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" class="bg-body position-relative app-blank">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-bs-theme-mode")) { themeMode = document.documentElement.getAttribute("data-bs-theme-mode"); } else { if ( localStorage.getItem("data-bs-theme") !== null ) { themeMode = localStorage.getItem("data-bs-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-bs-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Header Section-->
			<div class="mb-0" id="home">
				<!--begin::Wrapper-->
				<div class="bgi-no-repeat bgi-size-contain bgi-position-x-center bgi-position-y-bottom landing-dark-bg" style="background-image: url(assets/media/svg/illustrations/landing.svg)">
					<!--begin::Header-->
					<div class="landing-header" data-kt-sticky="true" data-kt-sticky-name="landing-header" data-kt-sticky-offset="{default: '300px', lg: '400px'}">
						<!--begin::Container-->
						<div class="container">
							<!--begin::Wrapper-->
							<div class="d-flex align-items-center justify-content-between">
								<!--begin::Logo-->
								<div class="d-flex align-items-center flex-equal">
									<!--begin::Mobile menu toggle-->
									<button class="btn btn-icon btn-active-color-primary me-3 d-flex d-lg-none" id="kt_landing_menu_toggle">
										<i class="ki-duotone ki-abstract-14 fs-2hx">
											<span class="path1"></span>
											<span class="path2"></span>
										</i>
									</button>
									<!--end::Mobile menu toggle-->
									<!--begin::Logo image-->
									<a href="landing.html">
										<img alt="Logo" src="assets/media/logos/hotel-white.svg" style="fill: white;" class="logo-default h-25px h-lg-30px" />
										<img alt="Logo" src="assets/media/logos/hotel.svg" class="logo-sticky h-20px h-lg-25px" />
                                        <span><b>MY HOTEL</b></span>
									</a>
									<!--end::Logo image-->
								</div>
								<!--end::Logo-->
								<!--begin::Menu wrapper-->
								<div class="d-lg-block" id="kt_header_nav_wrapper">
									<div class="d-lg-block p-5 p-lg-0" data-kt-drawer="true" data-kt-drawer-name="landing-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="200px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_landing_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav_wrapper'}">
										<!--begin::Menu-->
										<div class="menu menu-column flex-nowrap menu-rounded menu-lg-row menu-title-gray-600 menu-state-title-primary nav nav-flush fs-5 fw-semibold" id="kt_landing_menu">
											<!--begin::Menu item-->
											<div class="menu-item">
												<!--begin::Menu link-->
												<a class="menu-link nav-link active py-3 px-4 px-xxl-6" href="#kt_body" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Beranda</a>
												<!--end::Menu link-->
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item">
												<!--begin::Menu link-->
												<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#how-it-works" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Hotel</a>
												<!--end::Menu link-->
											</div>
											<!--end::Menu item-->
											<!--begin::Menu item-->
											<div class="menu-item">
												<!--begin::Menu link-->
												<a class="menu-link nav-link py-3 px-4 px-xxl-6" href="#achievements" data-kt-scroll-toggle="true" data-kt-drawer-dismiss="true">Tentang Kami</a>
												<!--end::Menu link-->
											</div>
										</div>
										<!--end::Menu-->
									</div>
								</div>
								<!--end::Menu wrapper-->
								<!--begin::Toolbar-->
								<div class="flex-equal text-end ms-1">
                                    <?php if(session()->get('isLogin') == true) { ?>
                                        <div class="app-navbar-item ms-5" id="kt_header_user_menu_toggle">
                                            <!--begin::Menu wrapper-->
                                            <div class="cursor-pointer symbol symbol-35px symbol-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                                <img class="symbol symbol-circle symbol-35px symbol-md-40px" src="assets/img/avatar-1.png" alt="user">
                                            </div>
                                            <!--begin::User account menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px mt-2" data-kt-menu="true" style="">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content d-flex align-items-center px-3">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-50px me-5">
                                                            <img alt="Logo" src="assets/img/avatar-1.png">
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Username-->
                                                        <div class="d-flex flex-column">
                                                            <div class="fw-bold d-flex align-items-center fs-5">
                                                                <?= session()->get("name") ?>	                                    
                                                            </div>
                                                        </div>
                                                        <!--end::Username-->
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->

                                                <?php if(session()->get("type") == "2") { ?>
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-5">
                                                    <a href="<?= url("/dashboard") ?>" class="menu-link px-5">Dashboard</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <?php } else { ?>
													<!--begin::Menu item-->
													<div class="menu-item px-5">
														<a href="<?= url("/my-booking") ?>" class="menu-link px-5">My Booking</a>
													</div>
													<!--end::Menu item-->
												<?php } ?>

                                                <!--begin::Menu item-->
                                                <div class="menu-item px-5">
                                                    <a href="<?= url("/logout") ?>" class="menu-link px-5">Sign Out</a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::User account menu-->
                                            <!--end::Menu wrapper-->
                                        </div>
                                    <?php } else { ?>
								    	<a href="<?= url("/login") ?>" class="btn btn-success">Sign In</a>
                                    <?php } ?>
								</div>
								<!--end::Toolbar-->
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Container-->
					</div>
					<!--end::Header-->
					<!--begin::Landing hero-->
					<div class="d-flex flex-column flex-center w-100 min-h-200px min-h-lg-200px px-9">
						<!--begin::Heading-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-5">
                                    <span class="input-group-text" id="basic-addon1">
                                        <i class="ki-duotone ki-map fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                    </span>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Mau kemana?" aria-describedby="basic-addon1"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-5">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="ki-duotone ki-calendar-search fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                        </span>
                                        <input type="text" class="form-control tanggalflat" placeholder="Tanggal" id="tanggal" name="tanggal"  aria-label="Tanggal" aria-describedby="basic-addon1"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="input-group mb-5">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="ki-duotone ki-profile-user fs-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                                            </span>
                                        <input type="text" class="form-control" placeholder="Jumlah orang" id="orang" name="orang" aria-label="Jumlah orang" aria-describedby="basic-addon1"/>
                                </div>
                            </div>
                            <div class="col-md-2">
                            <a href="#" class="btn btn-primary" id="Cari">Cari</a>
                            </div>
                            
                        </div>
					</div>
					<!--end::Landing hero-->
				</div>
				<!--end::Wrapper-->
				<!--begin::Curve bottom-->
				<div class="landing-curve landing-dark-color mb-10 mb-lg-20">
					<svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z" fill="currentColor"></path>
					</svg>
				</div>
				<!--end::Curve bottom-->
			</div>
			<!--end::Header Section-->