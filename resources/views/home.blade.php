<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .float-left{
                float: left;
            }
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
<center>
        @foreach ($store->storeproducts as $item)

        <table>

            <tbody>
            <tr>
                <td>Product Name: </td><td>{{$item->product->name}}</td>
            </tr>
            <tr>
                <td>Product Price: </td><td>{{$item->product->price}}</td>
            </tr>
            <tr>
                <td>Store Name: </td><td>{{$store->name}}</td>
            </tr>
            <tr>
                <td>Brand: </td><td>{{$item->brand->name}}</td>
            </tr>
        </tbody>
            </table>

            {{-- <h6 class="float-left" for="">Product Name: </h6><p>{{$item->product->name}}</p>
            <h6 class="float-left" for="">Product Price: </h6><p>{{$item->product->price}}</p>
            <h6 class="float-left" for="">Product Store Name: </h6><p>{{$store->name}}</p> --}}
        <h6>Product Attributes</h6>
        <table>
        <thead>
            <th>Name: </th>
            <th>Description: </th>
        </thead>
        <tbody>
            @foreach ($item->product->attributes as $attributes)

            <tr>
                <td class="bold">
                    {{$attributes->attribute->name}}
                </td>
                <td>
                    {{$attributes->desc}}
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <hr>
        @endforeach
</center>
<center>
    <h3>Services</h3>
    @foreach ($store->storeservices as $item)

    <table>

        <tbody>
        <tr>
            <td>Service Name: </td><td>{{@$item->service->name}}</td>
        </tr>
        <tr>
            <td>Service Price: </td><td>{{@$item->service->price}}</td>
        </tr>
        <tr>
            <td>Store Name: </td><td>{{$store->name}}</td>
        </tr>
        <tr>
            <td>Service Type: </td><td>{{@$item->service->category->name}}</td>
        </tr>
    </tbody>
        </table>

        {{-- <h6 class="float-left" for="">Product Name: </h6><p>{{$item->product->name}}</p>
        <h6 class="float-left" for="">Product Price: </h6><p>{{$item->product->price}}</p>
        <h6 class="float-left" for="">Product Store Name: </h6><p>{{$store->name}}</p> --}}
    {{-- <h6>Product Attributes</h6>
    <table>
    <thead>
        <th>Name: </th>
        <th>Description: </th>
    </thead>
    <tbody>
        @foreach ($item->product->attributes as $attributes)

        <tr>
            <td class="bold">
                {{$attributes->attribute->name}}
            </td>
            <td>
                {{$attributes->desc}}
            </td>
        </tr>
        @endforeach
    </tbody>
    </table> --}}
    <hr>
    @endforeach
</center>
    </body>
</html>
