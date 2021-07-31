@extends('admin.layouts.app')
@section('content')
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->

    </head>


    <body>
        <center style="padding-top: 15%">
            <div class='card el-tilt' data-tilt data-tilt-scale='1.2' style="width: 20rem; height: 30rem">
                <div class="card-body">
                    <p class="card-text ">
                    <h2 class="font-italic">Daily Report</h2>
                    </p>
                </div>
                <img src="data:image/jpeg;base64,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"
                    class="card-img-top" alt="">
                <div class="card-body">
                    <p class="card-text ">
                    <h3>Stores : {{ $stores->count() }}</h3>
                    <h3>Product : {{ $products->count() }}</h3>
                    <h3>Store Products : {{ $store_products->count() }}</h3>
                    </p>
                </div>
            </div>

        </center>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tilt.js/1.2.1/tilt.jquery.min.js"></script>

    </body>

        {{-- <script>
            $(document).ready(function() {
                $('.el-tilt').tilt({
                    scale: 1.2
                })
            });
        </script> --}}


@endsection
