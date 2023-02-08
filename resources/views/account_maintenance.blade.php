{{-- @dd($roles) --}}

@extends('layout.template')

@section('title')
    Account Maintenance
@endsection

@section('content')
<div class="account-maintenance-content" style="padding-top:5vw; padding-bottom:5vw">
    <table class="table w-50 justify-content-center text-center" style="margin-left: auto; margin-right: auto">
        <thead>
            <tr>
                <th scope="col">@lang('public.Account')</th>
                <th scope="col">@lang('public.Action')</th>
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
                        <a href="/view-update-role/{{ $account->id }}" class="text-center btn btn-outline-warning btn-sm update-delete" style="margin-right: 1vw">@lang('public.Update Role')</a>
                        <form action="/delete-account/{{ $account->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-center btn btn-outline-danger btn-sm update-delete" type="submit" style="margin-left: 1vw">@lang('public.Delete')</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
