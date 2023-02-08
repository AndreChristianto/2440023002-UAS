{{-- @dd($user) --}}

@extends('layout.template')

@section('title')
    Update Roles
@endsection

@section('content')
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
        <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">{{ $first_name }} {{ $last_name }}</h3>
            @if ($errors->any())
                <div class="text-center"><strong class="text-danger">{{ $errors->first() }}</strong></div>
            @endif
            <form action="/update-role" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label select-label">Role</label>
                        </div>
                        <input type="hidden" name="user_id" value="{{ $user }}">
                        @if (Auth::user()->role_id == 2)
                            <select name="role" class="select form-control-lg">
                                <option>Choose Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ $user_role->role_name == $role->role_name ? 'selected' : '' }}>{{ $role->role_name }}</option>
                                @endforeach
                            </select>
                        @endif
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
    </div>
</section>
@endsection
