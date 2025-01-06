@extends('layout')

@section('content')


<!-- popup search -->
<div class="search-popup">
    <button class="close-search"><span class="far fa-times"></span></button>
    <form action="#">
        <div class="form-group">
            <input type="search" name="search-field" class="form-control" placeholder="Search Here..." required>
            <button type="submit"><i class="far fa-search"></i></button>
        </div>
    </form>
</div>
<!-- popup search end -->


<main class="main">
    <div class="login-area pt-30 pb-50" style="background-color: #cbdcf6b0;">
        <div class="container">
            <div class="col-md-7 mx-auto">
                <div class="login-form">
                    <div class="login-header">
                        <h3>Signup</h3>
                    </div>
                <form method="POST" action="{{ route('register_for_login') }}" >
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" value="{{old('email')}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{old('phone')}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>
                            
                            <div class="col-md-3 mx-auto">
                            <button type="submit" class="theme-btn theme-btn2"><span class="far fa-paper-plane"></span>Register</button>
                    
                            </div>
                        </div>
                        
                       </form>
                    <div class="login-footer">
                        <p>Already have an account? <a href="login.php">Login.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- register area end -->

</main>

@endsection