@extends('layout.template')

@section('title')
    Login
@endsection

@section('content')
    <section class=" text-center text-lg-start login-content">
        <div class="card mb-3">
        <div class="row g-0 d-flex align-items-center">
            <div class="col-lg-4 d-none d-lg-flex">
            <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes" class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
            </div>
            <div class="col-lg-8">
            <div class="card-body py-5 px-md-5">
                @if ($errors->any())
                    <div class="text-center"><strong class="text-danger">{{ $errors->first() }}</strong></div>
                @endif
                <h1>Login</h1>
                <form action="" method="POST">
                @csrf
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email address</label>
                    <input type="email" id="email" name="email" class="form-control" />
                </div>
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" />
                </div>

                <!-- Submit button -->
                <a href="/login" class="btn btn-primary btn-block mb-4">Sign in</a>
                </form>
            </div>
            </div>
        </div>
        </div>
    </section>
@endsection
