{{-- @dd($roles) --}}

@extends('layout.template')

@section('title')
    Account Maintenance
@endsection

@section('content')
    <table class="table w-50 justify-content-center text-center" style="margin-left: auto; margin-right: auto">
        <thead>
            <tr>
                <th scope="col">Account</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $account)
                @foreach ($roles as $role)
                    @if($account->role_id == $role->id)
                        @php
                            $name = $role->role_name
                        @endphp
                    @endif
                @endforeach

            <tr>
                <td>{{ $account->first_name }} {{ $account->last_name }} - {{ $name }}</td>
                <td>
                    <div class="d-flex justify-content-center">
                        <a href="/view-update-role/{{ $account->id }}" class="text-center btn btn-outline-warning" style="margin-right: 1vw">Update Role</a>
                        <form action="/delete-account/{{ $account->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-center btn btn-outline-danger" type="submit" style="margin-left: 1vw">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
