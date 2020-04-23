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
		<div class="update-data-siswa">
			<section class="data pt-5">
				<div class="container my-3">
					<div class="row">
						<div class="col-lg-2 mb-3">
							<div class="list-group by-text-body">
								<a class="list-group-item list-group-item-action active" href="{{url('admin/data-siswa')}}">Data Siswa</a>
								<a class="list-group-item list-group-item-action" href="{{url('admin/data-petugas')}}">Data Petugas</a>
								<a class="list-group-item list-group-item-action" href="{{url('admin/data-kelas')}}">Data Kelas</a>
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
												<li class="breadcrumb-item by-text-label"><a href="{{url('admin/data-siswa')}}">Data Siswa</a></li>
												<li class="breadcrumb-item by-text-label" aria-current="page">Tambah Siswa</li>
											</ol>
										</nav>
										<div class="row">
											<div class="col-lg-12">
												<div class="head-content pb-4">
													<h5>Tambah Siswa</h5>
													<img src="{{ asset('icon/strip-blue.svg') }}" alt="">
												</div>
											</div>
										</div>
										<form action="{{url('admin/siswa',@$siswa->nisn)}}" method="post" class="w-75">
											@if(!empty($siswa)) @method('PATCH') @endif
											@csrf
											<div class="form-group">
												<label for="nisn">NISN</label>
												<input class="form-control" type="text" id="nisn" name="nisn" value="{{old('nisn',@$siswa->nisn)}}" placeholder="Masukan NISN">
											</div>
											<div class="form-group">
												<label for="nis">NIS</label>
												<input class="form-control" type="text" id="nis" name="nis" value="{{old('nis',@$siswa->nis)}}" placeholder="Masukan NIS">
											</div>
											<div class="form-group">
												<label for="nama">Nama</label>
												<input class="form-control" type="text" id="nama" name="nama" value="{{old('nama',@$siswa->nama)}}" placeholder="Masukan aAma">
											</div>
											<div class="form-group">
												<label for="id_kelas">Kelas</label>
												<select class="form-control" name="id_kelas" id="id_kelas">
													<option value="">Pilih Kelas</option>
													@foreach($kelas as $rowk)
													<option value="{{$rowk->id_kelas}}" {{old('id_kelas')}} @if(@$siswa->id_kelas == $rowk->id_kelas) selected @endif >{{$rowk->nama_kelas}}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group">
												<label for="alamat">Alamat</label>
												<input class="form-control" type="text" id="alamat" name="alamat" value="{{old('alamat',@$siswa->alamat)}}"  placeholder="Masukan Alamat">
											</div>
											<div class="form-group">
												<label for="no_telp">Nomor Telepon</label>
												<input class="form-control" type="text" id="no_telp" name="no_telp" value="{{old('no_telp',@$siswa->no_telp)}}"  placeholder="Masukan Nomor Telepon">
											</div>
											<div class="form-group">
												<label for="id_spp">SPP</label>
												<select class="form-control" name="id_spp" id="id_spp">
													<option value="">Pilih SPP</option>
													@foreach($spp as $rows)
													<option value="{{$rows->id_spp}}" {{old('id_spp')}} @if(@$siswa->id_spp == $rows->id_spp) selected @endif >{{$rows->id_spp}}</option>
													@endforeach
												</select>
											</div>
											<div>
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