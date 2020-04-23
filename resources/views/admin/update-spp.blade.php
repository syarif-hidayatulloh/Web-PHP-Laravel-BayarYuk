<link rel="stylesheet" type="text/css" href="{{ asset('style/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('style/style.css') }}">

<section>
	<header>
		<nav class="navbar fixed-top navbar-light bg-white">
			<div class="container">
				<a class="px-3"><p class="text-blue-primary by-text-callout mb-0">BayarYuk!</p></a>
				<a href="{{url('logout')}}" class="btn btn-outline-danger btn-sm rounded-pill px-3 my-1"><span class="badge badge-pill badge-secondary mr-2 px-3 py-1">{{Session::get('nama_petugas')}}</span>Logout</a>
			</div>
		</nav>
	</header>
	<main class="pt-2">
		<div class="update-data-spp">
			<section class="data pt-5">
				<div class="container my-3">
					<div class="row">
						<div class="col-lg-2 mb-3">
							<div class="list-group by-text-body">
								<a class="list-group-item list-group-item-action" href="{{url('admin/data-siswa')}}">Data Siswa</a>
								<a class="list-group-item list-group-item-action" href="{{url('admin/data-petugas')}}">Data Petugas</a>
								<a class="list-group-item list-group-item-action" href="{{url('admin/data-kelas')}}">Data Kelas</a>
								<a class="list-group-item list-group-item-action active" href="{{url('admin/data-spp')}}">Data SPP</a>
								<a class="list-group-item list-group-item-action" href="{{url('admin/data-pembayaran')}}">Pembayaran</a>
							</div>
						</div>
						<div class="col-lg-10">
							<div class="card">
								<div class="card-body">
									<div class="container px-2">
										<nav aria-label="breadcrumb">
											<ol class="breadcrumb mb-0">
												<li class="breadcrumb-item by-text-label">Admin</li>
												<li class="breadcrumb-item by-text-label"><a href="{{url('admin/data-spp')}}">Data SPP</a></li>
												<li class="breadcrumb-item by-text-label" aria-current="page">Tambah SPP</li>
											</ol>
										</nav>
										<div class="row">
											<div class="col-lg-12">
												<div class="head-content pb-4">
													<h5>Tambah SPP</h5>
													<img src="{{ asset('icon/strip-blue.svg') }}" alt="">
												</div>
											</div>
										</div>
										<form class="w-75" action="{{url('admin/spp',@$spp->id_spp)}}" method="post">
											@if(!empty($spp)) @method('PATCH') @endif	
											@csrf
											<div class="form-group">
												<label for="tahun">Tahun</label>
												<input class="form-control" type="text" id="tahun" name="tahun" value="{{old('tahun',@$spp->tahun)}}" placeholder="Masukan Tahun">
											</div>
											<div class="form-group">
												<label for="nominal">Nominal</label>
												<input class="form-control" type="text" id="nominal" name="nominal" value="{{old('nominal',@$spp->nominal)}}" placeholder="Masukan Nominal">
											</div>
											<div class="form-group">
												<button class="btn btn-primary w-100 mt-3" type="submit">kirim</button>
											</div>
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