@extends('layout.template')

@section('content')
  <div class="container detail-container">
    @if ($errors->any())
      <div class="text-center"><strong class="text-danger">{{ $errors->first() }}</strong></div>
    @endif
    <div class="detail d-flex">
        <div>
            <h4><b>{{ $detail['item_name'] }}</b></h4>
            <img class="detail-img" src="/img/vegetable-img.png" alt="Food" style="width:300px; height:300px">
        </div>
        <div class="detail-content">
            <h5>Price : Rp.{{ $detail['price'] }}</h5>
            <br>
            <h5><b>Product Detail</b></h5>
            <p>{{ $detail['item_desc'] }}</p>
            <hr>
            <form class="" method="POST" action="/add-to-cart/{{ $detail->id }}">
            @csrf
            <div>
                <button type="submit" class="btn btn-success btn-update">Buy</button>
                </form>
                <a href="/home" class="text-decoration-none text-white"><button type="button"
                    class="btn btn-danger btn-back">Back</button></a>
            </div>
        </div>
    </div>
  </div>
@endsection
