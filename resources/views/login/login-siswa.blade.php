<link rel="stylesheet" type="text/css" href="{{ asset('style/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('style/style.css') }}">

<section>
	<header>
		<nav class="navbar fixed-top navbar-light bg-light bg-white">
			<div class="container">
				<a class="px-3 my-2"><p class="text-blue-primary by-text-callout mb-0">BayarYuk!</p></a>
				
			</div>
		</nav>
	</header>
	<main>
		<div class="login-petugas">
			<section class="login">
				<div class="container">
					<div class="card">
						<div class="card-body p-0">
							<div class="row no-gutters">
								<div class="col-lg-8 rounded-left">
									<div class="color-layer rounded-left">

									</div>
								</div>
								<div class="col-lg-4 p-4">
									<div class="container py-5 my-5">
										<div class="head-content pb-4">
											<h5>Login Siswa</h5>
											<img src="{{ asset('icon/strip-blue.svg') }}" alt="">
										</div>
										<form action="{{url('login/siswa')}}" method="post">
											@csrf
											<div class="form-group">
												<label class="by-text-caption	" for="nisn">NISN</label>
												<input class="form-control" type="text" id="nisn" name="nisn">
											</div>
											<button class="btn btn-primary mt-3 w-100" type="submit">login</button>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</section>
		</div>
	</main>
</section>

<script src="{{ asset('style/bootstrap/js/bootstrap.min.js') }}"></script>