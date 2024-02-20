@extends('frontend.layouts.master')

@section('title','WAVE || Register Page')

@section('main-content')
	<!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->
            
    <!-- Shop Login -->
    <section class="shop login section">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-6 offset-lg-3 col-12">
                    <div class="login-form">
                        <h2>Register</h2>
                        <p>Please register in order to checkout more quickly</p>

                        <!-- Form -->
                        <form class="form" method="post" action="{{route('register.submit')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Your Name<span>*</span></label>
                                        <input type="text" name="name" placeholder="" required="required" value="{{old('name')}}">
                                        @error('name')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Your Email<span>*</span></label>
                                        <input type="text" name="email" placeholder="" required="required" value="{{old('email')}}">
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <div class="col-12">
                                                <span id="email-error" class="error-message text-danger"></span>
                                            </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                        <div class="form-group">
                                            <label>Your Password<span>*</span></label>
                                            <div class="password-input-wrapper">
                                                <input type="password" class="reg-class" name="password" placeholder="" required="required" value="{{old('password')}}">
                                                <svg class="toggle-password" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="width: 20px; height: 20px;"> <!-- Adjust width and height as needed -->
                                                    <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                                                </svg>
                                            </div>
                                            
                                            @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                             <div class="col-12">
                                                <span id="password-error" class="error-message text-danger"></span>
                                            </div>
                                        </div>
                                </div>


                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Confirm Password<span>*</span></label>
                                        <div class="password-input-wrapper">
                                            <input type="password" name="password_confirmation" placeholder="" required="required" value="{{old('password_confirmation')}}">                                
                                            <svg class="toggle-password" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" style="width: 20px; height: 20px;"> <!-- Adjust width and height as needed -->
                                                    <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/>
                                                </svg>
                                            </div>
                                        @error('password_confirmation')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <div class="col-12">
                                                <span id="confirm-password-error" class="error-message text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group login-btn">
                                        <button class="btn" type="submit">Register</button>
                                        <a href="{{route('login.form')}}" class="btn">Login</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--/ End Form -->
                        <!-- Add jQuery library (if not already included) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('.toggle-password').click(function() {
            var passwordInput = $(this).prev('input');
            var type = passwordInput.attr('type');
            if (type === 'password') {
                passwordInput.attr('type', 'text');
            } else {
                passwordInput.attr('type', 'password');
            }
        });
    });


    $(document).ready(function() {
        $('form').submit(function(event) {
            var email=$('input[name="email"]').val();
            var password = $('input[name="password"]').val();
            var confirmPassword = $('input[name="password_confirmation"]').val();

            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

            var uppercaseRegex = /[A-Z]/;
            var lowercaseRegex = /[a-z]/;
            var specialCharRegex = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/;

            if(!emailReg.test(email)){
                event.preventDefault();
                $('#email-error').text('The email must be a valid email address');

                setTimeout(function() {
                $('#email-error').text('');
            }, 3000); 
            }
            else if(password.length < 6){
                event.preventDefault();
                $('#password-error').text('Password must be at least 6 characters.');

                setTimeout(function() {
                $('#password-error').text('');
            }, 3000); 

            }
            else if (!uppercaseRegex.test(password) || !lowercaseRegex.test(password) || !specialCharRegex.test(password)) {
                event.preventDefault();
                $('#password-error').text('Password must contain at least one uppercase letter, one lowercase letter, and one special character.');
                setTimeout(function() {
                $('#password-error').text('');
            }, 3000); 
           
            }
            else if (password !== confirmPassword) {
                event.preventDefault();
                $('#confirm-password-error').text('The password confirmation does not match.');
                setTimeout(function() {
                $('#confirm-password-error').text('');
            }, 3000); 
            }
        });
    });
</script>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Login -->
@endsection

@push('styles')
<style>
    .password-input-wrapper{
        background:#F6F7FB;
        display:flex;
        align-items:center;
    }
    .toggle-password{
        cursor: pointer;
        margin-right:1rem;
        margin-left:1rem;
    }
    .toggle-password:hover{
       transform:scale(1.1);
    }
    .shop.login .form .btn{
        margin-right:0;
    }
    .btn-facebook{
        background:#39579A;
    }
    .btn-facebook:hover{
        background:#073088 !important;
    }
    .btn-github{
        background:#444444;
        color:white;
    }
    .btn-github:hover{
        background:black !important;
    }
    .btn-google{
        background:#ea4335;
        color:white;
    }
    .btn-google:hover{
        background:rgb(243, 26, 26) !important;
    }
</style>
@endpush