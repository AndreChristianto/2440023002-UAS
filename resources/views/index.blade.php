@extends('layout.template')

@section('title')
    Index
@endsection

@section('content')
    <div class="index-content align-items-center d-flex flex-column justify-content-center">
        {{-- <img src="{{ asset('img/grocery-background_opacity.jpg') }}" alt="background" class="w-100 mt-3 mb-3"> --}}
        <h5 class="text-light text-center i-line-1">@lang('public.Find and Buy')</h1>
        <h1 class="text-light text-center i-line-2">@lang('public.Your Grocery')</h1>
        <h5 class="text-light text-center i-line-1">@lang('public.Here')!</h1>
    </div>
@endsection
