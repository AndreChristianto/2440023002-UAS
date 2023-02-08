{{-- @dd($user_role) --}}

@extends('layout.template')

@section('title')
    Profile
@endsection

@section('content')
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
        <div class="w-100 d-flex">
            <div class="align-self-center card shadow-2-strong" style="margin-right: 2vw">
                <img src="{{ asset(auth()->user()->display_picture_link)}}" alt="Profile Picture" style="width:23vw; margin-right:2vw">
            </div>
            <div class="card shadow-2-strong card-registration w-75" style="border-radius: 15px;">
                <div class="card-body p-4 p-md-5">
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Profile</h3>
                @if ($errors->any())
                    <div class="text-center"><strong class="text-danger">{{ $errors->first() }}</strong></div>
                @endif
                <form action="/editProfile" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="firstName">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control form-control-lg" value="{{ auth()->user()->first_name }}" />
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="lastName">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control form-control-lg" value="{{ auth()->user()->last_name }}" />
                        </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control form-control-lg" value="{{ auth()->user()->email }}" />
                        </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                                <label class="form-label select-label">Role</label>
                            </div>
                            @if (Auth::user()->role_id == 2)
                                <select name="role" class="select form-control-lg">
                                    <option>Choose Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ $user_role->role_name == $role->role_name ? 'selected' : '' }}>{{ $role->role_name }}</option>
                                    @endforeach
                                </select>
                            @else
                                <select name="role" class="select form-control-lg">
                                    <option value="{{ $user_role->id }}" selected>{{ $user_role->role_name }}</option>
                                </select>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <h6 class="mb-2 pb-1">Gender: </h6>
                            @foreach ($genders as $gender)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value="{{ $gender->id }}" {{ $user_gender->gender_desc == $gender->gender_desc ? 'checked' : '' }} />
                                <label class="form-check-label" for="gender">{{ $gender->gender_desc }}</label>
                            </div>
                            @endforeach
                        </div>
                        <div class="col-md-6 mb-4">
                            <h6 class="mb-2 pb-1">Display Picture (Please reselect your image)</h6>
                            <div class="form-group">
                                <input type="file" class="form-control form-control-lg" id="display_picture" name="display_picture">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="firstName">New Password</label>
                            <input type="password" id="password" name="password" class="form-control form-control-lg"/>
                        </div>
                        </div>
                        <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label" for="lastName">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" />
                        </div>
                        </div>
                    </div>
                    <div class="mt-4 pt-2">
                    <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
