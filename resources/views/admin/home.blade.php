<link rel="stylesheet" type="text/css" href="{{ asset('style/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('style/style.css') }}">

<section>
	<header>
		<nav class="navbar sticky-top navbar-light">
			<div class="container">
				<a class="px-3"><p class="text-blue-primary by-text-callout mb-0">BayarYuk!</p></a>
				<a href="{{url('logout')}}" class="btn btn-outline-danger btn-sm rounded-pill px-3 my-1"><span class="badge badge-pill badge-secondary mr-2 px-3 py-1">{{Session::get('nama_petugas')}}</span>Logout</a>
			</div>
		</nav>
	</header>
	<main>
		<div class="admin-home">
			<section class="home">
				<div class="container my-3">
					<div class="row">
						<div class="col-lg-2 mb-3">
							<div class="list-group by-text-body">
								<a class="list-group-item list-group-item-action" href="{{url('admin/data-siswa')}}">Data Siswa</a>
								<a class="list-group-item list-group-item-action" href="{{url('admin/data-petugas')}}">Data Petugas</a>
								<a class="list-group-item list-group-item-action" href="{{url('admin/data-kelas')}}">Data Kelas</a>
								<a class="list-group-item list-group-item-action" href="{{url('admin/data-spp')}}">Data SPP</a>
								<a class="list-group-item list-group-item-action" href="{{url('admin/data-pembayaran')}}">Pembayaran</a>
							</div>
						</div>
						<div class="col-lg-10">
							
						</div>
					</div>	
				</div>
			</section>
		</div>
	</main>
</section>

<script src="{{ asset('style/bootstrap/js/bootstrap.min.js') }}"></script>