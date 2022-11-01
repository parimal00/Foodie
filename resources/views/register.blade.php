@extends('layout.main')
@section('content')
    <!-- page details -->
    <div class="breadcrumb-agile bg-light py-2">
        <ol class="breadcrumb bg-light m-0">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Register Page</li>
        </ol>
    </div>
    <!-- //page details -->

    <!-- login -->
    <div class="login-contect py-5">
        <div class="container py-xl-5 py-3">
            <div class="login-body">
                <div class="login p-4 mx-auto">
                    <h5 class="text-center mb-4">Register Now</h5>
					<form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label>Your Name</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="" >
							@error('name')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{old('email')}}"  placeholder="" >
							@error('email')
							<span>
								<strong style="color:red">{{ $message }}</strong>
							</span>
						@enderror
                        </div>
					
                        <div class="form-group">
                            <label class="mb-2">Password</label>
                            <input type="password" class="form-control" name="password" id="password1" placeholder=""
                                >
								@error('password')
							<span>
								<strong style="color:red">{{ $message }}</strong>
							</span>
						@enderror
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password2" placeholder=""
                               >
							   @error('password_confirmation')
							   <span>
								   <strong style="color:red">{{ $message }}</strong>
							   </span>
							   @enderror
                        </div>
                        <button type="submit" class="btn submit mb-4">Register</button>
                        <p class="text-center">
                            <a href="#" class="text-da">By clicking Register, I agree to your terms</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- //login -->

    <!-- footer -->
    <footer class="py-5">
        <div class="container py-xl-4">
            <div class="row footer-top">
                <div class="col-lg-4 footer-grid_section_1its footer-text">
                    <!-- logo -->
                    <h2>
                        <a class="logo text-wh" href="index.html">
                            <img src="images/logo.png" alt="" class="img-fluid"><span>Tasty</span> Burger
                        </a>
                    </h2>
                    <!-- //logo -->
                    <p class="mt-lg-4 mt-3 mb-lg-5 mb-4">Sed ut perspiciatis unde omnis iste natus errorhjhsit lupt
                        atem
                        accursit lupt atem accu
                        dfdsa
                        ntium doloremque laudan tium accu santium dolore.</p>
                    <!-- social icons -->
                    <ul class="top-right-info">
                        <li>
                            <p>Follow As:</p>
                        </li>
                        <li class="facebook-w3">
                            <a href="#facebbok">
                                <span class="fa fa-facebook-f"></span>
                            </a>
                        </li>
                        <li class="twitter-w3">
                            <a href="#twitter">
                                <span class="fa fa-twitter"></span>
                            </a>
                        </li>
                        <li class="google-w3">
                            <a href="#google">
                                <span class="fa fa-google-plus"></span>
                            </a>
                        </li>
                        <li class="dribble-w3">
                            <a href="#dribble">
                                <span class="fa fa-dribbble"></span>
                            </a>
                        </li>
                    </ul>
                    <!-- //social icons -->
                </div>
                <div class="col-lg-4 footer-grid_section_1its my-lg-0 my-sm-4 my-4">
                    <div class="footer-title">
                        <h3>Contact Us</h3>
                    </div>
                    <div class="footer-text mt-4">
                        <p>Address : 1234 lock, Charlotte, North Carolina, United States</p>
                        <p class="my-2">Phone : +12 534894364</p>
                        <p>Email : <a href="mailto:info@example.com">info@example.com</a></p>
                    </div>
                    <div class="footer-title mt-4 pt-md-2">
                        <h3>Payment Method</h3>
                    </div>
                    <ul class="list-unstyled payment-links mt-4">
                        <li>
                            <a href="login.html"><img src="images/pay2.png" alt=""></a>
                        </li>
                        <li>
                            <a href="login.html"><img src="images/pay5.png" alt=""></a>
                        </li>
                        <li>
                            <a href="login.html"><img src="images/pay1.png" alt=""></a>
                        </li>
                        <li>
                            <a href="login.html"><img src="images/pay4.png" alt=""></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 footer-grid_section_1its">
                    <div class="footer-title">
                        <h3>Request Info</h3>
                    </div>
                    <div class="info-form-right mt-4 p-0">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-lg-6 form-group mb-2 pr-lg-1">
                                    <input type="text" class="form-control" name="Name" placeholder="Name"
                                        required="">
                                </div>
                                <div class="col-lg-6 form-group mb-2 pl-lg-1">
                                    <input type="text" class="form-control" name="Phone" placeholder="Phone"
                                        required="">
                                </div>
                            </div>
                            <div class="form-group mb-2">
                                <input type="email" class="form-control" name="Email" placeholder="Email"
                                    required="">
                            </div>
                            <div class="form-group mb-2">
                                <textarea name="Comment" class="form-control" placeholder="Comment" required=""></textarea>
                            </div>
                            <button type="submit" class="btn submit-contact ml-auto">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- //footer -->
    <!-- copyright -->
    <div class="cpy-right text-center py-3">
        <p>© 2019 Tasty Burger. All rights reserved.
        </p>
    </div>
    <!-- //copyright -->
@endsection
