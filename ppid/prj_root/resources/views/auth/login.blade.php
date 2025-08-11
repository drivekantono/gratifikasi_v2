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
					<div class="col-md-4">
						<div class="card" style="background: rgba(6, 40, 61, 0.6); transform:translate(0, 30%);">
							<!--<div class="card-header">{{ __('e-PPID Inspektorat Provinsi Jawa Timur') }}</div>-->

							<div class="card-body">
								<img class="mt-3 mb-5" src="{{ asset('fe/images/ppid-color-1.png') }}" alt width="60%" style="display:block; margin:auto;">
								<form method="POST" action="{{ route('login') }}">
									@csrf

									<div class="form-group row">
										<!--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }} </label> -->

										<div class="col-md-12 px-3">
											<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

											@error('email')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<!--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>-->

										<div class="col-md-12 px-3">
											<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

											@error('password')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>

									<div class="form-group row">
										<div class="col-md-12 px-3">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

												<label class="form-check-label" for="remember" style="color:#fff">
													{{ __('Ingat Saya') }}
												</label>
											</div>
										</div>
									</div>

									<div class="form-group row mb-0">
										<div class="col-md-12">
											<button type="submit" class="btn btn-white" style="background:#fff; width:100%">
												{{ __('Masuk') }}
											</button>
										</div>
									</div>
									
									<!--
									@if (Route::has('password.request'))
									<div class="form-group row mb-0">
										<div class="col-md-12">
											<a class="btn btn-link" href="{{ route('password.request') }}">
												{{ __('Lupa Password?') }}
											</a>
										</div>
									</div>
									@endif
									-->
									
									<div class="form-group row">
										<div class="col-6 px-3 pt-3" style="text-align:left">
											<a href="{{route('register')}}" style="color:#FFF;" onMouseOver="this.style.color='#20c997'" onMouseOut="this.style.color='#FFF'">
												{{ __('Daftar') }}
											</a>
										</div>
										@if (Route::has('password.request'))
										<div class="col-6 px-3 pt-3" style="text-align:right">
											<a href="{{route('password.request')}}" style="color:#FFF;" onMouseOver="this.style.color='#20c997'" onMouseOut="this.style.color='#FFF'">
												{{ __('Lupa Password') }}
											</a>
										</div>
										@endif
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
	input {
		background-color: #fff !important;
	}	
	input:focus {
		background-color: #e8f0fe !important;
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


