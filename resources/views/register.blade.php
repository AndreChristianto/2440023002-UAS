{{-- @dd($roles) --}}

@extends('layout.template')

@section('title')
    Register
@endsection

@section('content')
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">@lang('public.Registration Form')</h3>
            @if ($errors->any())
                <div class="text-center"><strong class="text-danger">{{ $errors->first() }}</strong></div>
            @endif
            <form action="/register" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <label class="form-label" for="firstName">@lang('public.First Name')</label>
                        <input type="text" id="first_name" name="first_name" class="form-control form-control-lg" />
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <label class="form-label" for="lastName">@lang('public.Last Name')</label>
                        <input type="text" id="last_name" name="last_name" class="form-control form-control-lg" />
                    </div>
                </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <label class="form-label" for="email">@lang('public.Email')</label>
                        <input type="text" id="email" name="email" class="form-control form-control-lg" />
                    </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label select-label">@lang('public.Role')</label>
                        </div>
                        <select name="role" class="select form-control-lg">
                            <option disabled>@lang('public.Choose Role')</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                        <h6 class="mb-2 pb-1">@lang('public.Gender'): </h6>
                        @foreach ($genders as $gender)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="Male" value="{{ $gender->id }}" checked />
                            <label class="form-check-label" for="femaleGender">{{ $gender->gender_desc }}</label>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-md-6 mb-4">
                        <h6 class="mb-2 pb-1">@lang('public.Display Picture')</h6>
                        <div class="form-group">
                            <input type="file" class="form-control form-control-lg" id="display_picture" name="display_picture">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <label class="form-label" for="firstName">@lang('public.Password')</label>
                        <input type="password" id="password" name="password" class="form-control form-control-lg" />
                    </div>
                    </div>
                    <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <label class="form-label" for="lastName">@lang('public.Confirm Password')</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" />
                    </div>
                    </div>
                </div>
                <div class="mt-4 pt-2 text-center">
                    <input class="btn btn-primary btn-lg" style="width:7vw" type="submit" value="Submit" />
                    <br>
                    <a class="" href="/login">@lang('public.Already have an Account? Click here to Login')</a>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
@endsection
