<link rel="stylesheet" type="text/css" href="{{ asset('style/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('style/style.css') }}">

<section>
	<header>
		<nav class="navbar sticky-top navbar-light">
			<div class="container">
				<a class="px-3 py-2"><p class="text-blue-primary by-text-callout mb-0">BayarYuk!</p></a>
				
			</div>
		</nav>
	</header>
	<main>
		<div class="welcome">
			<section class="root">
				<div class="container my-3">
					<div class="row justify-content-center">
						<div class="col-md-6 col-lg-4">
                            <div class="card">
								<div class="card-body">
									<div class="container card-login">
                                        <div class="row">

                                        </div>
                                        <div class="row">
                                            <a class="btn btn-primary by-text-subtitle text-white w-100" href="{{ url('login/view/siswa') }}">Saya Siswa</a>
                                        </div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-sm-12 col-md-6 col-lg-4">
							<div class="card">
								<div class="card-body">
									<div class="container card-login">
                                        <div class="row">

                                        </div>
                                        <div class="row">
                                            <a class="btn btn-primary by-text-subtitle text-white w-100" href="{{ url('login/view/petugas') }}">Saya Petugas</a>
                                        </div>
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