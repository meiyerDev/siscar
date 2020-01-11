<!DOCTYPE html>

<html lang="en">

<!-- begin::Head -->
<head>
	<meta charset="utf-8" />
	<title>SisCar | @yield('title')</title>
	<meta name="description" content="Latest updates and statistic charts">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<!--begin::Web font -->
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Poppins:300,400,500,600,700"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!--end::Web font -->
	<link href="{{ asset('assets/vendors/custom/vendors/line-awesome/css/line-awesome.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/vendors/custom/vendors/fontawesome5/css/all.min.css') }}" rel="stylesheet" type="text/css" />
	<!--begin::Page Vendors Styles -->

	<link href="{{ asset('assets/vendors/custom/vendors/flaticon/flaticon.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/vendors/custom/vendors/flaticon2/flaticon.css') }}" rel="stylesheet" type="text/css" />
	<!--begin::Global Theme Styles -->
	<link href="{{ asset('assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
	<!--begin:: Global Optional Vendors -->
	<link href="{{ asset('assets/vendors/general/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
	<!--end:: Global Optional Vendors -->
	<!--begin::Layout Skins -->
	<link href="{{ asset('assets/demo/default/skins/header/base/brand.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/demo/default/skins/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/demo/default/skins/brand/brand.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/demo/default/skins/aside/light.css') }}" rel="stylesheet" type="text/css" />

	<!--end::Layout Skins -->
	<link rel="shortcut icon" href="{{ asset('assets/media/logos/logazo.ico') }}" />

	@yield('my_style')
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="k-header--fixed k-header-mobile--fixed k-aside--enabled k-aside--fixed k-aside-secondary--enabled">

	<!-- begin:: Page -->

	<!-- begin:: Header Mobile -->
	<div id="k_header_mobile" class="k-header-mobile  k-header-mobile--fixed ">
		<div class="k-header-mobile__logo">
			<a href="index.html">
				<img alt="Logo" src="{{ asset('assets/media/logos/logo-1.png') }}" />
			</a>
		</div>
		<div class="k-header-mobile__toolbar">

			<button class="k-header-mobile__toolbar-toggler k-header-mobile__toolbar-toggler--left" id="k_aside_mobile_toggler"><span></span></button>
			<button class="k-header-mobile__toolbar-topbar-toggler" id="k_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
		</div>
	</div>

	<!-- end:: Header Mobile -->
	<div class="k-grid k-grid--hor k-grid--root">
		<div class="k-grid__item k-grid__item--fluid k-grid k-grid--ver k-page">

			<!-- begin:: Aside -->
			<button class="k-aside-close " id="k_aside_close_btn"><i class="la la-close"></i></button>
			<div class="k-aside  k-aside--fixed 	k-grid__item k-grid k-grid--desktop k-grid--hor-desktop" id="k_aside">

				<!-- begin:: Aside -->
				<div class="k-aside__brand	k-grid__item " id="k_aside_brand">
					<div class="k-aside__brand-logo">
						<a href="index.html">
							<img alt="Logo" src="{{ asset('assets/media/logos/logo-1.png') }}" />
						</a>
					</div>
					<div class="k-aside__brand-tools">
						<button class="k-aside__brand-aside-toggler k-aside__brand-aside-toggler--left" id="k_aside_toggler"><span></span></button>
					</div>
				</div>

				<!-- end:: Aside -->

				<!-- begin:: Aside Menu -->
				<div class="k-aside-menu-wrapper	k-grid__item k-grid__item--fluid" id="k_aside_menu_wrapper">
					<div id="k_aside_menu" class="k-aside-menu " data-kmenu-vertical="1" data-kmenu-scroll="1" data-kmenu-dropdown-timeout="500">
						<ul class="k-menu__nav ">
							<li class="k-menu__item  k-menu__item--submenu" aria-haspopup="true" data-kmenu-submenu-toggle="hover"><a href="javascript:;" class="k-menu__link k-menu__toggle"><i class="k-menu__link-icon flaticon2-layers-1"></i><span class="k-menu__link-text"></span><i class="k-menu__ver-arrow la la-angle-right"></i></a>
								<div class="k-menu__submenu "><span class="k-menu__arrow"></span>
									<ul class="k-menu__subnav">
										<li class="k-menu__item " aria-haspopup="true"><a href="components_base_table.html" class="k-menu__link "><i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i><span class="k-menu__link-text"></span></a></li>
									</ul>
								</div>
							</li>
							<li class="k-menu__item  k-menu__item--submenu" aria-haspopup="true" data-kmenu-submenu-toggle="hover"><a href="javascript:;" class="k-menu__link k-menu__toggle"><i class="k-menu__link-icon flaticon2-calendar-3"></i><span class="k-menu__link-text"></span><i class="k-menu__ver-arrow la la-angle-right"></i></a>
								<div class="k-menu__submenu "><span class="k-menu__arrow"></span>
									<ul class="k-menu__subnav">
										<li class="k-menu__item " aria-haspopup="true"><a href="custom_user_login-v1.html" class="k-menu__link "><i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i><span class="k-menu__link-text"></span></a></li>
									</ul>
								</div>
							</li>
							<li class="k-menu__item  k-menu__item--submenu" aria-haspopup="true" data-kmenu-submenu-toggle="hover"><a href="javascript:;" class="k-menu__link k-menu__toggle"><i class="k-menu__link-icon flaticon2-attention-exclamation-triangular-signal"></i><span class="k-menu__link-text"></span><i class="k-menu__ver-arrow la la-angle-right"></i></a>
								<div class="k-menu__submenu "><span class="k-menu__arrow"></span>
									<ul class="k-menu__subnav">
										<li class="k-menu__item " aria-haspopup="true"><a href="custom_error_404-v1.html" class="k-menu__link "><i class="k-menu__link-bullet k-menu__link-bullet--dot"><span></span></i><span class="k-menu__link-text"></span></a></li>
									</ul>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>

			<!-- end:: Aside -->
			<div class="k-grid__item k-grid__item--fluid k-grid k-grid--hor k-wrapper" id="k_wrapper">

				<!-- begin:: Header -->
				<div id="k_header" class="k-header k-grid__item  k-header--fixed ">

					<!-- begin: Header Menu -->
					<button class="k-header-menu-wrapper-close" id="k_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
					<div class="k-header-menu-wrapper" id="k_header_menu_wrapper"></div>

					<!-- end: Header Menu -->

					<!-- begin:: Header Topbar -->
					<div class="k-header__topbar">
						<!--begin: User bar -->
						<div class="k-header__topbar-item k-header__topbar-item--user">
							<div class="k-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px -2px">
								<div class="k-header__topbar-user">
									<span class="k-header__topbar-welcome ">Hola,</span>
									<span class="k-header__topbar-username ">{{ \Auth::user()->name }}</span>
									<img alt="Pic" src="{{ asset('assets/media/users/300_11.jpg') }}" />

									<!--use below badge element instead the user avatar to display username's first letter(remove k-hidden class to display it) -->
									<span class="k-badge k-badge--username k-badge--lg k-badge--brand k-hidden">A</span>
								</div>
							</div>
							<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-md">
								<div class="k-user-card k-margin-b-50 k-margin-b-30-tablet-and-mobile" style="background-image: url(assets/media/misc/head_bg_sm.jpg)">
									<div class="k-user-card__wrapper">
										<div class="k-user-card__pic">
											<img alt="Pic" src="{{ asset('assets/media/users/300_11.jpg') }}" />
										</div>
										<div class="k-user-card__details">
											<div class="k-user-card__name">{{ \Auth::user()->name }}</div>
											<div class="k-user-card__position">Universidad Romulo Gallegos.</div>
										</div>
									</div>
								</div>
								<ul class="k-nav k-margin-b-10">
									<li class="k-nav__item k-nav__item--custom k-margin-t-15">
										<a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-outline-metal btn-hover-brand btn-upper btn-font-dark btn-sm btn-bold">Cerrar Sesión</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					                    	@csrf
					                    </form>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- begin:: Content -->
				<div class="k-content	k-grid__item k-grid__item--fluid k-grid k-grid--hor" id="k_content">
					@yield('content')
				</div>
			</div>
		</div>
	</div>

	<!--begin:: Global Mandatory Vendors -->
	<script src="{{ asset('assets/vendors/general/jquery/dist/jquery.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendors/general/popper.js/dist/umd/popper.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendors/general/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendors/general/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js') }}" type="text/javascript"></script>
	<!--end:: Global Mandatory Vendors -->

	<!--begin:: Global Optional Vendors -->
	{{-- <script src="{{ asset('assets/vendors/general/jquery-validation/dist/jquery.validate.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendors/general/jquery-validation/dist/additional-methods.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendors/custom/theme/framework/vendors/jquery-validation/init.js') }}" type="text/javascript"></script>
	<script src="{{ asset('assets/vendors/general/toastr/build/toastr.min.js') }}" type="text/javascript"></script> --}}
	{{-- <script src="{{ asset('assets/vendors/custom/theme/framework/vendors/sweetalert2/init.js') }}" type="text/javascript"></script> --}}

	<!--end:: Global Optional Vendors -->

	<!--begin::Global Theme Bundle -->
	<script src="{{ asset('assets/demo/default/base/scripts.bundle.min.js') }}" type="text/javascript"></script>

	<!--end::Global Theme Bundle -->

	<!--begin::Page Scripts -->
	{{-- <script src="{{ asset('assets/demo/default/custom/components/forms/validation/controls.js') }}" type="text/javascript"></script> --}}

	<!--end::Page Scripts -->

	<!--begin::Global App Bundle -->
	<script src="{{ asset('assets/app/scripts/bundle/app.bundle.js') }}" type="text/javascript"></script>
	@yield('my_script')
</body>

<!-- end::Body -->
</html>