<link rel="stylesheet" type="text/css" href="{{ asset('style/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('style/style.css') }}">

<section>
	<header>
		<nav class="navbar fixed-top navbar-light">
			<div class="container">
				<a class="px-3"><p class="text-blue-primary by-text-callout mb-0">BayarYuk!</p></a>
				<a href="{{url('logout')}}" class="btn btn-outline-danger btn-sm rounded-pill px-3 my-1"><span class="badge badge-pill badge-secondary mr-2 px-3 py-1">{{Session::get('nama')}}</span>Logout</a>
			</div>
		</nav>
	</header>
	<main class="pt-2">
		<div class="data-pembayaran">
			<section class="data pt-5">
				<div class="container my-3">
					<div class="row">
						<div class="col-lg-2 mb-3">
							<div class="list-group by-text-body">
								<a class="list-group-item list-group-item-action active" href="{{url('admin/data-pembayaran')}}">Pembayaran</a>
							</div>
						</div>
						<div class="col-lg-10">
							<div class="card">
								<div class="card-body">
									<div class="container px-2">
										<nav aria-label="breadcrumb">
											<ol class="breadcrumb mb-0">
												<li class="breadcrumb-item by-text-label">Siswa</li>
												<li class="breadcrumb-item by-text-label active" aria-current="page">Data Pembayaran</li>
											</ol>
										</nav>
										<div class="row">
											<div class="col-lg-6">
												<div class="head-content pb-4">
													<h5>Data Pembayaran</h5>
													<img src="{{ asset('icon/strip-blue.svg') }}" alt="">
												</div>
											</div>
										</div>
									</div>
									<table class="table table-borderless mx-1">
										<thead>
											<tr>
												<th scope="col">ID Pembayaran</th>
												<th scope="col">Tanggal</th>
												<th scope="col">Petugas</th>
												<th scope="col">Nama Siswa</th>
												<th scope="col">Kelas</th>
												<th scope="col">Jumlah Bayar</th>
											</tr>
										</thead>
										<tbody>
										@foreach($pembayaran as $row)
										<tr>
											<td>{{$row->id_pembayaran}}</td>
											<td>{{$row->tgl_bayar}}</td>
											<td>{{$row->petugas->nama_petugas}}</td>
											<td>{{$row->siswa->kelas->nama_kelas}}</td>
											<td>{{$row->jumlah_bayar}}</td>
											<td>{{$row->spp->tahun}}</td>
										</tr>
										@endforeach
										</tbody>
									</table>
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