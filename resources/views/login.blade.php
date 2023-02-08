@extends('layout.template')

@section('title')
    Login
@endsection

@section('content')
    <section class=" text-center text-lg-start login-content">
        <div class="card mb-3">
        <div class="row g-0 d-flex align-items-center">
            <div class="col-lg-4 d-none d-lg-flex">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/Vertical/mountain2.webp" alt="Trendy Pants and Shoes" class="w-100 rounded-t-5 rounded-tr-lg-5 rounded-bl-lg-5" />
            </div>
            <div class="col-lg-8">
            <div class="card-body py-5 px-md-5">
                @if ($errors->any())
                    <div class="text-center"><strong class="text-danger">{{ $errors->first() }}</strong></div>
                @endif
                <h1>@lang('public.Login')</h1>
                <form action="/login" method="POST">
                    @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">@lang('public.Email')</label>
                        <input type="email" id="email" name="email" class="form-control" autofocus/>
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">@lang('public.Password')</label>
                        <input type="password" id="password" name="password" class="form-control" autofocus/>
                    </div>

                    <!-- Submit button -->
                    <input class="btn btn-primary btn-lg" type="submit" value="Sign In" />
                    <br>
                    <a href="/register">@lang('public.No Account? Click here to Sign Up')</a>
                </form>
            </div>
            </div>
        </div>
        </div>
    </section>
@endsection
