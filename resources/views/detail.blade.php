@extends('layout.template')

@section('content')
  <div class="container detail-container detail-content">
    <div class="detail d-flex align-items-center detail-content">
        <div>
            <h4 class="text-center"><b>{{ $detail['item_name'] }}</b></h4>
            <img class="detail-img" src="/img/vegetable-img.png" alt="Food" style="width:300px; height:300px">
        </div>
        <div style="margin-left:2vw">
            <h5>Price : Rp.{{ $detail['price'] }}</h5>
            <br>
            <h5><b>Product Detail</b></h5>
            <p>{{ $detail['item_desc'] }}</p>
            <hr>
            <form class="" method="POST" action="/add-to-cart/{{ $detail->id }}">
            @csrf
            <div>
                <button type="submit" class="btn btn-success btn-update buy-back">Buy</button>
                </form>
                <a href="/home" class="text-decoration-none text-white"><button type="button"
                    class="btn btn-outline-danger btn-back buy-back" style="margin-left: 1vw">Back</button></a>
            </div>
        </div>
    </div>
  </div>
@endsection
