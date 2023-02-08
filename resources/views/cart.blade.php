@extends('layout.template')

@section('title')
    Cart
@endsection

@section('content')
    <h1 class="text-center" style="margin-top:3vw">@lang('public.Cart')</h1>
    <div class="view-cart" style="margin-bottom: 3vw">
        <?php $total = 0 ?>

        @if (session('cart'))
        <div class="row row-cols-1 row-cols-md-3 g-4 m-2">
            @foreach (session('cart') as $id => $details)
                <?php $total = $total + $details['price'] ?>
                <div class="align-self-center">
                    <h4 class="text-center">{{ $details['item_name'] }}</h4>
                    <div class="cart-img text-center"><img src="/img/vegetable-img.png" width="200" height="200" class="img-responsive"/></div>
                </div>
                <div class="text-center align-self-center">
                    Rp.{{ $details['price'] }}
                </div>
                <div class="text-center align-self-center">
                    <button class="btn btn-outline-danger remove-from-cart" data-id="{{ $id }}">@lang('public.Delete')</button>
                </div>
            @endforeach
        </div>
        <div class="text-center" style="margin-top: 3vw">
            <h1><strong>Total : {{ $total }}</strong></h1>
            <form action="/checkout" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary ms-3">
                    @lang('public.Check Out')
                </button>
              </form>
        </div>
        @else
            <h1 class="text-center">@lang('public.Empty')!</h1>
        @endif
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('remove-from-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
