{{-- @dd($items) --}}

@extends('layout.template')

@section('title')
    Home
@endsection

@section('content')
    <div class="row row-cols-1 row-cols-md-5 g-4 m-2 home-content">
        @foreach ($items as $item)
        <div class="col">
            <div class="card h-100 text-center mb-3" style="...">
            <img class="card-img" src="/img/vegetable-img.png" alt="Image Not Found" style="...">
            <div class="card-body">
                <h5 class="card-title">{{ $item->item_name }}</h5>
            </div>
            <div class="flex">
                {{-- UPDATE --}}
                <a href="/detail/{{ $item->id }}" type="submit" class="btn btn-success w-50 m-3">Detail</a>
            </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="m-5 d-flex justify-content-center">
        {{-- PAGINATION NAVIGATION --}}
        {{ $items->withQueryString()->links() }}
    </div>
@endsection
