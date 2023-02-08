<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"/>

    {{-- Extra Script --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
</head>
<body>
    @include('layout.navbar')

    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible mt-3" role="alert">
        <button type="button" class="close btn btn-outline-success" data-dismiss="alert">
            @lang('public.Dismiss')
        </button>
        <strong style="margin-left: 1vw">@lang('public.Success') !</strong> {{ session('success') }}
    </div>
    @elseif (Session::has('fail'))
    <div class="alert alert-danger alert-dismissible mt-3" role="alert">
        <button type="button" class="close btn btn-outline-danger" data-dismiss="alert">
            @lang('public.Dismiss')
        </button>
        <strong style="margin-left: 1vw">@lang('public.Success') !</strong> {{ session('fail') }}
    </div>
    @endif

    @yield('content')

    @include('layout.footer')

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $(".close").click(function() {
                $(".alert").alert("close");
            });
        });
    </script>
    @yield('scripts')
</body>
</html>
