<!DOCTYPE html>
<html lang="en">



<head>

	<title>{{ $judul }}</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="admin/assets/images/favicon.ico" type="image/x-icon">
	<!-- vendor css -->
	<link rel="stylesheet" href="admin/assets/css/style.css">
	
	


</head>

<!-- [ signin-img ] start -->
<div class="auth-wrapper align-items-stretch aut-bg-img">
	<div class="flex-grow-1">
		<div class="h-100 d-md-flex align-items-center auth-side-img">
			<div class="col-sm-10 auth-content w-auto">
				<img src="admin/assets/images/auth/auth-logo.png" alt="" class="img-fluid">
				<h1 class="text-white my-4">Welcome you!</h1>
				<h4 class="text-white font-weight-normal">Signup to your account and made member of the Able pro Dashboard Template.<br/>Do not forget to play with live customizer</h4>
			</div>
		</div>
		<div class="auth-side-form">
			<div class=" auth-content">
				<img src="admin/assets/images/auth/auth-logo-dark.png" alt="" class="img-fluid mb-4 d-block d-xl-none d-lg-none">
				<h4 class="mb-3 f-w-400">Daftar Organisasi Masyarakat</h4>

                <form action="/daftar" method="POST">
                    @csrf
				<div class="form-group mb-3">
					<label class="floating-label" for="Username">Username</label>
					<input type="text" class="form-control @error('username')
                        is-invalid
                    @enderror" name="username" id="Username" placeholder="" value="{{ old('username') }}">
                    @error('username')

							<div class="invalid-feedback">
							{{ $message }}
							</div>
								
							@enderror
				</div>
				<div class="form-group mb-3">
					<label class="floating-label" for="Email">Email Organisasi</label>
					<input type="text" class="form-control @error('email')
                        is-invalid
                    @enderror" name="email" id="Email" placeholder="" value="{{ old('email') }}">

                       @error('password')

							<div class="invalid-feedback">
							{{ $message }}
							</div>
								
							@enderror
				</div>

                		<div class="form-group mb-3">
					<label class="floating-label" for="Nama">Nama Organisasi</label>
					<input type="text"  class="form-control @error('nama')
                        is-invalid
                    @enderror" name="nama" id="Nama" placeholder="" value="{{old('nama') }}" >
                    @error('nama')

							<div class="invalid-feedback">
							{{ $message }}
							</div>
								
							@enderror
				</div>

				<div class="form-group mb-4">
					<label class="floating-label" for="Password">Password</label>
					<input type="password" name="password" class="form-control @error('password') 
                        is-invalid
                    @enderror" id="Password" placeholder="" >

                    @error('password')

							<div class="invalid-feedback">
							{{ $message }}
							</div>
								
							@enderror
				</div>
				<div class="form-check  text-start mb-4 mt-2">
					<input type="checkbox" class="form-check-input" id="customCheck1">
					<label class="form-check-label" for="customCheck1">Ingat Data <a href="#!"> </label>
				</div>
				<button class="btn btn-primary btn-block mb-4">Sign up</button>
				<div class="text-center">
					{{-- <div class="saprator my-4"><span>OR</span></div>
					<button class="btn text-white bg-facebook mb-2 me-2  wid-40 px-0 hei-40 rounded-circle"><i class="fab fa-facebook-f"></i></button>
					<button class="btn text-white bg-googleplus mb-2 me-2 wid-40 px-0 hei-40 rounded-circle"><i class="fab fa-google-plus-g"></i></button>
					<button class="btn text-white bg-twitter mb-2  wid-40 px-0 hei-40 rounded-circle"><i class="fab fa-twitter"></i></button> --}}
					<p class="mt-4">Sudah Memiliki akun? <a href="/user" class="f-w-400">Login Masuk</a></p>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ signin-img ] end -->

<!-- Required Js -->
<script src="admin/assets/js/vendor-all.min.js"></script>
<script src="admin/assets/js/plugins/bootstrap.min.js"></script>
<script src="admin/assets/js/ripple.js"></script>
<script src="admin/assets/js/pcoded.min.js"></script>



</body>


<!-- Mirrored from ableproadmin.com/bootstrap/default/auth-signup-img-side.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Mar 2022 16:34:00 GMT -->
</html>
