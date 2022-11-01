@extends('layout.main')
@section('content')
    @vite('resources/css/app.css')

    <!-- login -->
    <div class="log_page">
        <div class="img">
            <img src="{{ asset('images/log.jpg') }}" alt="">
        </div>
        <div class="log">
            <div class="login-contect py-5">
                <div class="container py-xl-5 py-3">
                    <div class="login-body">
                        <div class="login p-4 mx-auto">
                            <h5 class="text-center mb-4">Login Now</h5>
                            <form action="{{ route('login') }}" method="post">
								@csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="email">
                                    @error('email')
                                      <span class="text-red-800"> {{ $message }}</span> 
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="mb-2">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="password"
                                       >
										@error('password')
										<span class="text-red-800"> {{ $message }}</span> 
									  @enderror
                                </div>
                                <button type="submit" class="btn submit mb-4">Login</button>
                                <p class="forgot-w3ls text-center mb-3">
                                    <a href="#" class="text-da">Forgot your password?</a>
                                </p>
                                <p class="account-w3ls text-center text-da">
                                    Don't have an account?
                                    <a href="{{route('user.register')}}">Create one now</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- //login -->
@endsection
