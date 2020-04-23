<link rel="stylesheet" type="text/css" href="{{ asset('style/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('style/style.css') }}">

<section>
	<header>
		<nav class="navbar fixed-top navbar-light bg-light bg-white">
			<div class="container">
				<a class="px-3"><p class="text-blue-primary by-text-callout mb-0">BayarYuk!</p></a>
				<a href="{{url('logout')}}" class="btn btn-outline-danger btn-sm rounded-pill px-3 my-1"><span class="badge badge-pill badge-secondary mr-2 px-3 py-1">{{Session::get('nama_petugas')}}</span>Logout</a>
			</div>
		</nav>
	</header>
	<main class="pt-2">
		<div class="update-data-pembayaran">
			<section class="data pt-5">
				<div class="container my-3">
					<div class="row">
						<div class="col-lg-2 mb-3">
							<div class="list-group by-text-body">
								<a class="list-group-item list-group-item-action" href="{{url('admin/data-siswa')}}">Data Siswa</a>
								<a class="list-group-item list-group-item-action" href="{{url('admin/data-petugas')}}">Data Petugas</a>
								<a class="list-group-item list-group-item-action" href="{{url('admin/data-kelas')}}">Data Kelas</a>
								<a class="list-group-item list-group-item-action" href="{{url('admin/data-spp')}}">Data SPP</a>
								<a class="list-group-item list-group-item-action active" href="{{url('admin/data-pembayaran')}}">Pembayaran</a>
							</div>
						</div>
						<div class="col-lg-10">
							<div class="card">
								<div class="card-body">
									<div class="container px-2">
										<nav aria-label="breadcrumb">
											<ol class="breadcrumb mb-0">
												<li class="breadcrumb-item by-text-label">Admin</li>
												<li class="breadcrumb-item by-text-label"><a href="{{url('admin/data-pembayaran')}}">Data Pembayaran</a></li>
												<li class="breadcrumb-item by-text-label active" aria-current="page">Pembayaran</li>
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
									<form action="{{url('admin/pembayaran',@$pembayaran->id_pembayaran)}}" method="post" class="w-75">
										@csrf
										@if(!empty($pembayaran))
											@method('PATCH')
										@endif
										<div class="form-group">
											<label for="nisn">NISN</label>
											<select class="form-control" name="nisn" id="nisn">
												<option value="">Pilih NISN</option>
												@foreach($siswa as $rown)
												<option value="{{$rown->nisn}}" {{old('nisn')}} @if(@$pembayaran->nisn == $rown->nisn) selected @endif>{{$rown->nisn}}</option>
												@endforeach
											</select>
										</div>								
										<div class="form-group">
											<label for="bulan_bayar">Bulan bayar</label>
											<select class="form-control" name="bulan_bayar" id="bulan_bayar">
												<option value="">Pilih Bulan Bayar</option>
													<option value="januari" {{old('bulan_bayar',(@$pembayaran->bulan_bayar == 'januari')? 'selected' : '')}}>Januari</option>
													<option value="febuari" {{old('bulan_bayar',(@$pembayaran->bulan_bayar == 'febuari')? 'selected' : '')}}>Februari</option>
													<option value="maret" {{old('bulan_bayar',(@$pembayaran->bulan_bayar == 'maret')? 'selected' : '')}}>Maret</option>
													<option value="april" {{old('bulan_bayar',(@$pembayaran->bulan_bayar == 'april')? 'selected' : '')}}>April</option>
													<option value="mei" {{old('bulan_bayar',(@$pembayaran->bulan_bayar == 'mei')? 'selected' : '')}}>Mei</option>
													<option value="juni" {{old('bulan_bayar',(@$pembayaran->bulan_bayar == 'juni')? 'selected' : '')}}>Juni</option>
													<option value="juli" {{old('bulan_bayar',(@$pembayaran->bulan_bayar == 'juli')? 'selected' : '')}}>Juli</option>
													<option value="agustus" {{old('bulan_bayar',(@$pembayaran->bulan_bayar == 'agustus')? 'selected' : '')}}>Agustus</option>
													<option value="september" {{old('bulan_bayar',(@$pembayaran->bulan_bayar == 'september')? 'selected' : '')}}>September</option>
													<option value="oktober" {{old('bulan_bayar',(@$pembayaran->bulan_bayar == 'oktober')? 'selected' : '')}}>Oktober</option>
													<option value="november" {{old('bulan_bayar',(@$pembayaran->bulan_bayar == 'november')? 'selected' : '')}}>November</option>
													<option value="desember" {{old('bulan_bayar',(@$pembayaran->bulan_bayar == 'desember')? 'selected' : '')}}>Desember</option>
											</select>
										</div>
										<div class="form-group">
											<label for="tahun_bayar">Tahun Bayar</label>
											<input type="text" class="form-control" id="tahun_bayar" name="tahun_bayar" placeholder="Masukan Tahun Bayar" value="{{old('tahun_bayar',@$pembayaran->tahun_bayar)}}">
										</div>
										<div class="form-group">
											<label for="id_spp">ID SPP</label>
											<select class="form-control" id="id_spp" name="id_spp">
												<option value="">Pilih ID SPP</option>
												@foreach($spp as $rows)
												<option value="{{$rows->id_spp}}" {{old('id_spp')}} @if(@$pembayaran->id_spp == $rows->id_spp) selected @endif >{{$rows->id_spp}}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group">
											<label for="jumlah_bayar">Jumlah Bayar</label>
											<input type="text" class="form-control" id="jumlah_bayar" name="jumlah_bayar" placeholder="Masukan Jumlah Bayar" value="{{old('jumlah_dibayar',@$pembayaran->jumlah_dibayar)}}">
										</div>
										<button class="btn btn-primary w-100" type="submit">Kirim</button>
									</form>
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