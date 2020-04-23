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
		<div class="data-kelas">
			<section class="data">
				<div class="container my-3">
					<div class="row">
						<div class="col-lg-2 mb-3">
							<div class="list-group by-text-body">
								<a class="list-group-item list-group-item-action" href="{{url('admin/data-siswa')}}">Data Siswa</a>
								<a class="list-group-item list-group-item-action" href="{{url('admin/data-petugas')}}">Data Petugas</a>
								<a class="list-group-item list-group-item-action active" href="{{url('admin/data-kelas')}}">Data Kelas</a>
								<a class="list-group-item list-group-item-action" href="{{url('admin/data-spp')}}">Data SPP</a>
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
												<li class="breadcrumb-item by-text-label active" aria-current="page">Data Kelas</li>
											</ol>
										</nav>
										<div class="row">
											<div class="col-lg-6">
												<div class="head-content pb-4">
													<p class="by-text-title mb-2">Data Kelas</p>
													<img src="{{ asset('icon/strip-blue.svg') }}" alt="">
												</div>
											</div>
											<div class="col-lg-6">
												<div class="text-right mt-4 mr-3">
													<a href="{{url('admin/data-kelas/tambah')}}" class="btn btn-primary btn-sm rounded-pill px-3">+ Tambah Kelas</a>
												</div>
											</div>
										</div>
									</div>
									<table class="table table-borderless mx-1 by-text-body">
										<thead>
											<tr>
												<th scope="col">ID Kelas</th>
												<th scope="col">Nama Kelas</th>
												<th scope="col">Kompetensi Keahlian</th>
												<th scope="col">Aksi</th>
											</tr>
										</thead>
										<tbody>
										@foreach($kelas as $row)
										<tr>
											<td scope="row">{{$row->id_kelas}}</td>
											<td>{{$row->nama_kelas}}</td>
											<td>{{$row->kompetensi_keahlian}}</td>
											<td>					
												<form action="{{url('admin/delete/kelas'.$row->id_kelas)}}" method="post">
													<a class="btn btn-link px-0" href="{{url('admin/data-kelas/edit/'.$row->id_kelas)}}">
														<span class="badge badge-pill badge-warning">&nbsp</span>
													</a>
													@csrf
													@method('DELETE')
													<button class="btn btn-link px-0">
														<span class="badge badge-pill badge-danger">&nbsp</span>
													</button>
												</form>
											</td>
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