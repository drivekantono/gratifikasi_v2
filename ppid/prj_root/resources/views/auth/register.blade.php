<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('template_fe.head')
</head>
<body>
	<section class="green-bg">
		<div class="random-bg-image align-center" style="height:100%; background-image: url( {{ asset('fe/images/bg/full/8.jpg') }} ); background-size:cover">
			<div class="container align-items-center">
				<div class="row justify-content-center">
					<div class="col-md-8">
						<div class="card" style="background: rgba(6, 40, 61, 0.6); transform:translate(0, 10%);">
							<!--<div class="card-header">{{ __('Register') }}</div>-->

							<div class="card-body">
								<img class="col-md-4 mt-3 mb-5" src="{{ asset('fe/images/ppid-color-1.png') }}" alt width="20%" style="display:block; margin:auto;">
								<form method="POST" action="{{ route('register') }}">
									@csrf
									
									<div class="form-group row">
										<label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>

										<div class="col-md-6">
											<input id="nik" type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" value="{{ old('nik') }}" required autocomplete="nik" autofocus>

											@error('nik')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

										<div class="col-md-6">
											<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

											@error('name')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

										<div class="col-md-6">
											<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

											@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
									
									<!--
									<div class="form-group row">
										<label for="telp" class="col-md-4 col-form-label text-md-right">{{ __('No. Telpon') }}</label>

										<div class="col-md-6">
											<input id="telp" type="telp" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{ old('telp') }}" required autocomplete="telp">

											@error('telp')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
									
									<div class="form-group row">
										<label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Rumah') }}</label>

										<div class="col-md-6">
											<input id="alamat" type="alamat" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" required autocomplete="alamat">

											@error('alamat')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
									-->

									<div class="form-group row">
										<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

										<div class="col-md-6">
											<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

											@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Konfirmasi Password') }}</label>

										<div class="col-md-6">
											<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
										</div>
									</div>

									<div class="form-group row pt-3">
										<div class="col-md-6 offset-md-4">
											<button type="submit" class="btn btn-white">
												{{ __('Daftar') }}
											</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>
<style>
	input:focus {
		background-color: #e8f0fe !important;
	}	
	label {
		color: #FFF !important;
	}
	.btn:hover {
		color: #fff;
		-webkit-animation-name: pulse;
		animation-name: pulse;
		-webkit-animation-duration: 1s;
		animation-duration: 1s;
		-webkit-animation-fill-mode: both;
		animation-fill-mode: both;
		background-color: rgba(255, 255, 255, 0.2);
	}
</style>
</html>
